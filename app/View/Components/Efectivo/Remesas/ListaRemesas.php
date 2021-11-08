<?php

namespace App\View\Components\Efectivo\Remesas;

use Illuminate\View\Component;

class ListaRemesas extends Component
{

    
        
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }



    
    public function render()
    {
        return view('components.efectivo.remesas.lista-remesas');
    }
}
