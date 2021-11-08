<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class DeliveryAll extends Component
{

    public $ordenes;

    public function __construct($ordenes)
    {
        $this->ordenes = $ordenes;
    }

    public function render()
    {
        return view('components.venta.delivery-all');
    }
}
