<x-principal-layout>

    {{-- Contenido --}}
        @livewire('efectivo.ingreso')
    {{-- contenido  --}}
   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>
        Livewire.on('creado', ()=>{
            Swal.fire(
                'REGISTRO AGREGADO',
                'El movimiento se registro correctamente',
                'success'
            )
        });


        Livewire.on('deleteEntrada', categoryId => { // escucha para eliminar
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
                    
                    Livewire.emitTo('efectivo.ingreso', 'EliminarEntrada', categoryId);

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

    </script>    
    @endpush

</x-principal-layout>