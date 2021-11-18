<?php

namespace App\View\Components\Comandero;

use Illuminate\View\Component;

class Productos extends Component
{

    public $datos;
    public $subtotal, $propina, $total, $porcentaje;


    
    public function __construct($datos, $subtotal, $propina, $total, $porcentaje)
    {
        $this->datos = $datos;
        $this->subtotal = $subtotal;
        $this->propina = $propina;
        $this->total = $total;
        $this->porcentaje = $porcentaje;
    }

    
   public function render()
    {
        return view('components.comandero.productos');
    }
}
