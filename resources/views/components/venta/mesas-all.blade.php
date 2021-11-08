<div>
    @if (count($mesas))
        
        <div class="row justify-content-center click">
            @foreach ($mesas as $mesa)

                <div class="mx-2">
                    <a wire:click="ordenSelect({{ $mesa->id }})">

                        <figure class="figure">
                            <img src="{{ asset('img/imagenes/' . nombreMesa($mesa->clientes)) }}" class="figure-img img-fluid z-depth-2 rounded-circle"  alt="hoverable" >
                            <figcaption class="figure-caption text-center">
                                <i class="fas fa-exclamation-triangle fa-xs red-text"></i>
                                {{ nombreUsuario($mesa->empleado) }}
                                </figcaption>
                                <figcaption class="figure-caption text-center bg-warning white-text" style="margin-top: -2.2rem;">{{ $mesa->nombre_mesa }}</figcaption>
                        </figure>
                    </a>
                </div>
                
            @endforeach
        </div>

    @else
        {{ mensajex('No exiten ordenes pendientes', 'danger') }}
    @endif
</div>