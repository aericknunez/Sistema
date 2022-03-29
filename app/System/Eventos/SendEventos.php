<?php
namespace App\System\Eventos;

use App\Events\EnviarImpresionRemota;
use App\Events\PantallaDatos;

trait SendEventos {


    public function eventPantallaSend(){
        if (session('principal_ticket_pantalla') == 1 and session('pusher')) {
            event(new PantallaDatos());
        }
    }


    public function eventImpresionSend(){
        if (session('pusher')) {
            event(new EnviarImpresionRemota());
        }
    }



    

}