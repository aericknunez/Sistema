<?php

namespace App\Http\Livewire\Historial;

use App\System\Corte\Corte;
use App\System\Imprimir\ImprimirCortes;
use App\System\Historial\Historial;
use App\System\Ventas\DatosEspeciales;
use Livewire\Component;

class Reporte extends Component
{
    use Historial, ImprimirCortes, Corte, DatosEspeciales;

    public $fecha1;
    public $fecha1f;
    public $productos = [];
    public $cortes = [];
    public $gastos = [];
    public $remesas = [];
    public $ordenes = [];
    public $detalles = []; // detalles del corde
    public $detallesOrden = []; /// detalles de la orden




    public function mount(){
        $this->aplicarFechas();
    }


    public function hydrate(){
        $this->aplicarFechas();
    }


    public function render()
    {
        return view('livewire.historial.reporte');
    }



    public function aplicarFechas(){
            $this->formatFechas();

            $this->productos = $this->ventasUnica($this->fecha1);
            $this->cortes = $this->cortesUnica($this->fecha1);
            $this->gastos = $this->gastosUnica($this->fecha1);
            $this->remesas = $this->remesasUnica($this->fecha1);
            $this->ordenes = $this->ordenesUnica($this->fecha1);
            
            $this->reset(['fecha1f']);

    }


    public function formatFechas(){

        if(!$this->fecha1f){ $this->fecha1 = date('Y-m-d'); 
        } else {
            $this->fecha1 =  $this->fecha1f;
        }
        
    }





    /* Obtener los datos de un corte especifico */
    public function obtenerDatosCorte($iden){
        $this->detalles = $this->getDatosCorte($iden);
    }

    public function imprimirCorte(){

        $this->ImprimirCortePrimario($this->detalles);
        $this->emit('imprimiendo'); // manda el mensaje de error de eliminado

    }


    public function getDetalles($iden){ // se obtienen los detalles de cada orden para mostrarla en el modal
        $this->detallesOrden = $this->getDatosOrden($iden);
    }

    public function cerrarModal(){
        $this->reset(['detallesOrden']);
    }






}
