<?php
namespace App\System\Config;

use App\Common\Encrypt;
use App\Models\ConfigApp;
use App\Common\Helpers;
use App\Models\ConfigImpresion;
use App\Models\ConfigPrincipal;
use App\Models\ConfigRoot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait Config{


    public function sessionApp(){
        
        $conf = ConfigApp::find(1);
        Session::put([
            'config_impuesto' => $conf->imp, 
            'config_propina' => $conf->propina,
            'config_envio' => $conf->envio,
            'config_moneda_simbolo' => Helpers::paisSimbolo($conf->pais),
            'config_nombre_impuesto' => Helpers::paisImpuesto($conf->pais),
            'config_multiple_pago' => $conf->multiple_pago,
            'config_pais' => $conf->pais,
            'config_skin' => $conf->skin,
            'config_logo' => $conf->logo,
            'config_tipo_servicio' => $conf->tipo_servicio, // 1 rapido, 2 mesa, 3 delivery en el que iniciara
            'config_usuario_id' => Auth::user()->id,
            'config_tipo_usuario' => Auth::user()->tipo_usuario,

        ]);
    }

    public function sessionImpresion(){

        $impresion = ConfigImpresion::find(1);
        Session::put([
            'impresion_ninguno' => $impresion->ninguno, 
            'impresion_ticket' => $impresion->ticket,
            'impresion_factura' => $impresion->factura, 
            'impresion_credito_fiscal' => $impresion->credito_fiscal, 
            'impresion_no_sujeto' => $impresion->no_sujeto,
            'impresion_imprimir_antes' => $impresion->imprimir_antes,
            'impresion_comanda' => $impresion->comanda,
            'impresion_opcional' => $impresion->opcional,
            'impresion_seleccionado' => $impresion->seleccionado,
            'impresion_comanda_agrupada' => $impresion->comanda_agrupada
        ]);
    }

    public function sessionPrincipal(){
        $principal = ConfigPrincipal::find(1);

        Session::put([
            'principal_no_mesas' => $principal->no_mesas,
            'principal_no_cajas' => $principal->no_cajas, 
            'principal_ticket_pantalla' => $principal->ticket_pantalla, 
            'principal_registro_borrar' => $principal->registro_borrar,
            'principal_solicitar_clave' => $principal->solicitar_clave,
            'principal_comentarios_comanda' => $principal->comentarios_comanda,
            'principal_llevar_aqui' => $principal->llevar_aqui, //1 Llevar, 2 Comer Aqui

            'principal_llevar_mesa' => $principal->llevar_mesa,
            'principal_llevar_rapida' => $principal->llevar_rapida,
            'principal_llevar_delivery' => $principal->llevar_delivery,

            'principal_propina_rapida' => $principal->propina_rapida,
            'principal_propina_mesa' => $principal->propina_mesa,
            'principal_propina_delivery' => $principal->propina_delivery,
            'principal_llevar_aqui_propina_cambia' => $principal->llevar_aqui_propina_cambia,


            'principal_sonido' => $principal->sonido,
            'principal_levantar_modal' => $principal->levantar_modal,
            'principal_tipo_menu' => $principal->tipo_menu,
            'principal_otras_ventas' => $principal->otras_ventas,
            'principal_venta_especial' => $principal->venta_especial
        ]);
    }


    public function sessionRoot(){
        $root = ConfigRoot::find(1);

        Session::put([
            'root_expira' => $root->expira, 
            'root_expiracion' => $root->expiracion,
            'root_edo_sistema' => $root->edo_sistema, 
            'root_tipo_sistema' => $root->tipo_sistema, 
            'root_plataforma' => $root->plataforma,
            'root_url_to_upload' => $root->url_to_upload,
            'root_ftp_server' => $root->ftp_server,
            'root_ftp_user' => $root->ftp_user,
            'root_ftp_password' => $root->ftp_password
        ]);
    }








}