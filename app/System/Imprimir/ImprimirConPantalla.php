<?php
namespace App\System\Imprimir;

use App\Common\Helpers;
use App\Models\TicketProducto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\System\Imprimir\OrdenarProductosImprimir;
use App\System\Eventos\SendEventos;
use App\System\Imprimir\Imprimir;

trait ImprimirConPantalla{

    use OrdenarProductosImprimir, SendEventos, Imprimir; 


    public function productosComandaConPantalla($panel, $limit = null, $cod = null, $type = false){
        // returnar null si no se encuentra la opcion de imprimir activa
        if (!session('print')) return null;
        
        if ($type) {
            $datos['productos'] = $this->getProductosComandaConPantalla(session('orden'), $panel, $limit, $cod);
        } else {
            $datos['productos'] = $this->getProductosComandaConPantallaCompleta(session('orden'), $panel);
        }      
         $datos['cajero'] = Auth::user()->name;
         $datos['tipo_impresion'] = 6;
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

     public function getProductosComandaConPantalla($orden, $panel, $limit, $cod){
        $datos =  TicketProducto::where('orden', $orden)
                                ->where('imprimir', 3)
                                ->where('panel', $panel)
                                ->where('cod', $cod)
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


    public function getProductosComandaConPantallaCompleta($orden, $panel){
        $datos =  TicketProducto::where('orden', $orden)
                                ->where('imprimir', 3)
                                ->where('panel', $panel)
                                ->with('subOpcion')
                                ->get();

        if (session('impresion_comanda_agrupada')) {
            return $this->formatData($datos);
        } else {
            return $this->formatDataComanda($datos);
        }
    }
    

}