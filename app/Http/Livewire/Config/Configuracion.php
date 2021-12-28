<?php

namespace App\Http\Livewire\Config;

use App\Common\Encrypt;
use App\Common\Helpers;
use App\Models\ConfigApp;
use App\Models\ConfigImpresion;
use App\Models\ConfigMoneda;
use App\Models\ConfigPaneles;
use App\Models\ConfigPrincipal;
use App\Models\ConfigRoot;
use App\Models\NumeroCajas;
use App\System\Config\Config;
use App\System\Config\CrearTipoPagoModal;
use Livewire\Component;

class Configuracion extends Component
{

    use Config, CrearTipoPagoModal;

    public $datos = [];
    public $config = [];
    public $tipoBusqueda;

    /// config app model
    public $cliente,
            $slogan,
            $telefono,
            $direccion,
            $email,
            $propietario,
            $giro,
            $nit,
            $imp,
            $propina,
            $envio,
            $pais;

    /// config principal model
    public $no_mesas,
            $no_cajas,
            $ticket_pantalla,
            $registro_borrar,
            $comentarios_comanda,
            $llevar_aqui,
            $propina_rapida,
            $propina_mesa,
            $propina_delivery,
            $llevar_mesa,
            $llevar_rapida,
            $llevar_delivery,
            $llevar_aqui_propina_cambia,
            $sonido,
            $tipo_menu,
            $otras_ventas,
            $venta_especial;

    /// config Impresiones model
    public $ninguno,
            $ticket,
            $factura,
            $credito_fiscal,
            $no_sujeto,
            $imprimir_antes,
            $comanda,
            $opcional,
            $seleccionado,
            $comanda_agrupada;

        /// config Root o Sistema model
        public $expira,
                $expiracion,
                $edo_sistema,
                $tipo_sistema,
                $plataforma,
                $url_to_upload,
                $ftp_server,
                $ftp_user,
                $ftp_password;

    protected $rules = [
        'cliente' => 'required',
        'direccion' => 'required',
        'telefono' => 'required'
    ];

    public function mount(){
        $this->getConfigDatos();
        $this->getDatosPrincipal();
    }



    public function render()
    {
        return view('livewire.config.configuracion');
    }


    public function getConfigDatos(){

        $this->datos = ConfigApp::first();
        $this->datos['paisNombre'] = Helpers::paisNombre($this->datos->pais);
        $this->datos['paisDocumento'] = Helpers::paisDocumento($this->datos->pais);
    }



    public function asignData(){
        $this->cliente = $this->datos['cliente'];
        $this->slogan = $this->datos['slogan'];
        $this->telefono = $this->datos['telefono'];
        $this->direccion = $this->datos['direccion'];
        $this->email = $this->datos['email'];
        $this->propietario = $this->datos['propietario'];
        $this->giro = $this->datos['giro'];
        $this->nit = $this->datos['nit'];
        $this->imp = $this->datos['imp'];
        $this->propina = $this->datos['propina'];
        $this->envio = $this->datos['envio'];
        $this->pais = $this->datos['pais'];
    }



