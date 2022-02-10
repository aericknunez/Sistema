<?php
namespace App\System\Inventario;

use App\Models\InvAsignado;
use App\Models\InvDependiente;
use App\Models\Inventario;
use App\Models\Producto;
use App\Models\TicketProducto;

/*
    Administra el inventario, este Trait se encarga de descontar los productos del inventario adecuadamente
*/

trait Administrar {


    public function descontarProductosInventario($factura, $tipo){
        $productos = $this->buscarProductosFactura($factura, $tipo);

        foreach ($productos as $producto) {
            
            $descontar = $this->obtenerAsign($producto->iden);               
            if ($descontar) {
                foreach ($descontar as $descuenta) {
                    $this->descontarCantidadProducto($descuenta->producto_descontar, $descuenta->cantidad_descontar);
                }
            }
        }

    }


    private function buscarProductosFactura($factura, $tipo){
        return TicketProducto::select('cod')->addSelect(['iden' => Producto::select('id')
                                ->whereColumn('ticket_productos.cod', 'productos.cod')])
                                ->where('num_fact', $factura)
                                ->where('tipo_venta', $tipo)
                                ->where('edo', 1)
                                ->get();
    }

    private function obtenerAsign($iden){
        return InvAsignado::addSelect(['cantidad_descontar' => InvDependiente::select('cantidad_descontar')
                            ->whereColumn('inv_asignados.dependiente', 'inv_dependientes.id')])
                            ->addSelect(['producto_descontar' => InvDependiente::select('producto')
                            ->whereColumn('inv_asignados.dependiente', 'inv_dependientes.id')])
                            ->where('producto', $iden)
                            ->get();
    }


    private function descontarCantidadProducto($producto, $cantidad){
        $inv = Inventario::find($producto);
        $inv->update(['cantidad' => $inv->cantidad - $cantidad]);
    }



    

}