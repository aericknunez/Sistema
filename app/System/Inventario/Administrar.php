<?php
namespace App\System\Inventario;

use App\Models\Producto;
use App\Models\TicketProducto;

/*
    Administra el inventario, este Trait se encarga de descontar los productos del inventario adecuadamente
*/

trait Administrar {


    public function descontarProductosInventario($factura, $tipo){
        $productos = $this->buscarProductosFactura($factura, $tipo);
        // dd($productos);
        dump($productos);
    }


    private function buscarProductosFactura($factura, $tipo){
        return TicketProducto::select('cod')->addSelect(['iden' => Producto::select('id')
                                ->whereColumn('ticket_productos.cod', 'productos.cod')])
                                ->where('num_fact', $factura)
                                ->where('tipo_venta', $tipo)
                                ->where('edo', 1)
                                ->get();
    }

    

}