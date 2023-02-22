<?php
namespace App\System\Facturacion;

use App\Models\TicketNum;
use App\Models\TicketProducto;
use Illuminate\Support\Facades\DB;

trait Facturacion {


    public $dias = [];
    public $month = [];

    
    public function diasDelMes($mes, $anio, $tipo){
        $this->dias = [];
        $dia = date("t", strtotime($anio . '-' . $mes));
        $data = [];
        for ($i=1; $i <= $dia; $i++) { 

            $cantidad = $this->facturaCantidad($anio . "-" . $mes . "-" . $i, $tipo);
            if ($cantidad > 0) {
                $data['fecha'] = $i . "-" . $mes . '-' . $anio;
                $data['subtotal'] = $this->subtotal($anio . "-" . $mes . "-" . $i, $tipo);
                $data['impuestos'] = $this->impuestos($anio . "-" . $mes . "-" . $i, $tipo);
                $data['total'] = $this->total($anio . "-" . $mes . "-" . $i, $tipo);
                $data['facturaInicial'] = $this->facturaInicial($anio . "-" . $mes . "-" . $i, $tipo);
                $data['facturaFinal'] = $this->facturaFinal($anio . "-" . $mes . "-" . $i, $tipo);
                $data['facturaCantidad'] = $cantidad;
                $data['fechaFormat'] = $anio . "-" . $mes . "-" . $i;


                array_push($this->dias, $data);
                unset($data);
            }

            unset($cantidad);
        }


        return $this->dias;
    }



    public function getDataPerMonth($mes, $tipo){
        $this->month = [];

        $data['subtotalMes'] = $this->subtotalMes($mes, $tipo);
        $data['impuestosMes'] = $this->impuestosMes($mes, $tipo);
        $data['totalMes'] = $this->totalMes($mes, $tipo);
        $data['inicialMes'] = $this->facturaInicialMonth($mes, $tipo);
        $data['finalMes'] = $this->facturaFinalMonth($mes, $tipo);
        $data['cantidadMes'] = $this->facturaCantidadMes($mes, $tipo);
        array_push($this->month, $data);

        return $this->month;
    }







    public function facturaInicial($fecha, $tipo){
        $data = TicketNum::select('factura')
                            ->where('tipo_venta', $tipo)
                            ->whereDate('created_at', $fecha)
                            ->orderBy('factura', 'ASC')
                            ->first();
        if ($data) {
            return $data->factura;
        }
    }

    public function facturaFinal($fecha, $tipo){
        $data = TicketNum::select('factura')
                            ->where('tipo_venta', $tipo)
                            ->whereDate('created_at', $fecha)
                            ->orderBy('factura', 'DESC')
                            ->first();
        if ($data) {
           return $data->factura;
        }
    }

    public function facturaCantidad($fecha, $tipo){
        return TicketNum::where('edo', 1)
                            ->where('tipo_venta', $tipo)
                            ->whereDate('created_at', $fecha)
                            ->count();
    }


    public function subtotal($fecha, $tipo){
        return TicketProducto::where('edo', 1)
                               ->where('tipo_venta', $tipo)
                               ->whereDate('created_at', $fecha)
                               ->sum('stotal');
    }

    public function impuestos($fecha, $tipo){
        return TicketProducto::where('edo', 1)
                               ->where('tipo_venta', $tipo)
                               ->whereDate('created_at', $fecha)
                               ->sum('imp');
    }

    public function total($fecha, $tipo){
        return TicketProducto::where('edo', 1)
                               ->where('tipo_venta', $tipo)
                               ->whereDate('created_at', $fecha)
                               ->sum('total');
    }


    public function totalFacturasEliminadas($anio, $mes, $tipo){
        return TicketNum::where('edo', 2)
                                ->where('tipo_venta', $tipo)
                                ->whereYear('created_at', $anio)
                                ->whereMonth('created_at', $mes)
                                ->count();
    }





    /// DATOS DEL MES
    
    public function facturasEliminadas($mes, $tipo){
        return TicketNum::where('edo', 2)
                                ->where('tipo_venta', $tipo)
                                ->whereMonth('created_at', $mes)
                                ->get();
    }


    public function facturaInicialMonth($fecha, $tipo){
        $data = TicketNum::select('factura')
                            ->where('tipo_venta', $tipo)
                            ->whereMonth('created_at', $fecha)
                            ->orderBy('factura', 'ASC')
                            ->first();
        if ($data) {
            return $data->factura;
        }
    }

    public function facturaFinalMonth($fecha, $tipo){
        $data = TicketNum::select('factura')
                            ->where('tipo_venta', $tipo)
                            ->whereMonth('created_at', $fecha)
                            ->orderBy('factura', 'DESC')
                            ->first();
        if ($data) {
           return $data->factura;
        }
    }


    public function facturaCantidadMes($fecha, $tipo){
        return TicketNum::where('edo', 1)
                            ->where('tipo_venta', $tipo)
                            ->whereMonth('created_at', $fecha)
                            ->count();
    }



    public function subtotalMes($fecha, $tipo){
        return TicketProducto::where('edo', 1)
                               ->where('tipo_venta', $tipo)
                               ->whereMonth('created_at', $fecha)
                               ->sum('stotal');
    }

    public function impuestosMes($fecha, $tipo){
        return TicketProducto::where('edo', 1)
                               ->where('tipo_venta', $tipo)
                               ->whereMonth('created_at', $fecha)
                               ->sum('imp');
    }

    public function totalMes($fecha, $tipo){
        return TicketProducto::where('edo', 1)
                               ->where('tipo_venta', $tipo)
                               ->whereMonth('created_at', $fecha)
                               ->sum('total');
    }



    

}