<div>
    @if (count($ordenes))
        
        <div class="row justify-content-center click">
            @foreach ($ordenes as $orden)

                <div class="mx-2">
                    <a wire:click="ordenSelect({{ $orden->id }})">

                        <figure class="figure">
                            <img src="{{ asset('img/imagenes/delivery.jpg') }}" class="figure-img img-fluid z-depth-2 rounded-circle"  alt="hoverable" >
                            <figcaption class="figure-caption text-center">
                                <i class="fas fa-exclamation-triangle fa-xs red-text"></i>
                                {{ nombreUsuario($orden->empleado) }}
                                </figcaption>
                                <figcaption class="figure-caption text-center bg-warning white-text" style="margin-top: -2.2rem;">{{ $orden->nombre_mesa }}</figcaption>
                        </figure>
                    </a>
                </div>
                
            @endforeach
        </div>

    @else
        {{ mensajex('No exiten ordenes pendientes', 'danger') }}
    @endif
</div>