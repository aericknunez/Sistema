<?php
namespace App\System\Config;

use App\Models\Image;

trait ImagenesProductos { // nombre del Trait Igual al del archivo


    public function getAllIconos(){
        return  Image::latest('id')->paginate(39);
    }



}