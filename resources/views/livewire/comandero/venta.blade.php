<div>
    
    <div>
        <section class="bg-info p-3">
    
            <div class="d-flex align-items-center">
            <div class="p-1 input-group rounded-3 mr-3">
                <a href="{{ route('comandero.mesas') }}" class="border-0 btn btn-info rounded-3">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19.07,4.93C17.22,3 14.66,1.96 12,2C9.34,1.96 6.79,3 4.94,4.93C3,6.78 1.96,9.34 2,12C1.96,14.66 3,17.21 4.93,19.06C6.78,21 9.34,22.04 12,22C14.66,22.04 17.21,21 19.06,19.07C21,17.22 22.04,14.66 22,12C22.04,9.34 21,6.78 19.07,4.93M17,12V18H13.5V13H10.5V18H7V12H5L12,5L19.5,12H17Z" />
                </svg>
                </a>
                <h2 class="text-white ml-3 h2-responsive">Total: {{ dinero($total) }}</h2>
            </div>
            <a data-toggle="modal" data-target="#VerProductos" class="border-0 btn btn-dark rounded-3 homepage-toggle-btn">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11 8C11 10.21 9.21 12 7 12C4.79 12 3 10.21 3 8C3 5.79 4.79 4 7 4C9.21 4 11 5.79 11 8M11 14.72V20H0V18C0 15.79 3.13 14 7 14C8.5 14 9.87 14.27 11 14.72M24 20H13V3H24V20M16 11.5C16 10.12 17.12 9 18.5 9C19.88 9 21 10.12 21 11.5C21 12.88 19.88 14 18.5 14C17.12 14 16 12.88 16 11.5M22 7C20.9 7 20 6.11 20 5H17C17 6.11 16.11 7 15 7V16C16.11 16 17 16.9 17 18H20C20 16.9 20.9 16 22 16V7Z" />
                </svg>
            </a>
            </div>
            </section>
    </div>


    <x-comandero.iconos.categorias />

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
                     


</div>
