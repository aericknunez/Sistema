<?php

namespace App\Http\Livewire\Efectivo;

use App\Common\Helpers;
use App\Models\EfectivoCuentaBancos;
use App\Models\EfectivoGastos;
use App\Models\EfectivoGastosCategorias;
use App\System\Corte\Corte;
use App\System\Efectivo\EfectivoCuentas;
use Livewire\Component;

class Gastos extends Component
{
    use Corte, EfectivoCuentas;


    public $gastos;
    public $bancos;
    public $categorias;
    public $tipo, $nombre, $descripcion, $cantidad, $tipocomprobante, $comprobante, $tipo_pago, $idbanco, $cat_gasto;
    public $todosgastos, $gastosefec;


    protected $listeners = ['EliminarGasto' => 'destroy']; // escucah el evento Eliminar

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'cantidad' => 'required'
    ];


    public function mount(){
        $this->getGastos();
        $this->getCuentas();
        $this->getCategorias();
        $this->totalGastos();
        $this->tipo_pago = 1;
        $this->tipocomprobante = 1;
    }



    public function render()
    {
        return view('livewire.efectivo.gastos');
    }


    public function getGastos(){
        
        $this->gastos = EfectivoGastos::where('cajero', session('config_usuario_id'))
                                            ->whereBetween('tiempo', [$this->inicioCorte(session('config_usuario_id')), Helpers::timeId()])
                                            ->with('banco')
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
    }

            
    public function getCategorias(){
        
        $this->categorias = EfectivoGastosCategorias::where('edo', 1)
                                                ->orderBy('tiempo', 'desc')
                                                ->get();
    }


    public function destroy($id){

        EfectivoGastos::where('id', $id)
                        ->update(['edo' => 2,
                                'tiempo' => Helpers::timeId()
        ]);


        $gasto = EfectivoGastos::select(['tipo_pago','cantidad','efectivo_cuenta_bancos_id'])
                                        ->where('id', $id)
                                        ->first();
        if ($gasto->tipo_pago != 1) {
        // obtiene total para sumarlo a la cuenta y crear historial
        $efectivo = $this->updateDataOrigenDestino($gasto->efectivo_cuenta_bancos_id);
        $totalx = $efectivo[0]['saldo'] + $gasto->cantidad;
        $this->crearHistorialUnico($gasto->efectivo_cuenta_bancos_id, $efectivo[0]['saldo'], $totalx, $gasto->cantidad, "Gasto Eliminado"); // registra la remesa en el historial
        $this->updateCta($gasto->efectivo_cuenta_bancos_id, $totalx); /// actualiza el saldo en orige y destino
        }

        $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Gasto Eliminado correctamente']);
            
        $this->getGastos();
        $this->totalGastos();
    }



    public function getCuentas(){
        
        $this->bancos = EfectivoCuentaBancos::where('edo', 1)
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
    }



    public function btnGasto(){
        
        $this->validate();

        EfectivoGastos::create([
            'tipo' => $this->tipo,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'cantidad' => $this->cantidad,
            'fechaT' => Helpers::timeId(),
            'cajero' => session('config_usuario_id'),
            'edo' => 1,
            'tipo_comprobante' => $this->tipocomprobante,
            'no_comprobante' => $this->comprobante,
            'tipo_pago' => $this->tipo_pago,
            'efectivo_cuenta_bancos_id' => $this->idbanco,
            'efectivo_gastos_categorias_id' => $this->cat_gasto,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);


        if ($this->tipo_pago != 1) {
        // obtiene total para sumarlo a la cuenta y crear historial
        $efectivo = $this->updateDataOrigenDestino($this->idbanco);
        $totalx = $efectivo[0]['saldo'] - $this->cantidad;
        $this->crearHistorialUnico($this->idbanco, $efectivo[0]['saldo'], $totalx, $this->cantidad, "Gasto: " . $this->nombre); // registra la remesa en el historial
        $this->updateCta($this->idbanco, $totalx); /// actualiza el saldo en orige y destino    
        }

        $this->reset();
        $this->emit('creado'); // manda el mensaje de creado
        $this->getGastos();
        $this->getCuentas();
        $this->getCategorias();
        $this->totalGastos();

    }


    public function totalGastos(){
        $this->todosgastos = EfectivoGastos::where('cajero', session('config_usuario_id'))
                                            ->whereBetween('tiempo', [$this->inicioCorte(session('config_usuario_id')), Helpers::timeId()])
                                            ->where('edo', 1)
                                            ->orderBy('tiempo', 'desc')
                                            ->sum('cantidad');

        $this->gastosefec = $this->gastosEfectivo($this->inicioCorte(session('config_usuario_id')), Helpers::timeId(), session('config_usuario_id'));
    }









}
