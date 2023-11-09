<?php

namespace App\Http\Livewire\Facturacion;

use App\Models\ConfigImpresion;
use App\Models\TicketNum;
use App\Models\TicketOrden;
use App\Models\TicketProductosSave;
use Livewire\Component;

class FacturasUltimas extends Component
{

    protected $listeners = ['EliminarFactura' => 'destroy']; // escucah el evento Eliminar

    public $datos = [];
    public $documentos = [];
    public $busqueda;


    

    public function mount(){
        $this->busqueda = 10;
        $this->getFacturas();
        $this->getDocumentos();
    }


    public function render()
    {
        return view('livewire.facturacion.facturas-ultimas');
    }

    public function getFacturas(){
        if ($this->busqueda == 10) {
            $this->datos = TicketNum::where('edo', 1)
                                    ->orderBy('tiempo', 'desc')
                                    ->limit(10)
                                    ->get(); 
        } else {
            $this->datos = TicketNum::where('edo', 1)
                                    ->where('tipo_venta', $this->busqueda)
                                    ->orderBy('tiempo', 'desc')
                                    ->limit(10)
                                    ->get();         
        }

    }

    public function aplicarBusqueda(){
        $this->getFacturas();
    }

    public function destroy($id){ // Las elimina de raiz todo

        $factura = TicketNum::find($id);

        if ($factura->delete()) {
            // consigo el numero de orden.
            $orden = TicketProductosSave::where('num_fact', $factura->factura)
                                    ->where('tipo_venta', $factura->tipo_venta)->first();

            TicketProductosSave::where('num_fact', $factura->factura)
                            ->where('tipo_venta', $factura->tipo_venta)
                            ->delete();
            
            // compruebo si no hay registros en esa orden si no hay la borro
            $cantidad = TicketProductosSave::where('orden', $factura->orden)
                                        ->count();
            if ($cantidad == 0) {
                TicketOrden::find($factura->orden)->delete();
            }


            $this->emit('eliminada'); // manda el mensaje de creado
            $this->getFacturas();

        } else {
            $this->dispatchBrowserEvent('mensaje', ['clase' => 'success', 'titulo' => 'Error', 'texto' => 'No se ha podido eliminar la factura']);
        }

    }



    
    public function getDocumentos(){
        $this->documentos = ConfigImpresion::where('id', 1)->first();
    }





}
