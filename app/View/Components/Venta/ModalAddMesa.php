<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class ModalAddMesa extends Component
{

    public $clientes;

    public function __construct($clientes)
    {
        $this->clientes = $clientes;
    }


    public function render()
    {
        return view('components.venta.modal-add-mesa');
    }
}
