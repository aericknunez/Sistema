<?php
namespace App\System\Ventas;

use App\Common\Helpers;
use App\Models\ConfigApp;
use App\Models\TicketNum;
use App\Models\TicketProducto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


trait ReImprimir{


    public function ReImprimirFactura($factura, $tipo_venta){ // para factura
      
        $datos = $this->getTotalFactura($factura, $tipo_venta);
        $datos['productos'] = $this->getProductosFactura($factura, $tipo_venta);
        $datos['empresa'] = $this->getDatosEmpresa();
        $datos['caja'] = session('caja_select');
        $datos['documento_factura'] = $tipo_venta;
        $datos['no_factura'] = $factura;
        $datos['fecha'] = date('d-m-Y');
        $datos['hora'] = date('H:i:s');
        $datos['tipo_moneda'] = Helpers::paisSimbolo(session('config_pais'));
        // $datos['cliente'] = $this->getDatosCliente();
        $datos['cajero'] = Auth::user()->name;
        $datos['config_imp'] = session('config_impuesto');
        $datos['tipo_impresion'] = 3;
        $datos['identidad'] = config('sistema.td');
        $datos['numero_documento'] = $factura; // numero de factura
        $datos['llevar_aqui'] = session('llevar_aqui'); // llevar o comer aqui

        Http::asForm()->post('http://'.config('sistema.ip').'/impresiones/index.php', $datos);

        // Http::asForm()->post('http://localhost/impresiones/index.php', ['datos' => $datos]);
    }




    public function getProductosFactura($factura, $tipo_venta){
        $datos =  TicketProducto::where('num_fact', $factura)
        ->where('tipo_venta', $tipo_venta)
        ->with('subOpcion')->get();

        return $this->formatData($datos);
    }



    

    public function getDatosEmpresa(){
        $conf = ConfigApp::find(1);
        $datos['empresa_nombre'] = $conf->cliente;
        $datos['empresa_slogan'] = $conf->slogan;
        $datos['empresa_direccion'] = $conf->direccion;
        $datos['empresa_telefono'] = $conf->telefono;
        $datos['empresa_email'] = $conf->email;
        $datos['empresa_propietario'] = $conf->propietario;
        $datos['empresa_giro'] = $conf->giro;
        $datos['empresa_nit'] = $conf->nit;
        return $datos;
    }

    
    public function getDatosCliente(){

    }



    private function formatData($datos){
        $datos = $datos->sortBy('cod');
        $datos->values()->all();
        $count = 0;
        $conteo = 0;
        $data = [];
        foreach ($datos as $producto) {     
            if ($count != $producto->cod) {

            $cod = $datos->where('cod', $producto->cod);
            $cod->all();
            $cant = count($cod);
            $total = $cod->sum('total');
            $count = $producto->cod;
                $data[$conteo]['cant'] = $cant;
                $data[$conteo]['producto'] = $producto->producto;        
                $data[$conteo]['pv'] = $producto->pv;
                $data[$conteo]['imp'] = $producto->imp;
                $data[$conteo]['total'] = $total;
            $conteo ++;  
            }
        }

        return $data;
    }



   


    public function getTotalFactura($factura, $tipo_venta){
        $datos = array();
        $datos['subtotal'] = TicketProducto::where('num_fact', $factura)
                            ->where('tipo_venta', $tipo_venta)
                            ->where('edo', 1)
                            ->sum('stotal');
        $datos['impuestos'] = TicketProducto::where('num_fact', $factura)
                            ->where('tipo_venta', $tipo_venta)
                            ->where('edo', 1)
                            ->sum('imp');
        $datos['total'] = TicketProducto::where('num_fact', $factura)
                            ->where('tipo_venta', $tipo_venta)
                            ->where('edo', 1)
                            ->sum('total');

                            
        $pago = TicketNum::where('tipo_venta', $tipo_venta)
                            ->where('factura', $factura)
                            ->first();
        // dd($pago);         
        $datos['efectivo'] = $pago->efectivo;
        $datos['propina_cant'] = $pago->propina_cant;
        $datos['propina_porcent'] = $pago->propina_porcent;

        $datos['fecha'] = $pago->created_at;
        $datos['hora'] = $pago->created_at;


        $datos['cambio'] = $pago->efectivo - $pago->total;
        return $datos;
    }    




}