<div class="modal" wire:ignore.self id="ModalAddRepartidor" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">Nuevo Repartidor</h5>

        </div>
        <div class="modal-body">


<form wire:submit.prevent="btnAddRepartidor">
          

            <!-- Material form register -->
<div class="card">
    <!--Card content-->
    <div class="card-body px-lg-5 pt-0" style="color: #757575;">


            <div class="form-row  my-0">
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="nombre" class="form-control" wire:model.defer="nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="telefono" class="form-control" wire:model.defer="telefono">
                        <label for="telefono">Telefono</label>
                    </div>
                    @error('telefono')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="md-form my-0">
                <input type="text" id="direccion" class="form-control" wire:model.defer="direccion">
                <label for="direccion">Direcci&oacuten</label>
                @error('direccion')
                        <span class="text-danger">{{$message}}</span>
                 @enderror
            </div>


            <div class="md-form my-0">
                <input type="email" id="email" class="form-control" wire:model.defer="email">
                <label for="email">Email</label>
            </div>

            <div class="form-row my-0">
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="nacimiento" class="form-control" wire:model.defer="nacimiento">
                        <label for="nacimiento">Fecha Nac.</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="documento" class="form-control" wire:model.defer="documento">
                        <label for="documento">Documento</label>
                    </div>
                </div>
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

          <button wire:click="cerrarModal" type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>