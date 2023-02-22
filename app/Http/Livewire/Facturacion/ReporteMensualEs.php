<?php

namespace App\Http\Livewire\Facturacion;

use App\Models\ConfigApp;
use App\Models\ConfigImpresion;
use App\System\Facturacion\Facturacion;
use App\System\Imprimir\ImprimirCortes;
use App\System\Imprimir\ReImprimir;
use Livewire\Component;

class ReporteMensualEs extends Component
{

    use Facturacion;
    use ImprimirCortes;
    use ReImprimir;

    public $busqueda;
    public $mes;
    public $anio;
    public $mesf;
    public $aniof;
    public $documentos = [];
    public $generales = [];
    public $datos = [];
    public $finales = [];
    public $eliminadas = [];



    public function mount(){
        $this->busqueda = 10;
        $this->aplicarFechas();
        $this->getDocumentos();
        $this->getDataBussines();
    }



    public function render()
    {
        return view('livewire.facturacion.reporte-mensual-es');
    }



        
    public function aplicarFechas(){
        $this->formatFechas();

            if ($this->busqueda == 10) {
                $this->datos = NUll;
            } else {
                $this->datos = $this->diasDelMes($this->mes, $this->anio, $this->busqueda);
                $this->finales = $this->getDataPerMonth($this->mes, $this->busqueda);
                $this->eliminadas = $this->facturasEliminadas($this->mes . '-' . $this->anio, $this->busqueda);
            }
            $this->reset(['mesf', 'aniof']);
    }


    public function formatFechas(){

        if ($this->mesf) {
            $this->mes = $this->mesf;
            $this->anio = $this->aniof;
        } else {
            $this->mes = date('m');
            $this->anio = date('Y');
        }     
        
    }


    public function imprimirReporte($date){

        $this->ImprimirReporteDiario($date, $this->busqueda);
        $this->emit('imprimiendo');

    }

    public function imprimirFactura($iden){
        session(['impresion_seleccionado' => $this->busqueda]);
        $this->ReImprimirFactura($iden); // imprime la factura
        $this->dispatchBrowserEvent('mensaje', ['clase' => 'success', 'titulo' => 'Imprimiendo', 'texto' => 'Imprimiendo Factura']);   
    }




    public function getDocumentos(){
        $this->documentos = ConfigImpresion::where('id', 1)->first();
    }

    public function getDataBussines(){
        $this->generales = ConfigApp::where('id', 1)->first();
    }














}
