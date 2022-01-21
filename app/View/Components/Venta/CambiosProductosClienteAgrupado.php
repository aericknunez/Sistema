<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class CambiosProductosClienteAgrupado extends Component
{

    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    
    public function render()
    {
        return view('components.venta.cambios-productos-cliente-agrupado');
    }
}
