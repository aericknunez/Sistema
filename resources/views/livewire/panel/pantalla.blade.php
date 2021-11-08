<div>

    <x-contenido >

        <div class="row  px-3 row justify-content-left click" wire:poll.{{ config('sistema.synctime') }}s.visible="getOrdenes">
            @foreach ($datos as $orden)
            <div class="mt-3 col-md-3">
                <x-panel.card-pantalla :datos="$orden" />
            </div>
            @endforeach
        </div>


        {{-- <audio id="audioplayer" autoplay=true>
            <source src="{{ asset('sound/Beep4.mp3') }}" type="audio/mpeg">
            <source src="{{ asset('sound/Beep4.ogg') }}" type="audio/ogg">
        </audio> --}}

        
    </x-contenido>

</div>