<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailCorte extends Mailable
{
    use Queueable, SerializesModels;


    public $datos;
    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }


    public function build()
    {
        return $this->from('erick@hibridosv.com', 'Erick Nunez')
                    ->view('emails.info-corte')
                    ->subject('Corte de caja')
                    ->with(['datos' => $this->datos]);
        // return $this->view('emails.info-corte');
    }
}
