<?php

namespace App\View\Components\Config\Config;

use Illuminate\View\Component;

class ModalPrincipal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.config.config.modal-principal');
    }
}
