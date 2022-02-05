<?php

namespace App\Http\Livewire\Panel;

use App\Models\TicketDelivery;
use App\Models\TicketOrden;
use App\System\Panel\DatosDia;
use App\System\Ventas\DatosEspeciales;
use App\System\Ventas\Ventas;
use Livewire\Component;
use Livewire\WithPagination;

class Ordenes extends Component
{
    use WithPagination;
    use DatosDia;
    use Ventas;
    use DatosEspeciales;

    protected $paginationTheme = 'bootstrap';


    // Otros datos
    public $totalOrdenes, $totalLlevar, $totalAqui;
    public $totalPendientes, $pendientesLlevar, $pendientesAqui;

    public $detalles; // detalles de la orden


    public function mount(){
        $this->otrosDatos();
    }

    

    public function render()
    {
        return view('livewire.panel.ordenes', [
            'datos' => $this->obtenerDatosOrdenesDiarios(date('Y-m-d'), 25)
        ]);
    }



    public function otrosDatos(){

        $this->totalOrdenes = TicketOrden::whereDate('created_at', date('Y-m-d'))->count();
        $this->totalLlevar = TicketOrden::where('llevar_aqui', 1)->whereDate('created_at', date('Y-m-d'))->count();
        $this->totalAqui = TicketOrden::where('llevar_aqui', 2)->whereDate('created_at', date('Y-m-d'))->count();

        $this->totalPendientes = TicketOrden::where('edo', 1)->whereDate('created_at', date('Y-m-d'))->count();
        $this->pendientesLlevar = TicketOrden::where('edo', 1)->where('llevar_aqui', 1)->whereDate('created_at', date('Y-m-d'))->count();
        $this->pendientesAqui = TicketOrden::where('edo', 1)->where('llevar_aqui', 2)->whereDate('created_at', date('Y-m-d'))->count();

    }

    public function selectOrden($orden, $tipo_servicio){
        session(['config_tipo_servicio' => $tipo_servicio]);
        session(['orden' => $orden]);

        if ($tipo_servicio == 3) {
            session(['clientes' => 1]);
   
            $client = TicketDelivery::select('cliente_id')
                            ->where('orden_id', session('orden'))->first();
            
            session(['client_select' => $client->cliente_id]);
            $this->getDeliveryData();
            session()->forget('client_select');
        }

        return redirect()->route('venta.rapida');
    }



    public function getDetalles($iden){ // se obtienen los detalles de cada orden para mostrarla en el modal
        $this->detalles = $this->getDatosOrden($iden);
    }

    public function cerrarModal(){
        $this->reset(['detalles']);
    }



}
