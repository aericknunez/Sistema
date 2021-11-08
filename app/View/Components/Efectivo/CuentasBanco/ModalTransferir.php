<?php

namespace App\View\Components\Efectivo\CuentasBanco;

use Illuminate\View\Component;

class ModalTransferir extends Component
{

    
    public $origenx;
    public $destinox;
    public $datos;

    
    public function __construct($origenx, $destinox, $datos)
    {
        $this->origenx = $origenx;
        $this->destinox = $destinox;
        $this->datos = $datos;
    }


    public function render()
    {
        return view('components.efectivo.cuentas-banco.modal-transferir');
    }
}
