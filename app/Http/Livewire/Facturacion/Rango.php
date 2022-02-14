<?php

namespace App\Http\Livewire\Facturacion;

use App\Models\ConfigImpresion;
use App\Models\TicketNum;
use App\System\Ventas\ReImprimir;
use Livewire\Component;

class Rango extends Component
{
    use ReImprimir;

    public $inicio, $fin;
    public $documentos = [];
    public $tipo_venta;


    public function mount(){
        $this->getDocumentos();
    }



    public function render()
    {
        return view('livewire.facturacion.rango');
    }



    public function aplicarRango(){
        $this->validate([
                        'inicio' => 'required|numeric', 
                        'fin' => 'required|numeric'
        ]);

        for ($i=$this->inicio; $i <= $this->fin; $i++) { 
            $num = TicketNum::where('factura', $i)->where('tipo_venta', $this->tipo_venta)->first();
            if ($num->factura) {
                $this->ReImprimirFactura($i, $this->tipo_venta); // imprime la factura
            }
        }
        $this->emit('imprimiendo');
    }



    public function getDocumentos(){
        $this->documentos = ConfigImpresion::where('id', 1)->first();
    }





}
