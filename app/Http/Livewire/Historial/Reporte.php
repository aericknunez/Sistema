<?php

namespace App\Http\Livewire\Historial;

use App\Models\TicketProducto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Reporte extends Component
{

    public $fecha1;
    public $productos = [];
    public $datos = [];



    public function mount(){
        $this->aplicarFechas();
    }



    public function render()
    {
        return view('livewire.historial.reporte');
    }



    public function aplicarFechas(){
        $this->formatFechas();

            $this->productos = TicketProducto::select('cod', 'producto','pv','total', 'num_fact', 'orden', 'tipo_venta', DB::raw('sum(total) as totales, cod'), DB::raw('sum(descuento) as descuentos, cod'), DB::raw('count(*) as cantidad, cod'))
                                              ->where('edo', 1)
                                              ->whereDay('created_at', $this->fecha1)
                                              ->groupBy('cod')
                                              ->get();
    }


    public function formatFechas(){

            if(!$this->fecha1){ $this->fecha1 = date('d-m-Y'); 
            } else {
                $this->fecha1 = formatJustFecha($this->fecha1);
            }
        
    }



}
