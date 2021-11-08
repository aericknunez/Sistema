<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class ModalEnvio extends Component
{

    public $envio;

    
    public function __construct($envio)
    {
        $this->envio = $envio;
    }

    public function render()
    {
        return view('components.venta.modal-envio');
    }
}
