<?php

namespace App\Http\Livewire\Venta;

use App\Common\Helpers;
use App\Models\Cliente;
use App\Models\TicketDelivery;
use App\Models\TicketOrden;
use App\Models\User;
use App\System\Ventas\Ventas;
use Livewire\Component;

class Delivery extends Component
{

    use Ventas;


    public $ordenesAll;


    public $search, $busqueda;

    protected $rules = [
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'required'
    ];

    public $nombre, 
            $identidad, 
            $telefono, 
            $direccion, 
            $email, 
            $nacimiento, 
            $documento, 
            $registro, 
            $cliente, 
            $giro, 
            $departamento_doc, 
            $direccion_doc, 
            $comentarios;

    public $ordenesCant;
    public $OrdenesEnt;


    public $deliverySelected;

    public $ordenDetalles;

    public function mount(){
        $this->obtenerOrdenes();
        $this->search = NULL;
        $this->delDeliveryData(); // elimina la variable de sesion activas de la orden
        $this->cantidadOrdenes(); // cantidad de ordenes pendientes
    }


    public function render()
    {
        if ($this->search) {
            $this->busqueda = Cliente::where('nombre', '!=', NULL)
                    ->where('nombre', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('telefono', 'LIKE', '%'.$this->search.'%')
                    ->get();
        }


        return view('livewire.venta.delivery');
    }


    public function cancelar(){
        $this->reset(['search', 'busqueda']);
    }


    public function obtenerOrdenes(){
        $ordenes = TicketOrden::where('tipo_servicio', 3)
                                ->where('edo', 1)
                                ->with('deliverys')
                                ->with('deliverys.cliente')
                                ->get();
        $this->ordenesAll = $ordenes;
    }


    public function ordenSelect($orden){
        session(['clientes' => 1]);

        session(['orden' => $orden]);

        $client = TicketDelivery::select('cliente_id')
                        ->where('orden_id', session('orden'))->first();
        
        session(['client_select' => $client->cliente_id]);
        $this->getDeliveryData();
        session()->forget('client_select');

        return redirect()->route('venta.rapida');
    }



    //// seleccionar cliente
    public function selectClient($cliente){
        session(['client_select' => $cliente]);
        $this->btnAddDelivery();
    }


    public function btnAddDelivery(){
        session(['clientes' => 1]);
        session()->forget('orden');

        $this->getDeliveryData();
        return redirect()->route('venta.rapida'); // redireccionno a la venta rapida
    }

    public function btnAddCliente(){

        $this->validate();
        
        $cliente = Cliente::create([
                    'nombre' => $this->nombre,
                    'identidad' => $this->identidad,
                    'direccion' => $this->direccion,
                    'telefono' => $this->telefono,
                    'email' => $this->email,
                    'nacimiento' => $this->nacimiento,
                    'documento' => $this->documento,
                    'registro' => $this->registro,
                    'cliente' => $this->cliente,
                    'giro' => $this->giro,
                    'departamento_doc' => $this->departamento_doc,
                    'direccion_doc' => $this->direccion_doc,
                    'edo' => 1,
                    'comentarios' => $this->comentarios,
                    'clave' => Helpers::hashId(),
                    'tiempo' => Helpers::timeId(),
                    'td' => config('sistema.td')
                ]);
        
        session(['client_select' => $cliente->id]);
        $this->btnAddDelivery();

    }




    public function cantidadOrdenes(){
        $this->ordenesCant = TicketOrden::where('tipo_servicio', 3)
                            ->where('edo', 1)
                            ->count();

        $this->OrdenesEnt = TicketOrden::where('tipo_servicio', 3)
                            ->where('edo', 2)
                            ->count();
    }




    //// botones de accion
    public function btnChangeClient($delivery, $cliente){
        TicketDelivery::find($delivery)->update(['cliente_id' => $cliente, 'tiempo' => Helpers::timeId()]);

        session(['client_select' => $cliente]);
        $this->btnAddDelivery();
    }

    public function deliverySelect($delivery){
       $this->deliverySelected = $delivery;
    }


    public function detallesOrden($orden){
        $this->ordenDetalles = TicketOrden::addSelect(['usuario' => User::select('name')
                                            ->whereColumn('ticket_ordens.empleado', 'users.id')])
                                            ->where('id', $orden)
                                            ->with('deliverys')
                                            ->with('productos')
                                            ->with('deliverys.cliente')
                                            ->first();
     }

     public function cerrarModal(){
        $this->reset(['ordenDetalles']);
     }


}
