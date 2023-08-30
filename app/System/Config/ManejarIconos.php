<?php
namespace App\System\Config;

use App\Models\Opciones;
use App\Models\OpcionesSub;
use App\Models\OrderImg;
use App\Models\Producto;
use App\Models\ProductoCategoria;
use App\System\Config\ManejarIconosComandero;
use Illuminate\Support\Facades\Request;

trait ManejarIconos { // nombre del Trait Igual al del archivo

    use ManejarIconosComandero;
    use CreaIconosMenuPrincipal;
    use CreaIconosMenuSecundario;
    
    public $retorno;


    public function CrearIconos(){

        $counter = 0;
        $retorno = '';
        // aqui se comienzan a crear los iconos
        
        $datos = OrderImg::all();
        if (session('principal_ordenar_menu') == 1) {
            foreach ($datos as $dato) {
                if ($dato->tipo_img == 1) {
                    $producto = Producto::where('id', $dato->imagen)->first();
                    if ($producto) {
                        OrderImg::where('imagen', $producto->id)->where('tipo_img', 1)
                        ->update(['inicial' => ucfirst(substr($producto->nombre, 0, 1))]);
                    }
                } else {
                    $categoria = ProductoCategoria::where('id', $dato->imagen)->first();
                    if ($categoria) {
                        OrderImg::where('imagen', $categoria->id)->where('tipo_img', 2)
                        ->update(['inicial'=> ucfirst(substr($categoria->nombre, 0, 1))]); 
                    }
                }
            }
        $datos = OrderImg::orderBy('inicial', 'asc')->get();
        }
        
        foreach ($datos as $dato) {
            if ($dato->tipo_img == 1) {
                $datox = Producto::where('producto_categoria_id', 1)->where('id', $dato->imagen)->where('estado', 1)->first();
                if ($datox) {
                    if (session('principal_tipo_menu') == 1) {
                        $retorno .= $this->creaIcono($datox); 
                    } else {
                        $retorno .= $this->creaIcono2($datox); 
                    }
                    $counter ++;
                }
            } else {
                $datoy = ProductoCategoria::where('id', $dato->imagen)->first();
                if ($datoy) {
                    if (session('principal_tipo_menu') == 1) {
                        $retorno .= $this->creaCategoriaIco($datoy); 
                    } else {
                        $retorno .= $this->creaCategoriaIco2($datoy); 
                    }
                    $counter ++;
                }

            }
        }

        if (session('principal_otras_ventas')) {
            if (session('principal_tipo_menu') == 1) {
                $retorno .= $this->creaIconoOtrasVentas();
            } else {
                $retorno .= $this->creaIconoOtrasVentas2();
            }
        }

        if (session('principal_venta_especial')) {
            if (session('principal_tipo_menu') == 1) {
                $retorno .= $this->creaIconoVentaEspecial();
            } else {
                $retorno .= $this->creaIconoVentaEspecial2();
            }
        }


        if ($counter == 0) {
        $retorno .= '
        <div class="mb-4">
            <div class="row justify-content-center click">
                <img src="{{ asset("img/errors/oops.png") }}" alt="Sin Registros">
            </div>

            <div class="row justify-content-center click h4-responsive text-uppercase">NO HAY PRODUCTOS REGISTRADOS</div>
            <div>
                <div class="row justify-content-center">Puede iniciar agregando productos</div>
                <div class="row justify-content-center"><a class="btn btn-primary btn-sm" href="{{ route("producto.create") }}">Aqui</a></div>
            </div>
        </div>
        ';

        }


        if (count($datos)) {
            if (session('principal_tipo_menu') == 1) {
                $retorno .= '
                </div> 
            </div>';
            } else {
                $retorno .= '
                </ul> 
                </div>';
            }
        }





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






    public function creaModalOpciones($opcion){

        $sub_opciones = OpcionesSub::where('opcion_id', $opcion->id)->get();

        $cantidad = count($sub_opciones);
        $modal = 'modal-md';
        if ($cantidad >= 24) { $modal = 'modal-fluid'; }
        if ($cantidad >= 13 AND $cantidad < 24) { $modal = 'modal-lg'; }
        if ($cantidad > 2 AND $cantidad < 12) { $modal = 'modal-md'; }
        if ($cantidad <= 2) { $modal = 'modal-sm'; }

        if (config('sistema.latam') == true) {
            $colorModalOptions = 'light-green';
        } else {
            $colorModalOptions = 'cyan';
        }  

$retorno = '
<div class="modal" id="opcion-'.$opcion->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
    <div class="modal-dialog '.$modal.' z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1 '. $colorModalOptions .' lighten-5">
    <div class="modal-header  bordeado-x1 '. $colorModalOptions .' lighten-2">
            <h5 class="modal-title" id="exampleModalLabel">SELECCIONE UNA OPCION</h5>

    </div>
    <div class="modal-body">';

    
        if (session('principal_tipo_menu') == 1) {
            $retorno .= '<div class="row justify-content-center click">';
        } else {
            $retorno .= '<div class="row justify-content-center click"> 
            <ul class="gallery"> ';
        }

            foreach ($sub_opciones as $option) {

                if (session('principal_tipo_menu') == 1) {
                    $retorno .= $this->creaOpcionesIconos($option);
                } else {
                    $retorno .= $this->creaOpcionesIconos2($option);
                }
                
            }

            if (session('principal_tipo_menu') == 1) {
                $retorno .= '</div>';

            } else {
                $retorno .= '</ul>
                </div>';
            }

        $retorno .= ' 

    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-rounded" wire:click="omitirOpcion()">Omitir Opción <i class="fas fa-angle-double-right"></i></button>
        </div>
        </div>
    </div>
</div>
';

return $retorno;

    }






    public function creaModalCategorias($categoria){
        
if (session('principal_ordenar_menu') == 1) {
    $datos = Producto::where('producto_categoria_id', $categoria->id)->where('estado', 1)->orderBy('nombre', 'asc')->get();
} else {
    $datos = Producto::where('producto_categoria_id', $categoria->id)->where('estado', 1)->get();
}

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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

    </div>
    <div class="modal-body">';

            if (session('principal_tipo_menu') == 1) {
            $retorno .= '<div class="row justify-content-center click">';
        } else {
            $retorno .= '<div class="row justify-content-center click"> 
            <ul class="gallery"> ';
        }
                foreach ($datos as $dato) {

                    if (session('principal_tipo_menu') == 1) {
                        $retorno .= $this->creaIcono($dato); 
                    } else {
                        $retorno .= $this->creaIcono2($dato); 
                    }
                }

                if (session('principal_tipo_menu') == 1) {
                    $retorno .= '</div>';
    
                } else {
                    $retorno .= '</ul>
                    </div>';
                }

        $retorno .= '

    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
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