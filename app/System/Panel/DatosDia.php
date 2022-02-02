<?php
namespace App\System\Panel;

use App\Models\EfectivoGastos;
use App\Models\EfectivoRemesas;
use App\Models\TicketNum;
use App\Models\TicketOrden;
use App\Models\TicketProducto;
use App\Models\User;

trait DatosDia{







    /* ordenes */
    public function ordenes($fecha){
        $ordenes = TicketOrden::where('edo', 2)
                                ->whereDate('created_at', $fecha)
                                ->count();
        return $ordenes;
    }

    /* productos */
    public function productos($fecha){
        $productos = TicketProducto::where('edo', 1)
                                ->whereDate('created_at', $fecha)
                                ->sum('cantidad');
        return $productos;
    }

    /* clientes */
    public function clientes($fecha){
        $clientes = TicketNum::where('edo', 1)
                                ->whereDate('created_at', $fecha)
                                ->count();
        return $clientes;
    }

    /* efectivo final -  Efectivo ingresado o que tiene el cajero */

    
    /* total efectivo  solo de venta en efectivo*/
    public function totalEfectivo($fecha){
        $total = TicketNum::where('edo', 1)
                                ->where('tipo_pago', 1)
                                ->whereDate('created_at', $fecha)
                                ->sum('total');
        return $total;
    }




    /* total tarjeta  solo venta tarjeta*/
    public function totalTarjeta($fecha){
        $total = TicketNum::where('edo', 1)
                                ->where('tipo_pago', 2)
                                ->whereDate('created_at', $fecha)
                                ->sum('total');
        return $total;
    }
    /* total btc solo venta btc */
    public function totalBtc($fecha){
        $total = TicketNum::where('edo', 1)
                                ->where('tipo_pago', 3)
                                ->whereDate('created_at', $fecha)
                                ->sum('total');
        return $total;
    }
    /* total venta */
    public function totalVenta($fecha){
        $total = TicketNum::where('edo', 1)
                                ->whereDate('created_at', $fecha)
                                ->sum('total');
        return $total;
    }
    /* propina efectivo */
    public function propinaEfectivo($fecha){
        $total = TicketNum::where('edo', 1)
                                ->where('tipo_pago', 1)
                                ->whereDate('created_at', $fecha)
                                ->sum('propina_cant');
        return $total;
    }
    /* propina no efectivo */
    public function propinaNoEfectivo($fecha){
        $total = TicketNum::where('edo', 1)
                                ->where('tipo_pago','!=', 1)
                                ->whereDate('created_at', $fecha)
                                ->sum('propina_cant');
        return $total;
    }
    /* gastos en efectivo */
    public function gastosEfectivo($fecha){
        $totalgastos = EfectivoGastos::whereDate('created_at', $fecha)
                        ->where('tipo_pago', 1)
                        ->where('edo', 1)
                        ->orderBy('tiempo', 'desc')
                        ->sum('cantidad');

        return $totalgastos;
    }
    /* remesas de caja a cuenta */
    public function remesas($fecha){
        $totalremesa = EfectivoRemesas::whereDate('created_at', $fecha)
                        ->where('edo', 1)
                        ->orderBy('tiempo', 'desc')
                        ->sum('cantidad');

        return $totalremesa;
    }  
    /* abonos */
    public function abonos($ifecha){
        return 0;
    }


    /// obtiene los datos de la mesa del dia
    
    public function obtenerDatosOrdenesDiarios($fecha, $cantidad){

        return TicketOrden::addSelect(['usuario' => User::select('name')
                        ->whereColumn('ticket_ordens.empleado', 'users.id')])

                        // Se quitan por que no puedo sumar mas de dos facturas
                        // ->addSelect(['total_propina' => TicketNum::select('propina_cant')
                        // ->whereColumn('ticket_ordens.id', 'ticket_nums.orden')])

                        // ->addSelect(['total_factura' => TicketNum::select('total')
                        // ->whereColumn('ticket_ordens.id', 'ticket_nums.orden')])
                        
                        ->whereDay('created_at', $fecha)
                        ->orderBy('tiempo', 'desc')
                        ->paginate($cantidad);

    }
    





}