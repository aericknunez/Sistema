<?php
namespace App\System\Ventas;

use App\Models\InvAsignado;
use App\Models\InvDependiente;
use App\Models\Inventario;
use App\Models\Producto;

trait RestriccionInventario{


/// comprobar si esta activo el inventario
/// comprobar si hay resticciones de inventario 

    public function comprobarInventario($cod){
        return $this->comprobarActivacionDeInventario($cod);
    }

    public function comprobarActivacionDeInventario($cod){
        if (session('invDesc') and session('principal_restringir_inventario')) {
            return $this->comprobarProductos($cod);
        }
    }


    private function comprobarProductos($cod){
        $codigo = Producto::select('id')->where('cod', $cod)->first();
        $productos = InvAsignado::where('producto', $codigo->id)->get();
        $count = 0;
        foreach ($productos as $producto) {
            $dependiente = InvDependiente::where('id', $producto->dependiente)->first();
            $prod = Inventario::where('id', $dependiente->producto)->first();
            if ($dependiente->relacion > $prod->cantidad) {
               $count ++;
            }
        }
        if ($count > 0) {
           return true;
        } else {
            return false;
        }
    }



}