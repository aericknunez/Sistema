<?php

namespace App\View\Components\Inventario;

use Illuminate\View\Component;

class ListaProductos extends Component
{

    
        
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }



    
    public function render()
    {
        return view('components.inventario.lista-productos');
    }
}
