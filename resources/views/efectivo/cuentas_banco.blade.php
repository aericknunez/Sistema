<x-principal-layout>

    {{-- Contenido --}}
        @livewire('efectivo.cuentas-banco')
    {{-- contenido  --}}

   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>
        Livewire.on('creado', ()=>{
            Swal.fire(
                'CUENTA AGREGADA',
                'La cuenta se agrego correctamente',
                'success'
            )
        });


        Livewire.on('deleteBanco', categoryId => { // escucha para eliminar
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
                    
                    Livewire.emitTo('efectivo.cuentas-banco', 'EliminarCuenta', categoryId);

                }
            })
        });

        Livewire.on('error', ()=>{
            Swal.fire({
                icon: 'error',
                title: '¡No se puede Eliminar!',
                text: 'La cuenta aún tiene fondos',
                })
        });

        
        Livewire.on('error4', ()=>{
            Swal.fire({
                icon: 'error',
                title: '¡Error al Eliminar!',
                text: 'No se puede Eliminar CAJA CHICA Principal',
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
        


/// mensajes tranaferencia
        Livewire.on('error1', ()=>{
            Swal.fire({
                icon: 'error',
                title: '¡Error al Transferir!',
                text: 'La cuenta de origen y destino son iguales',
                })
        });
        Livewire.on('error2', ()=>{
            Swal.fire({
                icon: 'error',
                title: '¡Error al Transferir!',
                text: 'La cuenta de origen no tiene fondos suficientes',
                })
        });
        Livewire.on('error3', ()=>{
            Swal.fire({
                icon: 'error',
                title: '¡Error al Transferir!',
                text: 'La cantidad a transferir es mayor a los fondos de la cuenta',
                })
        });

        Livewire.on('transfer', ()=>{
            Swal.fire({
                icon: 'success',
                title: '¡Transferencia Realizada!',
                text: 'Transferencia realizada exitosamente',
                })
        });


    </script>
    @endpush

</x-principal-layout>