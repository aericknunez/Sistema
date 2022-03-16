<div class="modal" wire:ignore.self id="VerProductos" tabindex="-1" role="dialog" data-backdrop="true">
  <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">

      <div class="modal-header body_rounded bg-dark">
        <h5 class="h1-responsive text-warning">DETALLES DE LA ORDEN</h5>
      </div>



<div class="modal-body">
    {{-- <x-venta.lateral-productos :datos="$datos" /> --}}
    @php
      $productAgregado = $datos;
    @endphp
    @include('venta.includes.inicio.lateral-productos')


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


<br>
<br>
<br>



        <div class="modal-footer">
          {{--  <section class="p-6 body_rounded mt-n5 bg-dark fixed-bottom"> --}}
            {{-- </section> --}}

            <div class="bg-dark fixed-bottom body_rounded p-2">
              <h6 class="text-white mb-1 ml-3">Total de la Orden</h6>
              <div class="rating-star d-flex align-items-center fs-3">
              <div class="h1 text-warning ml-4">{{ dinero($total) }}</div>
              <button class="btn btn-warning ml-auto px-4" data-dismiss="modal">Cerrar</button>
              </div>
          </div>

        </div>



    </div>
  </div>
</div>