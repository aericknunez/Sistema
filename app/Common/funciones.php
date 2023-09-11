<?php

use App\Models\TicketNum;
use App\Models\TicketProductosSave;
use App\Models\User;
use Carbon\Carbon;


function CodigoValidacionHora(){ // codigo de 8 digitos qu cambia cada hora
    $id = date("d-m-Y-H");
    $iden = sha1($id); 
    $hash = strtoupper(substr($iden,0,4));  

    return $hash;
}

function getColor($color){
    $color = substr($color, -1);
    if ($color == 0) { return "purple lighten-5"; }
    if ($color == 1) { return "blue lighten-5"; }   
    if ($color == 2) { return "cyan lighten-5"; }    
    if ($color == 3) { return "lime lighten-5"; }    
    if ($color == 4) { return "orange lighten-5"; }
    if ($color == 5) { return "grey lighten-1"; }
    if ($color == 6) { return "pink lighten-5"; }
    if ($color == 7) { return "indigo lighten-5"; }
    if ($color == 8) { return "light-blue lighten-5"; }
    if ($color == 9) { return "deep-orange lighten-5"; }
}

function getColorBoton($color){
    $color = substr($color, -1);
    if ($color == 0) { return "btn-elegant"; }
    if ($color == 1) { return "btn-cyan"; }   
    if ($color == 2) { return "btn-warning"; }    
    if ($color == 3) { return "btn-success"; }    
    if ($color == 4) { return "btn-mdb-color"; }
    if ($color == 5) { return "btn-primary"; }
    if ($color == 6) { return "btn-secondary"; }
    if ($color == 7) { return "btn-unique"; }
    if ($color == 8) { return "btn-purple"; }
    if ($color == 9) { return "btn-info"; }
}


function tipoVenta($tipo){
    if ($tipo == 0) { return "Ninguno"; }
    if ($tipo == 1) { return "Ticket"; }   
    if ($tipo == 2) { return "Factura"; }    
    if ($tipo == 3) { return "Credito Fiscal"; }    
    if ($tipo == 4) { return "No Sujeto"; }
}


function tipoServicio($tipo){
    if ($tipo == 1) {
        return "Venta Rapida";
    }   
    if ($tipo == 2) {
        return "Servicio a Mesa";
    }    
    if ($tipo == 3) {
        return "Delivery";
    }    
}

function paisDocumento($nombre){
    if($nombre == 1) return 'NIT';
    if($nombre == 2) return 'RTN';
    if($nombre == 3) return 'NIT';
}

function paisNombre($nombre){
    if($nombre == 1) return 'El Salvador';
    if($nombre == 2) return 'Honduras';
    if($nombre == 3) return 'Guatemala';
}



function llevarAqui($tipo){
    switch ($tipo) {
        case 1: return "Para LLevar";
        case 2: return "Comer Aqui";
        case 3: return "Delivery";
        default: return "Comer Aqui";
    }  
}

function edoOrden($tipo){
    if ($tipo == 0) { return "Eliminado"; }
    if ($tipo == 1) { return "Activo"; }   
    if ($tipo == 2) { return "Pagado"; }    
}


function dinero($numero){  
    return session('config_moneda_simbolo') ." " . number_format($numero,2,'.',',');

}

function dinero4($numero){  
    return session('config_moneda_simbolo') ." " . number_format($numero,4,'.',',');

} 

function STotal($numero, $impuestos){  
    $imp = ($impuestos / 100)+1;
    return $numero / $imp;
 } 


function Impuesto($numero, $impuestos){  
    $imp = $impuestos / 100;
    return $numero * $imp;
} 



function nFormat($numero){ 
    return number_format($numero,2,'.',',');
 } 


function nFormat4($numero){ 
    return number_format($numero,4,'.',',');
 } 


function Nentero($numero){ 
    return intval($numero);
 } 

function numeracionFactura($numero){ 
    $numero1=str_pad($numero, 8, "0", STR_PAD_LEFT);
    $format="000-001-01-$numero1";
    return $format;
 } 



 function formatFecha($value){
    return Carbon::parse($value)->format('d-m-Y H:i:s');
}

function formatJustFecha($value){
    return Carbon::parse($value)->format('d-m-Y');
}

function formatJustHora($value){
    return Carbon::parse($value)->format('H:i:s');
}

  function nombreMesa($mesa){
    if($mesa > 10){
        return "mesax.jpg";
    } else {
        return "mesa" . $mesa . ".jpg";
    }
  }



  /// consultas
  function NombreUsuario($user){  
    $nombre = User::select('name')
                    ->where('id', $user)
                    ->first();
    return $nombre->name;
 } 

 function tipoUsuario($nombre){
    if($nombre == 1) return 'Root';
    if($nombre == 2) return 'Gerente';
    if($nombre == 3) return 'Administrador';
    if($nombre == 4) return 'Cajero';
    if($nombre == 5) return 'Mesero';
    if($nombre == 6) return 'Invitado';
    if($nombre == 7) return 'Pantalla';
}

 function getTotalOrden($orden){
    return TicketProductosSave::where('orden', $orden)->sum('total');
}

