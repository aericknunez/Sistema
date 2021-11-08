<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class LateralTotal extends Component
{

    public $subtotal, $propina, $total, $porcentaje;

    
    public function __construct($subtotal, $propina, $total, $porcentaje)
    {
        $this->subtotal = $subtotal;
        $this->propina = $propina;
        $this->total = $total;
        $this->porcentaje = $porcentaje;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.venta.lateral-total');
    }
}
