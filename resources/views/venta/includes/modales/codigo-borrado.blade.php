<div class="modal" wire:ignore.self id="ModalCodigoBorrado" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-sm z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">INGRESE EL CODIGO DE SEGURIDAD</h5>

        </div>
        <div class="modal-body">

          <form wire:submit.prevent="validarCodigoOrden()">
            <div class="form-group green-border-focus">
              <label for="codigo_borrado">Codigo de Seguridad</label>
              <input type="text" class="form-control" id="codigo_borrado" wire:model="codigo_borrado" placeholder="45F8">
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