<?php

namespace App\View\Components\Producto;

use Illuminate\View\Component;

class Crear extends Component
{
    public $opciones;
    public $categorias;
    public $paneles;
    public $imgSelected;

    
    public function __construct($opciones, $categorias, $paneles, $imgSelected)
    {
        $this->opciones = $opciones;
        $this->categorias = $categorias;
        $this->paneles = $paneles;
        $this->imgSelected = $imgSelected;

    }


    public function render()
    {
        return view('components.producto.crear');
    }
}
