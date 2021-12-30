<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class CambiosProductos extends Component
{

    public $datos;
    public $cliente;

    
    public function __construct($datos, $cliente)
    {
        $this->datos = $datos;
        $this->cliente = $cliente;
    }

    
    public function render()
    {
        return view('components.venta.cambios-productos');
    }
}
