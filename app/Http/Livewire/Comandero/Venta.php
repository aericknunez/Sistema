<?php

namespace App\Http\Livewire\Comandero;

use App\Common\Helpers;
use App\Models\ConfigMoneda;
use App\Models\Producto;
use App\Models\TicketOpcion;
use Livewire\Component;


use App\Models\TicketProducto;
use App\Models\TicketOrden;
use App\System\Config\Validaciones;
use App\System\Eventos\SendEventos;
use App\System\Imprimir\Imprimir;
use App\System\Ventas\RestriccionInventario;
use App\System\Ventas\Ventas;


class Venta extends Component
{
    use Ventas, Imprimir, Validaciones, SendEventos, RestriccionInventario;


    public $productAgregado;
    public $total, $subtotal;
    public $propinaPorcentaje, $propinaCantidad, $propinaTipo, $propinaInput; // cantidad propina 


    public $modalProducto, $modalOpcion;

    public $cantidad; // cantidad de efectivo

    public $llevarComerAqui; // establece el valor de la variable de session LLevar_aqi,mesa,delivery
    public $comentario, $nombre; // comentario y nombre de la mesa
    


    public $cantidadSinGuardar; // Es la cantidad de priductos que hay por guardar

    public $productSelected; // productos para el detalle en el modal

    public $codSelected; // codigo del producto seleccionado
    public $cantidadproducto; // cantidad de productos a cambiar

    public $catSelect;


    // registro de borrado
    public $codigo_borrado, $motivo_borrado, $validado, $tipo_borrado, $idenProducto;

    // Otras ventas
    public $otras_producto, $otras_cantidad; 

    // cantidad de producto seleccionadocuando se cambiara la cantidad
    public $cantidadActual;

    public function mount(){
        if (session('orden')) {
            $this->determinaPropina();
            $this->productosAdded();
            $this->obtenerTotal();
            $this->getAqui();
            $this->nombre = TicketOrden::select('nombre_mesa')->where('id', session('orden'))->first()['nombre_mesa'];
            // $this->comentario; cargarlo desde la db
        }
        session(['cliente' => 1]);
        $this->btnCatSelect(1);


        if (session('config_tipo_servicio') != 2) { // si no viene de mesa el cliente es 1
            session(['clientes' => 1]);
        }

    }


    public function render()
    {
        return view('livewire.comandero.venta');
    }


