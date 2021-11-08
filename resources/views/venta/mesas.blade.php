<x-principal-layout>

    {{-- Inicializa las vistas para agregar la venta --}}
   @livewire('venta.mesas')

   
   @push('modals')

    @endpush

    @push('scripts')

    @endpush

</x-principal-layout>