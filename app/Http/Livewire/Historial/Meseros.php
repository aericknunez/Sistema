<?php

namespace App\Http\Livewire\Historial;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\TicketOrden;
use App\Models\User;

class Meseros extends Component
{

    public $tipo_fecha;
    public $fecha1, $fecha2;
    public $datos = [];
    public $usuarios = [];
    public $usuario;



    public function mount(){
        $this->tipo_fecha = 1;
        $this->usuario = 1;
        $this->formatFechas();
        $this->getUsuarios();
    }



    public function render()
    {
        $this->aplicarFechas();
        return view('livewire.historial.meseros');
    }


    public function aplicarFechas(){
        $this->formatFechas();

        if ($this->tipo_fecha == 1) {

            $this->datos = TicketOrden::addSelect(['usuario' => User::select('name')
                        ->whereColumn('empleado', 'users.id')])->whereDay('created_at', $this->fecha1)
                        ->orderBy('empleado', 'desc')
                        ->where('empleado', $this->usuario)
                        ->get();
        } else {

            $this->datos = TicketOrden::addSelect(['usuario' => User::select('name')
                        ->whereColumn('empleado', 'users.id')])->whereBetween('created_at', [$this->fecha1, $this->fecha2])
                        ->orderBy('empleado', 'desc')
                        ->where('empleado', $this->usuario)
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



    public function getUsuarios(){
            $this->usuarios = User::select(['id', 'name'])->get();
    }



}
