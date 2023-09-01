<?php
namespace App\System\Config;


trait CreaIconosMenuPrincipal { // nombre del Trait Igual al del archivo

    
    public $retorno;


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
                            <div class="menu-title">'.$data->nombre.'</div> 
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
                                <div class="menu-title2">'.$data->nombre.'</div> 
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



    


}