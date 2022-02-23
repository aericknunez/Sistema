<?php
namespace App\System\Ventas;

use App\Common\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


trait ReImprimir{

    use Imprimir;

    public function ReImprimirFactura($factura, $tipo_venta){ // para factura
      
        $datos = $this->getTotalFactura($factura, $tipo_venta);
        $datos['productos'] = $this->getProductosFactura($factura, $tipo_venta);
        $datos['empresa'] = $this->getDatosEmpresa();
        if ($datos['cliente']) {
            $datos['cliente'] = $this->getDatosCliente($datos['cliente']);
        }
        $datos['caja'] = session('caja_select');
        $datos['documento_factura'] = $tipo_venta;
        $datos['no_factura'] = $factura;
        $datos['tipo_moneda'] = Helpers::paisSimbolo(session('config_pais'));
        $datos['cajero'] = Auth::user()->name;
        $datos['config_imp'] = session('config_impuesto');
        $datos['tipo_impresion'] = 3;
        $datos['identidad'] = config('sistema.td');
        $datos['llevar_aqui'] = session('llevar_aqui'); // llevar o comer aqui
        $datos['reimprimir'] = true;

        Http::asForm()->post('http://'.config('sistema.ip').'/impresiones/index.php', $datos);

        // dd($datos);

    }






}