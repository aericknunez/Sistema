<?php

namespace App\View\Components\Config;

use Illuminate\View\Component;

class UsuariosEditar extends Component
{

    
    public $datos;

    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }


    
    public function render()
    {
        return view('components.config.usuarios-editar');
    }
}
