<?php
namespace App\System\Panel;

use App\Models\EfectivoGastos;
use App\Models\EfectivoRemesas;
use App\Models\TicketNum;
use App\Models\TicketOrden;
use App\Models\TicketProducto;
use App\Models\TicketProductosSave;
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
                        ->whereDate('created_at', $fecha)
                        ->orderBy('tiempo', 'desc')
                        ->paginate($cantidad);

    }

    public function cantidadPollos($fecha){

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
                    
        $totalPollos = ($totalPiezas / 8) + ($medioPollo / 2) + $polloEntero;

        return $totalPollos;

    }
    





}