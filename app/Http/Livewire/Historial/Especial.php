<?php

namespace App\Http\Livewire\Historial;
use App\System\Historial\Historial;
use Carbon\Carbon;
use Livewire\Component;

class Especial extends Component
{
   
    use Historial;

    public $tipo_fecha;
    public $fecha1, $fecha2;
    public $fecha1f, $fecha2f;
    public $productos = [];
    public $datos = [];



    public function mount(){
        $this->tipo_fecha = 1;
        $this->aplicarFechas();
    }




    public function render()
    {
        return view('livewire.historial.especial');
    }


    
    public function aplicarFechas(){
        $this->formatFechas();

        if ($this->tipo_fecha == 1) {
            $this->productos = $this->especialUnica($this->fecha1);
        } else {
            $this->productos = $this->especialMultiple($this->fecha1, $this->fecha2);
        }
        $this->reset(['fecha1f', 'fecha2f']);

    }



    public function formatFechas(){
        if ($this->tipo_fecha == 1) {
            if(!$this->fecha1f){ $this->fecha1 = date('Y-m-d'); 
            } else {
                $this->fecha1 = $this->fecha1f;
            }
        } else {
            if(!$this->fecha1f){ $this->fecha1 = date('Y-m-01 00:00:00'); } else {
                $this->fecha1 = $this->fecha1f . ' 00:00:00';
            }
            if(!$this->fecha2f){ $this->fecha2 = Carbon::now()->endOfMonth()->toDateTimeString();  } else {
                $this->fecha2 = $this->fecha2f . ' 23:59:59';
            }         
        }
    }

}
