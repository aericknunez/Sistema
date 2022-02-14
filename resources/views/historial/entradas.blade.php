<x-principal-layout>

    {{-- Contenido --}}
        @livewire('historial.entradas')
    {{-- contenido  --}}
   
    @push('scripts')
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>

    @endpush

</x-principal-layout>