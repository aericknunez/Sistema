<?php

namespace App\Http\Livewire\Historial;

use App\System\Corte\Corte;
use App\System\Corte\ImprimirCortes;
use App\System\Historial\Historial;
use Carbon\Carbon;
use Livewire\Component;

class Cortes extends Component
{
    use Historial, ImprimirCortes, Corte;

    public $fecha1, $fecha2;
    public $datos = [];
    public $detalles = [];




    public function mount(){
        $this->aplicarFechas();
    }





    public function render()
    {
        return view('livewire.historial.cortes');
    }


        
    public function aplicarFechas(){
        $this->formatFechas();

        $this->datos = $this->cortesRango($this->fecha1, $this->fecha2);
        
    }


    public function formatFechas(){

            if(!$this->fecha1){ $this->fecha1 = date('Y-m-01'); } else {
                $this->fecha1 = $this->fecha1;
            }
            if(!$this->fecha2){ $this->fecha2 = Carbon::now()->endOfMonth()->toDateTimeString();  } else {
                $this->fecha2 = $this->fecha2;
            }         
        
    }




/* Obtener los datos de un corte especifico */
    public function obtenerDatosCorte($iden){
        $this->detalles = $this->getDatosCorte($iden);
    }

    public function imprimirCorte(){

        $this->ImprimirCortePrimario($this->detalles);
        $this->emit('imprimiendo'); // manda el mensaje de error de eliminado

    }

}
