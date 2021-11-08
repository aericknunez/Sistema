<div class="modal"  wire:ignore.self id="ModalPrecio" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-sm z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR NUEVO PRECIO</h5>

        </div>
        <div class="modal-body">

          <form wire:submit.prevent="updatePrecio">
            <div class="form-group green-border-focus">
              <label for="precio">Precio</label>
              <input type="text" class="form-control" id="precio" wire:model.defer="precio">
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