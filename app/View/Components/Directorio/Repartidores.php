<?php

namespace App\View\Components\Directorio;

use Illuminate\View\Component;

class Repartidores extends Component
{

    
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }


    
    public function render()
    {
        return view('components.directorio.repartidores');
    }
}
