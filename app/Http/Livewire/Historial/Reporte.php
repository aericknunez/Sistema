<?php

namespace App\Http\Livewire\Historial;

use App\System\Historial\Historial;
use Livewire\Component;

class Reporte extends Component
{
    use Historial;

    public $fecha1;
    public $productos = [];
    public $cortes = [];
    public $gastos = [];
    public $ordenes = [];



    public function mount(){
        $this->aplicarFechas();
    }



    public function render()
    {
        return view('livewire.historial.reporte');
    }



    public function aplicarFechas(){
            $this->formatFechas();

            $this->productos = $this->ventasUnica($this->fecha1);
            $this->cortes = $this->cortesRango($this->fecha1, $this->fecha1);
            $this->gastos = $this->gastosUnica($this->fecha1);
            $this->ordenes = $this->ordenesUnica($this->fecha1);
    }


    public function formatFechas(){

            if(!$this->fecha1){ $this->fecha1 = date('d-m-Y'); 
            } else {
                $this->fecha1 = formatJustFecha($this->fecha1);
            }
        
    }



}
