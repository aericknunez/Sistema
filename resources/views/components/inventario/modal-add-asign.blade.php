<div wire:ignore.self class="modal" id="AddAsignado" tabindex="-1" role="dialog" data-backdrop="true">
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
                        <select class="mdb-select md-form" searchable="Busque Aqui.." wire:model.defer="dependiente">
                            <option value="" disabled selected>Elija una opción</option>
                            @foreach ($dependientes as $dependiente)
                                <option value="{{ $dependiente->id }}">{{ $dependiente->dependiente }}</option>
                            @endforeach
                        </select>
                    </div>


            
                    
                    
                    <div class="text-right">
                        <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                </form>


                <ul class="list-group mb-3">
                    @if ($datos)         
                        @foreach ($datos as $data)
                            <li class="my-1 border d-flex justify-content-between align-items-center">
                                {{ $data->dependientes->dependiente }}
                                <a wire:click="delAsignado({{ $data->id }})"><i class="fas fa-times-circle red-text fa-lg"></i></a>
                            </li>
                        @endforeach
                    @endif
                </ul>

                </div>
            </div>
            
   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>