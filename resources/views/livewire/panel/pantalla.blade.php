<div>

    <x-menu-pantalla :datos="$listadoPaneles" />

    <x-contenido >

        <div class="row  px-3 row justify-content-left click" wire:poll.{{ config('sistema.synctime') }}s.visible="getOrdenes">
            @foreach ($datos as $orden)
                    <div class="mt-3 col-md-3">
                        <x-panel.card-pantalla :datos="$orden" :panel="$panelImprimir" />
                    </div>
            @endforeach
        </div>
    
    </x-contenido >

</div>