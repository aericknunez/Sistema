<?php

namespace App\Http\Livewire\Efectivo;

use App\Common\Helpers;
use App\Models\EfectivoCuentaBancos;
use App\Models\EntradasSalidas;
use App\System\Corte\Corte;
use App\System\Efectivo\EfectivoCuentas;
use Livewire\Component;

class Ingreso extends Component
{


    use Corte, EfectivoCuentas;

    public $datos = [];
    public $bancos = [];
    public $descripcion, $cantidad, $tipo_movimiento, $tipo_pago, $idbanco;

    public $totalEntradas, $totalSalidas;


    
    protected $listeners = ['EliminarEntrada' => 'destroy']; // escucah el evento Eliminar

    protected $rules = [
        'descripcion' => 'required',
        'cantidad' => 'required'
    ];


    public function mount(){
        $this->getCuentas();
        $this->tipo_pago = 1;
        $this->tipo_movimiento = 1;
        $this->getEntradas();
        $this->totalMovimientos();
    }



    public function updated(){ // se ejecuta al cambiar el model 
        if ($this->tipo_pago != 1) {
            $this->idbanco =1;
        } else {
            $this->idbanco = NULL;
        }
    }


    public function render()
    {
        return view('livewire.efectivo.ingreso');
    }


    public function btnEntrada(){

        $this->validate();

        EntradasSalidas::create([
            'tipo_movimiento' => $this->tipo_movimiento,
            'descripcion' => $this->descripcion,
            'cantidad' => $this->cantidad,
            'fechaT' => Helpers::timeId(),
            'cajero' => session('config_usuario_id'),
            'edo' => 1,
            'tipo_pago' => $this->tipo_pago,
            'efectivo_cuenta_bancos_id' => $this->idbanco,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);


        if ($this->tipo_pago != 1 and $this->idbanco != NULL) {
        // obtiene total para sumarlo a la cuenta y crear historial
        $efectivo = $this->updateDataOrigenDestino($this->idbanco);

        if ($this->tipo_movimiento == 1) { // ingreso de efectivo
            $totalx = $efectivo[0]['saldo'] + $this->cantidad;
        } else { // retiro de efectivo
            $totalx = $efectivo[0]['saldo'] - $this->cantidad;
        }

        $this->crearHistorialUnico($this->idbanco, $efectivo[0]['saldo'], $totalx, $this->cantidad, "Ingreso de efectivo"); // registra la remesa en el historial
        $this->updateCta($this->idbanco, $totalx); /// actualiza el saldo en orige y destino    
        }

        $this->reset();
        $this->emit('creado'); // manda el mensaje de creado
        $this->tipo_pago = 1;
        $this->tipo_movimiento = 1;
        $this->getEntradas();
        $this->getCuentas();
        $this->totalMovimientos();

    }


    public function getEntradas(){
        $this->datos = EntradasSalidas::where('cajero', session('config_usuario_id'))
                        ->whereBetween('tiempo', [$this->inicioCorte(session('config_usuario_id')), Helpers::timeId()])
                        ->with('banco')
                        ->orderBy('tiempo', 'desc')
                        ->get();
    }


    public function destroy($id){

        EntradasSalidas::where('id', $id)
                    ->update(['edo' => 2,
                            'tiempo' => Helpers::timeId()
        ]);


            $movimiento = EntradasSalidas::select(['tipo_movimiento','tipo_pago','cantidad','efectivo_cuenta_bancos_id'])
                                    ->where('id', $id)
                                    ->first();
            if ($movimiento->tipo_pago != 1 and $movimiento->efectivo_cuenta_bancos_id != NULL) {
            // obtiene total para sumarlo a la cuenta y crear historial
            $efectivo = $this->updateDataOrigenDestino($movimiento->efectivo_cuenta_bancos_id);

            if ($movimiento->tipo_movimiento == 1) { // ingreso de efectivo
                $totalx = $efectivo[0]['saldo'] - $movimiento->cantidad;
            } else { // retiro de efectivo
                $totalx = $efectivo[0]['saldo'] + $movimiento->cantidad;
            }

            $this->crearHistorialUnico($movimiento->efectivo_cuenta_bancos_id, $efectivo[0]['saldo'], $totalx, $movimiento->cantidad, "Movimiento de Efectivo Eliminado"); // registra la remesa en el historial
            $this->updateCta($movimiento->efectivo_cuenta_bancos_id, $totalx); /// actualiza el saldo en orige y destino
            }

            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Movimiento Eliminado correctamente']);

            $this->reset();
            $this->tipo_pago = 1;
            $this->tipo_movimiento = 1;
            $this->getEntradas();
            $this->getCuentas();
            $this->totalMovimientos();

    }


    
    public function getCuentas(){
        
        $this->bancos = EfectivoCuentaBancos::where('edo', 1)
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
    }


    public function totalMovimientos(){
        $this->totalEntradas = EntradasSalidas::where('cajero', session('config_usuario_id'))
                                            ->whereBetween('tiempo', [$this->inicioCorte(session('config_usuario_id')), Helpers::timeId()])
                                            ->where('edo', 1)
                                            ->where('tipo_movimiento', 1)
                                            ->orderBy('tiempo', 'desc')
                                            ->sum('cantidad');

        $this->totalSalidas = EntradasSalidas::where('cajero', session('config_usuario_id'))
                                            ->whereBetween('tiempo', [$this->inicioCorte(session('config_usuario_id')), Helpers::timeId()])
                                            ->where('edo', 1)
                                            ->where('tipo_movimiento', 2)
                                            ->orderBy('tiempo', 'desc')
                                            ->sum('cantidad');
    }



}
