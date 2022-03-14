<div class="row">

    <div class="col-xs-4 col-sm-12 col-md-4">
        {{-- CONTENIDO IZQUIERDO  --}}
       @include('venta.includes.cambios.clientes')
        {{-- Clientes  --}}
    </div>

    <div class="col-xs-4 col-sm-12 col-md-4">
       @include('venta.includes.cambios.productos')


    </div>

    <div class="col-xs-4 col-sm-12 col-md-4">
        {{-- DATA LIVE CLASS desaparece en pantalla pequena 'd-none d-md-block' --}}
        @include('venta.includes.cambios.productos-cliente')

        @if (count($productosFactura))
        
        {{-- Detalles de los productos, total e iconos  --}}
        @include('venta.includes.inicio.lateral-total')

       @include('venta.includes.cambios.botones')

       @include('venta.includes.inicio.lateral-datos')

       @include('venta.includes.modales.tventa')
       @include('venta.includes.modales.propina')

        <x-venta.lateral-modal-tpago />
 
        @endif

        @if (session('factura_documento'))
        <div>Cliente: {{ session('factura_cliente') }}  Doc: {{ session('factura_documento') }}</div>
        @endif
    </div>

    @include('venta.includes.modales.cambio-venta')

    {{-- Busqueda de clientes para asignarle facturas --}}
    @include('venta.includes.modales.client-asign')

</div>