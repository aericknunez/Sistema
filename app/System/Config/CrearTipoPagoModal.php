<?php
namespace App\System\Config;

use App\Models\ConfigMoneda;


trait CrearTipoPagoModal { // nombre del Trait Igual al del archivo

    // public $retorno;


    public function crearModalMoneda(){
        $data = $this->creaDataModal();
        $this->guardarArchivoModal($data);

    }

    public function creaDataModal(){

        $tipos = ConfigMoneda::where('edo', 1)->get();


    $retorno = '<div class="modal" id="ModalTipoPago" tabindex="-1" role="dialog" data-backdrop="true">
        <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
          <div class="modal-content bordeado-x1">
            <div class="modal-header">
              <h5 class="modal-title">TIPO DE PAGO</h5>
    
            </div>
            <div class="modal-body">
    
              <div class="text-center">


              ';


            foreach ($tipos as $moneda) {
                $retorno .= '<a class="btn {{ getColorBoton('.$moneda->id.') }}" wire:click="btnTipoPago('.$moneda->id.')" wire:key="'.$moneda->id.'"><i class="'.$moneda->icono.' mr-1"></i>'.$moneda->moneda.'</a>
                ';

            }


        $retorno .= '
        
        </div>
                    
        
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>';

        return $retorno;


    }





    public function guardarArchivoModal($data){
        
        $archivo = fopen("../resources/views/components/venta/lateral-modal-tpago.blade.php",'w+');
        fwrite($archivo, $data);
        fclose($archivo);

    }





}