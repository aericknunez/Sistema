<?php

namespace App\View\Components\Facturacion;

use Illuminate\View\Component;

class ListaFacturasUltimas extends Component
{

    
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }


    
    public function render()
    {
        return view('components.facturacion.lista-facturas-ultimas');
    }
}
