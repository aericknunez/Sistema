<x-principal-layout>

    {{-- Contenido --}}
        @livewire('config.usuarios-editar')

    {{-- contenido  --}}

   
    @push('scripts')
        <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

        <script>

            Livewire.on('inhabilitar', userId => {
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
                        
                        Livewire.emitTo('config.usuarios-editar', 'delete', userId);

                    }
                })
            });


            Livewire.on('creado', ()=>{
                Swal.fire(
                    'USUARIO CREADO',
                    'Se ha creado correctamente el nuevo usuario',
                    'success'
                )
            
                $('#ModalAddUser').modal('hide');
             });

             Livewire.on('cambiado', ()=>{
                Swal.fire(
                    'USUARIO MODIFICADO',
                    'Se ha cambiado correctamente el tipo de usuario',
                    'success'
                )
            
                $('#ModalModUser').modal('hide');
             });

             Livewire.on('desabilitada', ()=>{
                Swal.fire(
                    'USUARIO INHABILITADO',
                    'Se ha deshabilitado correctamente el usuario usuario',
                    'success'
                )
            
                $('#ModalModUser').modal('hide');
             });
        </script>
    @endpush

</x-principal-layout>