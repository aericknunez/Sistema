<div class="row justify-content-center click bordeado-x1 border border-info ml-1">

    @for ($i = 1; $i <= session('clientes'); $i++)
    @php
        if(session('cliente') == $i){
            $img = "cliente_select";
        } else {
            $img = "cliente";
        }
    @endphp
        <div class="mx-2 mt-2">
            <a wire:click="selectCliente({{ $i }})">
                <figure class="figure">
                    <img src="{{ asset('img/imagenes/'.$img.'.png') }}" class="figure-img img-fluid z-depth-2 rounded-circle"  alt="hoverable" >
                    <figcaption class="figure-caption text-center white-text" style="margin-top: -2.2rem;">
                        Cliente {{ $i }}
                        </figcaption>
                </figure>
            </a>
        </div>
    @endfor

</div>