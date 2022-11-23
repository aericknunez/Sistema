<?php
namespace App\System\Ventas;

trait RestriccionInventatrio{


/// comprobar si esta activo el inventario
/// comprobar si hay resticciones de inventario 

    public function comprobarActivacionDeInventario(){

        if (session('invDesc')) {
            
        }
        return false;
    }




}