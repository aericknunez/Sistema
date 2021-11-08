<?php

namespace App\View\Components\Producto;

use Illuminate\View\Component;

class ModalModOption extends Component
{

    public $opciones, $agregados;

    
    
    public function __construct($opciones, $agregados)
    {
        $this->opciones = $opciones;
        $this->agregados = $agregados;
    }


    
    
    
    public function render()
    {
        return view('components.producto.modal-mod-option');
    }
}
