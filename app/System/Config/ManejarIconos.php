<?php
namespace App\System\Config;

use App\Models\Opciones;
use App\Models\OpcionesSub;
use App\Models\OrderImg;
use App\Models\Producto;
use App\Models\ProductoCategoria;
use App\System\Config\ManejarIconosComandero;

trait ManejarIconos { // nombre del Trait Igual al del archivo

    use ManejarIconosComandero;
    
    public $retorno;


    public function CrearIconos(){
        $retorno = '<div class="container mb-4"> 
                    <div class="row justify-content-left click">';
        $counter = 0;

        // aqui se comienzan a crear los iconos

        $datos = OrderImg::all();

        foreach ($datos as $dato) {
            if ($dato->tipo_img == 1) {
                $datox = Producto::where('producto_categoria_id', 1)->where('id', $dato->imagen)->first();
                if ($datox) {
                    $retorno .= $this->creaIcono($datox); 
                    $counter ++;
                }
            } else {
                $datoy = ProductoCategoria::where('id', $dato->imagen)->first();
                if ($datoy) {
                    $retorno .= $this->creaCategoriaIco($datoy); 
                    $counter ++;
                }

            }
        }

        if (session('principal_otras_ventas')) {
            $retorno .= $this->creaIconoOtrasVentas();
        }

        if (session('principal_venta_especial')) {
            $retorno .= $this->creaIconoVentaEspecial();
        }

        // $datos = Producto::where('producto_categoria_id', 1)->get();
        // foreach ($datos as $dato) {
        //     $retorno .= $this->creaIcono($dato); 
        //     $counter ++;
        // }

        // $datox = ProductoCategoria::where('principal', null)->get();
        // foreach ($datox as $datoy) {
        //     $retorno .= $this->creaCategoriaIco($datoy); 
        //     $counter ++;
        // }

        if ($counter == 0) {
            $retorno .= '<div class="row justify-content-center click">
            <img src="{{ asset("img/errors/oops.png") }}" alt="Sin Registros">    
            {{ mensajex("NO HAY PRODUCTOS REGISTRADOS", "info") }}
        </div>';
        }

        $retorno .= '
        </div> 
    </div>';


        $categorias = ProductoCategoria::where('principal', null)->get();
        foreach ($categorias as $cat) {
            $retorno .= $this->creaModalCategorias($cat);
        }


        $opciones = Opciones::all();
        foreach ($opciones as $opcion) {
            $retorno .= $this->creaModalOpciones($opcion);
        }

        
        $this->guardarArchivo($retorno);


        $this->GenerarIco(); // para comandero
    }



    public function creaIcono($data){
        if ($data->tipo_icono == 1) { /// tipo de icono segun clase
            $icono = 'newmenu';
            $class = 'rounded-circle';
            $img = 'img/ico/' . $data->img;
        } else {
            $icono = 'newmenux';
            $class = 'bordeado-x1';
            $img = 'img/ico/' . $data->img;
        }

        if ($data->opciones_active == 1) {
            $target = 'wire:loading.class="disabled" wire:target="addProducto('.$data->cod.')"';
        } else {
            $target = NULL;
        }
        
        $retorno = '<div class="mx-2 my-2">
                        <div class="'.$icono.' text-center" '.$target.' wire:click="addProducto('.$data->cod.')" wire:key="p'.$data->id.'">
                            <a  title="'.$data->nombre.'">
                            <img src="{{ asset("'.$img.'") }}" class="img-fluid wow fadeIn '.$class.' border border-dark ">
                            <div class="menu-title text-truncate">'.$data->nombre.'</div> 
                            </a>
                        </div>
                    </div> 
                    ';

        return $retorno; 
    }



    public function creaCategoriaIco($data){
        $retorno = '<div class="mx-2 my-2">
                            <div class="newmenu text-center" data-target="#categoria-'.$data->id.'" data-toggle="modal">
                                <a title="'.$data->nombre.'">
                                <img src="{{ asset("img/ico/'.$data->img.'") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                                <div class="menu-title2 text-truncate">'.$data->nombre.'</div> 
                                </a>
                            </div>
                    </div>
                    ';

        return $retorno;
    }

