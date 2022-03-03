<?php

namespace App\Http\Livewire\Facturacion;

use App\Models\ConfigImpresion;
use App\Models\TicketNum;
use App\System\Imprimir\ReImprimir;
use Livewire\Component;

class Rango extends Component
{
    use ReImprimir;

    public $inicio, $fin;
    public $documentos = [];
    public $tipo_venta = 0;


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

        if (($this->fin - $this->inicio) <= 25) {
            for ($i=$this->inicio; $i <= $this->fin; $i++) { 
                $num = TicketNum::where('factura', $i)->where('tipo_venta', $this->tipo_venta)->first();
                if ($num->factura) {
                    $this->ReImprimirFactura($i, $this->tipo_venta); // imprime la factura
                }
            }
            $this->emit('imprimiendo');
        } else {
            $this->emit('errorCantidad');
        }


    }



    public function getDocumentos(){
        $this->documentos = ConfigImpresion::where('id', 1)->first();
    }





}