    public function addProducto($cod){ // agregar producto a la venta
        if($this->comprobarInventario($cod)){
            $this->dispatchBrowserEvent('mensaje', ['clase' => 'success', 'titulo' => 'Error', 'texto' => 'No tiene existencias en el inventario']);
            return;
        }
        $this->asignarOrden();
        $modal = $this->agregarProducto($cod); // si agrega opciones trae la data

        $this->productosAdded();
        $this->obtenerTotal();

        $producto = Producto::where('cod', $cod)->first();
        if ($producto->producto_categoria_id != 1) {
            $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'categoria-' . $producto->producto_categoria_id]);
            if (session('principal_levantar_modal')) { // si tengo activada la opcion de levantar modal
                $this->dispatchBrowserEvent('modal-opcion-add', ['opcion_id' => 'categoria-' . $producto->producto_categoria_id]);
            }
        } else {
            $this->dispatchBrowserEvent('focus');
        }
        
        if($modal){
            $this->modalProducto = $modal['producto_id'];
            $this->modalOpcion = $modal['opcion_id'];
            $this->dispatchBrowserEvent('modal-opcion-add', ['opcion_id' => 'opcion-'.$this->modalOpcion]);
        }
    }


    public function delProducto($id){ // eliminar un producto de la venta
        $imp = $this->verificaProducto($id);
        if (($this->siCodigo() or $this->siRegristro()) and $imp->imprimir != 1) {
            $this->tipo_borrado = 1;
            $this->idenProducto = $id;
            if ($this->siCodigo() and !$this->codigo_borrado) { // sia un no hay codigo de borado ingresado
                if (!$this->validado) {
                    $this->dispatchBrowserEvent('modal-codigo-borrado');
                }
            }
            else if ($this->siRegristro() and !$this->motivo_borrado) { // sia un no hay codigo de borado ingresado
                $this->dispatchBrowserEvent('modal-motivo-borrado');
            } else {
                $this->eliminarProductoRegister($id, $this->motivo_borrado);
                // $this->reset(['motivo_borrado', 'tipo_borrado', 'codigo_borrado']);
            }
        } else {
            $this->eliminarProducto($id);  // eliminacion normal
        }

        $this->verificaCantidad();
        $this->updateImprimirOrden();

        if (session('orden')) {
            $this->productosAdded();
            $this->obtenerTotal();
        }
        
    }

    public function delOrden(){ // Eliminar la orden de la venta
        if (($this->siCodigo() or $this->siRegristro()) and $this->cantidaProductosImpresos() > 0) {
            $this->tipo_borrado = 2;
            if ($this->siCodigo() and !$this->codigo_borrado) { // sia un no hay codigo de borado ingresado
                if (!$this->validado) {
                    $this->dispatchBrowserEvent('modal-codigo-borrado');
                }
            }
            else if ($this->siRegristro() and !$this->motivo_borrado) { // sia un no hay codigo de borado ingresado
                $this->dispatchBrowserEvent('modal-motivo-borrado');
            } else {
                $this->eliminarOrdenRegister($this->motivo_borrado);
                // $this->reset(['motivo_borrado', 'tipo_borrado', 'codigo_borrado']);
            }
        } else {
            $this->eliminarOrden(); // eliminacion normal
        }
        
        if (session('principal_ticket_pantalla') == 2) {
            $this->ImprimirComanda();
        }

        $this->eventPantallaSend(); // envia el evento a la pantalla


        $this->verificaCantidad(1);
    }

    
    public function productosAdded(){ /// productos agregados a la orden
        $product = $this->getProductosAgregados();
        $this->productAgregado = $product;
    }

    public function obtenerTotal(){ // Obtiene el total de toda la venta   
        $this->subtotal = $this->totalDeVenta();

        if($this->propinaPorcentaje >= 0){
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
                    ->update(['opcion_producto_id' => $opcion, 'tiempo' => Helpers::timeId()]);
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'opcion-' . $this->modalOpcion]);

        $modal = $this->levantarModalOpcion($this->modalProducto);
        if($modal){
            $this->modalProducto = $modal['producto_id'];
            $this->modalOpcion = $modal['opcion_id'];
            $this->dispatchBrowserEvent('modal-opcion-add', ['opcion_id' => 'opcion-'.$this->modalOpcion]);
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
                    ->limit(1)
                    ->delete();
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'opcion-' . $this->modalOpcion]);


        $modal = $this->levantarModalOpcion($this->modalProducto);
        if($modal){
            $this->modalProducto = $modal['producto_id'];
            $this->modalOpcion = $modal['opcion_id'];
            $this->dispatchBrowserEvent('modal-opcion-add', ['opcion_id' => 'opcion-'.$this->modalOpcion]);
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
    $this->eventPantallaSend(); // envia el evento a la pantalla

} 


public function btnImprimirPreCuenta(){ /// Imprime la precuenta
    $this->ImprimirPrecuenta($this->propinaCantidad, $this->propinaPorcentaje, null);
    $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Imprimiendo', 'texto' => 'Imprimiendo Pre Cuenta']);

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
                    ->update(['comentario' => $this->comentario, 'tiempo' => Helpers::timeId()]);
    $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalComentario']);
} 

