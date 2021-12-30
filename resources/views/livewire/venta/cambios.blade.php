<div class="row">

    <div class="col-xs-4 col-sm-12 col-md-4">
        {{-- CONTENIDO IZQUIERDO  --}}
        <x-venta.cambios-clientes />
        {{-- Clientes  --}}
    </div>

    <div class="col-xs-4 col-sm-12 col-md-4">
        <x-venta.cambios-productos :datos="$productAgregado" :cliente="$clientSelected"  />

    </div>

    <div class="col-xs-4 col-sm-12 col-md-4">
        {{-- DATA LIVE CLASS desaparece en pantalla pequena 'd-none d-md-block' --}}
        <x-venta.cambios-productos-cliente :datos="$productosFactura" />

        @if (count($productosFactura))
        
        {{-- Detalles de los productos, total e iconos  --}}
        <x-venta.lateral-total :subtotal="$subtotal" :propina="$propinaCantidad" :porcentaje="$propinaPorcentaje" :total="$total" />
        <x-venta.cambios-botones />
        <x-venta.lateral-datos />

        <x-venta.lateral-modal-propina />

        <x-venta.lateral-modal-tventa />
        <x-venta.lateral-modal-tpago />
 

        @endif
    </div>

    <x-venta.lateral-modal-cambio-venta />

</div>