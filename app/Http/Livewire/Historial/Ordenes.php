<?php

namespace App\Http\Livewire\Historial;

use App\Models\TicketNum;
use App\Models\TicketOrden;
use App\Models\TicketProducto;
use App\Models\User;
use App\System\Historial\Historial;
use Livewire\Component;
use Carbon\Carbon;

class Ordenes extends Component
{
    use Historial;

    public $tipo_fecha;
    public $fecha1, $fecha2;
    public $datos = [];

    public $detalles; // detalles de la orden


    public function updated(){
        $this->reset(['detalles']);
    }


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

            $this->datos = $this->ordenesUnica($this->fecha1);
        } else {
            $this->datos = $this->ordenesMultiple($this->fecha1, $this->fecha2);
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




    public function getDetalles($iden){ // se obtienen los detalles de cada orden para mostrarla en el modal
        $this->detalles = [];
        $this->detalles['orden'] = TicketOrden::addSelect(['usuario' => User::select('name')
                                                ->whereColumn('ticket_ordens.empleado', 'users.id')])
                                                ->find($iden);
        $this->detalles['productos'] = TicketProducto::where('orden', $this->detalles['orden']['id'])
                                        ->where('edo', 1)
                                        ->orderBy('num_fact')
                                        ->with('subOpcion')->get();
                                        
        $this->detalles['facturas'] = TicketNum::where('orden', $iden)->get();
    }



}
