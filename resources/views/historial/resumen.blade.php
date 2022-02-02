<x-principal-layout>

    {{-- Contenido --}}
        @livewire('historial.resumen')
    {{-- contenido  --}}
   
    @push('scripts')
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