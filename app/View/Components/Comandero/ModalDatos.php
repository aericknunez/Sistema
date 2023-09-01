<?php

namespace App\View\Components\Comandero;

use Illuminate\View\Component;

class ModalDatos extends Component
{

    public $ordenes;
    public $clientes;


    
    public function __construct($ordenes, $clientes)
    {
        $this->ordenes = $ordenes;
        $this->clientes = $clientes;
    }

    
   public function render()
    {
        return view('components.comandero.modal-datos');
    }
}
