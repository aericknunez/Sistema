<x-principal-layout>

     @livewire('search.search-botones')

   @push('modals')

    @endpush

    @push('scripts')
    <script>
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