<?php
namespace App\System\Config;

use App\Common\Encrypt;
use App\Common\Helpers;

trait Validaciones {

    //    Valida el codigo ingresado 
    public function validarCodigoAcceso($codigo){
        if ($codigo == Helpers::CodigoValidacionHora()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function siCodigo(){ // verifica si esta activo el codigo es necesario
        if (session('principal_ticket_pantalla')) {
            if (session('principal_solicitar_clave')) {
                return TRUE;
            }
        }
    }

    public function siRegristro(){ // verifica si es necesario el registro de borrar
        if (session('principal_ticket_pantalla')) {
            if (session('principal_registro_borrar')) {
                return TRUE;
            }
        }
    }



    // Verifica que el codigo y el td del sistema correspondan correctamente
    public function validarSistema(){ 
        $code =  Helpers::FlashCode(Encrypt::encrypt(config('sistema.td'), config('sistema.td')));

        if ($code == config('sistema.hash')) {
           return true;
        } else {
            return false;
        }
    }






}