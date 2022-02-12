<?php
namespace App\System\Facturacion;

use Carbon\Carbon;

trait Facturacion {


    public $dias = [];

    
    public function diasDelMes($mes, $anio){
        $dia = date("t", strtotime($anio . '-' . $mes));
        
        for ($i=1; $i <= $dia; $i++) { 
            $this->dias[$i]['dia'] = $i . "-" . $mes . '-' . $anio;
        }

    }


    public function datosDelDia($fecha){
        # code...
    }







    

}