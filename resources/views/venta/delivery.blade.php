<x-principal-layout>

    {{-- Inicializa las vistas para agregar la venta --}}
   @livewire('venta.delivery')

   
   @push('modals')

    @endpush

    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>
            Livewire.on('cambiado', ()=>{
                Swal.fire(
                    'CLIENTE ASIGNADO',
                    'Seleccione el cliente para poder seguir agregando elementos',
                    'success'
                )
            });

            window.addEventListener('modal-opcion-hide', event => {
                $('#'+ event.detail.modal).modal('hide');
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

            
    </script>
    @endpush

</x-principal-layout>