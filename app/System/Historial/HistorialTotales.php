<?php
namespace App\System\Historial;

use App\Models\CorteDeCaja;
use App\Models\EfectivoCuentaBancos;
use App\Models\EfectivoGastos;
use App\Models\EfectivoRemesas;
use App\Models\TicketOrden;
use App\Models\TicketProducto;
use App\Models\User;
use Illuminate\Support\Facades\DB;




trait HistorialTotales {




    public function historialTotalUnica($fecha){
        return TicketProducto::where('edo', 1)
                                ->whereDay('created_at', $fecha)
                                ->sum('cantidad');
    }


    public function historialTotalMultiple($fecha1, $fecha2){
        return TicketProducto::where('edo', 1)
                                ->whereBetween('created_at', [$fecha1, $fecha2])
                                ->sum('cantidad');
    }


    public function historialGastosUnica($fecha){
        return EfectivoGastos::where('edo', 1)
                                ->where('tipo_pago', 1)
                                ->whereDay('created_at', $fecha)
                                ->sum('cantidad');
    }


    public function historialGastosMultiple($fecha1, $fecha2){
        return EfectivoGastos::where('edo', 1)
                                ->where('tipo_pago', 1)
                                ->whereBetween('created_at', [$fecha1, $fecha2])
                                ->sum('cantidad');
    }


    public function saldosCuentas(){
        return EfectivoCuentaBancos::select('cuenta', 'saldo')->where('edo', 1)->get();
    }









    

}