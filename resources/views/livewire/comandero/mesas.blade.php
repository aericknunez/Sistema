<div>
    
        <section class="bg-info p-3">
    
            <div class="d-flex align-items-center">
                <div class="h1-responsive text-white">Ordenes Pendientes</div>
                {{-- <div class="search_item shadow-sm p-1 input-group rounded-3 mr-3">
                    <a href="{{ route('comandero.mesas') }}" class="border-0 btn btn-info rounded-3">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19.07,4.93C17.22,3 14.66,1.96 12,2C9.34,1.96 6.79,3 4.94,4.93C3,6.78 1.96,9.34 2,12C1.96,14.66 3,17.21 4.93,19.06C6.78,21 9.34,22.04 12,22C14.66,22.04 17.21,21 19.06,19.07C21,17.22 22.04,14.66 22,12C22.04,9.34 21,6.78 19.07,4.93M17,12V18H13.5V13H10.5V18H7V12H5L12,5L19.5,12H17Z" />
                    </svg>
                    </a>
                <a href="{{ route('comandero.mesas') }}" class="btn-floating btn-sm btn-info"><i class="fas fa-home"></i></a>

                    <h2 class="text-white ml-3">Hibrido</h2>
                </div> --}}
            </div>
            </section>

    <x-comandero.mesas-all :mesas="$mesasAll" />
    <x-comandero.botones-mesas />


    <x-comandero.modal-add-mesa :clientes="$clientes" />
    <x-comandero.modal-datos :ordenes="$ordenesCant" :clientes="$clientesCant" />

</div>