public function btnNombre(){ /// agrega nombre a la comanda
    TicketOrden::where('id', session('orden'))
                    ->update(['nombre_mesa' => $this->nombre, 'tiempo' => Helpers::timeId()]);
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



public function btnCambiarCantidad(){ // cambia la cantidad de productos
    $cantidad = $this->cantidadActual + $this->cantidadproducto;

    if ($this->cantidadproducto > 0) {  // cantidad es lo que esta en la db y cantidadproducto lo del form
        //  aumentar la cantidad
        $cant = $cantidad - $this->cantidadActual;
        $this->aumentarCantidadCod($cant, $this->codSelected);
        $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Realizado', 'texto' => 'La cantidad ha sido aumentada ' . $cant]);
    }
    if ($this->cantidadproducto == 0) {
        $this->dispatchBrowserEvent('realizado', ['clase' => 'error', 'titulo' => 'Error', 'texto' => 'La cantidad no puede ser 0']);
    }
    if ($this->cantidadproducto < 0) {
        // reducir la cantidad
        $cant = abs($this->cantidadproducto); // pasar el numero negativo a positivo para reducir
        $this->reducirCantidadCod($cant, $this->codSelected);
        $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Realizado', 'texto' => 'La cantidad ha sido reducida ' . $cant]);
    }

    $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalCantidadProducto']);
    $this->reset(['cantidadproducto']);
    $this->productosAdded();
    $this->obtenerTotal();
}


public function btnOtrasVentas(){
    $this->validate(['otras_producto' => 'required', 'otras_cantidad' => 'required']);

    $this->asignarOrden();
    $this->addOtrasVentas($this->otras_producto, $this->otras_cantidad);
    $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalOtrasVentas']);
    $this->productosAdded();
    $this->obtenerTotal();
}


public function BtnVentaEspecial(){ // activa o desactiva la funcion de venta especial
    if (session('venta_especial_active')) { // se elimina si esta activo
        session()->forget('venta_especial_active');
        $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Realizado', 'texto' => 'Se Desactivo la opción de venta especial']);
    } else { // se activa si no existe
        session(['venta_especial_active' => true]);
        $this->dispatchBrowserEvent('realizado', ['clase' => 'success', 'titulo' => 'Realizado', 'texto' => 'Se Activo la opción de venta especial']);
    }
} 


///// MESA //// 
public function selectCliente($cliente){ // selecciona el cliente marcado
    session(['cliente' => $cliente]);
}

public function btnAddClient(){
    $clientes = session('clientes') + 1;
    session()->forget('clientes');
    TicketOrden::where('id', session('orden'))->first()->update(['clientes' => $clientes]);
    session(['clientes' => $clientes]);
}


public function productSelect($producto){ /// Productos para mostrar el detalle en el modal
    $this->productSelected = $this->getProductosModal($producto);
}


public function selectCod($cod, $cant = false){ /// Selecciona el foco en un codigo
    $this->codSelected = $cod;
    if ($cant) {
        $this->cantidadActual = $this->getCantidadProductosCod($this->codSelected);
    }
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

        return redirect()->route('comandero.mesas');

    }
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

public function btnCatSelect($iden){
    $this->catSelect = Producto::where('producto_categoria_id', $iden)->get();
    $this->dispatchBrowserEvent('focus');
}



public function validarCodigoOrden(){
    if ($this->validarCodigoAcceso($this->codigo_borrado)) {
        $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalCodigoBorrado']);
        $this->validado = true;
        if ($this->tipo_borrado == 1) {
            $this->delProducto($this->idenProducto);
        } else {
            $this->delOrden();
        }
    } else {
        $this->dispatchBrowserEvent('modal-codigo-borrado');
        $this->dispatchBrowserEvent('mensaje', ['clase' => 'success', 'titulo' => 'Error', 'texto' => 'El codigo introducido no es valido']);
    }
}

public function validarMotivo(){
    $this->validate(['motivo_borrado' => 'required|min:10']);
    $this->dispatchBrowserEvent('modal-opcion-hide', ['modal' => 'ModalMotivoBorrado']);
    if ($this->tipo_borrado == 1) {
        $this->delProducto($this->idenProducto);
    } else {
        $this->delOrden();
    }
}




}
