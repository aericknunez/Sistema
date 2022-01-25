<x-comandero.principal>
    {{-- Inicializa las vistas para agregar la venta --}}
   @livewire('comandero.mesas')

   
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

</x-comandero.principal>