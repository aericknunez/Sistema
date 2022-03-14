<div class="modal" wire:ignore.self id="ModalAddEntrada" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR NUEVA ENTRADA</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}

                
                <form  class="md-form" wire:submit.prevent="btnEntrada">

                    <small>Tipo de Transacción</small>
                    <select class="browser-default custom-select mb-3" wire:model.defer="tipo_movimiento" id="tipo_movimiento">
                        <option value="1">Ingreso de Efectivo</option>
                        <option value="2">Retiro de Efectivo</option>
                    </select>
                    @error('tipo_movimiento')
                        <span class="text-danger">{{$message}}</span>
                    @enderror


                    <div class="form-group green-border-focus mt-4">
                        <textarea class="form-control" id="descripcion" placeholder="Descripcion" rows="3" wire:model.defer="descripcion" id="descripcion"></textarea>
                    </div>
                    @error('descripcion')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
      

                    <small>Transferir a:</small>
                    <select class="browser-default custom-select mb-3" wire:model="tipo_pago"  id="tipo_pago">
                        <option value="1">Efectivo</option>
                        <option value="2">Tarjeta</option>
                        <option value="3">Transferencia</option>
                        <option value="4">Cheque</option>
                    </select>
                    @error('tipo_pago')
                        <span class="text-danger">{{$message}}</span>
                    @enderror   

                @if ($tipo != 1)
                    <small>Cuenta Transferencia</small>
                    <select class="browser-default custom-select mb-3" wire:model="idbanco" id="idbanco">
                        <option selected>Seleccione ...</option>  
                        @foreach ($datos as $dato)
                            <option value="{{ $dato->id }}">{{ $dato->banco }}</option>  
                        @endforeach
                    </select>
                    @error('idbanco')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                   
                @endif

                    <input type="number" step="any" wire:model.defer="cantidad" class="form-control mb-3" placeholder="Cantidad" id="cantidad">
                    @error('cantidad')
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