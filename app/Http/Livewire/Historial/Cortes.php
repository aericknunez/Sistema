<?php

namespace App\Http\Livewire\Historial;

use App\Models\CorteDeCaja;
use Carbon\Carbon;
use Livewire\Component;

class Cortes extends Component
{

    public $fecha1, $fecha2;
    public $datos = [];



    public function mount(){
        $this->aplicarFechas();
    }





    public function render()
    {
        return view('livewire.historial.cortes');
    }


        
    public function aplicarFechas(){
        $this->formatFechas();

        $this->datos = CorteDeCaja::whereBetween('created_at', [$this->fecha1, $this->fecha2])
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
        

    }


    public function formatFechas(){

            if(!$this->fecha1){ $this->fecha1 = date('Y-m-01'); } else {
                $this->fecha1 = $this->fecha1;
            }
            if(!$this->fecha2){ $this->fecha2 = Carbon::now()->endOfMonth()->toDateTimeString();  } else {
                $this->fecha2 = $this->fecha2;
            }         
        
    }






}
