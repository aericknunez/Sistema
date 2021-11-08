<?php

namespace App\Http\Livewire\Historial;

use App\Models\TicketProducto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Ventas extends Component
{

    public $tipo_fecha;
    public $fecha1, $fecha2;
    public $productos = [];
    public $datos = [];



    public function mount(){
        $this->tipo_fecha = 1;
        $this->aplicarFechas();
    }




    public function render()
    {
        return view('livewire.historial.ventas');
    }


    
    public function aplicarFechas(){
        $this->formatFechas();

        if ($this->tipo_fecha == 1) {

            $this->productos = TicketProducto::select('cod', 'producto','pv','total', 'num_fact', 'orden', 'tipo_venta', DB::raw('sum(total) as totales, cod'), DB::raw('sum(descuento) as descuentos, cod'), DB::raw('count(*) as cantidad, cod'))
                                              ->where('edo', 1)
                                              ->whereDay('created_at', $this->fecha1)
                                              ->groupBy('cod')
                                              ->get();
        } else {
            $this->productos = TicketProducto::select('cod', 'producto','pv','total', 'num_fact', 'orden', 'tipo_venta', DB::raw('sum(total) as totales, cod'), DB::raw('sum(descuento) as descuentos, cod'), DB::raw('count(*) as cantidad, cod'))
                                              ->where('edo', 1)
                                              ->whereBetween('created_at', [$this->fecha1, $this->fecha2])
                                              ->groupBy('cod')
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
