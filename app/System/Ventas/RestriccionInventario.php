<?php
namespace App\System\Ventas;

use App\Models\InvAsignado;

trait RestriccionInventatrio{


/// comprobar si esta activo el inventario
/// comprobar si hay resticciones de inventario 

    public function comprobarActivacionDeInventario(){
        if (session('invDesc') and session('principal_restringir_inventario')) {
            return true;
        }
        return false;
    }

    public function isInventoryActive($cod){
        if ($this->comprobarActivacionDeInventario()) {
            // comprobar si existen todos los productos en el inventario

        }
        return false;
    }

    private function comprobarProductos($cod){
        $productos = InvAsignado::where('producto', $cod)->get();
        
        // comprobar todos los productos asignados al invantario y verificar existencias
    }



}