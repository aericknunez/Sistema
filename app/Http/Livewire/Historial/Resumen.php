<?php

namespace App\Http\Livewire\Historial;

use App\System\Historial\HistorialTotales;
use Livewire\Component;
use Carbon\Carbon;


class Resumen extends Component
{

    use HistorialTotales;

    public $tipo_fecha;
    public $fecha1, $fecha2;
    public $fecha1f, $fecha2f;
    public $ventas = [];
    public $gastos = [];
    public $cuentas = [];

    public $porcentaje = []; //porcentaje de facturado y no facturado
    public $noOrdenes;
    public $promedioPollo = 0;
    public $cortesAbiertos;
    public $lastUpdate;


    public function mount(){
        $this->tipo_fecha = 1;
        $this->aplicarFechas();
    }




    public function render()
    {
        return view('livewire.historial.resumen');
    }



    public function aplicarFechas(){
        $this->formatFechas();

        if ($this->tipo_fecha == 1) {
            $this->ventas = $this->historialTotalUnica($this->fecha1);     
            $this->gastos = $this->historialGastosUnica($this->fecha1);     
            $this->cuentas = $this->saldosCuentas();
            $this->cortesAbiertos = $this->cortesAbiertos();            
            $this->lastUpdate = $this->LastUpdate();
            $this->porcentaje = $this->PorcentajeUnico($this->fecha1);
            $this->noOrdenes = $this->ordenesUnica($this->fecha1);
        } else {
            $this->ventas = $this->historialTotalMultiple($this->fecha1, $this->fecha2);
            $this->gastos = $this->historialGastosMultiple($this->fecha1, $this->fecha2);
            $this->cuentas = $this->saldosCuentas();
            $this->cortesAbiertos = $this->cortesAbiertos();            
            $this->lastUpdate = $this->LastUpdate();
            $this->porcentaje = $this->PorcentajeMultiple($this->fecha1, $this->fecha2);
            $this->noOrdenes = $this->ordenesMultiple($this->fecha1, $this->fecha2);
        }
        // $this->emit('graficar');

        $this->dispatchBrowserEvent('graficar', ['facturado' => $this->porcentaje['facturado'], 'nofacturado' => $this->porcentaje['nofacturado']]);


        $this->reset(['fecha1f', 'fecha2f']);
    }


    public function formatFechas(){
        if ($this->tipo_fecha == 1) {
            if(!$this->fecha1f){ $this->fecha1 = date('Y-m-d'); 
            } else {
                $this->fecha1 =  $this->fecha1f;
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
