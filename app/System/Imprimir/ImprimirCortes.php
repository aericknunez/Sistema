<?php
namespace App\System\Imprimir;

use App\System\Facturacion\Facturacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Common\Helpers;
use App\Models\TicketProductosSave;

/*
Los tipos de impresion se distribuiran asi:
10. Corte de caja
11. Corte Z
12. Reporte Diario

*/

trait ImprimirCortes{

    use OrdenarProductosImprimir;
    use Imprimir;
    use Facturacion;


    /**
     * Corte de caja normal, los datos del corte vienen desde el llamado de la funcion, aqui solo se agregan
     * algunos datos adicionales
    **/
    public function ImprimirCortePrimario($data){ // para factura
      
        $datos = [];
        $datos  = $data->toArray();

        $datos['productos'] = $this->getProductos($datos['aperturaT'], $datos['cierreT'], $datos['usuario']);
        $datos['empresa'] = $this->getDatosEmpresa();
        $datos['tipo_impresion'] = 10;
        $datos['caja'] = session('caja_select');
        $datos['cajero'] = Auth::user()->name;
        $datos['identidad'] = session('sistema.td');

        Http::asForm()->post($this->getRoutePrint(), $datos);
        if (!Helpers::isLocalSystem()) {
            $this->eventImpresionSend();
        }
    }


    /**
     * Corte de todas las cajas del dia, un acumulado de todos los cortes
    **/
    public function ImprimirCorteZ($fecha){ // para factura
      

    }



    /**
     * Solo es el reporte del total de las ventas con sus correlativos
    **/
    public function ImprimirReporteDiario($fecha, $tipo){
     
        $datos = [];

        $datos['fecha'] = formatJustFecha($fecha);
        $datos['factura_inicial'] = $this->facturaInicial($fecha, $tipo);
        $datos['factura_final'] = $this->facturaFinal($fecha, $tipo);
        $datos['facturas_cantidad'] = $this->facturaCantidad($fecha, $tipo);
        $datos['exento'] = 0;
        $datos['subtotal'] = $this->subtotal($fecha, $tipo);
        $datos['impuestos'] = $this->impuestos($fecha, $tipo);
        $datos['total'] = $this->total($fecha, $tipo);

        $datos['eliminadas'] = $this->totalFacturasEliminadas($fecha, $tipo);

        $datos['empresa'] = $this->getDatosEmpresa();
        $datos['tipo_impresion'] = 12;
        $datos['cajero'] = Auth::user()->name;
        $datos['identidad'] = session('sistema.td');

        Http::asForm()->post($this->getRoutePrint(), $datos);
        if (!Helpers::isLocalSystem()) {
            $this->eventImpresionSend();
        }
    }


    


    public function getProductos($inicio, $fin, $cajero){
        $productos = TicketProductosSave::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->get();

        return $this->formatData($productos);

    }





}