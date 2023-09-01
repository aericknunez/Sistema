<?php

namespace App\Http\Livewire\Historial;

use App\System\Corte\Corte;
use App\System\Imprimir\ImprimirCortes;
use App\System\Historial\Historial;
use Carbon\Carbon;
use Livewire\Component;

class Cortes extends Component
{
    use Historial, ImprimirCortes, Corte;

    public $fecha1, $fecha2;
    public $fecha1f, $fecha2f;
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
        $this->reset(['fecha1f', 'fecha2f']);
        
    }


    public function formatFechas(){

        if(!$this->fecha1f){ $this->fecha1 = date('Y-m-01 00:00:00'); } else {
            $this->fecha1 = $this->fecha1f . ' 00:00:00';
        }
        if(!$this->fecha2f){ $this->fecha2 = Carbon::now()->endOfMonth()->toDateTimeString();  } else {
            $this->fecha2 = $this->fecha2f . ' 23:59:59';
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
