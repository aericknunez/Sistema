<x-principal-layout>

    {{-- Contenido --}}
        @livewire('facturacion.rango')
    {{-- contenido  --}}
   
    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>

        Livewire.on('imprimiendo', ()=>{
            Swal.fire(
                'IMPRIMIENDO FACTURAS',
                'Se esta realizando la impresion de facturas',
                'success'
            )
        });

    </script>   
    @endpush

</x-principal-layout>