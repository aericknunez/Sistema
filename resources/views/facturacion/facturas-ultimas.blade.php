<x-principal-layout>

    {{-- Contenido --}}
        @livewire('facturacion.facturas-ultimas')
    {{-- contenido  --}}
   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>
        Livewire.on('eliminada', ()=>{
            Swal.fire(
                'FACTURA ELIMINADA',
                'La factura se elimino correctamente',
                'success'
            )
        });


        Livewire.on('deleteFactura', categoryId => { // escucha para eliminar
            Swal.fire({
                title: '¿Esta seguro?',
                text: "Se eliminará todo el registro de esta factura. ¡No se puede revertir esta acción!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    Livewire.emitTo('facturacion.facturas-ultimas', 'EliminarFactura', categoryId);

                }
            })
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