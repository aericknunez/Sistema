<div>

    <x-cuerpo >
        <x-slot name="contenido">
       @include('venta.includes.delivery.delivery-all')

        </x-slot>
    


        <x-slot name="lateral">
            <div class="card my-3 mx-3">
                <small class="ml-3 mt-2">Total de Ordenes</small>
                <div class="h2-responsive text-center mx-3 "><div class="float-left">Ordenes Pendientes:</div> <div class="float-right">{{ $ordenesCant }}</div></div>
                <div class="h2-responsive text-center mx-3 "><div class="float-left">Ordenes Entregadas:</div> <div class="float-right">{{ $OrdenesEnt }}</div></div>
            </div>
           <div class="card text-center pb-2">
                AGREGAR NUEVO DELIVERY
                <div class="mt-4">
                    <a data-toggle="modal" data-target="#addDelivery"> <i class="fas fa-plus-circle fa-7x mx-2 green-text"></i> </a>
                </div>
           </div>
           
        </x-slot>

    </x-cuerpo>

    {{-- search y busqueda coresponden al formulario y a los datos de busqueda, son diferentes  --}}
       @include('venta.includes.modales.add-delivery')
       @include('venta.includes.modales.add-cliente-delivery')
       @include('venta.includes.modales.cambiar-cliente-delivery')
       @include('venta.includes.modales.detalles-orden-delivery')


</div>