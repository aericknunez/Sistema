<?php

namespace App\Http\Livewire\Historial;

use App\Models\CorteDeCaja;
use App\Models\EfectivoGastos;
use App\Models\NumeroCajas;
use App\Models\User;
use App\System\Historial\HistorialTotales;
use App\System\Inventario\ContarProductoVendido;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\TicketProductosSave;


class Resumen extends Component
{

    use HistorialTotales;
    use ContarProductoVendido;

    public $tipo_fecha;
    public $fecha1, $fecha2;
    public $fecha1f, $fecha2f;
    public $ventas = null;
    public $gastos = [];
    public $cuentas = [];

    public $porcentaje = [];

    public $noOrdenes;
    public $promedioPollo = 0;
    public $cantidadPollos = 0;
    public $totalPollos = 0;
    public $cortesAbiertos;
    public $lastUpdate;

    public $detalleGastos = [];
    public $totalEnCajas = [];


    public function mount(){
        $this->tipo_fecha = 1;
        $this->getAllData();
        $this->getTotalEfectivoCajas();
        $this->PromedioDePollo();
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

    public function getTotalEfectivoCajas(){
        $cajas = NumeroCajas::where('edo', 0)->get();
        $cantidad = 0;
        foreach ($cajas as $caja) {
            $cant = CorteDeCaja::select('efectivo_final')->where('numero_caja', $caja->id)->where('edo', 2)->first();
            $cantidad = $cantidad + $cant->efectivo_final;
        }
        $this->totalEnCajas = $cantidad;
    }

    public function PromedioDePollo($producto = 1){
        $this->cantidadPollos = $this->CantidadDeProducto($producto);
        if ($this->cantidadPollos != 0) {
            $this->promedioPollo = $this->ventas / $this->cantidadPollos;
        } else {
            $this->promedioPollo = 0;
        }
    }

    public function cantidadPollos(){
        $fecha = date('Y-m-d');
        $piezas = TicketProductosSave::whereDate('created_at', $fecha)
            ->whereIn('cod', [1002, 1003, 1004, 1009, 1010, 1056, 1012])
            ->sum('cantidad');

        $piezasCombo2 = (TicketProductosSave:: where('cod', 1011)
                    ->whereDate('created_at', $fecha)
                    ->sum('cantidad')) * 2;
        
        $piezasCombo4 = (TicketProductosSave:: where('cod', 1013)
                    ->whereDate('created_at', $fecha)
                    ->sum('cantidad')) * 3;

        $piezasCombo5 = (TicketProductosSave:: where('cod', 1014)
                    ->whereDate('created_at', $fecha)
                    ->sum('cantidad')) * 4;

        $piezasCombo6 = (TicketProductosSave:: where('cod', 1015)
                    ->whereDate('created_at', $fecha)
                    ->sum('cantidad')) * 8;

        $totalPiezas = $piezas + $piezasCombo2 + $piezasCombo4 + $piezasCombo5 + $piezasCombo6;

        $medioPollo = TicketProductosSave:: where('cod', 1001)
                    ->whereDate('created_at', $fecha)
                    ->sum('cantidad');
        
        $polloEntero = TicketProductosSave:: where('cod', 1060)
                    ->whereDate('created_at', $fecha)
                    ->sum('cantidad'); 
                    
        $sumaPollos = ($totalPiezas / 8) + ($medioPollo / 2) + $polloEntero;

        $this->totalPollos = $sumaPollos;

    }


    
}
