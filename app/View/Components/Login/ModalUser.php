<?php

namespace App\View\Components\Login;

use Illuminate\View\Component;

class ModalUser extends Component
{
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }


    
    public function render()
    {
        return view('components.login.modal-user');
    }
}
