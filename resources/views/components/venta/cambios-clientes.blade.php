<div>
    <div class="row justify-content-center click bordeado-x1 border border-info ml-1">

        @for ($i = 1; $i <= session('clientes'); $i++)
            <div class="mx-2 mt-3">
                <a wire:click="selectCliente({{$i}})" wire:loading.attr="disabled" wire:key="{{ $i }}">
                    <figure class="figure">
                        <img src="
                        @if (session('cliente') == $i)
                        {{ asset('img/imagenes/cliente_select.png') }}
                        @else
                        {{ asset('img/imagenes/cliente.png') }}
                        @endif
                        " class="figure-img img-fluid z-depth-2 rounded-circle"  alt="hoverable" >
                        <figcaption class="figure-caption text-center">
                            Cliente {{ $i }}
                            </figcaption>
                    </figure>
                </a>
            </div>
        @endfor
    
    </div>
    @if (session('comandero')) 
    <a href="{{ route('comandero.mesas') }}" class="btn btn-link">Volver</a>
    @else
    <a href="{{ route('venta.rapida') }}" class="btn btn-link">Volver</a>
    @endif
    
</div>