    public function store()
    {
        $this->validate();
        
        ConfigApp::updateOrCreate(
            ['id' => 1], [
            'cliente' => $this->cliente,
            'slogan' => $this->slogan,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'email' => $this->email,
            'propietario' => $this->propietario,
            'giro' => $this->giro,
            'nit' => $this->nit,
            'imp' => $this->imp,
            'propina' => $this->propina,
            'envio' => $this->envio,
            'pais' => $this->pais,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')]);

        $this->emit('creado'); // manda el mensaje de creado
        $this->getConfigDatos();
        $this->sessionApp(); // llama las variables de session
    }



    public function getDatosPrincipal(){
        $this->config = ConfigPrincipal::first();
        $this->tipoBusqueda = 1;
    }

    public function getDatosMoneda(){
        $this->config = ConfigMoneda::all();
        $this->tipoBusqueda = 2;
    }

    public function getDatosPaneles(){
        $this->config = ConfigPaneles::all();
        $this->tipoBusqueda = 3;
    }

    public function getDatosImpresiones(){
        $this->config = ConfigImpresion::first();
        $this->tipoBusqueda = 4;
    }

    public function getDatosRoot(){
        $data = ConfigRoot::first();
        $this->config['expira'] = Encrypt::decrypt($data['expira'], config('sistema.td'));
        $this->config['expiracion'] = Encrypt::decrypt($data['expiracion'], config('sistema.td'));
        $this->config['edo_sistema'] = Encrypt::decrypt($data['edo_sistema'], config('sistema.td'));
        $this->config['tipo_sistema'] = Encrypt::decrypt($data['tipo_sistema'], config('sistema.td'));
        $this->config['plataforma'] = Encrypt::decrypt($data['plataforma'], config('sistema.td'));
        $this->config['url_to_upload'] = Encrypt::decrypt($data['url_to_upload'], config('sistema.td'));
        $this->config['ftp_server'] = Encrypt::decrypt($data['ftp_server'], config('sistema.td'));
        $this->config['ftp_user'] = Encrypt::decrypt($data['ftp_user'], config('sistema.td'));
        $this->config['ftp_password'] = Encrypt::decrypt($data['ftp_password'], config('sistema.td'));
        $this->tipoBusqueda = 5;

    }

    public function selectData($sel){
        if ($sel == 1) {
            $this->getDatosPrincipal();
        } 
        if ($sel == 2){
            $this->getDatosMoneda();
        } 
        if ($sel == 3){
            $this->getDatosPaneles();
        } 
        if ($sel == 4){
            $this->getDatosImpresiones();
        } 
        if ($sel == 5) {
            $this->getDatosRoot();
        }
        $this->getConfigDatos();
    
    }


    public function asignPrincipal(){
        $data = ConfigPrincipal::first();
        $this->no_mesas = $data['no_mesas'];
        $this->no_cajas = $data['no_cajas'];
        $this->ticket_pantalla = $data['ticket_pantalla'];
        $this->registro_borrar = $data['registro_borrar'];
        $this->comentarios_comanda = $data['comentarios_comanda'];
        $this->llevar_aqui = $data['llevar_aqui'];
        $this->propina_rapida = $data['propina_rapida'];
        $this->propina_mesa = $data['propina_mesa'];
        $this->propina_delivery = $data['propina_delivery'];
        $this->llevar_mesa = $data['llevar_mesa'];
        $this->llevar_rapida = $data['llevar_rapida'];
        $this->llevar_delivery = $data['llevar_delivery'];
        $this->llevar_aqui_propina_cambia = $data['llevar_aqui_propina_cambia'];
        $this->sonido = $data['sonido'];
        $this->tipo_menu = $data['tipo_menu'];
        $this->otras_ventas = $data['otras_ventas'];
        $this->venta_especial = $data['venta_especial'];
    }



    public function storePrincipal()
    {        
        ConfigPrincipal::updateOrCreate(
            ['id' => 1], [
            'no_mesas' => $this->no_mesas,
            'no_cajas' => $this->no_cajas,
            'ticket_pantalla' => $this->ticket_pantalla,
            'registro_borrar' => $this->registro_borrar,
            'comentarios_comanda' => $this->comentarios_comanda,
            'llevar_aqui' => $this->llevar_aqui,
            'propina_rapida' => $this->propina_rapida,
            'propina_mesa' => $this->propina_mesa,
            'propina_delivery' => $this->propina_delivery,
            'llevar_mesa' => $this->llevar_mesa,
            'llevar_rapida' => $this->llevar_rapida,
            'llevar_delivery' => $this->llevar_delivery,
            'llevar_aqui_propina_cambia' => $this->llevar_aqui_propina_cambia,
            'sonido' => $this->sonido,
            'tipo_menu' => $this->tipo_menu,
            'otras_ventas' => $this->otras_ventas,
            'venta_especial' => $this->venta_especial,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')]);

        NumeroCajas::where('id', '!=', 1)->delete();

        for ($i=1; $i < $this->no_cajas; $i++) { 
            NumeroCajas::create([
                'numero' => $i+1,
                'edo' => 0,
                'clave' => Helpers::hashId(),
                'tiempo' => Helpers::timeId(),
                'td' => config('sistema.td')
            ]);
        }
       

        $this->emit('creado'); // manda el mensaje de creado
        $this->getConfigDatos();
        $this->getDatosPrincipal();
        $this->sessionPrincipal(); /// llama desde config a crear las variables de session
    }


    
    public function asignImpresiones(){
        $data = ConfigImpresion::first();
        $this->ninguno = $data['ninguno'];
        $this->ticket = $data['ticket'];
        $this->factura = $data['factura'];
        $this->credito_fiscal = $data['credito_fiscal'];
        $this->no_sujeto = $data['no_sujeto'];
        $this->imprimir_antes = $data['imprimir_antes'];
        $this->comanda = $data['comanda'];
        $this->opcional = $data['opcional'];
        $this->seleccionado = $data['seleccionado'];
        $this->comanda_agrupada = $data['comanda_agrupada'];
    }



    public function storeImpresiones()
    {        
        ConfigImpresion::updateOrCreate(
            ['id' => 1], [
            'ninguno' => $this->ninguno,
            'ticket' => $this->ticket,
            'factura' => $this->factura,
            'credito_fiscal' => $this->credito_fiscal,
            'no_sujeto' => $this->no_sujeto,
            'imprimir_antes' => $this->imprimir_antes,
            'comanda' => $this->comanda,
            'opcional' => $this->opcional,
            'seleccionado' => $this->seleccionado,
            'comanda_agrupada' => $this->comanda_agrupada,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')]);

        $this->emit('creado'); // manda el mensaje de creado
        $this->getConfigDatos();
        $this->getDatosImpresiones();
        $this->sessionImpresion(); /// llama desde config a crear las variables de session
    }





        
    public function asignSistema(){
        $data = ConfigRoot::first();
        $this->expira = Encrypt::decrypt($data['expira'], config('sistema.td'));
        $this->expiracion = Encrypt::decrypt($data['expiracion'], config('sistema.td'));
        $this->edo_sistema = Encrypt::decrypt($data['edo_sistema'], config('sistema.td'));
        $this->tipo_sistema = Encrypt::decrypt($data['tipo_sistema'], config('sistema.td'));
        $this->plataforma = Encrypt::decrypt($data['plataforma'], config('sistema.td'));
        $this->url_to_upload = Encrypt::decrypt($data['url_to_upload'], config('sistema.td'));
        $this->ftp_server = Encrypt::decrypt($data['ftp_server'], config('sistema.td'));
        $this->ftp_user = Encrypt::decrypt($data['ftp_user'], config('sistema.td'));
        $this->ftp_password = Encrypt::decrypt($data['ftp_password'], config('sistema.td'));
    }


    public function storeSistema()
    {        
        ConfigRoot::updateOrCreate(
            ['id' => 1], [
            'expira' => Encrypt::encrypt($this->expira,config('sistema.td')),
            'expiracion' => Encrypt::encrypt(Helpers::fechaFormat($this->expira),config('sistema.td')),
            'edo_sistema' => Encrypt::encrypt($this->edo_sistema,config('sistema.td')),
            'tipo_sistema' => Encrypt::encrypt($this->tipo_sistema,config('sistema.td')),
            'plataforma' => Encrypt::encrypt($this->plataforma,config('sistema.td')),
            'url_to_upload' => Encrypt::encrypt($this->url_to_upload,config('sistema.td')),
            'ftp_server' => Encrypt::encrypt($this->ftp_server,config('sistema.td')),
            'ftp_user' => Encrypt::encrypt($this->ftp_user,config('sistema.td')),
            'ftp_password' => Encrypt::encrypt($this->ftp_password,config('sistema.td')),
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')]);

        $this->emit('creado'); // manda el mensaje de creado
        $this->getConfigDatos();
        $this->getDatosRoot();
        $this->sessionRoot(); /// llama desde config a crear las variables de session
    }



    // Cambia el estado de la moneda de activo a inactivo
    public function cambiarMoneda($moneda){
        if ($moneda == 1) {
            $this->emit('errorMoneda'); // manda el mensaje de creado
        } else {
            $estado = ConfigMoneda::select('edo')->where('id', $moneda)->first();
            if ($estado->edo == 1) {
                ConfigMoneda::where('id', $moneda)->update(['edo' => 0]);
            } else {
                ConfigMoneda::where('id', $moneda)->update(['edo' => 1]);
            }
            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Cambio de estado realizado correctamente']);
            $this->getDatosMoneda();
            $this->getConfigDatos();


            $cantidad = ConfigMoneda::where('edo', 1)->count();
            if ($cantidad == 1) {
                ConfigApp::where('id', 1)->update(['multiple_pago' => 0]);
            } else {
                ConfigApp::where('id', 1)->update(['multiple_pago' => 1]);
            }
            $this->sessionApp();
            $this->crearModalMoneda(); /// creo el modal de las monedas seleccionadas
        }
    }


    // Cambia el estado del panel de cocina de activo a inactivo
    public function cambiarPanel($panel){

            $estado = ConfigPaneles::select('edo')->where('id', $panel)->first();
            if ($estado->edo == 1) {
                ConfigPaneles::where('id', $panel)->update(['edo' => 0]);
            } else {
                ConfigPaneles::where('id', $panel)->update(['edo' => 1]);
            }
            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Cambio de estado realizado correctamente']);
            $this->getDatosPaneles();
            $this->getConfigDatos();
    }




}
