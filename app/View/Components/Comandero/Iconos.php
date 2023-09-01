<?php

namespace App\View\Components\Comandero;

use Illuminate\View\Component;

class Iconos extends Component
{

    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    
    public function render()
    {
        return view('components.comandero.iconos');
    }
}
