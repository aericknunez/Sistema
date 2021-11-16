<?php

namespace App\View\Components\Producto;

use Illuminate\View\Component;

class ModalModCategoria extends Component
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
        return view('components.producto.modal-mod-categoria');
    }
}
