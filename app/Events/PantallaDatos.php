<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PantallaDatos implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    // public $datos;

    // public function __construct($datos)
    // {
    //     $this->datos = $datos;
    // }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    public function broadcastOn()
    {
        return ['pantalla'];
    }
  
    public function broadcastAs()
    {
        $evento = 'evento' . config('sistema.td');
        return $evento;
    }
}
