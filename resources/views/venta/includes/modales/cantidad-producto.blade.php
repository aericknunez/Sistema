<div class="modal" wire:ignore.self id="ModalCantidadProducto" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-sm z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR CANTIDAD PRODUCTO</h5>

        </div>
        <div class="modal-body">

          <form wire:submit.prevent="btnCambiarCantidad">
            <div class="form-group green-border-focus">
              <div class="h4 font-bold" for="cantidadproducto">Cantidad Actual: {{ $cantidadActual }}</div>
              <input type="number" class="form-control" id="cantidadproducto" min="1" wire:model="cantidadproducto">
              <div class="h4 font-bold" >Resultado: 
                @if ($cantidadproducto)
                  {{ $cantidadproducto + $cantidadActual }}
                  @if ($cantidadproducto + $cantidadActual > 0)
                    <div class="text-right">
                      <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                  @else
                    <div class="red-text">Valor no válido</div>
                  @endif
                @else
                  {{ $cantidadActual }}
                  @if ($cantidadActual > 0)
                    <div class="text-right">
                      <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                  @else
                    <div class="red-text">Valor no válido</div>
                  @endif
                @endif
                </div>
            </div>
          </form>
            
   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>