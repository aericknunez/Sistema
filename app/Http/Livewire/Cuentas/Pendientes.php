<?php

namespace App\Http\Livewire\Cuentas;

use App\Common\Helpers;
use App\Models\CuentasPagar;
use App\Models\CuentasPagarAbono;
use App\Models\EfectivoCuentaBancos;
use App\Models\Proveedor;
use App\System\Efectivo\EfectivoCuentas;
use Livewire\Component;

class Pendientes extends Component
{

    use EfectivoCuentas;

    protected $listeners = ['EliminarCuentaPendiente' => 'destroy', 'EliminarCuentaAbono' => 'delAbono']; // escucah el evento Eliminar

    protected $rules = [
        'nombre' => 'required',
        'proveedor' => 'required',
        'cantidad' => 'required'
    ];

    public $datos = [];
    public $proveedores = [];
    public $cuentas = [];
    public $selectCuenta = [];

    public $cpendientes, $ctotal;

    public $proveedor, $nombre, $detalles, $factura, $tdocumento, $cantidad, $fecha;
    
    public $tipo_pago, $idbanco; // para el tipo de pago
    public $bancos;



    public $cAbono;
    public $cuentaId;

    public $mostrar;


    public function mount(){
        $this->mostrar = 0;
        $this->getProveedores();
        $this->getCuentas();
        $this->getDatos();

        $this->tipo_pago = 1;
        $this->getBancos();
    }

    public function render()
    {
        return view('livewire.cuentas.pendientes');
    }

