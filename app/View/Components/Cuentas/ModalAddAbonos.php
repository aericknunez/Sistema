<?php

namespace App\View\Components\Cuentas;

use Illuminate\View\Component;

class ModalAddAbonos extends Component
{
    
    public $datos;
    public $bancos;
    public $tipo;

    
    public function __construct($datos, $bancos, $tipo)
    {
        $this->datos = $datos;
        $this->bancos = $bancos;
        $this->tipo = $tipo;
    }



    
    public function render()
    {
        return view('components.cuentas.modal-add-abonos');
    }
}
