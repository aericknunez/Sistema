<div class="modal" id="ModalTipoPago" tabindex="-1" role="dialog" data-backdrop="true">
        <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
          <div class="modal-content bordeado-x1">
            <div class="modal-header">
              <h5 class="modal-title">TIPO DE PAGO</h5>
    
            </div>
            <div class="modal-body">
    
              <div class="text-center"><a class="btn {{ getColorBoton(1) }}" wire:click="btnTipoPago(1)" wire:key="1"><i class="fas fa-dollar-sign mr-1"></i>Efectivo</a>
                <a class="btn {{ getColorBoton(2) }}" wire:click="btnTipoPago(2)" wire:key="2"><i class="fas fa-credit-card mr-1"></i>Tarjeta de Credito</a>
                <a class="btn {{ getColorBoton(3) }}" wire:click="btnTipoPago(3)" wire:key="3"><i class="fab fa-bitcoin mr-1"></i>BitCoin</a>
                
        
                </div>          
                
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>