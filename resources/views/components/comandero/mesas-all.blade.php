<div>
    @if (count($mesas))
        
    <section class="p-3">
            @foreach ($mesas as $mesa)

                <div class="order_detail order_detail-2 mb-2 bg-light p-3 box_rounded">
                    <a wire:click="ordenSelect({{ $mesa->id }})" class="d-flex align-items-center pb-3">
                        <div class="bg-white box_rounded">
                            <img src="{{ asset('img/imagenes/' . nombreMesa($mesa->clientes)) }}" class="img-fluid rounded">
                        </div>
                        <div class="ml-3 d-flex w-100">
                        <div class="text-dark">
                            <p class="mb-1 fw-bold" style="font-size:large;"><strong>{{ $mesa->nombre_mesa }}</strong></p> 
                            <p class="small text-muted mb-0">{{ formatFecha($mesa->created_at) }} <span class="ml-1">
                                    @if (App\System\Ventas\MesasPropiedades::cantidadSinGuardar($mesa->id))
                                        <i class="fas fa-exclamation-triangle fa-xs red-text"></i>
                                    @else
                                        <i class="fas fa-save fa-xs green-text"></i>
                                    @endif
                                {{ $mesa->usuario }}</span></p>
                        </div>
                        <div class="badge bg-success ml-auto mb-auto">{{ $mesa->clientes }}</div>
                        </div>
                    </a>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('comandero.cambios') }}" class="btn 
                        @if (isLatam() == true)
                        btn-outline-success
                        @else
                        btn-outline-primary
                        @endif
                 btn-block mr-1 box_rounded w-50 btn-sm py-2">Dividir Cuenta</a>

                        <a wire:click="ordenSelect({{ $mesa->id }})" class="btn 
                            @if (isLatam() == true)
                        btn-success
                        @else
                        btn-primary
                        @endif
                         btn-block ml-1 box_rounded w-50 btn-sm py-2">Ir a detalles</a>
                        
                    </div>
                </div>
                
            @endforeach
        </section>

    @else
        <div class="text-center mt-5">
            <img src="{{ getLogo() }}" width="200">
            <div class="bg-danger mt-1 h4 text-white">No existen ordenes pendientes</div>
        </div>
    @endif
</div>