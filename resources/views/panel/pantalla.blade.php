
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

    @if (config('broadcasting.default') == 'pusher')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
  
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
  
      var pusher = new Pusher('1d0f3961e3e3d11c0d2a', {
        cluster: 'us2'
      });
  
      var channel = pusher.subscribe('pantalla');
      channel.bind('evento{{ config('sistema.td') }}', function(data) {
        // alert(JSON.stringify(data));
        Livewire.emitTo('panel.pantalla', 'Ordenes');
        console.log('Evento Recibido');

      });
      
    </script>
    @endif


@endpush

</x-no-menu>