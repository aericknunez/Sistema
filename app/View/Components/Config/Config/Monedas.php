<?php

namespace App\View\Components\Config\Config;

use Illuminate\View\Component;

class Monedas extends Component
{

    
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }


    
    public function render()
    {
        return view('components.config.config.monedas');
    }
}
