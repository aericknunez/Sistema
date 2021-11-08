<x-principal-layout>

    {{-- Contenido --}}
        @livewire('config.configuracion')

    {{-- contenido  --}}

   
    @push('scripts')
        <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

        <script>
            Livewire.on('creado', ()=>{
                Swal.fire(
                    'DATOS AGREGADOS',
                    'Se han establecido los datos correctamente',
                    'success'
                )
            
                $('#ModalAddConfig').modal('hide');
            });

            
            Livewire.on('errorMoneda', ()=>{
            Swal.fire({
                icon: 'error',
                title: 'ERROR AL REALIZAR EL CAMBIO',
                text: 'No se puede deshabilitar el tipo de moneda "Efectivo"',
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