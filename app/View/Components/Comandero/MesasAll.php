<?php

namespace App\View\Components\Comandero;

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
        return view('components.comandero.mesas-all');
    }
}
