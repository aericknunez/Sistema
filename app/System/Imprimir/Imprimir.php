<?php
namespace App\System\Imprimir;

use App\Common\Helpers;
use App\Models\Cliente;
use App\Models\ConfigApp;
use App\Models\TicketNum;
use App\Models\TicketOrden;
use App\Models\TicketProducto;
use App\Models\TicketProductosSave;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\System\Imprimir\OrdenarProductosImprimir;
use App\System\Eventos\SendEventos;
/*
Los tipos de impresion se distribuiran asi:
1. Pre Cuenta
2. Comanda (produsctos guardados)
3. Factura (Ya cancelada, independiente si es factura, tickeet, ccf. etc)
4. Comanda (Productos Eliminados)

*/

trait Imprimir{

    use OrdenarProductosImprimir, SendEventos;

    public function getRoutePrint(){
        if(Helpers::isLocalSystem()){
            return 'http://'.config('sistema.ip').'/impresiones/index.php';
        } else {
            return session('livewire_path');
        }
    }


    public function ImprimirFactura($factura){ // para factura
      
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
        $datos['tipo_pago'] = session('tipo_pago');
        $datos['tipo_impresion'] = 3;
        $datos['identidad'] = session('sistema.td');
        $datos['llevar_aqui'] = session('llevar_aqui'); // llevar o comer aqui
        $datos['tipo_servicio'] = session('config_tipo_servicio'); // 1 rapido, 2 mesas, 3 delivery

        $datos['cliente_nombre'] = session('delivery_nombre'); 
        $datos['cliente_direccion'] = session('delivery_direccion'); 
        $datos['cliente_telefono'] = session('delivery_telefono'); 
        
        $datos['mesa'] = $this->detallesMesa(session('orden'));

        Http::asForm()->post($this->getRoutePrint(), $datos);
        if (!Helpers::isLocalSystem()) {
            $this->eventImpresionSend();
        }

        // Http::asForm()->post('http://localhost/impresiones/index.php', ['datos' => $datos]);
    }



    public function ImprimirPrecuenta($propina, $porcentaje, $cliente = NULL){ // si trae cliente o no 
        
        if ($cliente) {
            $datos = $this->getTotalOrdenCliente(session('orden'), $cliente, $propina, $porcentaje);
            $datos['productos'] = $this->getProductosOrdenCliente(session('orden'), $cliente);
        } else {
            $datos = $this->getTotalOrden(session('orden'), $propina, $porcentaje);
            $datos['productos'] = $this->getProductosOrden(session('orden'));
        }

        $datos['empresa'] = $this->getDatosEmpresa();
        $datos['caja'] = session('caja_select');
        $datos['documento_factura'] = session('impresion_seleccionado');
        $datos['fecha'] = date('d-m-Y');
        $datos['hora'] = date('H:i:s');
        $datos['tipo_moneda'] = Helpers::paisSimbolo(session('config_pais'));
        // $datos['cliente'] = $this->getDatosCliente();
        $datos['cajero'] = Auth::user()->name;
        $datos['config_imp'] = session('config_impuesto');
        $datos['tipo_impresion'] = 1;
        $datos['identidad'] = session('sistema.td');
        $datos['numero_documento'] = session('orden'); // numero de orden
        $datos['llevar_aqui'] = session('llevar_aqui'); // llevar o comer aqui
        $datos['tipo_servicio'] = session('config_tipo_servicio'); // 1 rapido, 2 mesas, 3 delivery

        $datos['cliente_nombre'] = session('delivery_nombre'); 
        $datos['cliente_direccion'] = session('delivery_direccion'); 
        $datos['cliente_telefono'] = session('delivery_telefono'); 
        $datos['mesa'] = $this->detallesMesa(session('orden'));

        Http::asForm()->post($this->getRoutePrint(), $datos);
        if (!Helpers::isLocalSystem()) {
            $this->eventImpresionSend();
        }
    }




    public function AbrirCaja(){
      
        $datos['caja'] = session('caja_select');
        $datos['cajero'] = Auth::user()->name;
        $datos['tipo_impresion'] = 5;
        $datos['identidad'] = session('sistema.td');

        Http::asForm()->post($this->getRoutePrint(), $datos);
        if (!Helpers::isLocalSystem()) {
            $this->eventImpresionSend();
        }
    }



    public function productosComanda($imprimir, $panel){
       // imprimir: 2 - guardados, 4 Eliminados
        $datos['productos'] = $this->getProductosComanda(session('orden'), $imprimir, $panel);
        $datos['cajero'] = Auth::user()->name;
        $datos['tipo_impresion'] = $imprimir;
        $datos['panel'] = $panel;
        $datos['fecha'] = date('d-m-Y');
        $datos['hora'] = date('H:i:s');
        $datos['identidad'] = session('sistema.td');
        $datos['numero_documento'] = session('orden'); // numero de orden
        $datos['llevar_aqui'] = session('llevar_aqui'); // llevar o comer aqui
        $datos['tipo_servicio'] = session('config_tipo_servicio'); // 1 rapido, 2 mesas, 3 delivery

        $datos['cliente_nombre'] = session('delivery_nombre'); 
        $datos['cliente_direccion'] = session('delivery_direccion'); 
        $datos['cliente_telefono'] = session('delivery_telefono'); 
        $datos['mesa'] = $this->detallesMesa(session('orden'));

        Http::asForm()->post($this->getRoutePrint(), $datos);
        if (!Helpers::isLocalSystem()) {
            $this->eventImpresionSend();
        }
        $this->productosActualizar(session('orden'), $imprimir, 3, $panel); // (orden,imprimir,tipo de impresion, panel)

    }




