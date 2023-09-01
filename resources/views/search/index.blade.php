<x-principal-layout>

     @livewire('search.search-botones')

   @push('modals')

    @endpush

    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>

        Livewire.on('deleteFactura', () => {
            Swal.fire({
                title: '¿Esta seguro?',
                text: "¡No se puede revertir esta acción!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    Livewire.emitTo('search.search-botones', 'borrarFactura');

                }
            })
        });

        window.addEventListener('modal-opcion-hide', event => {
            $('#'+ event.detail.modal).modal('hide');
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

    </script>
    @endpush

</x-principal-layout>