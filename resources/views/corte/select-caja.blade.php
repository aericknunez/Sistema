<x-principal-layout>

    {{-- Contenido --}}
    <x-contenido >

        <div class="row justify-content-center click">

        @if (Auth::user()->tipo_usuario != 5)
            @foreach ($cajas as $caja)

                <div class="mx-2">
                    <a href="{{ route('caja.selected', $caja->numero) }}">

                        <figure class="figure">
                            <img src="{{ asset('img/imagenes/caja.png') }}" class="figure-img img-fluid z-depth-2 rounded-circle"  alt="hoverable" >
    
                                <figcaption class="font-weight-bold figure-caption text-center bg-success white-text">CAJA {{ $caja->numero }}</figcaption>
                        </figure>
                    </a>
                </div>
                
            @endforeach
        @else
        {{ mensajex("Su usuario solo puede agregar ordenes", 'info') }}
        <img src="{{ asset('img/imagenes/no-autorizado.jpg') }}" class="figure-img img-fluid rounded-circle"  alt="hoverable" >
        @endif
        
        </div>


        <div class="row justify-content-center click">
            <a href="{{ route('caja.ordenes') }}" class="btn btn-dark btn-rounded">Generar Ordenes</a>
        </div>

    </x-contenido>

    {{-- contenido  --}}
  

</x-principal-layout>