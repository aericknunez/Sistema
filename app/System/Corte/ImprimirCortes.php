<?php
namespace App\System\Corte;

use App\Models\ConfigApp;
use App\Models\TicketProducto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

/*
Los tipos de impresion se distribuiran asi:
10. Corte de caja

*/

trait ImprimirCortes{


    public function ImprimirCortePrimario($data){ // para factura
      
        $datos = [];
        $datos  = $data->toArray();

        $datos['productos'] = $this->getProductos($datos['aperturaT'], $datos['cierreT'], $datos['usuario']);
        $datos['empresa'] = $this->getDatosEmpresa();
        $datos['tipo_impresion'] = 10;
        $datos['caja'] = session('caja_select');
        $datos['cajero'] = Auth::user()->name;
        $datos['identidad'] = config('sistema.td');

        Http::asForm()->post('http://'.config('sistema.ip').'/impresiones/index.php', $datos);

        // Http::asForm()->post('http://localhost/impresiones/index.php', ['datos' => $datos]);
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


    public function getProductos($inicio, $fin, $cajero){
        $productos = TicketProducto::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->get();

        return $this->formatData($productos);

    }





}