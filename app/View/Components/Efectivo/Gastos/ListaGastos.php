<?php

namespace App\View\Components\Efectivo\Gastos;

use Illuminate\View\Component;

class ListaGastos extends Component
{

            
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }



    
    public function render()
    {
        return view('components.efectivo.gastos.lista-gastos');
    }
}
