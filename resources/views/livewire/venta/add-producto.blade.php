<div>
    <x-cuerpo >
        <x-slot name="contenido">
            @if (session('venta_especial_active'))
                {{ mensajex('Atención: la función de venta especial esta activa, todos los productos marcados, se agregaran sin precio de venta','danger') }}      
            @endif
            {{-- clientes si estamos en mesa  --}}
            @if (session('config_tipo_servicio') == 2)
            @include('venta.includes.mesa.clientes')
            @endif
            {{-- Datos del delivery  --}}
            @if (session('config_tipo_servicio') == 3)
            @include('venta.includes.delivery.delivery')
            @endif
            {{-- Iconos de los productos  --}}
            @include('iconos_x.iconos_principal_'. session('sistema.td'))

        </x-slot>
    



        <x-slot name="lateral">
            {{-- Vista venta  - Productos --}}
            @include('venta.includes.inicio.lateral-productos')

        @if ($productAgregado)
        
            {{-- Detalles de los productos, total e iconos  --}}
            @include('venta.includes.inicio.lateral-total')

            @include('venta.includes.inicio.lateral-botones')
            @include('venta.includes.inicio.lateral-datos')

        @endif

        @if ($cantidadSinGuardar and session('principal_ticket_pantalla') != 0)
        <small>Cantidad sin guardar {{ $cantidadSinGuardar }}</small>
        @endif

        @if (session('factura_documento'))
             <div>Cliente: {{ session('factura_cliente') }} ||  Documento: {{ session('factura_documento') }}</div>
        @endif

        @if ((session('sistema.td') == 10 or session('sistema.td') == 11) and session('impresion_seleccionado') == 1)
        <div class="font-weight-bold red-text bordeado-x1 border text-center">
            <div class="h4-responsive">{{ App\System\Ventas\Ventas::Porcentaje() }}</div>
        </div>
        @endif

        @if ($numeroLineas == true)
        {{ mensajex("HA EXEDIDO EL NUMERO MAXIMO DE ITEMS", "danger") }}
        @endif

        @if ($comentario)
        <div class="font-weight-bold red-text"><a data-toggle="modal" data-target="#ModalComentario" >Comentario: {{ $comentario }}</a></div>
        @endif
        </x-slot>
       </x-cuerpo>

       {{-- Modales de los bonotes  --}}

       @include('venta.includes.modales.tventa')
       @include('venta.includes.modales.propina')

       {{-- Se genera segun las monedas  --}}
       @include('iconos_x.tipo_pago_'. session('sistema.td'))


       @include('venta.includes.modales.comentario')
       @include('venta.includes.modales.cantidad-producto')
       @include('venta.includes.modales.detalle-productos')

       {{-- Modales de opcion de mesa  --}}
       @if (session('config_tipo_servicio') == 2)
            @include('venta.includes.modales.nombre')
            @include('venta.includes.modales.add-cliente')
       @endif

       {{-- Modales de opcion de delivery  --}}
       @if (session('config_tipo_servicio') == 3)
            @include('venta.includes.modales.envio')
       @endif


       @include('venta.includes.modales.cambio-venta')
       @include('venta.includes.modales.otras-ventas')

       {{-- Busqueda de clientes para asignarle facturas --}}
       @if (session('config_tipo_servicio') != 3)
            @include('venta.includes.modales.client-asign')
      @endif


       {{-- modales de borrado  --}}
        @if (session('principal_registro_borrar'))
            @include('venta.includes.modales.motivo-borrado')
        @endif
        @if (session('principal_solicitar_clave'))
            @include('venta.includes.modales.codigo-borrado')
        @endif

</div>