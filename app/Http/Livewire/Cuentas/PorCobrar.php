<?php

namespace App\Http\Livewire\Cuentas;

use App\Common\Helpers;
use App\Models\CuentasPorCobrar;
use App\Models\CuentasPorCobrarAbono;
use App\Models\EfectivoCuentaBancos;
use Livewire\Component;

class PorCobrar extends Component
{

    protected $listeners = ['EliminarCuentaAbono' => 'delAbono']; // escucah el evento Eliminar

    public $cpendientes; 
    public $ctotal;
    public $mostrar;
    public $cuentas;

    public $selectCuenta = [];
    public $cuentaId;
    public $tipo_pago, $idbanco; // para el tipo de pago
    public $bancos;

    public $cAbono;


    public function mount(){
        $this->mostrar = 0;
        $this->getCuentas();
        $this->getDatos();
        $this->tipo_pago = 1;
        $this->getBancos();
    }

    public function render()
    {
        return view('livewire.cuentas.por-cobrar');
    }


    public function btnMostrarCuentas($tipo){
        $this->mostrar = $tipo;
        $this->getCuentas();
    }

    public function getCuentas(){ /// mostrar cuentas
        
        if ($this->mostrar == 1) { // pendientes
            $this->cuentas = CuentasPorCobrar::where('edo', 1)->with(['factura', 'factura.cliente'])->orderBy('id', 'desc')->get();
        } elseif ($this->mostrar == 2) { // pagadas
            $this->cuentas = CuentasPorCobrar::where('edo', 2)->with(['factura', 'factura.cliente'])->orderBy('id', 'desc')->get();
        } else { // todos
            $this->cuentas = CuentasPorCobrar::with(['factura', 'factura.cliente'])->orderBy('id', 'desc')->get();
        }

    }


    public function destroy($id){
        CuentasPorCobrar::find($id)->delete();
        $this->dispatchBrowserEvent('mensaje', 
                                    ['clase' => 'success', 
                                    'titulo' => 'Realizado', 
                                    'texto' => 'Cuenta Eliminada correctamente']);
        $this->getCuentas();
        $this->getDatos();
    }


    public function getDatos(){
        $this->cpendientes = CuentasPorCobrar::where('edo', 1)->count();
        $this->ctotal = CuentasPorCobrar::where('edo', 1)->sum('saldo');
    }


    public function cuentaSelect($iden){
        $this->selectCuenta = CuentasPorCobrar::where('id', $iden)->with(['misabonos', 'factura', 'factura.productos', 'factura.cliente'])->first();
        $this->cuentaId = $iden;
    }


    public function getBancos(){
        
        $this->bancos = EfectivoCuentaBancos::where('edo', 1)
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
    }





    
    public function btnAddAbono(){

        $this->validate(['cAbono' => 'required']);
        
        if ($this->validarAbono($this->selectCuenta['saldo'], $this->cAbono)) {

        if (CuentasPorCobrarAbono::create([
            'cuenta_id' => $this->cuentaId,
            'cantidad' => $this->cAbono,
            'tipo_pago' => $this->tipo_pago,
            'efectivo_cuenta_bancos_id' => $this->idbanco,
            'user' => session('config_usuario_id'),
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ])) {
            // Actualizar los valores
            $abonos = $this->selectCuenta['abonos'] + $this->cAbono;
            $saldo = $this->selectCuenta['saldo'] - $this->cAbono;


            CuentasPorCobrar::where('id', $this->cuentaId)->first()
                        ->update(['saldo' => $saldo, 'abonos' => $abonos, 'tiempo' => Helpers::timeId()]);

            // si el saldo llega a 0 lo doy por pagado
            if ($saldo == 0) {
                CuentasPorCobrar::where('id', $this->cuentaId)->first()
                            ->update(['edo' => 2, 'tiempo' => Helpers::timeId()]);
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
        
        $abono = CuentasPorCobrarAbono::where('id', $iden)->first();
        if ($abono->update(['edo' => 2, 'tiempo' => Helpers::timeId()])) {
            

            $cuenta = CuentasPorCobrar::where('id', $abono->cuenta_id)->first();
            $saldo = $cuenta->saldo + $abono->cantidad;
            $abonos = $cuenta->abonos - $abono->cantidad;
            $cuenta->update(['saldo' => $saldo, 'abonos' => $abonos, 'edo' => 1, 'tiempo' => Helpers::timeId()]);

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


    

}
