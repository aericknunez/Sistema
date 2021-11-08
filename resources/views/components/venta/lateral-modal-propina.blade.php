<div class="modal" id="ModalPropina" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-sm z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">ESTABLECER PROPINA</h5>

        </div>
        <div class="modal-body">

          <form wire:submit.prevent="btnPropina">

          <div class="row">
            <div class="col-12">
              <div class="switch">
                <label>
                  Porcentaje
                  <input type="checkbox" wire:model.defer="propinaTipo">
                  <span class="lever"></span> 
                  Cantidad
                </label>
              </div>
          </div>
          </div>

          <div class="row">
                <label class="sr-only" for="propina">Propina</label>
                <div class="input-group mb-2 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">$ </div>
                  </div>
                  <input type="text" class="form-control py-0" wire:model.defer="propinaInput" placeholder="Propina">
                </div>
          
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