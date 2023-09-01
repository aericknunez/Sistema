<?php
namespace App\System\Corte;

use App\Common\Helpers;
use App\Models\CorteDeCaja;
use App\Models\NumeroCajas;
use App\Models\User;

trait InicializaCorte{




    public function getAperturaCaja(){ // comprueba la apertura de la caja por el usuario

        $cantidad = CorteDeCaja::where('usuario', session('config_usuario_id'))
                        ->where('edo', 1)
                        ->count();
        if ($cantidad > 0) {
            return TRUE; // hay apertura
        } else {
            return FALSE; // sin apertura
        }
    }

    public function compruebaDisponibilidad($caja){ // cuando el numero es igual a 1
        
            $cantidad = CorteDeCaja::where('numero_caja', $caja)
                        ->where('edo', 1)
                        ->count();

            if ($cantidad > 0) {
                return TRUE; // hay apertura
            } else {
                return FALSE; // sin apertura
            }
    }


    public function nuevaApertura($efectivo, $caja){
        CorteDeCaja::create([
            'aperturaT' => Helpers::timeId(),
            'apertura' => now(),
            'efectivo_inicial' => $efectivo,
            'numero_caja' => $caja,
            'edo' => 1,
            'usuario' => session('config_usuario_id'), //usuario
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ]);

        $this->updateCaja($caja, TRUE);

        session(['apertura_caja' => 1]);
    }


    public function updateCaja($caja, $edo){

    // actualiza para que se muestre que la caja esta ocupada
        NumeroCajas::where('numero', $caja)
                    ->update(['edo' => $edo, 'tiempo' => Helpers::timeId()]);
    }





}