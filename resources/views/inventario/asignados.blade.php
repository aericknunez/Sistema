<x-principal-layout>

    {{-- Contenido --}}
        @livewire('inventario.asignados')
    {{-- contenido  --}}
   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>

        $('.mdb-select').materialSelect();
        
        Livewire.on('addModal', ()=>{
            $('#AddAsignado').modal('show');
            $('.mdb-select').materialSelect();
        });



        Livewire.on('creado', ()=>{
            $('.mdb-select').materialSelect();
            Swal.fire(
                'PRODUCTO ASIGNADO',
                'Se asigno el producto correctamente',
                'success'
            )
        });


        window.addEventListener('mensaje', event => {
                $('.mdb-select').materialSelect();
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
                $('.mdb-select').materialSelect();
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