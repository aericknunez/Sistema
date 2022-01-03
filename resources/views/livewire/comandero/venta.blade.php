<div>
    
    <section class="bg-info p-3">
    
        <div class="d-flex justify-content-between">
            <a href="{{ route('comandero.mesas') }}" class="btn-floating btn-sm btn-info"><i class="fas fa-home"></i></a>

            <h2 class="text-white h1-responsive">Total: {{ dinero($total) }}</h2>

            <a wire:target="addProducto" wire:loading.class="animated flash infinite" data-toggle="modal" data-target="#VerProductos" class="border-0 btn btn-dark rounded-3 homepage-toggle-btn">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11 8C11 10.21 9.21 12 7 12C4.79 12 3 10.21 3 8C3 5.79 4.79 4 7 4C9.21 4 11 5.79 11 8M11 14.72V20H0V18C0 15.79 3.13 14 7 14C8.5 14 9.87 14.27 11 14.72M24 20H13V3H24V20M16 11.5C16 10.12 17.12 9 18.5 9C19.88 9 21 10.12 21 11.5C21 12.88 19.88 14 18.5 14C17.12 14 16 12.88 16 11.5M22 7C20.9 7 20 6.11 20 5H17C17 6.11 16.11 7 15 7V16C16.11 16 17 16.9 17 18H20C20 16.9 20.9 16 22 16V7Z" />
                </svg>
            </a>

        </section>




    <x-comandero.iconos.categorias />

    @if (session('venta_especial_active'))
    {{ mensajex('Atención: la función de venta especial esta activa, todos los productos marcados, se agregaran sin precio de venta','danger') }}      
    @endif

    <x-comandero.iconos :datos="$catSelect" />


    {{-- <x-comandero.iconos /> --}}
    <x-comandero.botones />
    <x-comandero.productos :datos="$productAgregado" 
                            :subtotal="$subtotal" 
                            :propina="$propinaCantidad" 
                            :porcentaje="$propinaPorcentaje" 
                            :total="$total" />

    <x-venta.lateral-modal-comentario />
    <x-venta.lateral-modal-cantidad-producto />
    <x-venta.modal-detalle-productos :productSelected="$productSelected"/>
    <x-venta.lateral-modal-nombre />
    <x-comandero.modal-cambio-cliente />


    <x-venta.modal-otras-ventas />

    {{-- modales de borrado  --}}
     @if (session('principal_registro_borrar'))
         <x-venta.modal-motivo-borrado />
     @endif
     @if (session('principal_solicitar_clave'))
         <x-venta.modal-codigo_borrado />
     @endif
                     


</div>
