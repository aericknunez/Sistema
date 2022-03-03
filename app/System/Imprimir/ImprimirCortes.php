<?php
namespace App\System\Imprimir;

use App\Models\TicketProducto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

/*
Los tipos de impresion se distribuiran asi:
10. Corte de caja

*/

trait ImprimirCortes{

    use OrdenarProductosImprimir;
    use Imprimir;


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


    


    public function getProductos($inicio, $fin, $cajero){
        $productos = TicketProducto::where('cajero', $cajero)
                                ->where('edo', 1)
                                ->whereBetween('tiempo', [$inicio, $fin])
                                ->get();

        return $this->formatData($productos);

    }





}