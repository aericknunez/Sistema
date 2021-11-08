<?php

namespace App\Http\Livewire\Venta;

use App\Common\Helpers;
use App\Models\ConfigMoneda;
use App\Models\TicketNum;
use App\Models\TicketOpcion;
use Livewire\Component;


use App\Models\TicketProducto;
use App\Models\TicketOrden;
use App\System\Ventas\Imprimir;
use App\System\Ventas\Ventas;

class AddProducto extends Component
{
    use Ventas, Imprimir;


    public $productAgregado;
    public $total, $subtotal;
    public $propinaPorcentaje, $propinaCantidad, $propinaTipo, $propinaInput; // cantidad propina 


    public $modalProducto, $modalOpcion;

    public $cantidad; // cantidad de efectivo

    public $llevarComerAqui; // establece el valor de la variable de session LLevar_aqi,mesa,delivery
    public $comentario, $nombre; // comentario y nombre de la mesa
    
    /// establecer la propina segun la opcion donde vaya a afaturar
    public $envio; // sin valor aun


    public $cantidadSinGuardar; // Es la cantidad de priductos que hay por guardar

    public $productSelected; // productos para el detalle en el modal

    public function mount(){
        if (session('orden')) {
            $this->determinaPropina();
            $this->productosAdded();
            $this->obtenerTotal();
            $this->llevarComerAqui = session('llevar_aqui'); // recoredar cargarlo desde la base de datos!!!!!!!!
            // $this->comentario; cargarlo desde la db
        }
        session(['cliente' => 1]);

        if (session('config_tipo_servicio') != 2) { // si no viene de mesa el cliente es 1
            session(['clientes' => 1]);
        }

        if (session('config_tipo_servicio') == 3) { // si es delivery
            $this->envio = session('config_envio'); // precio del envio del delivery
        }
    }


    public function render()
    {
        return view('livewire.venta.add-producto');
    }


    public function addProducto($cod){ // agregar producto a la venta
        $this->asignarOrden();
        $modal = $this->agregarProducto($cod); // si agrega opciones trae la data

        $this->productosAdded();
        $this->obtenerTotal();

        if($modal){
            $this->modalProducto = $modal['producto_id'];
            $this->modalOpcion = $modal['opcion_id'];
            $this->dispatchBrowserEvent('modal-opcion-add', ['opcion_id' => $this->modalOpcion]);
        } else {
            $this->dispatchBrowserEvent('focus');
        }
    }

    public function delProducto($id){ // eliminar un producto de la venta
        $this->eliminarProducto($id);
        $this->verificaCantidad();
        $this->updateImprimirOrden();

        if (session('orden')) {
            $this->productosAdded();
            $this->obtenerTotal();
        }
        
    }

    public function delOrden(){ // Eliminar la orden de la venta
        $this->eliminarOrden();
        
        if (session('principal_ticket_pantalla') == 2) {
            $this->ImprimirComanda();
        }

        $this->verificaCantidad(1);
    }

    public function productosAdded(){ /// productos agregados a la orden
        $product = $this->getProductosAgregados();
        $this->productAgregado = $product;
    }

    public function obtenerTotal(){ // Obtiene el total de toda la venta   
        $this->subtotal = $this->totalDeVenta();

        if($this->propinaPorcentaje > 0){
            $this->propinaCantidad = Helpers::propina($this->subtotal, $this->propinaPorcentaje);
            $this->total = $this->subtotal + $this->propinaCantidad;
        } else {
            $this->total = $this->subtotal;
        }

        $this->obtenerCantidadImprimir();
    }


    public function obtenerCantidadImprimir(){ // Cantidad de productos que no se han guardado
        $this->cantidadSinGuardar = $this->cantidaProductosSinGuardar();
    }


    public function addOpcion($opcion){ // Actualizar Opcion
        TicketOpcion::where('opcion_primaria', $this->modalOpcion)
                    ->where('ticket_producto_id', $this->modalProducto)
                    ->where('opcion_producto_id', NULL)->limit(1)
                    ->update(['opcion_producto_id' => $opcion]);
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'opcion-' . $this->modalOpcion]);

        $modal = $this->levantarModalOpcion($this->modalProducto);
        if($modal){
            $this->modalProducto = $modal['producto_id'];
            $this->modalOpcion = $modal['opcion_id'];
            $this->dispatchBrowserEvent('modal-opcion-add', ['opcion_id' => $this->modalOpcion]);
        } else {
            $this->modalProducto = NULL;
            $this->modalOpcion = NULL;
        }
        $this->productosAdded();
        $this->obtenerTotal();
    }

    public function omitirOpcion(){ // Omite la opcion y la borra Opcion
        TicketOpcion::where('opcion_primaria', $this->modalOpcion)
                    ->where('ticket_producto_id', $this->modalProducto)
                    ->delete();
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'opcion-' . $this->modalOpcion]);


        $modal = $this->levantarModalOpcion($this->modalProducto);
        if($modal){
            $this->modalProducto = $modal['producto_id'];
            $this->modalOpcion = $modal['opcion_id'];
            $this->dispatchBrowserEvent('modal-opcion-add', ['opcion_id' => $this->modalOpcion]);
        } else {
            $this->modalProducto = NULL;
            $this->modalOpcion = NULL;
        }
    }

    public function determinaPropina(){ // determina la proina segun en el tipo de cervicio
        if (session('config_tipo_servicio') == 1) { // rapido
            if (session('principal_propina_rapida') == 1) {
                $this->propinaPorcentaje = session('config_propina'); // se restablece cuando se agrega el primer producto
                $this->propinaTipo = 1;
            }
        }
        if (session('config_tipo_servicio') == 2) { // mesa
            if (session('principal_propina_mesa') == 1) {
                $this->propinaPorcentaje = session('config_propina'); // se restablece cuando se agrega el primer producto
                $this->propinaTipo = 1;
            }
        }    
        if (session('config_tipo_servicio') == 3) { // delivery
            if (session('principal_propina_delivery') == 1) {
                $this->propinaPorcentaje = session('config_propina'); // se restablece cuando se agrega el primer producto
                $this->propinaTipo = 1;
            }
        }
    }


    // Botones
