<x-principal-layout>

    {{-- Contenido --}}

    @livewire('producto.index')

    {{-- contenido  --}}

   
   @push('modals')

    @endpush

    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>


    <script>
        Livewire.on('deleteProducto', productId => {
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
                    
                    Livewire.emitTo('producto.index', 'EliminarProducto', productId);

                }
            })
        });


        Livewire.on('inhabilitar', productId => {
            Swal.fire({
                title: '¿Esta seguro?',
                text: "¡Se cambiará el estado de este producto!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Si, Cambiar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    Livewire.emitTo('producto.index', 'Inhabilitar', productId);

                }
            })
        });


        window.addEventListener('mensaje', event => {
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

            window.addEventListener('closeModal', event => {
                $('#' + event.detail.modal).modal('hide');
            });


    </script>
    @endpush

</x-principal-layout>