    public function creaOpcionesIconos($data){
    
        $retorno = '<div class="mx-2 my-2">
                        <div class="newmenu text-center" wire:click="addOpcion('.$data->id.')">
                            <a>
                            <img src="{{ asset("img/ico/'.$data->img.'") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-titleC">'.$data->nombre.'</div> 
                            </a>
                        </div>
                    </div>
                    ';

        return $retorno;
    }


    public function creaModalOpciones($opcion){

        $sub_opciones = OpcionesSub::where('opcion_id', $opcion->id)->get();

        $cantidad = count($sub_opciones);
        $modal = 'modal-md';
        if ($cantidad >= 24) { $modal = 'modal-fluid'; }
        if ($cantidad >= 13 AND $cantidad < 24) { $modal = 'modal-lg'; }
        if ($cantidad > 2 AND $cantidad < 12) { $modal = 'modal-md'; }
        if ($cantidad <= 2) { $modal = 'modal-sm'; }

$retorno = '
<div class="modal" id="opcion-'.$opcion->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
    <div class="modal-dialog '.$modal.' z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1 blue lighten-5">
    <div class="modal-header  bordeado-x1 cyan lighten-2">
            <h5 class="modal-title" id="exampleModalLabel">SELECCIONE UNA OPCION</h5>

    </div>
    <div class="modal-body">
        <div class="row justify-content-center click">';

            foreach ($sub_opciones as $option) {
                $retorno .= $this->creaOpcionesIconos($option);
            }


        $retorno .= '</div> 

    </div>
        <div class="modal-footer">
            <button type="button" class="btn blue-gradient btn-rounded" wire:click="omitirOpcion()">Omitir Opción <i class="fas fa-angle-double-right"></i></button>
        </div>
        </div>
    </div>
</div>
';

return $retorno;

    }






    public function creaModalCategorias($categoria){
        
$datos = Producto::where('producto_categoria_id', $categoria->id)->get();

    $cantidad = count($datos);
    $modal = 'modal-md';
    if ($cantidad >= 24) { $modal = 'modal-fluid'; }
    if ($cantidad >= 13 AND $cantidad < 24) { $modal = 'modal-lg'; }
    if ($cantidad > 2 AND $cantidad < 12) { $modal = 'modal-md'; }
    if ($cantidad <= 2) { $modal = 'modal-sm'; }


$retorno = '
<div wire:ignore.self class="modal" id="categoria-'.$categoria->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
    <div class="modal-dialog '.$modal.' z-depth-4 bordeado-x1" role="document">
        <div class="modal-content bordeado-x1">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SELECCIONE UN PRODUCTO</h5>

    </div>
    <div class="modal-body">
        <div class="row justify-content-center click">';

                foreach ($datos as $dato) {
                    $retorno .= $this->creaIcono($dato); 
                }

        $retorno .= '</div> 

    </div>
        <div class="modal-footer">
            <button type="button" class="btn blue-gradient btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>
';

return $retorno;
    }




    public function creaIconoOtrasVentas(){

        $retorno = '<div class="mx-2 my-2">
                        <div class="newmenu text-center" >
                            <a data-toggle="modal" data-target="#ModalOtrasVentas" title="Otras Ventas">
                            <img src="{{ asset("img/ico/4d87a6a1c0.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-title text-truncate">Otras Ventas</div> 
                            </a>
                        </div>
                    </div> 
                    ';

        return $retorno; 
    }


    public function creaIconoVentaEspecial(){

        $retorno = '<div class="mx-2 my-2">
                        <div class="newmenu text-center" >
                            <a wire:click="BtnVentaEspecial()" title="Venta especial">
                            <img src="{{ asset("img/ico/2c2044f4e9.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-title text-truncate">Venta Especial</div> 
                            </a>
                        </div>
                    </div> 
                    ';

        return $retorno; 
    }


    public function guardarArchivo($data){
        
        $archivo = fopen("../resources/views/iconos_x/iconos_principal_". session('sistema.td') .".blade.php",'w+');
        fwrite($archivo, $data);
        fclose($archivo);

    }





}