public function btnGuardar(){ /// guardar la orden
    $this->guardarProductosImprimir();  
    $this->productosAdded();

    $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Imprimiendo', 'texto' => 'Imprimiendo Comandas']);
    $this->updateImprimirOrden();

    $this->obtenerCantidadImprimir();

    if (session('principal_ticket_pantalla') == 2) {
        $this->ImprimirComanda();
    }
} 


public function btnImprimirPreCuenta(){ /// Imprime la precuenta
    $this->ImprimirPrecuenta(NULL);
    $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Imprimiendo', 'texto' => 'Imprimiendo Pre Cuenta']);

} 



public function BtnAquiLlevar(){
    if (session('llevar_aqui') == 1) {
        session(['llevar_aqui' => 2]);
    } else {
        session(['llevar_aqui' => 1]);
    }
    // Actualizar
    $this->updateLLevarAquiOrden();
    $this->llevarComerAqui = session('llevar_aqui');
} 

public function btnTipoVenta($tipo){ /// Cambia el tipo de venta (documento a emimtir)
    session(['impresion_seleccionado' => $tipo]);
    $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalTipoVenta']);
} 


public function btnTipoPago($tipo){ /// Cambia el tipo pago (Efectivo, tarjeta, etc)
    $tipoPago = ConfigMoneda::where('id', $tipo)->first();

    session(['tipo_pagoM' => $tipoPago->moneda]);
    session(['tipo_pago' => $tipo]);
    $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalTipoPago']);
} 


public function btnComentario(){ /// agrega un comentario a la comanda
    TicketOrden::where('id', session('orden'))
                    ->update(['comentario' => $this->comentario]);
    $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalComentario']);
} 

public function btnNombre(){ /// agrega nombre a la comanda
    TicketOrden::where('id', session('orden'))
                    ->update(['nombre_mesa' => $this->nombre]);
    $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalNombre']);
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


public function btnAddEnvio($cantidad){ /// agraga la cantidad establecia de delivery
    session(['config_envio' => $cantidad]);
    $this->envio = $cantidad;    
} 

public function btnEnvio(){ /// agrega el campo de envio a la orden
    $this->cuotaEnvio();  
    $this->productosAdded();
    $this->obtenerTotal(); 
} 


///// MESA //// 
public function selectCliente($cliente){ // selecciona el cliente marcado
    session(['cliente' => $cliente]);
}


public function productSelect($producto){ /// Productos para mostrar el detalle en el modal
    $this->productSelected = $this->getProductosModal($producto);
}

public function delProductoDetalle($id, $cod){ // eliminar un producto de la venta desde modal detalles
    TicketProducto::destroy($id);
    $this->productSelect($cod); // para actualizar los productos para modal
    $this->verificaCantidad();

    if (session('orden')) {
        $this->productosAdded();
        $this->obtenerTotal();
    }
}

/////////// objetos para el funcionamiento
public function asignarOrden(){
    if(!session('orden')){
        $this->agregarOrden();
        $this->determinaPropina();
        session(['cliente' => 1]);

        if (session('config_tipo_servicio') != 2) { // si no viene de mesa el cliente es 1
            session(['clientes' => 1]);
        }
    }
}



public function verificaCantidad($evitar = NULL){
    $cantidad = TicketProducto::where('orden', session('orden'))
                                ->where('edo', 1)->count();

    if ($cantidad == 0) {
        if (!$evitar) {
            $this->eliminarOrden();
        }
        session()->forget('orden');
        $this->reset();

        if (session('config_tipo_servicio') == 2) { // lo mantengo en mesas
            return redirect()->route('venta.mesas');
        }
        if (session('config_tipo_servicio') == 3) { // redirecciono a delivery
            return redirect()->route('venta.delivery');
        }
    }
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
        'edo' => 1,
        'clave' => Helpers::hashId(),
        'tiempo' => Helpers::timeId(),
        'td' => config('sistema.td')
    ]);
    
    $this->actualizarDatosVenta($num_fact); // actualiza los campos de los productos

    TicketOrden::where('id', session('orden'))
                ->update(['edo' => 2]);

    $this->ImprimirFactura($num_fact); // imprime la factura

    $xst = Helpers::Format($this->subtotal);
    $xpr = Helpers::Format($this->propinaCantidad);
    $xto = Helpers::Format($this->total);
    $xca = Helpers::Format($this->cantidad);

    $this->dispatchBrowserEvent('modal-cambio-venta', [
        'subtotal' => dinero($xst),
        'propina' => dinero($xpr),
        'total' => dinero($xto),
        'efectivo' => dinero($xca),
        'cambio' => dinero($xca - $xto)
    ]);
    
    session()->forget('orden');
    session()->forget('cliente');
    $this->reset();
} 


public function btnCerrarModal(){ /// Cierra el modal de fin de venta
    $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalCambioVenta']);

    if (session('config_tipo_servicio') == 2) { // lo mantengo en mesas
        return redirect()->route('venta.mesas');
    }
    if (session('config_tipo_servicio') == 3) { // redirecciono a delivery
        return redirect()->route('venta.delivery');
    }
} 






}