function getPropinaOrden($orden){
    return TicketNum::where('orden', $orden)->sum('propina_cant');
}


 function sonido(){ // Sonido de la comanda
    return '<audio id="audioplayer" autoplay=true>
                <source src="'.asset('sound/Beep4.mp3').'" type="audio/mpeg">
                <source src="'.asset('sound/Beep4.ogg').'" type="audio/ogg">
            </audio>';
}

function isActivo($edo){
    if($edo == 1) return 'Activo'; else { return 'Inactivo'; }
}


function tipoComanda($tipo){
    if ($tipo == 0) { return 'Ninguno'; }
    if ($tipo == 1) { return 'Pantalla'; }
    if ($tipo == 2) { return 'Ticket'; }
 }

 function tipoMenu($tipo){
    if ($tipo == 1) { return 'Normal'; }
    if ($tipo == 2) { return 'Clasico'; }
 }

/// mesajes 

function mensajex($texto, $style, $boton = NULL, $boton2 = NULL){
    echo '<div class="border border-light alert alert-'.$style.' alert-dismissible">
    <div align="center">
    '.$texto.'
    <br>
    '.$boton.'  '.$boton2.'
    </div>
    </div>';
  }


     /// efectivo 
     function tipoCuenta($cuenta){
        if ($cuenta == NULL) { return 'Ninguno'; }
        if ($cuenta == 1) { return 'Tarjeta de Credito'; }
        if ($cuenta == 2) { return 'Chequera'; }
        if ($cuenta == 3) { return 'Cuenta Bancaria'; }
        if ($cuenta == 4) { return 'Caja Chica'; }
     }

     function tipoGasto($cuenta){
        if ($cuenta == 1) { return 'Sin Comprobante'; }
        if ($cuenta == 2) { return 'Con Comprobante'; }
        if ($cuenta == 3) { return 'Adelanto a Personal'; }
     }

     function tipoPago($cuenta){
        if ($cuenta == 1) { return 'Efectivo'; }
        if ($cuenta == 2) { return 'Tarjeta'; }
        if ($cuenta == 3) { return 'Transferencia'; }
        if ($cuenta == 4) { return 'Cheque'; }
        if ($cuenta == 5) { return 'Credito'; }
     }

     function edoCorte($cuenta){
        if ($cuenta == 0) { return 'Eliminado'; }
        if ($cuenta == 1) { return 'Activo'; }
        if ($cuenta == 2) { return 'Cerrado'; }
     }

     function edoCredito($edo){
        if ($edo == 0) { echo '<span class="text-danger font-weight-bold">Eliminado</span>'; }
        if ($edo == 1) { echo '<span class="text-success font-weight-bold">Activo</span>'; }
        if ($edo == 2) { echo '<span class="text-info font-weight-bold">Pagado</span>'; }
     }




     //// finciones config
    
     function edoSistema($edo){
        if ($edo == 0) { return 'Inactivo'; }
        if ($edo == 1) { return 'Activo'; }
        if ($edo == 2) { return 'Por Vencer'; }
        if ($edo == 3) { return 'Vencido'; }
     }

     function tipoSistema($edo){
        if ($edo == 1) { return 'Basico'; }
        if ($edo == 2) { return 'Profesional'; }
        if ($edo == 3) { return 'Empresa'; }
     }

     function plataforma($edo){
        if ($edo == 1) { return 'Local'; }
        if ($edo == 2) { return 'Web'; }
     }


     /// Permisos de administracion

     function isGrandAdmin(){
        if (session('config_tipo_usuario') == 1  or session('config_tipo_usuario') == 2) {
            return TRUE;
         } else {
            return FALSE;
         }
     }


     function isAdmin(){
        if (session('config_tipo_usuario') == 1  or session('config_tipo_usuario') == 2  or session('config_tipo_usuario') == 3) {
           return TRUE;
        } else {
           return FALSE;
        }
     }

     function isLowAdmin(){
        if (session('config_tipo_usuario') == 1  
        or session('config_tipo_usuario') == 2 
        or session('config_tipo_usuario') == 3 
        or session('config_tipo_usuario') == 4) {
            return TRUE;
         } else {
            return FALSE;
         }
     }

     function getLogo(){
         if (file_exists(public_path("img/logo/" . session('config_logo')))) {
            return asset("img/logo/" . session('config_logo'));
         } else {
            return asset("img/logo/hibrido_logo.png");
         }
     }

     function getPhoto($photo){
        if ($photo) {
            if (file_exists(public_path('storage/' . $photo))) {
                return asset('storage/' . $photo);
             } else {
                return asset('img/imagenes/avatar.png');
             }
         } else {
            return asset('img/imagenes/avatar.png');
         }
    }



