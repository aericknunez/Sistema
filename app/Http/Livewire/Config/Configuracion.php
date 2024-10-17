<?php

namespace App\Http\Livewire\Config;

use App\Common\Encrypt;
use App\Common\Helpers;
use App\Models\ConfigApp;
use App\Models\ConfigImpresion;
use App\Models\ConfigMoneda;
use App\Models\ConfigPaneles;
use App\Models\ConfigPrincipal;
use App\Models\ConfigPrivate;
use App\Models\ConfigRoot;
use App\Models\NumeroCajas;
use App\System\Config\Config;
use App\System\Config\CrearTipoPagoModal;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Configuracion extends Component
{

    use Config, CrearTipoPagoModal, WithFileUploads;

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
            $pais, 
            $tipo_servicio,
            $logo;

    /// config principal model
    public $no_mesas,
            $no_cajas,
            $ticket_pantalla,
            $registro_borrar,
            $solicitar_clave,
            $ordenes_todo,
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
            $levantar_modal,
            $tipo_menu,
            $otras_ventas,
            $agrupar_orden,
            $restringir_inventario,
            $venta_especial,
            $lineas_factura,
            $lineas_ccf,
            $ordenar_menu,
            $ver_mesas,
            $ver_delivery;

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

        public $sys_login,
                $just_data,
                $data_special,
                $sync_time,
                $print,
                $pusher,
                $livewire_path;
        

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
        $this->tipo_servicio = $this->datos['tipo_servicio'];
    }



    public function store()
    {
        if ($this->logo) {
            $this->validate([
                'logo' => 'image|max:1024', // 1MB Max
            ]);
            $oldImg = ConfigApp::select('logo')->find(1)->logo;
     
            $extension = $this->logo->extension();
            $image = $this->logo->store('public/logos');
            $name = Str::random(20) ."." . $extension;
            Storage::move($image, 'public/logos/' . $name );            
            if (ConfigApp::where('id', 1)->update(['logo' => $name])) {
                if(Storage::exists('public/logos/'. $oldImg)){
                    Storage::delete('public/logos/'. $oldImg);
                }
            }
        }
        
        
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
                'tipo_servicio' => $this->tipo_servicio,
                'clave' => Helpers::hashId(),
                'tiempo' => Helpers::timeId(),
                'td' => session('sistema.td')]);
                $this->emit('creado'); // manda el mensaje de creado
                $this->getConfigDatos();
                $this->sessionApp(); // llama las variables de session
                $this->reset(['logo']);
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
        $this->config['expira'] = Encrypt::decrypt($data['expira'], session('sistema.td'));
        $this->config['expiracion'] = Encrypt::decrypt($data['expiracion'], session('sistema.td'));
        $this->config['edo_sistema'] = Encrypt::decrypt($data['edo_sistema'], session('sistema.td'));
        $this->config['tipo_sistema'] = Encrypt::decrypt($data['tipo_sistema'], session('sistema.td'));
        $this->config['plataforma'] = Encrypt::decrypt($data['plataforma'], session('sistema.td'));
        $this->config['url_to_upload'] = Encrypt::decrypt($data['url_to_upload'], session('sistema.td'));
        $this->config['ftp_server'] = Encrypt::decrypt($data['ftp_server'], session('sistema.td'));
        $this->config['ftp_user'] = Encrypt::decrypt($data['ftp_user'], session('sistema.td'));
        $this->config['ftp_password'] = Encrypt::decrypt($data['ftp_password'], session('sistema.td'));

        $priv = ConfigPrivate::first();
        if (!$priv) {
            $this->config['private'] = ConfigPrivate::create([
                'sys_login' => 1,
                'just_data' => 0,
                'data_special' => 0,
                'sync_time' => 5,
                'print' => 1,
                'pusher' => 0,
                'livewire_path' => 'http://sistema.test'
            ]);

        } else {
            $this->config['private'] = $priv;
        }

        // $this->config = ConfigPrivate::first();
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
        $this->solicitar_clave = $data['solicitar_clave'];
        $this->ordenes_todo = $data['ordenes_todo'];
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
        $this->levantar_modal = $data['levantar_modal'];
        $this->tipo_menu = $data['tipo_menu'];
        $this->otras_ventas = $data['otras_ventas'];
        $this->venta_especial = $data['venta_especial'];
        $this->agrupar_orden = $data['agrupar_orden'];
        $this->restringir_inventario = $data['restringir_inventario'];
        $this->lineas_factura = $data['lineas_factura'];
        $this->lineas_ccf = $data['lineas_ccf'];
        $this->ordenar_menu = $data['ordenar_menu'];
        $this->ver_mesas = $data['ver_mesas'];
        $this->ver_delivery = $data['ver_delivery'];
    }



    public function storePrincipal()
    {        
        ConfigPrincipal::updateOrCreate(
            ['id' => 1], [
            'no_mesas' => $this->no_mesas,
            'no_cajas' => $this->no_cajas,
            'ticket_pantalla' => $this->ticket_pantalla,
            'registro_borrar' => $this->registro_borrar,
            'solicitar_clave' => $this->solicitar_clave,
            'ordenes_todo' => $this->ordenes_todo,
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
            'levantar_modal' => $this->levantar_modal,
            'tipo_menu' => $this->tipo_menu,
            'otras_ventas' => $this->otras_ventas,
            'venta_especial' => $this->venta_especial,
            'agrupar_orden' => $this->agrupar_orden,
            'restringir_inventario' => $this->restringir_inventario,
            'lineas_factura' => $this->lineas_factura,
            'lineas_ccf' => $this->lineas_ccf,
            'ordenar_menu' => $this->ordenar_menu,
            'ver_mesas' => $this->ver_mesas,
            'ver_delivery' => $this->ver_delivery,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')]);

        NumeroCajas::where('id', '!=', 1)->delete();

        for ($i=1; $i < $this->no_cajas; $i++) { 
            NumeroCajas::create([
                'numero' => $i+1,
                'edo' => 0,
                'clave' => Helpers::hashId(),
                'tiempo' => Helpers::timeId(),
                'td' => session('sistema.td')
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
            'td' => session('sistema.td')]);

        $this->emit('creado'); // manda el mensaje de creado
        $this->getConfigDatos();
        $this->getDatosImpresiones();
        $this->sessionImpresion(); /// llama desde config a crear las variables de session
    }





        
    public function asignSistema(){
        $data = ConfigRoot::first();
        $this->expira = Encrypt::decrypt($data['expira'], session('sistema.td'));
        $this->expiracion = Encrypt::decrypt($data['expiracion'], session('sistema.td'));
        $this->edo_sistema = Encrypt::decrypt($data['edo_sistema'], session('sistema.td'));
        $this->tipo_sistema = Encrypt::decrypt($data['tipo_sistema'], session('sistema.td'));
        $this->plataforma = Encrypt::decrypt($data['plataforma'], session('sistema.td'));
        $this->url_to_upload = Encrypt::decrypt($data['url_to_upload'], session('sistema.td'));
        $this->ftp_server = Encrypt::decrypt($data['ftp_server'], session('sistema.td'));
        $this->ftp_user = Encrypt::decrypt($data['ftp_user'], session('sistema.td'));
        $this->ftp_password = Encrypt::decrypt($data['ftp_password'], session('sistema.td'));


        $datos = ConfigPrivate::first();
        $this->sys_login = $datos['sys_login'];
        $this->just_data = $datos['just_data'];
        $this->data_special = $datos['data_special'];
        $this->sync_time = $datos['sync_time'];
        $this->print = $datos['print'];
        $this->pusher = $datos['pusher'];
        $this->livewire_path = $datos['livewire_path'];
    
    }


    public function storeSistema()
    {        
        ConfigRoot::updateOrCreate(
            ['id' => 1], [
            'expira' => Encrypt::encrypt($this->expira,session('sistema.td')),
            'expiracion' => Encrypt::encrypt(Helpers::fechaFormat($this->expira),session('sistema.td')),
            'edo_sistema' => Encrypt::encrypt($this->edo_sistema,session('sistema.td')),
            'tipo_sistema' => Encrypt::encrypt($this->tipo_sistema,session('sistema.td')),
            'plataforma' => Encrypt::encrypt($this->plataforma,session('sistema.td')),
            'url_to_upload' => Encrypt::encrypt($this->url_to_upload,session('sistema.td')),
            'ftp_server' => Encrypt::encrypt($this->ftp_server,session('sistema.td')),
            'ftp_user' => Encrypt::encrypt($this->ftp_user,session('sistema.td')),
            'ftp_password' => Encrypt::encrypt($this->ftp_password,session('sistema.td')),
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')]);


        ConfigPrivate::updateOrCreate(
                ['id' => 1], [
                'sys_login' => $this->sys_login,
                'just_data' => $this->just_data,
                'data_special' => $this->data_special,
                'sync_time' => $this->sync_time,
                'print' => $this->print,
                'pusher' => $this->pusher,
                'livewire_path' => $this->livewire_path
            ]);

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
                ConfigMoneda::where('id', $moneda)->update(['edo' => 0, 'tiempo' => Helpers::timeId()]);
            } else {
                ConfigMoneda::where('id', $moneda)->update(['edo' => 1, 'tiempo' => Helpers::timeId()]);
            }
            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Cambio de estado realizado correctamente']);
            $this->getDatosMoneda();
            $this->getConfigDatos();


            $cantidad = ConfigMoneda::where('edo', 1)->count();
            if ($cantidad == 1) {
                ConfigApp::where('id', 1)->update(['multiple_pago' => 0, 'tiempo' => Helpers::timeId()]);
            } else {
                ConfigApp::where('id', 1)->update(['multiple_pago' => 1, 'tiempo' => Helpers::timeId()]);
            }
            $this->sessionApp();
            $this->crearModalMoneda(); /// creo el modal de las monedas seleccionadas
        }
    }


    // Cambia el estado del panel de cocina de activo a inactivo
    public function cambiarPanel($panel){

            $estado = ConfigPaneles::select('edo')->where('id', $panel)->first();
            if ($estado->edo == 1) {
                ConfigPaneles::where('id', $panel)->update(['edo' => 0, 'tiempo' => Helpers::timeId()]);
            } else {
                ConfigPaneles::where('id', $panel)->update(['edo' => 1, 'tiempo' => Helpers::timeId()]);
            }
            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Cambio de estado realizado correctamente']);
            $this->getDatosPaneles();
            $this->getConfigDatos();
    }




}
