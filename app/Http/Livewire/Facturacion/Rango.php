<?php

namespace App\Http\Livewire\Facturacion;

use App\System\Ventas\Imprimir;
use Livewire\Component;

class Rango extends Component
{
    use Imprimir;

    public $inicio, $fin;

    public function render()
    {
        return view('livewire.facturacion.rango');
    }


    public function aplicarRango(){
        $this->validate(['inicio' => 'required|numeric', 'fin' => 'required|numeric']);
        for ($i=$this->inicio; $i <= $this->fin; $i++) { 
            $this->ImprimirFactura(session($i)); // imprime la factura
        }
    }

}
