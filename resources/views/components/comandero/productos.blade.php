<div class="modal" wire:ignore.self id="VerProductos" tabindex="-1" role="dialog" data-backdrop="true">
  <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">

      <div class="modal-header">
        {{-- <h5 class="modal-title">SELECCIONAR CLIENTE</h5> --}}
      </div>


      @if ($datos)
      {{-- Ordeno los datos por codigo para despues procesarlos --}}
      @php
        $datos = $datos->sortBy('cod');
        $datos->values()->all();
        $count = 0;
      @endphp


      
<section class="p-3 body_rounded mt-n5 bg-white">
  <p class="text-danger fw-bold mb-3 fs-6 d-flex justify-content-between click">Detalles de la Orden

    <a class="h5 pointer" wire:click="delOrden">
      <span class="mdi mdi-delete-forever text-danger"></span>
    </a>

  </p>
  <div class="details-page">

    
    @foreach ($datos as $producto)      



    @if ($count != $producto->cod)
    @php
    $cod = $datos->where('cod', $producto->cod);
    $cod->all();

    $cant = count($cod);
    $totales = $cod->sum('total');

    $count = $producto->cod;
    @endphp

      <div class="d-flex align-items-center click">
        <p class="bg-light rounded px-2 mr-3 text-muted">{{ $cant }}</p>
        <p class="text-dark">{{ $producto->producto }}</p>
        <p class="ml-auto"><span class="mr-2 text-danger small">{{ $producto->pv }}</span>{{ dinero($totales) }} </p>
        <p><a wire:click="delProducto({{ $producto->id }})" wire:loading.attr="disabled" class="ml-2 bg-light rounded px-2 mr-3 text-muted pointer"><span class="mdi mdi-trash-can text-danger""></span></a></p>
      </div>      
          @endif


          @endforeach


          @if ($porcentaje > 0)

          <div class="d-flex align-items-center">
              <div class="text-dark fs-6 fw-bold col-6 text-left">SubTotal:</div>
              <div class="ml-auto fw-bold text-danger fs-6">{{ dinero($subtotal) }}</div>
          </div>
          <div class="d-flex align-items-center">
              <div class="text-dark fs-6 fw-bold col-6 text-left">Propina | {{ nFormat($porcentaje) }}%:</div>
              <div class="ml-auto fw-bold text-danger fs-6">{{ dinero($propina) }}</div>
          </div>        
        
        @endif



  </div>
  </section>

  @else
  <div class="text-center"><img src="{{ asset("img/logo/logo.png") }}" alt="" class="img-fluid hoverable">
  No se encuentran productos</div>
  @endif

      <section class="p-3 body_rounded mt-n5 bg-dark fixed-bottom">
        <h6 class="text-white mb-1">Total de la Orden</h6>
        <div class="rating-star d-flex align-items-center fs-3">
        <div class="h1 text-warning mr-2">{{ dinero($total) }}</div>
        <button class="btn btn-warning ml-auto px-4" data-dismiss="modal">Cerrar</button>
        </div>
        </section>



    </div>
  </div>
</div>