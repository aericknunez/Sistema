<x-principal-layout>

    {{-- Inicializa las vistas para agregar la venta --}}
   @livewire('venta.add-producto')

   <audio id="audio" autoplay="false">
        <source src="{{ asset('sound/Beep4.mp3') }}" type="audio/mpeg">
        <source src="{{ asset('sound/Beep4.ogg') }}" type="audio/ogg">
    </audio>

   @push('modals')
   @endpush

    @push('scripts')
        <script>
            window.addEventListener('modal-opcion-add', event => {
                // alert('Opcion Id: ' + event.detail.opcion_id);
                $('#opcion-' + event.detail.opcion_id).modal('show');
                playSound()
            });
            window.addEventListener('modal-opcion-hide', event => {
                $('#'+ event.detail.modal).modal('hide');
                $("#cantidad").focus();
                playSound()
            });
            window.addEventListener('focus', event => {
                $("#cantidad").focus();
                playSound()
            });

            window.addEventListener('modal-cambio-venta', event => {
                $('#ModalCambioVenta').modal('show');
                $('#fact_subtotal').text(event.detail.subtotal);
                $('#fact_propina').text(event.detail.propina);
                $('#fact_total').text(event.detail.total);
                $('#fact_efectivo').text(event.detail.efectivo);
                $('#fact_cambio').text(event.detail.cambio);
            });

            window.addEventListener('mensaje', event => {
                toastr.error(event.detail.texto, event.detail.titulo, {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "md-toast-top-right", 
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": 100,
                    "hideDuration": 100,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }) 
            });


            window.addEventListener('realizado', event => {
                toastr.success(event.detail.texto, event.detail.titulo, {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "md-toast-top-right", 
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": 100,
                    "hideDuration": 100,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }) 
            });

            function playSound() {
                var sound = document.getElementById("audio");
                sound.play();
            }

        </script>

    @endpush

</x-principal-layout>