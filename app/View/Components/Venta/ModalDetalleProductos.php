<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class ModalDetalleProductos extends Component
{

    public $productSelected;

    
    public function __construct($productSelected)
    {
        $this->productSelected = $productSelected;
    }

    public function render()
    {
        return view('components.venta.modal-detalle-productos');
    }
}
