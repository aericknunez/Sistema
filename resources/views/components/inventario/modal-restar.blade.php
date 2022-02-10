<div class="modal" wire:ignore.self id="Del" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">DESCONTAR AVERIAS</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}

                <form  class="md-form" wire:submit.prevent="btnRestas">
                   
                    <div class="form-row  my-0">
                        <input type="number" step="any" id="cantRestas" class="form-control" wire:model.defer="cantRestas" placeholder="Cantidad a Descontar">
                        @error('cantRestas')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-row my-3">
                            <textarea class="form-control" id="comRestas" rows="3" wire:model.defer="comRestas" placeholder="Agregar Comentario"></textarea>
                    </div>


                    
                    
                    <div class="text-right">
                        <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                </form>

                </div>
            </div>
            
   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>