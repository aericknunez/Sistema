<div class="modal" wire:ignore.self id="ModalAddUser" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR USUARIO</h5>

        </div>
        <div class="modal-body">

            <form wire:submit.prevent="addUser">
          

                <!-- Material form register -->
    <div class="card">
        <div class="card">
            <div class="card-header">
                Datos del Usuario
            </div>
        </div>
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0" style="color: #757575;">
    
    
            <div class="md-form my-0">
                <input type="text" id="nombre" class="form-control" wire:model.defer="nombre" placeholder="Nombre">
                @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                 @enderror
            </div>


            <div class="md-form my-0">
                <input type="email" id="email" class="form-control" wire:model.defer="email" placeholder="Email">
                @error('email')
                        <span class="text-danger">{{$message}}</span>
                 @enderror
            </div>


            <div class="md-form my-0">
                <input type="password" id="password" class="form-control" wire:model.defer="password" placeholder="Password">
                @error('password')
                        <span class="text-danger">{{$message}}</span>
                 @enderror
            </div>


            <div class="md-form my-0">
                <input type="password" id="password_confirmation" class="form-control" wire:model.defer="password_confirmation" placeholder="Confirmar Password">
                @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                 @enderror
            </div>

            <div class="md-form my-3">
                <select class="browser-default custom-select pr-2" wire:model.defer="tipo_user">
                    <option value="2">Gerente</option>
                    <option value="3">Administrador</option>
                    <option value="4">Cajero</option>
                    <option selected value="5">Mesero</option>
                    <option value="6">Invitado</option>
                </select>
            </div>


    
        </div>
    
    </div>
    <!-- Material form register -->
    
    <div class="text-right">
            <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
        </div>
    </form>


        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>