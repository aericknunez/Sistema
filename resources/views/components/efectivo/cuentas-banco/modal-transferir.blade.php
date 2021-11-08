<div class="modal" wire:ignore.self id="ModalTransferir" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">TRANSFERIR FONDOS</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}

                <form  class="md-form" wire:submit.prevent="btnTransferir">

                    <div class=" my-2">
                        <div>
                            <select class="browser-default custom-select mb-3" wire:model="origen">
                                @foreach ($datos as $data)
                                     <option value="{{$data->id}}">{{$data->cuenta}} | {{ $data->banco }}</option>
                                @endforeach
                             </select>
                             @error('origen')
                                 <span class="text-danger">{{$message}}</span>
                             @enderror
                        </div>
     
                         <div class="h2 z-depth-2 bordeado-x2 text-center mt-3">{{ dinero($origenx[0]['saldo']) }}</div>
                    </div>

                    


                    <div class=" my-2">
                        <div>
                            <select class="browser-default custom-select mb-3" wire:model="destino">
                                @foreach ($datos as $data)
                                    <option value="{{$data->id}}">{{$data->cuenta}} | {{ $data->banco }}</option>
                                @endforeach
                            </select>
                            @error('destino')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
    
                        <div class="h2 z-depth-2 bordeado-x2 text-center mt-3">{{ dinero($destinox[0]['saldo']) }}</div>
                    </div>


                    
                    <div class="mt-2">
                        <input type="number" step="any" wire:model.defer="cantidad" class="form-control mb-3" placeholder="Cantidad a Transferir">
                    @error('cantidad')
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