<x-principal-layout>

    {{-- Contenido --}}
        @livewire('historial.cortes')
    {{-- contenido  --}}
   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>
        Livewire.on('imprimiendo', ()=>{
            Swal.fire(
                'IMPRIMIENDO CORTE',
                'Se ha mandodo el corte a impresión',
                'success'
            )
        });
    </script>

    @endpush

</x-principal-layout>