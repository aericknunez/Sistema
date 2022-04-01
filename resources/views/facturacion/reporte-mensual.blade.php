<x-principal-layout>

    {{-- Contenido --}}
        @livewire('facturacion.reporte-mensual-es')
    {{-- contenido  --}}
   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>

            Livewire.on('imprimiendo', ()=>{
                Swal.fire(
                    'IMPRIMIENDO REPORTE',
                    'Se esta realizando la impresión del reporte',
                    'success'
                )
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