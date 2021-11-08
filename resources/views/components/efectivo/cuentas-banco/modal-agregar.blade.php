<div class="modal" wire:ignore.self id="ModalAddCuenta" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR NUEVA CUENTA</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}

                <form  class="md-form" wire:submit.prevent="btnCuenta">

                    <select class="browser-default custom-select mb-3" wire:model="tipo">
                      <option value="1">TARJETA DE CREDITO</option>
                      <option value="2">CHEQUERA</option>
                      <option value="3">CUENTA BANCARIA</option>
                      <option value="4">CAJA CHICA</option>
                    </select>
                    @error('tipo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    
                    <input type="text" wire:model.defer="cuenta" class="form-control mb-3" placeholder="Numero de Cuenta">
                    @error('cuenta')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    <input type="text" wire:model.defer="banco" class="form-control mb-3" placeholder="Banco">
                    @error('banco')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    <input type="number" step="any" wire:model.defer="saldo" class="form-control mb-3" placeholder="Saldo Inicial">
                    @error('saldo')
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