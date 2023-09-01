<div class="modal" wire:ignore.self id="ModalOtrasVentas" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">INGRESAR NUEVA VENTA</h5>

        </div>
        <div class="modal-body">

          <form wire:submit.prevent="btnOtrasVentas">
            <div class="form-group green-border-focus">
                <label for="otras_producto">Producto</label>
                <input type="text" class="form-control" id="otras_producto" wire:model.defer="otras_producto">
                @error('otras_producto')
                <span class="text-danger">{{$message}}</span>
                @enderror   
            </div>
            <div class="form-group green-border-focus">
                <label for="otras_cantidad">Cantidad</label>
                <input type="number" step="any" class="form-control" id="otras_cantidad" wire:model.defer="otras_cantidad">
                @error('otras_cantidad')
                <span class="text-danger">{{$message}}</span>
                @enderror   
            </div>
            <div class="text-right">
              <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
            </div>
          </form>
            
   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>