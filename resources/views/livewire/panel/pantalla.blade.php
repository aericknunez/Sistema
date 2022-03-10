<div>

    <x-menu-pantalla :datos="$listadoPaneles" />

    <x-contenido >

        {{-- {{ $hashSound}} --}}

        @if (session('pusher'))
            <div class="row  px-3 row justify-content-left click" wire:poll.{{ session('sync_time') }}s="getOrdenes">
        @else
            <div class="row  px-3 row justify-content-left click">
        @endif

            @foreach ($datos as $orden)
                    <div class="mt-3 col-md-3">
                        <x-panel.card-pantalla :datos="$orden" :panel="$panelImprimir" />
                    </div>
            @endforeach
        </div>
    
    </x-contenido >

    <x-panel.pantalla-ordenes-terminadas :datos="$terminadas" />

</div>