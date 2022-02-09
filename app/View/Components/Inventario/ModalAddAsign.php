<?php

namespace App\View\Components\Inventario;

use Illuminate\View\Component;

class ModalAddAsign extends Component
{

    
        
    public $datos;
    public $dependientes;

    
    public function __construct($datos, $dependientes)
    {
        $this->datos = $datos;
        $this->dependientes = $dependientes;
    }



    
    public function render()
    {
        return view('components.inventario.modal-add-asign');
    }
}
