<div class="modal" wire:ignore.self id="ModalAddRemesa" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR NUEVA REMESA</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}

                <form  class="md-form" wire:submit.prevent="btnRemesa">
      
                    
                    <input type="text" wire:model.defer="nombre" class="form-control mb-3" placeholder="Remesa">
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    <div class="form-group green-border-focus mt-4">
                        <textarea class="form-control" id="descripcion" placeholder="Descripcion" rows="3" wire:model.defer="descripcion"></textarea>
                    </div>
                    @error('descripcion')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    <input type="number" step="any" wire:model.defer="cantidad" class="form-control mb-3" placeholder="Cantidad">
                    @error('cantidad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <input type="text" wire:model.defer="comprobante" class="form-control mb-3" placeholder="Comprobante">
                    @error('comprobante')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <select class="browser-default custom-select mb-3" wire:model.defer="idbanco">
                        @foreach ($datos as $dato)
                            <option value="{{ $dato->id }}">{{ $dato->banco }}</option>  
                        @endforeach
                    </select>
                    @error('idbanco')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                    
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