<?php
namespace App\System\Imprimir;

use App\System\Facturacion\Facturacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Common\Helpers;
/*
Los tipos de impresion se distribuiran asi:
6. Gastos diarios

*/

trait ImprimirGastos{

    use OrdenarProductosImprimir;
    use Imprimir;
    use Facturacion;


    /**
     * Imprime los gastos diarios
    **/
    public function ImprimirGastosDiario($data){ 
      
        $datos = [];
        $datos['gastos'] = $data->toArray();
        $datos['empresa'] = $this->getDatosEmpresa();
        $datos['tipo_impresion'] = 6;
        $datos['caja'] = session('caja_select');
        $datos['cajero'] = Auth::user()->name;
        $datos['identidad'] = session('sistema.td');

        Http::asForm()->post($this->getRoutePrint(), $datos);
        if (!Helpers::isLocalSystem()) {
            $this->eventImpresionSend();
        }
    }



}