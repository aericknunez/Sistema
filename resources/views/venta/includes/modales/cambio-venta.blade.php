<div class="modal" wire:ignore.self id="ModalCambioVenta" tabindex="-1" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">RESUMEN DE LA VENTA</h5>

        </div>
        <div class="modal-body">

        <div class="text-center" wire:click="btnCerrarModal()" style="cursor: pointer;">

            <div class="row">
                <div class="col-6">Sub Total <span id="fact_subtotal"></span></div>
                <div class="col-6">Propina <span id="fact_propina"></span></div>
            </div>
            <hr class="mt-3">
            
            <p class="font-weight-bold">TOTAL:</p>
            <div class="display-4 font-weight-bold" id="fact_total"></div> <hr>
                        
            
            <p class="font-weight-bold">EFECTIVO:</p>
            <div class="display-4 font-weight-bold" id="fact_efectivo"></div> <hr>
            
            <p class="text-danger font-weight-bold">
              @if (session('tipo_pago') == 6)
              TARJETA:
              @else
              CAMBIO:
              @endif
              </p>
            <div class="display-4 text-danger font-weight-bold" id="fact_cambio"></div>
             
        
        </div>    
   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" wire:click="btnCerrarModal()">Cerrar</button>
        </div>
      </div>
    </div>
  </div>