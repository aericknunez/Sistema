<?php
namespace App\System\Ventas;

use App\Models\InvAsignado;
use App\Models\InvDependiente;
use App\Models\Inventario;
use App\Models\Producto;
use App\Models\TicketProducto;

trait RestriccionInventario{

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
        // contar cuantos hay a la espera de facturar
        $cantidad = TicketProducto::where('cod', $cod)->where('num_fact', null)->where('edo', 1)->count();
        foreach ($productos as $producto) {
            $dependiente = InvDependiente::where('id', $producto->dependiente)->first();
            $prod = Inventario::where('id', $dependiente->producto)->first();
            $enEspera = $dependiente->relacion * ($cantidad + 1);
            if ($enEspera > $prod->cantidad) {
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