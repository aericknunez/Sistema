<?php

namespace App\Http\Controllers;

// use App\Common\Encrypt;
// use App\Common\Helpers;
use App\Models\ConfigMoneda;
use App\Models\NumeroCajas;
use App\System\Config\Config;
use App\System\Config\CrearTipoPagoModal;
use App\System\Config\ManejarIconos;
use App\System\Corte\InicializaCorte;
use App\System\Ventas\Ventas;
use Illuminate\Http\Request;

class IniciarController extends Controller
{
    
    use Config, InicializaCorte, Ventas, ManejarIconos, CrearTipoPagoModal;

    public function iniciar(){

        // return Helpers::FlashCode(Encrypt::encrypt(101, 101));

        $this->sessionApp();
        $this->sessionImpresion();
        $this->sessionPrincipal();
        $this->sessionRoot();

        if (!session('config_tipo_usuario')) {
            abort(401);
        }

        $this->CrearIconos();
        $this->crearModalMoneda();
        
        if (session('config_tipo_servicio') == 1) {
            session(['llevar_aqui' => session('principal_llevar_rapida')]);
        }
        if (session('config_tipo_servicio') == 2) {
            session(['llevar_aqui' => session('principal_llevar_mesa')]);
        }
        if (session('config_tipo_servicio') == 3) {
            session(['llevar_aqui' => session('principal_llevar_delivery')]);
        }

        // session()->forget('principal_llevar_rapida');
        // session()->forget('principal_llevar_mesa');
        // session()->forget('principal_llevar_delivery');

        
        $tipoPago = ConfigMoneda::where('activo', 1)
                                ->where('edo', 1)->first();

        session(['tipo_pago' => $tipoPago->id]);
        session(['tipo_pagoM' => $tipoPago->moneda]);


        $ventas = $this->compruebaVentaRapida();
        if ($ventas) {
            session(['orden' => $ventas->id]);
            session(['config_tipo_servicio' => 1]);
        }

        if (session('config_tipo_usuario') == 5) { // si es mesero iniciar en mesas
            session(['config_tipo_servicio' => 2]);
        }

        if ($this->getAperturaCaja()) {
            session(['apertura_caja' => 1]); // si se aperturo la caja 1 cajero, 2 solo ordenes
        }


        if (session('apertura_caja')) {
            session(['caja_select' => 1]);
            return redirect()->route('venta.rapida');
        } else {
            return redirect()->route('caja.select');
        }

        
    }



/* Apertura la caja para iniciar operaciones */
    public function aperturar(Request $request){

            if ($this->compruebaDisponibilidad(session('caja_select')) == TRUE) { // ya se abrio la caja 1 en otro usuario
                return redirect()->route('venta.rapida');
            } else {
                $this->nuevaApertura($request->efectivo_inicial, session('caja_select'));
                return redirect()->route('venta.rapida');
            }
    }



    /*
        Muestra las cajas disponibles para seleccionar una
    */
    public function editcaja(){

        $cajas = NumeroCajas::where('edo', 0)->get();
        return view('corte.select-caja', compact('cajas'));
    }
  
    /*
        Selecciona la caja disponible
    */
    public function cajaselected($caja){

        session(['caja_select' => $caja]);
        return redirect()->route('venta.rapida');
    }



    /*
        Generara ordenes sin que aperture caja. Es especial para los usuarios o meseros
    */
    public function generarordenes(){
        session(['apertura_caja' => 2]);
            if (session('config_tipo_servicio') == 2) {
                return redirect()->route('venta.mesas');
            } else {
                return redirect()->route('venta.rapida');
            }
    }




}
