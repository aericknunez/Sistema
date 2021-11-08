<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class MesasAll extends Component
{

    public $mesas;

    public function __construct($mesas)
    {
        $this->mesas = $mesas;
    }

    public function render()
    {
        return view('components.venta.mesas-all');
    }
}
