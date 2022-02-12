<?php

namespace App\Http\Livewire\Facturacion;

use App\Models\ConfigImpresion;
use App\System\Facturacion\Facturacion;
use Carbon\Carbon;
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
                $this->datos = [];
            } else {
                $this->datos = [];
            }
            $this->reset(['mesf', 'aniof']);
        // $this->diasDelMes($this->mes, $this->anio);
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
