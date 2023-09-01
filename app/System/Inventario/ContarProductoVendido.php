<?php
namespace App\System\Inventario;

use App\Models\InvAsignado;
use App\Models\InvDependiente;
use App\Models\Producto;
use App\Models\TicketProducto;
use Carbon\Carbon;

/*
* Este Trait es exclusivo para los datos especiales de pollo
* Obtener el promedio de pollos debemos sumar la cantidad de pollos vendidos / total de venta
*/
// obterner 


trait ContarProductoVendido {

// promedio de pollos
public function CantidadDeProducto($producto){


 // $productos -> producto es el producto en la factura
    $productos =  InvAsignado::addSelect(['cantidad_descontar' => InvDependiente::select('relacion')
                        ->whereColumn('inv_asignados.dependiente', 'inv_dependientes.id')])
                        ->addSelect(['producto_descontar' => InvDependiente::select('producto')
                        ->whereColumn('inv_asignados.dependiente', 'inv_dependientes.id')])
                        ->where('producto', $producto)
                        ->get();

    $cantidad_descontar = 0;
    foreach ($productos as $producto) {

        // obterner cod de producto en factura y que esta asignado
        $codigo = Producto::select('cod')->where('id', $producto->producto)->first();
        $cantidad = TicketProducto::where('edo', 1)
                                    ->where('cod', $codigo->cod)
                                    ->whereDate('created_at', Carbon::now())
                                    ->sum('cantidad');
        $cantidadProducto = $producto->cantidad_descontar * $cantidad;
        $cantidad_descontar = $cantidad_descontar + $cantidadProducto;
    }

    return $cantidad_descontar;

}


    

}