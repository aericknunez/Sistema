<?php
namespace App\Common;


class Helpers{




    public static function CodigoValidacionHora(){ // codigo de 8 digitos qu cambia cada hora
        $id = date("d-m-Y-H");
        $iden = sha1($id); 
        $hash = strtoupper(substr($iden,0,4));  

        return $hash;
    }


    public static function FlashCode($code){ // Los 5 primeros digitos de una cadena
        return strtoupper(substr($code,0, 5));  
    }


   static  public function Dinero($numero){  
        $format= session('config_moneda_simbolo') ." " . number_format($numero,2,'.',',');
        return $format;
     } 


    static public function Format($numero){ 
        $format=number_format($numero,2,'.',',');
        return $format;
     } 


    static public function Format4D($numero){ 
        $format=number_format($numero,4,'.',',');
        return $format;
     } 


    static public function Entero($numero){ 
        $format=intval($numero);
        return $format;
     } 

    
    static public function STotal($numero, $impuestos){  
        $imp = ($impuestos / 100)+1;
        return $numero / $imp;
     } 


    static public function Impuesto($numero, $impuestos){  
        $imp = $impuestos / 100;
        return $numero * $imp;
    } 


    static public function propina($cantidad, $propinaPorcentaje){ 
        $num = $propinaPorcentaje / 100;
        return $cantidad * $num;
    }


    static public function propinaTotal($numero){ 
        $num = session('config_propina') / 100;
        $propina = $numero * $num;
        return $propina + $numero;
    }

    static public function propinaPorcentaje($subTotal, $cantidad){ 
        return ($cantidad * 100)/$subTotal;
    }



    static public function Descuento($numero){ 
        $num = $_SESSION['descuento'] / 100;
        $descuento = $numero * $num;
        return $descuento;
    }

    static public function DescuentoTotal($numero){ 
        $num = $_SESSION['descuento'] / 100;
        $descuento = $numero * $num;
        $numer = $numero - $descuento;
        return $numer;
    }



    static public function PorcentajeDescuento($total, $descuento){ /// obtiene que porcentaje de descuento se aplicara segun total y cantidad a descontar
        $nume = ($descuento * 100)/$total;
        return $nume;
    }



    
    public static function hashId(){
    $id = "-" . date("d-m-Y-H:i:s") . rand(1,999999999);
    $iden = sha1($id);
    $hash = substr($iden,0,10);
    return $hash;
    }


    public static function timeId(){
    $id = strtotime(date("H:i:s"));
    return $id;
    }

    static public function paisNombre($nombre){
        if($nombre == 1) return 'El Salvador';
        if($nombre == 2) return 'Honduras';
        if($nombre == 3) return 'Guatemala';
    }

    static public function paisMoneda($nombre){
        if($nombre == 1) return 'Dolar';
        if($nombre == 2) return 'Lempira';
        if($nombre == 3) return 'Quetzal';
    }

    static public function paisSimbolo($nombre){
        if($nombre == 1) return '$';
        if($nombre == 2) return 'L';
        if($nombre == 3) return 'Q';
    }

    static public function paisDocumento($nombre){
        if($nombre == 1) return 'NIT';
        if($nombre == 2) return 'RTN';
        if($nombre == 3) return 'NIT';
    }

    static public function paisImpuesto($nombre){
        if($nombre == 1) return 'IVA';
        if($nombre == 2) return 'ISV';
        if($nombre == 3) return 'IVA';
    }


    static public function tipoUsuario($nombre){
        if($nombre == 1) return 'Root';
        if($nombre == 2) return 'Gerente';
        if($nombre == 3) return 'Administrador';
        if($nombre == 4) return 'Cajero';
        if($nombre == 5) return 'Mesero';
        if($nombre == 6) return 'Invitado';
        if($nombre == 7) return 'Pantalla';
    }


    /// tiempo
    static public function horaAnterior($fecha){ 
        return date("d-m-Y", strtotime($fecha."- 1 hours"));
    }

    public static function fechaFormat($fecha){  
        return strtotime($fecha);
     }


     static public function isLocalSystem(){
        if (Encrypt::decrypt(session('root_plataforma'), session('sistema.td')) == 1) {
            return true;
        } else {
            return false;
        }
     }



}