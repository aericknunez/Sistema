<x-principal-layout>

    {{-- Contenido --}}
        @livewire('efectivo.gastos')
    {{-- contenido  --}}
   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>
        Livewire.on('creado', ()=>{
            Swal.fire(
                'GASTO AGREGADO',
                'El gasto se registro correctamente',
                'success'
            )
        });


        Livewire.on('deleteGasto', categoryId => { // escucha para eliminar
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
                    
                    Livewire.emitTo('efectivo.gastos', 'EliminarGasto', categoryId);

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

        Livewire.on('imprimiendo', ()=>{
            Swal.fire(
                'IMPRIMIENDO GASTOS',
                'Los gastos se enviaron a impresión correctamente',
                'success'
            )
        });

    </script>    
    @endpush

</x-principal-layout>