    public function ImprimirComanda(){
        if ($this->contarProductos(2) > 0) {
            if ($this->contarProductosPanel(2, 1) > 0) {
                $this->productosComanda(2, 1);
            }
            if ($this->contarProductosPanel(2, 2) > 0) {
                $this->productosComanda(2, 2);
            }
            if ($this->contarProductosPanel(2, 3) > 0) {
                $this->productosComanda(2, 3);
            }
        }
        if ($this->contarProductos(4) > 0) {
            if ($this->contarProductosPanel(4, 1) > 0) {
                $this->productosComanda(4, 1);
            }
            if ($this->contarProductosPanel(4, 2) > 0) {
                $this->productosComanda(4, 2);
            }
            if ($this->contarProductosPanel(4, 3) > 0) {
                $this->productosComanda(4, 3);
            }
        }
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

    
    public function getDatosCliente($cliente){
        $client = Cliente::find($cliente);
        $datos['cliente'] = $client->nombre;
        $datos['direccion'] = $client->direccion;
        $datos['giro'] = $client->giro;
        $datos['departamento_doc'] = $client->departamento_doc;
        $datos['direccion_doc'] = $client->direccion_doc;
        $datos['documento'] = $client->documento;
        $datos['registro'] = $client->registro;
        return $datos;
    }


    public function getProductosOrdenSave($orden){
        $datos =  TicketProductosSave::where('orden', $orden)
        ->where('num_fact', NULL)
        ->where('edo', 1)
        ->with('subOpcion')->get();

        return $this->formatData($datos);
    }
    

    public function getProductosOrden($orden){
        $datos =  TicketProducto::where('orden', $orden)
        ->where('num_fact', NULL)
        ->where('edo', 1)
        ->with('subOpcion')->get();

        return $this->formatData($datos);
    }


    
    public function getProductosOrdenClienteSave($orden, $cliente){
        $datos =  TicketProductosSave::where('orden', $orden)
        ->where('cliente', $cliente)
        ->where('edo', 1)
        ->with('subOpcion')->get();

        return $this->formatData($datos);
    }


    public function getProductosOrdenCliente($orden, $cliente){
        $datos =  TicketProducto::where('orden', $orden)
        ->where('cliente', $cliente)
        ->where('edo', 1)
        ->with('subOpcion')->get();

        return $this->formatData($datos);
    }


    public function getProductosFactura($factura){
        $datos =  TicketProductosSave::where('num_fact', $factura)
        ->where('tipo_venta', session('impresion_seleccionado'))
        ->where('edo', 1)
        ->with('subOpcion')->get();

        return $this->formatData($datos);
    }


    public function getTotalOrdenSave($orden, $propina, $porcentaje){

        $datos = array();
        $datos['subtotal'] = TicketProductosSave::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('edo', 1)
                            ->sum('stotal');
        $datos['impuestos'] = TicketProductosSave::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('edo', 1)
                            ->sum('imp');
        $datos['total'] = TicketProductosSave::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('edo', 1)
                            ->sum('total');

        $datos['propina_cant'] = $propina;
        $datos['propina_porcent'] = $porcentaje;

        return $datos;
    }    


    public function getTotalOrden($orden, $propina, $porcentaje){

        $datos = array();
        $datos['subtotal'] = TicketProducto::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('edo', 1)
                            ->sum('stotal');
        $datos['impuestos'] = TicketProducto::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('edo', 1)
                            ->sum('imp');
        $datos['total'] = TicketProducto::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('edo', 1)
                            ->sum('total');

        $datos['propina_cant'] = $propina;
        $datos['propina_porcent'] = $porcentaje;

        return $datos;
    }    


    public function getTotalOrdenClienteSave($orden, $cliente, $propina, $porcentaje){

        $datos = array();
        $datos['subtotal'] = TicketProductosSave::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('cliente', $cliente)
                            ->where('edo', 1)
                            ->sum('stotal');
        $datos['impuestos'] = TicketProductosSave::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('cliente', $cliente)
                            ->where('edo', 1)
                            ->sum('imp');
        $datos['total'] = TicketProductosSave::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('cliente', $cliente)
                            ->where('edo', 1)
                            ->sum('total');
        
        $datos['propina_cant'] = $propina;
        $datos['propina_porcent'] = $porcentaje;

        return $datos;  
    }    


    public function getTotalOrdenCliente($orden, $cliente, $propina, $porcentaje){

        $datos = array();
        $datos['subtotal'] = TicketProducto::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('cliente', $cliente)
                            ->where('edo', 1)
                            ->sum('stotal');
        $datos['impuestos'] = TicketProducto::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('cliente', $cliente)
                            ->where('edo', 1)
                            ->sum('imp');
        $datos['total'] = TicketProducto::where('orden', $orden)
                            ->where('num_fact', NULL)
                            ->where('cliente', $cliente)
                            ->where('edo', 1)
                            ->sum('total');
        
        $datos['propina_cant'] = $propina;
        $datos['propina_porcent'] = $porcentaje;

        return $datos;  
    }  

    public function getTotalFactura($factura){
        $datos = array();
        $datos['subtotal'] = TicketProductosSave::where('num_fact', $factura)
                            ->where('tipo_venta', session('impresion_seleccionado'))
                            ->where('edo', 1)
                            ->sum('stotal');
        $datos['impuestos'] = TicketProductosSave::where('num_fact', $factura)
                            ->where('tipo_venta', session('impresion_seleccionado'))
                            ->where('edo', 1)
                            ->sum('imp');
        $datos['total'] = TicketProductosSave::where('num_fact', $factura)
                            ->where('tipo_venta', session('impresion_seleccionado'))
                            ->where('edo', 1)
                            ->sum('total');

                            
        $pago = TicketNum::where('tipo_pago', session('tipo_pago'))
                            ->where('tipo_venta', session('impresion_seleccionado'))
                            ->where('factura', $factura)
                            ->first();
        // dd($pago);         
        $datos['efectivo'] = $pago->efectivo;
        $datos['propina_cant'] = $pago->propina_cant;
        $datos['propina_porcent'] = $pago->propina_porcent;

        $datos['cambio'] = $pago->efectivo - $pago->total;
        $datos['cliente'] = $pago->cliente_id;
        $datos['fecha'] = Carbon::parse($pago->created_at)->format('d-m-Y');
        $datos['hora'] = Carbon::parse($pago->created_at)->format('H:i:s');

        return $datos;
    }    



    public function getProductosComanda($orden, $estado, $panel){
        $datos =  TicketProductosSave::where('orden', $orden)
                                ->where('imprimir', $estado)
                                ->where('panel', $panel)
                                ->with('subOpcion')->get();

        if (session('impresion_comanda_agrupada')) {
            return $this->formatData($datos);
        } else {
            return $this->formatDataComanda($datos);
        }
    }


    public function productosActualizar($orden, $anterior, $nuevo, $panel){
        TicketProductosSave::where('orden', $orden)
                        ->where('imprimir', $anterior)
                        ->where('panel', $panel)
                        ->update(['imprimir' => $nuevo, 'panel' => $panel, 'tiempo' => Helpers::timeId()]);
    }


    public function contarProductos($imprimir){
        return TicketProductosSave::where('orden', session('orden'))
                            ->where('num_fact', NULL)
                            ->where('imprimir', $imprimir)
                            ->count();
    }


    public function contarProductosPanel($imprimir, $panel){
        return TicketProductosSave::where('orden', session('orden'))
                            ->where('num_fact', NULL)
                            ->where('imprimir', $imprimir)
                            ->where('panel', $panel)
                            ->count();
    }




    public function detallesMesa($orden){
        $datos = array();
        $data = TicketOrden::select('nombre_mesa', 'comentario')->where('id', $orden)->first();
        $datos['nombre_mesa'] = $data->nombre_mesa;
        $datos['comentario'] = $data->comentario;

        return $datos;  
    }    


    public function productosComandaConPantalla($imprimir, $panel, $limit){
        // imprimir: 2 - guardados, 4 Eliminados
         $datos['productos'] = $this->getProductosComandaConPantalla(session('orden'), $imprimir, $panel, $limit);
         $datos['cajero'] = Auth::user()->name;
         $datos['tipo_impresion'] = $imprimir;
         $datos['panel'] = $panel;
         $datos['fecha'] = date('d-m-Y');
         $datos['hora'] = date('H:i:s');
         $datos['identidad'] = session('sistema.td');
         $datos['numero_documento'] = session('orden'); // numero de orden
         $datos['llevar_aqui'] = session('llevar_aqui'); // llevar o comer aqui
 
         $datos['cliente_nombre'] = session('delivery_nombre'); 
         $datos['cliente_direccion'] = session('delivery_direccion'); 
         $datos['cliente_telefono'] = session('delivery_telefono'); 
         $datos['mesa'] = $this->detallesMesa(session('orden'));
 
         Http::asForm()->post($this->getRoutePrint(), $datos);
         if (!Helpers::isLocalSystem()) {
             $this->eventImpresionSend();
         }
     }

     public function getProductosComandaConPantalla($orden, $imprimir, $panel, $limit){
        $datos =  TicketProductosSave::where('orden', $orden)
                                ->where('imprimir', $imprimir)
                                ->where('panel', $panel)
                                ->with('subOpcion')
                                ->limit($limit)
                                ->orderBy('id', 'DESC')
                                ->get();

        if (session('impresion_comanda_agrupada')) {
            return $this->formatData($datos);
        } else {
            return $this->formatDataComanda($datos);
        }
    }
    

}