<?php

namespace App\Http\Livewire\Panel;

use App\Models\TicketOrden;
use App\System\Panel\DatosDia;
use Livewire\Component;
use Livewire\WithPagination;

class Ordenes extends Component
{
    use WithPagination;
    use DatosDia;

    protected $paginationTheme = 'bootstrap';


    public $totalOrdenes, $totalLlevar, $totalAqui;
    public $totalPendientes, $pendientesLlevar, $pendientesAqui;


    public function mount(){
        // $this->obtenerDatos();
        $this->otrosDatos();
    }

    

    public function render()
    {
        return view('livewire.panel.ordenes', [
            'datos' => $this->obtenerDatosOrdenesDiarios(date('d-m-Y'), 25)
        ]);
    }



    public function otrosDatos(){

        $this->totalOrdenes = TicketOrden::whereDay('created_at', date('d-m-Y'))->count();
        $this->totalLlevar = TicketOrden::where('llevar_aqui', 1)->whereDay('created_at', date('d-m-Y'))->count();
        $this->totalAqui = TicketOrden::where('llevar_aqui', 2)->whereDay('created_at', date('d-m-Y'))->count();

        $this->totalPendientes = TicketOrden::where('edo', 1)->whereDay('created_at', date('d-m-Y'))->count();
        $this->pendientesLlevar = TicketOrden::where('edo', 1)->where('llevar_aqui', 1)->whereDay('created_at', date('d-m-Y'))->count();
        $this->pendientesAqui = TicketOrden::where('edo', 1)->where('llevar_aqui', 2)->whereDay('created_at', date('d-m-Y'))->count();

    }




}
