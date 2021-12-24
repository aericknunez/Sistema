<x-principal-layout>

    {{-- Contenido --}}
    @livewire('corte.index')
    {{-- contenido  --}}

   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>
        Livewire.on('creado', ()=>{
            Swal.fire(
                'CORTE REALIZADO',
                'El corte se realizo correctamente',
                'success'
            )
        });

        Livewire.on('eliminado', ()=>{
            Swal.fire(
                'CORTE ELIMINADO',
                'El corte se eliminó correctamente',
                'success'
            )

            $('#modalConfirmDelete').modal('hide');
        });

        Livewire.on('error1', ()=>{
            Swal.fire(
                'ERROR AL ELIMINAR EL CORTE',
                'El código de verificación no es válido',
                'error'
            )
        });


        Livewire.on('imprimiendo', ()=>{
            Swal.fire(
                'IMPRIMIENDO CORTE',
                'El corte se mando a impresión correctamente',
                'success'
            )
        });

    </script>
    @endpush

</x-principal-layout>