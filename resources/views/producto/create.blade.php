<x-principal-layout>

    {{-- Contenido --}}
        @livewire('producto.crear')

    {{-- contenido  --}}

   
    @push('scripts')
        <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

        <script>
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

            Livewire.on('creado', ()=>{
                Swal.fire(
                    'PRODUCTO CREADO',
                    'Puede continuar agregando productos',
                    'success'
                )
        });
        </script>
    @endpush

</x-principal-layout>