<div class="modal" wire:ignore.self id="ModalAddCliente" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">Nuevo Cliente</h5>

        </div>
        <div class="modal-body">


<form wire:submit.prevent="btnAddCliente">
          

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
                        <input type="text" id="identidad" class="form-control" wire:model.defer="identidad">
                        <label for="identidad">No Identidad</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="fnac" class="form-control" wire:model.defer="nacimiento">
                        <label for="fnac">Fecha Nacimiento</label>
                    </div>
                </div>
            </div>



            <!-- Collapse buttons -->
<div>
<a class="btn btn-link btn-sm  my-0" data-toggle="collapse" href="#contribuyente" aria-expanded="false" aria-controls="contribuyente">
Datos Contribuyente
</a>
</div>
<!-- / Collapse buttons -->

<!-- Collapsible element -->
<div class="collapse my-0" id="contribuyente">
<div class="my-0">
{{-- Form  --}}
<div class="form-row my-0">
    <div class="col">
        <div class="md-form">
            <input type="text" id="contribuyente" class="form-control" wire:model.defer="cliente">
            <label for="contribuyente">Contribuyente</label>
        </div>
    </div>
    <div class="col">
        <div class="md-form">
            <input type="text" id="documento" class="form-control" wire:model.defer="documento">
            <label for="documento">{{ paisDocumento(session('config_pais')) }}</label>
        </div>
    </div>
</div>


<div class="form-row my-0">
    <div class="col">
        <div class="md-form">
            <input type="text" id="registro" class="form-control" wire:model.defer="registro">
            <label for="registro">Registro</label>
        </div>
    </div>
    <div class="col">
        <div class="md-form">
            <input type="text" id="giro" class="form-control" wire:model.defer="giro">
            <label for="giro">Giro</label>
        </div>
    </div>
</div>

<div class="form-row my-0">
    <div class="col">
        <div class="md-form">
            <input type="text" id="departamento" class="form-control" wire:model.defer="departamento_doc">
            <label for="departamento">Departamento</label>
        </div>
    </div>
    <div class="col">
        <div class="md-form">
            <input type="text" id="direccion_doc" class="form-control" wire:model.defer="direccion_doc">
            <label for="direccion_doc">Direcci&oacuten</label>
        </div>
    </div>
</div>
{{-- form  --}}
</div>
</div>
<!-- / Collapsible element -->







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