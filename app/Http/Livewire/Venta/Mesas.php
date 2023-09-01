<?php

namespace App\Http\Livewire\Venta;

use App\Models\TicketOrden;
use App\System\Ventas\MesasPropiedades;
use Livewire\Component;



class Mesas extends Component
{

    use MesasPropiedades;

    public $mesasAll;
    public $mesaNombre;
    public $ordenesCant;
    public $clientesCant;

    public $clientes; // estrablece a 0 el numero de clientes para poder asignarselo


    public function mount(){
        $this->carga();
        $this->clientes = 1;
    }

    
    public function render()
    {
        return view('livewire.venta.mesas');
    }

    public function carga(){
        $this->getOrdenesActive();
        $this->getCantidadOrdenes(); // cantidad de ordenes pendientes       
    }



    public function getOrdenesActive(){
        $this->mesasAll = $this->ordenesInicio();
    }


    public function ordenSelect($orden){
        $ordenx = TicketOrden::select('clientes','edo')
                                ->where('id', $orden)
                                ->first();
        if ($ordenx->edo == 1) {
            session(['clientes' => $ordenx->clientes]);

            session(['orden' => $orden]);
            return redirect()->route('venta.rapida');
        } else {
            $this->emit('noorden');
            $this->getOrdenesActive();
        }
    }


    public function decrementar(){
        if ($this->clientes > 1) {
            $this->clientes = $this->clientes - 1; 
        }  
    }


    public function incrementar(){
            $this->clientes = $this->clientes + 1;   
    }


    public function btnAddMesa(){
        session(['clientes' => $this->clientes]);
        session()->forget('orden');
        session(['mesa_nombre_temp' => $this->mesaNombre]);

        return redirect()->route('venta.rapida'); // redireccionno a la venta rapida
    }



    public function getCantidadOrdenes(){
        $this->ordenesCant = $this->cantidadOrdenes();

        $this->clientesCant = $this->cantidadClientes();
    }


}
