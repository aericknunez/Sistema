<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class ModalDetallesOrdenDelivery extends Component
{

    
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    
    public function render()
    {
        return view('components.venta.modal-detalles-orden-delivery');
    }
}
