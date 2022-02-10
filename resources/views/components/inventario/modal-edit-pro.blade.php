<div class="modal" wire:ignore.self id="ProductoEdit" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR NUEVO PRODUCTO</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}
                <form  class="md-form" wire:submit.prevent="btnAddProducto">
                    


                    <div class="md-form my-0">
                        <input type="text" wire:model.defer="producto" id="producto" class="form-control mb-3" placeholder="Producto">
                        @error('producto')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>



                    <div class="md-form my-0">
                        <input type="number" step="any" id="relacion" class="form-control" wire:model.defer="relacion" placeholder="Relación">
                        @error('relacion')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
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