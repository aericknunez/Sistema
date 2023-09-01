<x-principal-layout>

    {{-- Inicializa las vistas para agregar la venta --}}
   @livewire('venta.mesas')

   
   @push('modals')

    @endpush

    @push('scripts')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>
        Livewire.on('noorden', ()=>{
            Swal.fire(
                'ORDEN NO DISPONIBLE',
                'Esta orden ya no se encuentra activa en el sistema',
                'error'
            )
        });

        </script>
    @endpush

</x-principal-layout>