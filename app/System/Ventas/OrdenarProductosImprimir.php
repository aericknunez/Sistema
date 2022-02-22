<?php
namespace App\System\Ventas;


/*
    Ordena los productos para mandarlos a imprimir ya sea en comanda, precuenta, ticket o factura
*/

trait OrdenarProductosImprimir {



    // muestra todos los productos agrupados por codigo sin las subopciones
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


    /// Muestra los productos sin agruparlos y con sus respectivas sub obciones
    private function formatDataComanda($datos){
        $conteo = 0;
        $data = [];
        foreach ($datos as $producto) {   
                $data[$conteo]['subOpcion'] = [];  

                $data[$conteo]['cant'] = $producto->cantidad;
                $data[$conteo]['producto'] = $producto->producto;  
                $x = 0;  
                foreach ($producto->subOpcion as $opcion) {
                    $data[$conteo]['subOpcion'][$x]['nombre'] = $opcion->nombre;
                $x ++;
                }    
            $conteo ++;  
        }

        return $data;
    }



        // ORDENA POR CLIENTE y Agrupa por producto sin terminar
        private function formatDataByClient($datos){
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
                    $data[$conteo]['cliente'] = $producto->cliente;        
                    $data[$conteo]['pv'] = $producto->pv;
                    $data[$conteo]['imp'] = $producto->imp;
                    $data[$conteo]['total'] = $total;
                $conteo ++;  
                }
            }
    
            return $data;
        }


    

    

}