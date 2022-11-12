<?php

namespace App\View\Components\Panel;

use Illuminate\View\Component;

class CardPantallaGroup extends Component
{
    public $datos;
    public $panel;

    
    public function __construct($datos, $panel)
    {
        $this->datos = $datos;
        $this->panel = $panel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel.card-pantalla-group');
    }
}
