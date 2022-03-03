<?php

namespace App\Http\Livewire\Facturacion;

use App\Models\ConfigImpresion;
use App\System\Facturacion\Facturacion;
use Livewire\Component;

class ReporteMensualEs extends Component
{

    use Facturacion;

    public $busqueda;
    public $mes;
    public $anio;
    public $mesf;
    public $aniof;
    public $documentos = [];
    public $datos = [];
    public $finales = [];
    public $eliminadas = [];



    public function mount(){
        $this->busqueda = 10;
        $this->aplicarFechas();
        $this->getDocumentos();
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
                $this->eliminadas = $this->facturasEliminadas($this->mes, $this->busqueda);
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




    public function getDocumentos(){
        $this->documentos = ConfigImpresion::where('id', 1)->first();
    }
















}
