<?php

namespace App\Http\Livewire\Search;

use App\Common\Helpers;
use App\Models\CuentasPorCobrar;
use App\Models\TicketNum;
use App\Models\TicketProductosSave;
use App\System\Imprimir\ReImprimir;
use Livewire\Component;


class SearchBotones extends Component
{

    use ReImprimir;

    protected $listeners = ['borrarFactura' => 'eliminar'];


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
        $this->detalles = TicketProductosSave::where('tipo_venta', session('impresion_seleccionado'))
                                    ->where('num_fact', session('idSearch'))
                                    ->where('edo', 1)
                                    ->with('subOpcion')
                                    ->get();

        $this->factura = TicketNum::where('tipo_venta', session('impresion_seleccionado'))
                            ->where('factura', session('idSearch'))
                            ->first();
    }




    public function imprimir(){
        session(['tipo_pago' => $this->factura->tipo_pago]);
        $this->ReImprimirFactura(session('idSearch')); // imprime la factura
        $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Imprimiendo', 'texto' => 'Imprimiendo Factura']);    
    }




    public function eliminar(){
        TicketNum::where('tipo_venta', session('impresion_seleccionado'))
                        ->where('factura', session('idSearch'))
                        ->where('edo', 1)
                        ->update(['edo' => 2, 'tiempo' => Helpers::timeId()]);
                        
        TicketProductosSave::where('tipo_venta', session('impresion_seleccionado'))
                        ->where('num_fact', session('idSearch'))
                        ->where('edo', 1)
                        ->update(['edo' => 2, 'tiempo' => Helpers::timeId()]);
        
        $factura_id = TicketNum::select('id', 'tipo_pago')->where('tipo_venta', session('impresion_seleccionado'))
                        ->where('factura', session('idSearch'))
                        ->where('edo', 2)
                        ->first();
                        
        if($factura_id->tipo_pago == 5){
           CuentasPorCobrar::where('factura_id', $factura_id->id)->update(['edo' => 0, 'tiempo' => Helpers::timeId()]);
        }
       $this->getData(); 
       $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Imprimiendo', 'texto' => 'Factura eliminada correctamente']);    
    }





    public function btnTipoVenta($tipo){ /// Cambia el tipo de venta (documento a emimtir)
        session(['impresion_seleccionado' => $tipo]);
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalTipoVenta']);
        $this->getData();
    } 


}
