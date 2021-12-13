<?php

namespace App\Http\Livewire\Search;

use App\Models\TicketNum;
use App\Models\TicketProducto;
use Livewire\Component;
use App\System\Ventas\Imprimir;


class SearchBotones extends Component
{

    use Imprimir;

    public $idSearch;
    public $detalles;
    public $factura;

    public function mount(){
        $this->idSearch = session('idSearch');
        $this->getData();
    }


    public function render()
    {
        return view('livewire.search.search-botones');
    }

    public function getData(){
        $this->detalles = TicketProducto::where('tipo_venta', session('impresion_seleccionado'))
                                    ->where('num_fact', session('idSearch'))
                                    ->where('edo', 1)
                                    ->with('subOpcion')
                                    ->get();

        $this->factura = TicketNum::where('tipo_venta', session('impresion_seleccionado'))
                            ->where('factura', session('idSearch'))
                            // ->where('edo', 1)
                            ->first();
    }


    public function imprimir(){
        $this->ImprimirFactura(session('idSearch')); // imprime la factura
        $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Imprimiendo', 'texto' => 'Imprimiendo Factura']);    
    }

    public function eliminar(){
        TicketNum::where('tipo_venta', session('impresion_seleccionado'))
                        ->where('factura', session('idSearch'))
                        ->where('edo', 1)
                        ->update(['edo' => 2]);
       $this->getData(); 
       $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Imprimiendo', 'texto' => 'Factura eliminada correctamente']);    
    }


    public function btnTipoVenta($tipo){ /// Cambia el tipo de venta (documento a emimtir)
        session(['impresion_seleccionado' => $tipo]);
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalTipoVenta']);
        $this->getData();
    } 


}