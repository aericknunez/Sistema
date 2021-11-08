<?php

namespace App\View\Components\Opcion;

use Illuminate\View\Component;

class Listado extends Component
{

    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    
    public function render()
    {
        return view('components.opcion.listado');
    }
}
