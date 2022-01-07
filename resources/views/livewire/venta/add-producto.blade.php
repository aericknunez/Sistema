<div>
    <x-cuerpo >
        <x-slot name="contenido">
            @if (session('venta_especial_active'))
                {{ mensajex('Atención: la función de venta especial esta activa, todos los productos marcados, se agregaran sin precio de venta','danger') }}      
            @endif
            {{-- clientes si estamos en mesa  --}}
            @if (session('config_tipo_servicio') == 2)
            <x-venta.clientes />
            @endif
            {{-- Datos del delivery  --}}
            @if (session('config_tipo_servicio') == 3)
            <x-venta.datos-delivery />
            @endif
            {{-- Iconos de los productos  --}}
            @include('venta.iconos')
        </x-slot>
    
        <x-slot name="lateral">
            {{-- Vista venta  - Productos --}}
            <x-venta.lateral-productos :datos="$productAgregado" />

        @if ($productAgregado)
        
            {{-- Detalles de los productos, total e iconos  --}}
            <x-venta.lateral-total :subtotal="$subtotal" :propina="$propinaCantidad" :porcentaje="$propinaPorcentaje" :total="$total" />
            <x-venta.lateral-botones />
            <x-venta.lateral-datos />

        @endif

        @if ($cantidadSinGuardar)
        <small>Cantidad sin guardar {{ $cantidadSinGuardar }}</small>
        @endif

        @if ((config('sistema.td') == 10 or config('sistema.td') == 0) and session('impresion_seleccionado') == 1)
        <div class="font-weight-bold red-text bordeado-x1 border text-center">
            <div class="h4-responsive">{{ App\System\Ventas\Ventas::Porcentaje() }}</div>
        </div>
        @endif


        </x-slot>
       </x-cuerpo>

       {{-- Modales de los bonotes  --}}
       <x-venta.lateral-modal-tventa />
       <x-venta.lateral-modal-propina />
       <x-venta.lateral-modal-tpago />
       <x-venta.lateral-modal-comentario />
       <x-venta.lateral-modal-cantidad-producto />
       <x-venta.modal-detalle-productos :productSelected="$productSelected"/>

       {{-- Modales de opcion de mesa  --}}
       @if (session('config_tipo_servicio') == 2)
        <x-venta.lateral-modal-nombre />
        <x-venta.lateral-modal-add-cliente />
       @endif

       {{-- Modales de opcion de delivery  --}}
       @if (session('config_tipo_servicio') == 3)
        <x-venta.modal-envio :envio="$envio" />
       @endif



       <x-venta.lateral-modal-cambio-venta />
       <x-venta.modal-otras-ventas />

       {{-- modales de borrado  --}}
        @if (session('principal_registro_borrar'))
            <x-venta.modal-motivo-borrado />
        @endif
        @if (session('principal_solicitar_clave'))
            <x-venta.modal-codigo_borrado />
        @endif

</div>