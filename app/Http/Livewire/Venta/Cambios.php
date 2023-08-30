<?php

namespace App\Http\Livewire\Venta;

use App\Common\Helpers;
use App\Models\Cliente;
use App\Models\ConfigMoneda;
use App\Models\TicketNum;
use App\Models\TicketOrden;
use App\Models\TicketProducto;
use App\System\Imprimir\Imprimir;
use App\System\Ventas\Ventas;
use Livewire\Component;
Use App\System\Inventario\Administrar;


class Cambios extends Component
{

    use Ventas; 
    use Imprimir; 
    use Administrar;

    public $productAgregado;
    public $productosFactura;
    public $clientes; 
    public $clientSelected;


    public $total, $subtotal;
    public $propinaPorcentaje, $propinaCantidad, $propinaTipo, $propinaInput; // cantidad propina 

    public $cantidad; // cantidad de efectivo

    /// busqueda de asignacion del cliente
    public $search, $busqueda;

    public $numeroLineas;


    public function mount(){
        $this->clientes = session('clientes');
        $this->clientSelected = session('cliente');
        $this->determinaPropina();

        $this->productosAdded();
        $this->productFactura();

        $this->obtenerTotal();
        $this->getAqui();

        $this->search = NULL;
    }


    
    public function render()
    {
        if ($this->search) {
            $this->busqueda = Cliente::where('nombre', '!=', NULL)
                    ->where('nombre', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('telefono', 'LIKE', '%'.$this->search.'%')
                    ->get();
        }
        return view('livewire.venta.cambios');
    }


    public function selectCliente($cliente){ // selecciona el cliente marcado
        session(['cliente' => $cliente]);
        $this->clientSelected = $cliente;
        $this->determinaPropina();

        $this->numeroLineas = $this->numeroLineasFactura($this->clientSelected);
        // $this->reset(['productAgregado']);
        // $this->productosAdded();
        $this->productFactura();
        $this->obtenerTotal();
    }


    public function asignarProducto($producto){ // selecciona el producto
        
        TicketProducto::where('orden', session('orden'))
                        ->where('edo', 1)
                        ->where('id', $producto)
                        ->update(['cliente' => $this->clientSelected, 'tiempo' => Helpers::timeId()]);

        $this->determinaPropina();

        $this->productosAdded();
        $this->productFactura();
        $this->obtenerTotal();
    }



    public function productosAdded(){ /// productos agregados a la orden
        $this->productAgregado = TicketProducto::where('orden', session('orden'))
                                    ->where('num_fact', NULL)
                                    ->where('edo', 1)
                                    ->with('subOpcion')->get();
    }


    
    public function productFactura(){ /// productos de la factura del cliente
        $product = TicketProducto::where('orden', session('orden'))
                                  ->where('cliente', $this->clientSelected)
                                  ->where('num_fact', NULL)
                                  ->where('edo', 1)
                                  ->with('subOpcion')->get();
        $this->productosFactura = $product;
    }


    public function obtenerTotal(){ // Obtiene el total de toda la venta   
        $this->subtotal = TicketProducto::where('orden', session('orden'))
                                        ->where('cliente', $this->clientSelected)
                                        ->where('num_fact', NULL)
                                        ->where('edo', 1)
                                        ->sum('total');
        
        if($this->propinaPorcentaje >= 0){
            $this->propinaCantidad = Helpers::propina($this->subtotal, $this->propinaPorcentaje);
            $this->total = $this->subtotal + $this->propinaCantidad;
        } else {
            $this->total = $this->subtotal;
        }
    }


    public function determinaPropina(){ // determina la proina segun en el tipo de cervicio
        if (session('config_tipo_servicio') == 2) { // mesa
            if (session('principal_propina_mesa') == 1) {
                $this->propinaPorcentaje = session('config_propina'); // se restablece cuando se agrega el primer producto
                $this->propinaTipo = 1;
            }
        }    
    }

    public function btnPropina(){ /// establece un procentaje de propina
        if ($this->propinaTipo == "on") {
            $this->propinaPorcentaje = Helpers::propinaPorcentaje($this->subtotal, $this->propinaInput);
        } else {
            $this->propinaPorcentaje = $this->propinaInput;
        }
        $this->productosAdded();
        $this->obtenerTotal();
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalPropina']);
    } 

    public function BtnAquiLlevar(){ // 1 llevar, 2 comer aqui
        if (session('llevar_aqui') == 1) { // se establece para comer aqui
            session(['llevar_aqui' => 2]);
        } else { // se establece para llevar
            session(['llevar_aqui' => 1]);
        }
    
        // se agrega o quita lo de la propina si es para llevar
        if (session('principal_llevar_aqui_propina_cambia')) {
            if (session('llevar_aqui') == 1) { // se establece para comer aqui
                $this->propinaPorcentaje = 0;
            } else { // se establece para llevar
                $this->propinaPorcentaje = session('config_propina');
            }
            $this->obtenerTotal();
        }
        // Actualizar
        $this->updateLLevarAquiOrden();
        $this->llevarComerAqui = session('llevar_aqui');
    } 


    public function getAqui(){
        $data = $this->getLlevarAqui();
        $this->llevarComerAqui = $data->llevar_aqui;
        session(['llevar_aqui', $data->llevar_aqui]);
    }
    
    
    public function btnTipoVenta($tipo){ /// Cambia el tipo de venta (documento a emimtir)
        session(['impresion_seleccionado' => $tipo]);
        $this->numeroLineas = $this->numeroLineasFactura($this->clientSelected);
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalTipoVenta']);
    } 
    
    
    public function btnTipoPago($tipo){ /// Cambia el tipo pago (Efectivo, tarjeta, etc)
        $tipoPago = ConfigMoneda::where('id', $tipo)->first();
    
        session(['tipo_pagoM' => $tipoPago->moneda]);
        session(['tipo_pago' => $tipo]);
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalTipoPago']);
    } 



    public function pagar(){

        $factura = $this->getUltimaFacturaNumber();

       
        ($factura) ? $num_fact = $factura->factura + 1 :  $num_fact = 1;
        
        if ($this->cantidad == NULL) {
            $this->cantidad = $this->total;
        }
    
        TicketNum::create([
            'factura' => $num_fact, 
            'orden' => session('orden'),
            'tipo_pago' => session('tipo_pago'),
            'efectivo' => $this->cantidad,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
            'propina_cant' => $this->propinaCantidad,
            'propina_porcent' => $this->propinaPorcentaje,
            'cajero' => session('config_usuario_id'),
            'tipo_venta' => session('impresion_seleccionado'),
            'cliente_id' => session('client_id'),
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ]);

       
        TicketProducto::where('orden', session('orden'))
                        ->where('cliente', session('cliente'))
                        ->update(['num_fact' => $num_fact, 
                                'cancela' => session('cliente'), 
                                'cajero' => session('config_usuario_id'),
                                'tipo_pago' => session('tipo_pago'),
                                'tipo_venta' => session('impresion_seleccionado'), 
                                'tiempo' => Helpers::timeId()
        ]);


    $this->dispatchBrowserEvent('modal-cambio-venta', [
                    'subtotal' => Helpers::Dinero($this->subtotal),
                    'propina' => Helpers::Dinero($this->propinaCantidad),
                    'total' => Helpers::Dinero($this->total),
                    'efectivo' => Helpers::Dinero($this->cantidad),
                    'cambio' => Helpers::Dinero($this->cantidad - $this->total)
    ]);

        if (session('print')) { /// imprime a menos que el env diga que no
            $this->ImprimirFactura($num_fact); // imprime la factura
        }

        if (session('client_id')) {
            $this->delSessionFactura();
        }

            /// descontar productos del inventario si esta activado
            if (session('invDesc')) {
                $this->descontarProductosInventario($num_fact, session('impresion_seleccionado'));
            }
        
    }  
    
    
    public function btnCerrarModal(){ /// Cierra el modal de fin de venta
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalCambioVenta']);
    
        $this->productosAdded();
        $this->productFactura();

        $this->obtenerTotal();
        $this->reset('cantidad');

        $this->verificaCantidad();
    } 



    public function verificaCantidad(){
        $cantidad = TicketProducto::where('orden', session('orden'))
                                    ->where('num_fact', NULL)
                                    ->count();
    
        if (session('client_id')) {
            $this->delSessionFactura();
        }
        if ($cantidad == 0) {
            TicketOrden::where('id', session('orden'))
                        ->update(['edo' => 2, 'tiempo' => Helpers::timeId()]);

            session()->forget('orden');
            $this->reset();
        
            return redirect()->route('venta.mesas');
        }
    }


    public function btnImprimirPreCuenta(){ /// Imprime la precuenta
        $this->ImprimirPrecuenta($this->propinaCantidad, $this->propinaPorcentaje, $this->clientSelected);
        $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Imprimiendo', 'texto' => 'Imprimiendo Pre Cuenta']);
    
    } 



    public function btnClienteIdSelect($clientex){
        $this->clientSessionFactura($clientex);   
        $this->reset(['search', 'busqueda']);
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'addClientAsign']);
        if (session('factura_documento')) {
            $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Realizado', 'texto' => 'Cliente Agregado Correctamente']);
        } else {
            $this->dispatchBrowserEvent('mensaje', ['clase' => 'success', 'titulo' => 'Error', 'texto' => 'El cliente no tiene Documento Asignado']);
        }
    }
    
    public function cancelar(){
        $this->reset(['search', 'busqueda']);
    }
    
    public function quitarCliente(){
        $this->delSessionFactura();
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'addClientAsign']);
        $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Realizado', 'texto' => 'Cliente Desvinculado Correctamente']);
    }
    
    






}
