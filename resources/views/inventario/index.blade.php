<x-principal-layout>

    {{-- Contenido --}}
        @livewire('inventario.index')
    {{-- contenido  --}}
   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>

        Livewire.on('deleteProducto', categoryId => {
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
                    
                    Livewire.emitTo('inventario.index', 'EliminarProducto', categoryId);

                }
            })
        });

        Livewire.on('creado', ()=>{
            $('#ModalAddProducto').modal('hide');
            Swal.fire(
                'PRODUCTO AGREGADO',
                'Se creo el producto correctamente',
                'success'
            )
        });

        $(function () {
                 $('[data-toggle="tooltip"]').tooltip()
        })


        window.addEventListener('mensaje', event => {
            $('#Add').modal('hide');
            $('#Del').modal('hide');

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

            window.addEventListener('error', event => {
            $('#Add').modal('hide');
            $('#Del').modal('hide');

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