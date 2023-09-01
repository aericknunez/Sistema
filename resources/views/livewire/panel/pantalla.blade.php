<div>

    <x-menu-pantalla :datos="$listadoPaneles" />

    <x-contenido >

        {{-- {{ $hashSound}} --}}

        @if (session('pusher'))
            <div class="row  px-3 row justify-content-left click">
        @else
            <div class="row  px-3 row justify-content-left click" wire:poll.{{ session('sync_time') }}s="getOrdenes">
        @endif

            @foreach ($datos as $orden)
             @if (session('impresion_comanda_agrupada') == 1)
                <x-panel.card-pantalla-group :datos="$orden" :panel="$panelImprimir" />
                @else
                <x-panel.card-pantalla :datos="$orden" :panel="$panelImprimir" />
             @endif
            @endforeach
        </div>
    
    </x-contenido >

    <x-panel.pantalla-ordenes-terminadas :datos="$terminadas" />

</div>