    public function btnAddCuenta(){

        $this->validate();

        CuentasPagar::create([
            'proveedor_id' => $this->proveedor,
            'nombre' => $this->nombre,
            'detalles' => $this->detalles,
            'factura' => $this->factura,
            'comprobante' => $this->tdocumento,
            'cantidad' => $this->cantidad,
            'saldo' => $this->cantidad,
            'caducidad' => $this->fecha,
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        $this->reset(['proveedor', 'nombre', 'detalles', 'factura', 'tdocumento', 'cantidad', 'fecha']);
        $this->getCuentas();
        $this->emit('creado'); // manda el mensaje de creado
        $this->dispatchBrowserEvent('closeModal', ['modal' => 'ModalAddCuenta']);
        $this->getDatos();
    }


    public function destroy($id){
        CuentasPagar::find($id)->delete();
        $this->dispatchBrowserEvent('mensaje', 
                                    ['clase' => 'success', 
                                    'titulo' => 'Realizado', 
                                    'texto' => 'Cuenta Eliminada correctamente']);
        $this->getCuentas();
        $this->getDatos();
    }




    public function getProveedores(){
        $this->proveedores = Proveedor::select('id', 'nombre')->get();
    }

    public function getCuentas(){ /// mostrar cuentas
        
        if ($this->mostrar == 1) { // pendientes
            $this->cuentas = CuentasPagar::where('edo', 1)->with('proveedor')->orderBy('id', 'desc')->get();
        } elseif ($this->mostrar == 2) { // pagadas
            $this->cuentas = CuentasPagar::where('edo', 2)->with('proveedor')->orderBy('id', 'desc')->get();
        } else { // todos
            $this->cuentas = CuentasPagar::with('proveedor')->orderBy('id', 'desc')->get();
        }

    }


    public function getDatos(){
        $this->cpendientes = CuentasPagar::where('edo', 1)->count();
        $this->ctotal = CuentasPagar::where('edo', 1)->sum('saldo');
    }


    public function cuentaSelect($iden){
        $this->selectCuenta = CuentasPagar::where('id', $iden)->with('misabonos')->with('proveedor')->first();
        $this->cuentaId = $iden;
    }


    public function btnMostrarCuentas($tipo){
        $this->mostrar = $tipo;
        $this->getCuentas();
    }



    public function btnAddAbono(){

        $this->validate(['cAbono' => 'required']);
        
        if ($this->validarAbono($this->selectCuenta['saldo'], $this->cAbono)) {

        if (CuentasPagarAbono::create([
            'cuenta_id' => $this->cuentaId,
            'cantidad' => $this->cAbono,
            'tipo_pago' => $this->tipo_pago,
            'efectivo_cuenta_bancos_id' => $this->idbanco,
            'user' => session('config_usuario_id'),
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ])) {
            // Actualizar los valores
            $abonos = $this->selectCuenta['abonos'] + $this->cAbono;
            $saldo = $this->selectCuenta['saldo'] - $this->cAbono;


            CuentasPagar::where('id', $this->cuentaId)->first()
                        ->update(['saldo' => $saldo, 'abonos' => $abonos]);

            // si el saldo llega a 0 lo doy por pagado
            if ($saldo == 0) {
                CuentasPagar::where('id', $this->cuentaId)->first()
                            ->update(['edo' => 2]);
            }

            $this->cuentaSelect($this->cuentaId);

            if ($this->tipo_pago != 1 and $this->idbanco != NULL) {
                // obtiene total para sumarlo a la cuenta y crear historial
                $efectivo = $this->updateDataOrigenDestino($this->idbanco);
                $totalx = $efectivo[0]['saldo'] - $this->cAbono;
                $this->crearHistorialUnico($this->idbanco, $efectivo[0]['saldo'], $totalx, $this->cAbono, "Pago Cuenta Pendiente"); // registra la remesa en el historial
                $this->updateCta($this->idbanco, $totalx); /// actualiza el saldo en orige y destino    
            }
        }

        $this->reset(['cAbono']);
        $this->dispatchBrowserEvent('mensaje', 
                                    ['clase' => 'success', 
                                    'titulo' => 'Realizado', 
                                    'texto' => 'Abono agregado correctamente']);
        $this->getCuentas();
        $this->getDatos();

        } else {
            $this->emit('error'); // manda el mensaje de creado

        }
    }



    public function validarAbono($saldo, $abono){ // valida si pasa o no el abono
        $x = $saldo - $abono;
        if ($abono <= 0) {
            return false;
        }
        else if ($saldo == 0) {
            return false;
        }
        else if ($x < 0) {
            return false;
        } else {
            return true;
        }
    }




    public function delAbono($iden){
        
        $abono = CuentasPagarAbono::where('id', $iden)->first();
        if ($abono->update(['edo' => 2])) {
            

            $cuenta = CuentasPagar::where('id', $abono->cuenta_id)->first();
            $saldo = $cuenta->saldo + $abono->cantidad;
            $abonos = $cuenta->abonos - $abono->cantidad;
            $cuenta->update(['saldo' => $saldo, 'abonos' => $abonos, 'edo' => 1]);

            if ($abono->tipo_pago != 1 and $abono->efectivo_cuenta_bancos_id != NULL) {
            // obtiene total para sumarlo a la cuenta y crear historial
            $efectivo = $this->updateDataOrigenDestino($abono->efectivo_cuenta_bancos_id);
            $totalx = $efectivo[0]['saldo'] + $abono->cantidad;
            $this->crearHistorialUnico($abono->efectivo_cuenta_bancos_id, $efectivo[0]['saldo'], $totalx, $abono->cantidad, "Cuenta Eliminada"); // registra la remesa en el historial
            $this->updateCta($abono->efectivo_cuenta_bancos_id, $totalx); /// actualiza el saldo en orige y destino
            }

            $this->dispatchBrowserEvent('mensaje', 
                                        ['clase' => 'success', 
                                        'titulo' => 'Realizado', 
                                        'texto' => 'Abono de: '.dinero($abono->cantidad).' eliminado correctamente']);
            
            $this->cuentaSelect($abono->cuenta_id);
            
            $this->getCuentas();
            $this->getDatos();
        } else {
            $this->dispatchBrowserEvent('error', 
                                        ['clase' => 'success', 
                                        'titulo' => 'Error', 
                                        'texto' => 'Error al eliminar el elemento']);
        }  
    }

    public function getBancos(){
        
        $this->bancos = EfectivoCuentaBancos::where('edo', 1)
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
    }



}
