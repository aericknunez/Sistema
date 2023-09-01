<?php

namespace App\View\Components\Efectivo\Entradas;

use Illuminate\View\Component;

class ListaEntradasSalidas extends Component
{

    
        
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }



    
    public function render()
    {
        return view('components.efectivo.entradas.lista-entradas-salidas');
    }
}
