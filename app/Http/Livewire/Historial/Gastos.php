<?php

namespace App\Http\Livewire\Historial;

use App\Models\EfectivoGastos;
use Carbon\Carbon;
use Livewire\Component;


class Gastos extends Component
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
        return view('livewire.historial.gastos');
    }


    public function aplicarFechas(){
        $this->formatFechas();

        if ($this->tipo_fecha == 1) {

            $this->datos = EfectivoGastos::whereDay('created_at', $this->fecha1)
                                            ->with('banco')
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
            
        } else {
            $this->datos = EfectivoGastos::whereBetween('created_at', [$this->fecha1, $this->fecha2])
                                            ->with('banco')
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
