<x-principal-layout>

    {{-- Contenido --}}
        @livewire('config.usuarios-editar')

    {{-- contenido  --}}

   
    @push('scripts')
        <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

        <script>
            Livewire.on('creado', ()=>{
                Swal.fire(
                    'USUARIO MODIFICADO',
                    'Se ha cambiado correctamente el tipo de usuario',
                    'success'
                )
            
                $('#ModalModUser').modal('hide');
        });
        </script>
    @endpush

</x-principal-layout>