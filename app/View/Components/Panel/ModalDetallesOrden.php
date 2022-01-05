<?php

namespace App\View\Components\Panel;

use Illuminate\View\Component;

class ModalDetallesOrden extends Component
{
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel.modal-detalles-orden');
    }
}
