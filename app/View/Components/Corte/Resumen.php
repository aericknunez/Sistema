<?php

namespace App\View\Components\Corte;

use Illuminate\View\Component;

class Resumen extends Component
{

    
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    
    public function render()
    {
        return view('components.corte.resumen');
    }
}
