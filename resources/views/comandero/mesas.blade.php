<x-comandero.principal>
    {{-- Inicializa las vistas para agregar la venta --}}
   @livewire('comandero.mesas')

   
   @push('modals')

    @endpush

    @push('scripts')

    @endpush

</x-comandero.principal>