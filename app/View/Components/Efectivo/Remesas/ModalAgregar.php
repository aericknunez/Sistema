<?php

namespace App\View\Components\Efectivo\Remesas;

use Illuminate\View\Component;

class ModalAgregar extends Component
{

    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    
    public function render()
    {
        return view('components.efectivo.remesas.modal-agregar');
    }
}
