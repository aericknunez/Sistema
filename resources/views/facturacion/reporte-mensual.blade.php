<x-principal-layout>

    {{-- Contenido --}}
        @livewire('facturacion.reporte-mensual-es')
    {{-- contenido  --}}
   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>

            Livewire.on('imprimiendo', ()=>{
                Swal.fire(
                    'IMPRIMIENDO REPORTE',
                    'Se esta realizando la impresión del reporte',
                    'success'
                )
            });

    </script>   
    @endpush

</x-principal-layout>