<?php

namespace App\View\Components\Opcion;

use Illuminate\View\Component;

class AddOpcionSub extends Component
{

    public $imgSelected;
    public $datos;

    
    public function __construct($datos, $imgSelected)
    {
        $this->datos = $datos;
        $this->imgSelected = $imgSelected;

    }



    public function render()
    {
        return view('components.opcion.add-opcion-sub');
    }
}
