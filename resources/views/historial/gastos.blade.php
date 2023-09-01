<x-principal-layout>

    {{-- Contenido --}}
        @livewire('historial.gastos')
    {{-- contenido  --}}
   
    @push('scripts')
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>

    @endpush

</x-principal-layout>