<?php
namespace App\System\Eventos;

use App\Events\PantallaDatos;

trait SendEventos {


    public function eventPantallaSend(){
        if (session('principal_ticket_pantalla') == 1 and session('pusher')) {
            event(new PantallaDatos());
        }
    }



    

}