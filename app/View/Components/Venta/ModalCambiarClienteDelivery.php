<?php

namespace App\View\Components\Venta;

use Illuminate\View\Component;

class ModalCambiarClienteDelivery extends Component
{

    public $search, $busqueda, $delivery;

    public function __construct($search, $busqueda, $delivery)
    {
        $this->search = $search;
        $this->busqueda = $busqueda;
        $this->delivery = $delivery;
    }



    public function render()
    {
        return view('components.venta.modal-cambiar-cliente-delivery');
    }
}
