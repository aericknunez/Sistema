<?php
namespace App\System\Config;

use App\Models\Opciones;
use App\Models\OpcionesSub;
use App\Models\ProductoCategoria;

trait ManejarIconosComandero { // nombre del Trait Igual al del archivo


    public function GenerarIco(){
        $retorno = NULL;
        // $this->productosDesdeCategoria();
        $retorno .= $this->crearCategoriasComandero();

        $opciones = Opciones::all();
        foreach ($opciones as $opcion) {
            $retorno .= $this->crearModalOpcionesComandero($opcion);
        }

        $this->saveData($retorno, '../resources/views/components/comandero/iconos/categorias.blade.php');


    }

    public function crearCategoriasComandero(){
        $retorno = '<div wire:ignore >
    
        <section class="near py-2 pl-3 bg-light">
            <div class="near_slider click">';

        $datos = ProductoCategoria::all();

        foreach ($datos as $data) {
                $img = 'img/ico/' . $data->img;
                $retorno .= '<a  wire:click="btnCatSelect('.$data->id.')" wire:loading.class="disabled" wire:target="btnCatSelect('.$data->id.')">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("'.$img.'") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">'.$data->nombre.'</p>
                            </div>
                        </a>'; 
                
            }

            if (session('principal_otras_ventas')) {
            //Otras ventas
            $retorno .= '<a  data-toggle="modal" data-target="#ModalOtrasVentas">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/4d87a6a1c0.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Otras Ventas</p>
                            </div>
                        </a>'; 
            }


            if (session('principal_venta_especial')) {
                //Otras ventas
                $retorno .= '<a wire:click="BtnVentaEspecial()">
                                <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                                <img src="{{ asset("img/ico/2c2044f4e9.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                                <p class="mb-1 text-dark">Venta Especial</p>
                                </div>
                            </a>'; 
            }


            

        $retorno .= '</div>
        </section>

</div>';

            return $retorno;

    }






    public function crearIconosOpcionesComanderos($data){

        
        $retorno = '<a wire:click="addOpcion('.$data->id.')" title="'.$data->nombre.'" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/'.$data->img.'") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">'.$data->nombre.'</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> '.$data->precio.'</span></p>
                    
                    </div>
        </a>';

        return $retorno; 
    }





    public function crearModalOpcionesComandero($opcion){

        $sub_opciones = OpcionesSub::where('opcion_id', $opcion->id)->get();

$retorno = '<div class="modal" id="opcion-'.$opcion->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">';

    foreach ($sub_opciones as $option) {
        $retorno .= $this->crearIconosOpcionesComanderos($option);
    }


$retorno .= '</div>
</div>
</section>
</div>



</div>
    <div class="modal-footer">
        <button type="button" class="btn blue-gradient btn-rounded" wire:click="omitirOpcion()">Omitir Opción <i class="fas fa-angle-double-right"></i></button>
    </div>
    </div>
</div>
</div>';

return $retorno;

    }





    public function saveData($data, $ruta){
        
        $archivo = fopen($ruta,'w+');
        fwrite($archivo, $data);
        fclose($archivo);

    }





}