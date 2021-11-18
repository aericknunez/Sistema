<?php
namespace App\System\Config;

use App\Models\Producto;
use App\Models\ProductoCategoria;

trait ManejarIconosComandero { // nombre del Trait Igual al del archivo

    public $retorno;

    public function GenerarIco(){

        // $this->productosDesdeCategoria();
        $this->crearCategoriasComandero();

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

        $retorno .= '</div>
        </section>

</div>';

        
        $this->saveData($retorno, '../resources/views/components/comandero/iconos/categorias.blade.php');
    }







    public function productosDesdeCategoria(){
        $datos = ProductoCategoria::all();
        
        foreach ($datos as $dato) {
                $this->crearIconosCategoriasComandero($dato->id);             
        }
        
    }




    public function crearIconosCategoriasComandero($iden){
        $retorno = '<div class="px-2">
    <section class="bg-light body_rounded mt-n5 p-3">

        <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">';

        $datos = Producto::where('producto_categoria_id', $iden)->get();

        foreach ($datos as $dato) {

                $retorno .= $this->creaIconoComandero($dato); 
                
            }

        $retorno .= '</div>
        </div>
    </section>

</div>';

        
        $this->saveData($retorno, '../resources/views/components/comandero/iconos/iconos-'.$iden.'.blade.php');
    }





    public function creaIconoComandero($data){

        $img = 'img/ico/' . $data->img;
        
        $retorno = '<a wire:click="addProducto('.$data->cod.')" wire:loading.class="disabled" wire:target="addProducto('.$data->cod.')" title="'.$data->nombre.'" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("'.$img.'") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">'.$data->nombre.'</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> '.$data->precio.'</span></p>';
                    
                    if ($data->opciones_active == 1) {  
                       $retorno .= '<p class="small mb-0 text-muted text-left"><span class="bg-info font-weight-bold text-white rounded-3 py-1 px-2 small">Con Opciones</span></p>';
                    }

                    $retorno .= '</div>
        </a>';

        return $retorno; 
    }





    public function saveData($data, $ruta){
        
        $archivo = fopen($ruta,'w+');
        fwrite($archivo, $data);
        fclose($archivo);

    }





}