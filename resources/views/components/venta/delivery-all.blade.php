<div>
    @if (count($ordenes))

        
        <div class="row justify-content-center click">


            @foreach ($ordenes as $orden)

                <div class="mx-2">

            <div class="dropdown">
                <a class="close" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></a>
                <div class="dropdown-menu dropdown-primary">
                    <a wire:click="deliverySelect({{ $orden->deliverys->id }})" class="dropdown-item" data-toggle="modal" data-target="#ModalCambiarCliente">Cambiar Cliente</a>
                    <a wire:click="btnAddRepartidor()" class="dropdown-item">Agregar Repartidor</a>
                    <a wire:click="detallesOrden({{ $orden->id }})" class="dropdown-item" data-toggle="modal" data-target="#DetallesOrdenDelivery">Detalles de la Orden</a>
                </div>
            </div>


                    <a wire:click="ordenSelect({{ $orden->id }})">

                        <figure class="figure">
                            <img src="{{ asset('img/imagenes/delivery.jpg') }}" class="figure-img img-fluid z-depth-2 rounded-circle"  alt="hoverable" >
                            <figcaption class="figure-caption text-center">
                                <i class="fas fa-user fa-xs red-text"></i>
                                {{ nombreUsuario($orden->empleado) }}
                                </figcaption>
                                <figcaption class="figure-caption text-center bg-warning white-text" style="margin-top: -2.2rem;">{{ $orden->deliverys->cliente->nombre }}</figcaption>
                        </figure>
                    </a>
                </div>
                
            @endforeach
        </div>

    @else
        {{ mensajex('No exiten ordenes pendientes', 'danger') }}
    @endif
</div>