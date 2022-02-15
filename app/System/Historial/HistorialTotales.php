<?php
namespace App\System\Historial;

use App\Models\CorteDeCaja;
use App\Models\EfectivoCuentaBancos;
use App\Models\EfectivoGastos;
use App\Models\SyncLastUpdate;
use App\Models\TicketNum;
use App\Models\TicketOrden;




trait HistorialTotales {




    public function historialTotalUnica($fecha){
        return TicketNum::where('edo', 1)
                                ->whereDate('created_at', $fecha)
                                ->sum('total');
    }


    public function historialTotalMultiple($fecha1, $fecha2){
        return TicketNum::where('edo', 1)
                                ->whereBetween('created_at', [$fecha1, $fecha2])
                                ->sum('total');
    }


    public function historialGastosUnica($fecha){
        return EfectivoGastos::where('edo', 1)
                                // ->where('tipo_pago', 1)
                                ->whereDate('created_at', $fecha)
                                ->sum('cantidad');
    }


    public function historialGastosMultiple($fecha1, $fecha2){
        return EfectivoGastos::where('edo', 1)
                                // ->where('tipo_pago', 1)
                                ->whereBetween('created_at', [$fecha1, $fecha2])
                                ->sum('cantidad');
    }


    public function saldosCuentas(){
        return EfectivoCuentaBancos::select('cuenta', 'saldo')->where('edo', 1)->get();
    }



    public function ordenesUnica($fecha){
        return TicketOrden::where('edo', 2)
                            ->whereDate('created_at', $fecha)
                            ->count();
    }


    public function ordenesMultiple($fecha1, $fecha2){
        return TicketOrden::where('edo', 2)
                            ->whereBetween('created_at', [$fecha1, $fecha2])
                            ->count();
    }


    public function cortesAbiertos(){
        return CorteDeCaja::where('edo', 1)
                           ->count();
    }

    public function LastUpdate(){
        $fecha = SyncLastUpdate::orderBy('id', 'ASC')->first();
        if ($fecha) {
            return $fecha->last_update;
        } else {
            return '0000-00-00 00:00:00';
        }
    }







/**
 * Obtener los porcentajes de facturado y no facturado
 */
    public function PorcentajeUnico($fecha1){ // porcentaje de facturado o no facturado
    
        $totalFacturado = TicketNum::whereDate('created_at', $fecha1)
                                    ->where('edo', 1)
                                    ->where('tipo_venta', 2)
                                    ->sum('total');

        $totalNoFacturado = TicketNum::whereDate('created_at', $fecha1)
                                    ->where('edo', 1)
                                    ->where('tipo_venta','!=', 2)
                                    ->sum('total');
                                
        $totalVenta = $totalFacturado + $totalNoFacturado;
        @$pFacturado = number_format(($totalFacturado * 100) / $totalVenta,0,'.',',');
        @$pNoFacturado = number_format(($totalNoFacturado * 100) / $totalVenta,0,'.',',');
        
        $data = collect(['facturado' => $pFacturado, 'nofacturado' => $pNoFacturado]);
        return  $data;
    
    }

    public function PorcentajeMultiple($fecha1, $fecha2){ // porcentaje de facturado o no facturado
    
        $totalFacturado = TicketNum::whereBetween('created_at', [$fecha1, $fecha2])
                                    ->where('edo', 1)
                                    ->where('tipo_venta', 2)
                                    ->sum('total');

        $totalNoFacturado = TicketNum::whereBetween('created_at', [$fecha1, $fecha2])
                                    ->where('edo', 1)
                                    ->where('tipo_venta','!=', 2)
                                    ->sum('total');
                                
        $totalVenta = $totalFacturado + $totalNoFacturado;
        @$pFacturado = number_format(($totalFacturado * 100) / $totalVenta,0,'.',',');
        @$pNoFacturado = number_format(($totalNoFacturado * 100) / $totalVenta,0,'.',',');
        
        $data = collect(['facturado' => $pFacturado, 'nofacturado' => $pNoFacturado]);
        return  $data;
    }




    

}