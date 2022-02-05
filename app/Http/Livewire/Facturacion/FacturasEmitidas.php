<?php

namespace App\Http\Livewire\Facturacion;

use App\Models\ConfigImpresion;
use App\Models\TicketNum;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class FacturasEmitidas extends Component
{


    public $busqueda;
    public $tipo_fecha;
    public $fecha1, $fecha2;
    public $fecha1f, $fecha2f;
    public $datos = [];
    public $documentos = [];



    public function mount(){
        $this->tipo_fecha = 1;
        $this->busqueda = 10;
        $this->aplicarFechas();
        $this->getDocumentos();
    }


    public function render()
    {
        return view('livewire.facturacion.facturas-emitidas');
    }


        
    public function aplicarFechas(){
        $this->formatFechas();

        if ($this->tipo_fecha == 1) {

            if ($this->busqueda == 10) {
                $this->datos = TicketNum::whereDate('created_at', $this->fecha1)
                                        ->orderBy('tiempo', 'desc')
                                        ->get();    
            } else {
                $this->datos = TicketNum::whereDate('created_at', $this->fecha1)
                                        ->where('tipo_venta', $this->busqueda)
                                        ->orderBy('tiempo', 'desc')
                                        ->get();     
            }
       
        } else {
            if ($this->busqueda == 10) {
                $this->datos = TicketNum::whereBetween('created_at', [$this->fecha1, $this->fecha2])
                                        ->orderBy('tiempo', 'desc')
                                        ->get();
            } else {
                $this->datos = TicketNum::whereBetween('created_at', [$this->fecha1, $this->fecha2])
                                        ->where('tipo_venta', $this->busqueda)
                                        ->orderBy('tiempo', 'desc')
                                        ->get();
            }

        }

    }


    public function formatFechas(){
        if ($this->tipo_fecha == 1) {
            if(!$this->fecha1f){ $this->fecha1 = date('Y-m-d'); 
            } else {
                $this->fecha1 =  $this->fecha1f;
            }
        } else {
            if(!$this->fecha1f){ $this->fecha1 = date('Y-m-01 00:00:00'); } else {
                $this->fecha1 = $this->fecha1f . ' 00:00:00';
            }
            if(!$this->fecha2f){ $this->fecha2 = Carbon::now()->endOfMonth()->toDateTimeString();  } else {
                $this->fecha2 = $this->fecha2f . ' 23:59:59';
            }         
        }
    }




    public function getDocumentos(){
        $this->documentos = ConfigImpresion::where('id', 1)->first();
    }




}
