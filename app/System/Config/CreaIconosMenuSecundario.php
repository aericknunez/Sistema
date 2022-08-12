<?php
namespace App\System\Config;

trait CreaIconosMenuSecundario { // nombre del Trait Igual al del archivo

    
    public $retorno;


    public function creaIcono2($data){

        if ($data->opciones_active == 1) {
            $target = 'wire:loading.class="disabled" wire:target="addProducto('.$data->cod.')"';
        } else {
            $target = NULL;
        }
        $img = 'img/ico/' . $data->img;

        $retorno = '<li><a '.$target.' wire:click="addProducto('.$data->cod.')" wire:key="p'.$data->id.'">
                <em class="text-center">'.$data->nombre.'</em>
                <img src="{{ asset("'.$img.'") }}" alt="'.$data->nombre.'" class="img-fluid wow fadeIn" />
            </a></li>
        ';

        return $retorno; 
    }



    public function creaCategoriaIco2($data){
        $retorno = '<li><a data-target="#categoria-'.$data->id.'" data-toggle="modal">
                    <em class="text-center">'.$data->nombre.'</em>
                    <img src="{{ asset("img/ico/'.$data->img.'") }}" alt="'.$data->nombre.'" class="img-fluid wow fadeIn" />
                    </a></li>
            ';

        return $retorno;
    }



    
    public function creaOpcionesIconos2($data){
    
        $retorno = '<li><a wire:click="addOpcion('.$data->id.')">
            <em class="text-center">'.$data->nombre.'</em>
            <img src="{{ asset("img/ico/'.$data->img.'") }}" alt="'.$data->nombre.'" class="img-fluid wow fadeIn" />
        </a></li>
        ';

        return $retorno;
    }


    





    



    public function creaIconoOtrasVentas2(){

            $retorno = '<li><a data-toggle="modal" data-target="#ModalOtrasVentas" title="Otras Ventas">
                    <em class="text-center">Otras Ventas</em>
                    <img src="{{ asset("img/ico/4d87a6a1c0.png") }}" alt="Otras Ventas" class="img-fluid wow fadeIn" />
                </a></li>
                ';
        
        return $retorno; 
    }


    public function creaIconoVentaEspecial2(){

        $retorno = '<li><a wire:click="BtnVentaEspecial()" title="Venta especial">
                    <em class="text-center">Venta especial</em>
                    <img src="{{ asset("img/ico/2c2044f4e9.png") }}" alt="Venta especial" class="img-fluid wow fadeIn" />
                </a></li>
                ';

        return $retorno; 
    }



    


}