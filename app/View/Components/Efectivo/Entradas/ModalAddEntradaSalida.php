<?php

namespace App\View\Components\Efectivo\Entradas;

use Illuminate\View\Component;

class ModalAddEntradaSalida extends Component
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
        return view('components.efectivo.entradas.modal-add-entrada-salida');
    }
}
