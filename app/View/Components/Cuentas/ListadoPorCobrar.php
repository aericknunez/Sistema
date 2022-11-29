<?php

namespace App\View\Components\Cuentas;

use Illuminate\View\Component;

class ListadoPorCobrar extends Component
{

        
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cuentas.listado-por-cobrar');
    }
}
