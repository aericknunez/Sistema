
<x-no-menu>
    {{-- Contenido --}}
        @livewire('panel.pantalla')
    {{-- contenido  --}}


    <audio id="audio" autoplay="false">
        <source src="{{ asset('sound/Bing_1.mp3') }}" type="audio/mpeg">
        <source src="{{ asset('sound/Bing_1.ogg') }}" type="audio/ogg">
    </audio>

    @push('scripts')
    <script>

        Livewire.on('sound', ()=>{
            playSound()
        });

        function playSound() {
            var sound = document.getElementById("audio");
            sound.play();
        }

    </script>

@endpush

</x-no-menu>