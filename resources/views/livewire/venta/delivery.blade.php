<div>

    <x-cuerpo >
        <x-slot name="contenido">
            <x-venta.delivery-all :ordenes="$ordenesAll" />
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

    <x-venta.modal-add-delivery :search="$search" :busqueda="$busqueda" />
    <x-venta.modal-add-cliente />


</div>