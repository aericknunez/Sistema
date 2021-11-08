<?php

namespace App\Http\Livewire\Historial;

use App\Models\TicketOrden;
use Livewire\Component;
use Carbon\Carbon;

class Ordenes extends Component
{

    public $tipo_fecha;
    public $fecha1, $fecha2;
    public $datos = [];


    public function mount(){
        $this->tipo_fecha = 1;
        $this->aplicarFechas();
    }


    public function render()
    {
        return view('livewire.historial.ordenes');
    }


    public function aplicarFechas(){
        $this->formatFechas();

        if ($this->tipo_fecha == 1) {

            $this->datos = TicketOrden::whereDay('created_at', $this->fecha1)
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
        } else {
            $this->datos = TicketOrden::whereBetween('created_at', [$this->fecha1, $this->fecha2])
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
        }
    }



    public function formatFechas(){
        if ($this->tipo_fecha == 1) {
            if(!$this->fecha1){ $this->fecha1 = date('d-m-Y'); 
            } else {
                $this->fecha1 = formatJustFecha($this->fecha1);
            }
        } else {
            if(!$this->fecha1){ $this->fecha1 = date('Y-m-01'); } else {
                $this->fecha1 = $this->fecha1;
            }
            if(!$this->fecha2){ $this->fecha2 = Carbon::now()->endOfMonth()->toDateTimeString();  } else {
                $this->fecha2 = $this->fecha2;
            }         
        }
    }






}
