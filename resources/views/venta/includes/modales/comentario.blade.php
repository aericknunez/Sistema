<div class="modal" wire:ignore.self id="ModalComentario" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR COMENTARIO</h5>

        </div>
        <div class="modal-body">

          <form wire:submit.prevent="btnComentario">
            <div class="form-group green-border-focus">
              <label for="comentario">Agregue su comentario</label>
              <textarea class="form-control" id="comentario" rows="3" wire:model.defer="comentario" ></textarea>
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