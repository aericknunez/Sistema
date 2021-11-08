<?php

namespace App\View\Components\Efectivo\Gastos;

use Illuminate\View\Component;

class ModalAgregar extends Component
{

    
            
    public $datos;
    public $tipo;

    
    public function __construct($datos, $tipo)
    {
        $this->datos = $datos;
        $this->tipo = $tipo;
    }



    
    public function render()
    {
        return view('components.efectivo.gastos.modal-agregar');
    }
}
