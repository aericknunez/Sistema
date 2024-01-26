<?php

namespace App\Http\Livewire\Corte;

use App\Common\Helpers;
use App\Models\CorteDeCaja;
use App\Models\EntradasSalidas;
use App\Models\User;
use Livewire\Component;
use App\System\Corte\Corte;
use App\System\Corte\InicializaCorte;
use App\System\Eventos\SendEventos;
use App\System\Imprimir\ImprimirCortes;

class Index extends Component
{

    use Corte, InicializaCorte, ImprimirCortes, SendEventos;

    public $cantidad;
    public $cajero;
    public $sicorte;
    public $datos = [];
    public $primerCorte;

    public $random; // numero para eliminar corte

    public $existenMovimientos; // Comprueba si tiene movimientos de efectivo entradas o salidas


    protected $rules = [
        'cantidad' => 'required'
    ];

    public function mount(){
        $this->verificarPrimerCorte();
        $this->cajero = session('config_usuario_id');
        $this->verCorte();
    }

    public function render()
    {
        return view('livewire.corte.index');
    }

    public function btnCorte(){

        $this->validate();
        $this->realizaCorte($this->cajero, $this->cantidad);

        $this->obtenerDatosCorte();
        $this->verCorte();
        $this->emit('creado'); // manda el mensaje de creado
        $this->eventPantallaSend(); // envia el evento a la pantalla
        $this->borrarComandasPantalla();
        $this->reset(['existenMovimientos']);
    }

    public function verCorte(){ // verifica si se realizo corte
        
        if ($this->getAperturaCaja()) { // hay apertura sin cerrar
            $this->sicorte = TRUE;
            $this->movimientosEfectivo();
        } else { //sin apertura por cerrrar
            $this->sicorte = FALSE;
            $this->obtenerDatosCorte();
        }
    }


    public function verificarPrimerCorte(){
        if (CorteDeCaja::first()) {
            $this->primerCorte = true;
        } else {
            $this->primerCorte = false;
        }
    }


    public function obtenerDatosCorte(){
        if ($this->primerCorte == true) {
            $this->datos = CorteDeCaja::where('usuario_corte', $this->cajero)
                                        ->where('edo', 2)
                                        ->orderBy('id', 'desc')
                                        ->first();
                    
            $usr = User::select('name')->where('id', $this->datos->usuario_corte)
                                       ->first();
            $this->datos->cajero = $usr->name;
        }
    }


    public function deleteCorte(){
        
        $this->validate(['random' => 'required|min:4|max:4']);

        if ($this->random == Helpers::CodigoValidacionHora()) {

            CorteDeCaja::where('id', $this->datos['id'])
                            ->update(['edo' => 0,
                                    'tiempo' => Helpers::timeId()
                            ]);
            
            CorteDeCaja::create([
                'aperturaT' => $this->datos['aperturaT'],
                'apertura' => $this->datos['apertura'],
                'efectivo_inicial' => $this->datos['efectivo_inicial'],
                'numero_caja' => $this->datos['numero_caja'],
                'edo' => 1,
                'usuario' => session('config_usuario_id'), //usuario
                'clave' => Helpers::hashId(),
                'tiempo' => Helpers::timeId(),
                'td' => session('sistema.td')
            ]);
    
            $this->updateCaja($this->datos['numero_caja'], TRUE);
            session(['apertura_caja' => $this->datos['numero_caja']]);

            $this->verCorte();


            $this->emit('eliminado'); // manda el mensaje de eliminado
        } else {
            $this->emit('error1'); // manda el mensaje de error de eliminado
        }

    }




    public function imprimirCorte(){

        $this->ImprimirCortePrimario($this->datos);
        $this->emit('imprimiendo'); // manda el mensaje de error de eliminado

    }

    public function movimientosEfectivo(){
        $this->existenMovimientos = EntradasSalidas::where('cajero', session('config_usuario_id'))
                                    ->whereBetween('tiempo', [$this->inicioCorte(session('config_usuario_id')), Helpers::timeId()])
                                    ->where('edo', 1)
                                    ->where('tipo_pago', 1)
                                    ->count();
    }



}
