<div class="modal" wire:ignore.self id="AddAsignado" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">ASIGNAR PRODUCTO</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}

                <form  class="md-form" wire:submit.prevent="btnAddAsignado">
                    

                    <div class="md-form my-0">
                        <input type="text" wire:model.defer="producto" id="producto" class="form-control mb-3" placeholder="Producto">
                        @error('producto')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    
                    <ul class="list-group mb-3">
                        @if ($proSelect)         
                            @foreach ($proSelect as $data)
                                <li class="my-1 border d-flex justify-content-between align-items-center">
                                    {{ $data->dependientes->dependiente }}
                                    <i class="fas fa-times-circle red-text fa-lg"></i>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    
                    
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