<div>
    <div class="row justify-content-center click bordeado-x1 border border-info ml-1">

        @for ($i = 1; $i <= session('clientes'); $i++)
        @php
            if(session('cliente') == $i){
                $img = "cliente_select";
            } else {
                $img = "cliente";
            }
        @endphp
            <div class="mx-2 mt-3">
                <a wire:click="selectCliente({{$i}})" wire:loading.attr="disabled">
                    <figure class="figure">
                        <img src="{{ asset('img/imagenes/'.$img.'.png') }}" class="figure-img img-fluid z-depth-2 rounded-circle"  alt="hoverable" >
                        <figcaption class="figure-caption text-center">
                            Cliente {{ $i }}
                            </figcaption>
                    </figure>
                </a>
            </div>
        @endfor
    
    </div>
    @if (Request::url() == route('venta.cambios')) 
    <a href="{{ route('venta.rapida') }}" class="btn btn-link">Volver</a>
    @else
    <a href="{{ route('comandero') }}" class="btn btn-link">Volver</a>
    @endif
    
</div>