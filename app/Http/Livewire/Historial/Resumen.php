<?php

namespace App\Http\Livewire\Historial;

use App\Models\EfectivoGastos;
use App\Models\User;
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

    public $porcentaje = [];

    public $noOrdenes;
    public $promedioPollo = 0;
    public $cortesAbiertos;
    public $lastUpdate;

    public $detalleGastos = [];


    public function mount(){
        $this->tipo_fecha = 1;
        $this->getAllData();
    }




    public function render()
    {
        return view('livewire.historial.resumen');
    }



    public function getAllData(){
        $this->formatFechas();

        if ($this->tipo_fecha == 1) {
            $this->ventas = $this->historialTotalUnica($this->fecha1);     
            $this->gastos = $this->historialGastosUnica($this->fecha1);     
            $this->porcentaje = $this->PorcentajeUnico($this->fecha1);
            $this->noOrdenes = $this->ordenesUnica($this->fecha1);
        } else {
            $this->ventas = $this->historialTotalMultiple($this->fecha1, $this->fecha2);
            $this->gastos = $this->historialGastosMultiple($this->fecha1, $this->fecha2);
            $this->porcentaje = $this->PorcentajeMultiple($this->fecha1, $this->fecha2);
            $this->noOrdenes = $this->ordenesMultiple($this->fecha1, $this->fecha2);
        }
        $this->lastUpdate = $this->LastUpdate();
        $this->cortesAbiertos = $this->cortesAbiertos();            
        $this->cuentas = $this->saldosCuentas();
        $this->getDetalleGastos($this->fecha1, $this->fecha2);
        
        // $this->emision($this->porcentaje['facturado'], $this->porcentaje['nofacturado']);
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


    public function getDetalleGastos($fecha1, $fecha2){
        if ($this->tipo_fecha == 1) {
            $this->detalleGastos = EfectivoGastos::addSelect(['usuario' => User::select('name')
                                    ->whereColumn('cajero', 'users.id')])
                                    ->whereDate('created_at', $fecha1)
                                    ->with('banco')
                                    ->orderBy('tiempo', 'desc')
                                    ->get();
        } else {
            $this->detalleGastos = EfectivoGastos::addSelect(['usuario' => User::select('name')
                                    ->whereColumn('cajero', 'users.id')])
                                    ->whereBetween('created_at', [$fecha1, $fecha2])
                                    ->with('banco')
                                    ->orderBy('tiempo', 'desc')
                                    ->get();
        }
    }


    
}
