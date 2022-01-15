<?php

namespace App\Http\Livewire\Historial;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\User;
use App\System\Historial\Historial;

class Meseros extends Component
{

    use Historial;

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

            $this->datos = $this->meserosUnica($this->fecha1, $this->usuario);
        } else {

            $this->datos = $this->meserosMultiple($this->fecha1, $this->fecha2, $this->usuario);
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
            $this->usuarios = User::select(['id', 'name'])
                                    ->whereNotIn('id',[1, 2])
                                    ->where('tipo_usuario', '!=', '7')
                                    ->OrWhere('tipo_usuario', NULL)->get();
    }



}
