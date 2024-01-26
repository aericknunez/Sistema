<div>
    
        <section class="
                @if (isLatam() == true)
                bg-success
                @else
                bg-info
                @endif
         p-3">
    
            <div class="d-flex align-items-center">
                <div class="h1-responsive text-white">Ordenes Pendientes</div>
            </div>
            </section>

    <div wire:poll.{{ config('sistema.synctime') }}s.visible="getOrdenesActive">
        <x-comandero.mesas-all :mesas="$mesasAll" />
        <x-comandero.botones-mesas />
                
        <x-comandero.modal-add-mesa :clientes="$clientes" />
        <x-comandero.modal-datos :ordenes="$ordenesCant" :clientes="$clientesCant" />
    </div>

</div>
