<?php
namespace App\System\Imprimir;

use App\Common\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\System\Imprimir\Imprimir;

trait ReImprimir{

    use Imprimir;

    public function ReImprimirFactura($factura){ // para factura
      
        $datos = $this->getTotalFactura($factura);
        $datos['productos'] = $this->getProductosFactura($factura);
        $datos['empresa'] = $this->getDatosEmpresa();
        if ($datos['cliente']) {
            $datos['cliente'] = $this->getDatosCliente($datos['cliente']);
        }
        $datos['caja'] = session('caja_select');
        $datos['documento_factura'] = session('impresion_seleccionado');
        $datos['no_factura'] = $factura;
        $datos['tipo_moneda'] = Helpers::paisSimbolo(session('config_pais'));
        $datos['cajero'] = Auth::user()->name;
        $datos['config_imp'] = session('config_impuesto');
        $datos['tipo_impresion'] = 3;
        $datos['identidad'] = session('sistema.td');
        $datos['llevar_aqui'] = session('llevar_aqui'); // llevar o comer aqui
        $datos['reimprimir'] = true;

        
        Http::asForm()->post($this->getRoutePrint(), $datos);
        if (!Helpers::isLocalSystem()) {
            $this->eventImpresionSend();
        }
        // dd($datos);

    }






}