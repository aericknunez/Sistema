<div class="modal" wire:ignore.self id="ModalAddCuenta" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">Nueva Cuenta</h5>

        </div>
        <div class="modal-body">


<form wire:submit.prevent="btnAddCuenta">
          
            <!-- Material form register -->
<div class="card">
    <!--Card content-->
    <div class="card-body px-lg-5 pt-0" style="color: #757575;">


        <div class="md-form my-0 mt-4">
            <small>Proveedor</small>
            <select class="browser-default custom-select mb-3" wire:model.defer="proveedor" id="proveedor">
                <option >Elija un Proveedor</option>
                @foreach ($datos as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
            @error('proveedor')
                    <span class="text-danger">{{$message}}</span>
             @enderror
        </div>

            <div class="md-form my-0">
                <input type="text" id="nombre" class="form-control" wire:model.defer="nombre">
                <label for="nombre">Nombre de la Cuenta</label>
                @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                 @enderror
            </div>


            <div class="md-form my-0">
                <textarea id="detalles" name="detalles"  wire:model.defer="detalles" class="md-textarea form-control" rows="3"></textarea>
                <label for="detalles">Detalles</label>
            </div>


            <div class="form-row my-0">
                <div class="col">
                    <div class="md-form">
                        <input type="text" id="factura" class="form-control" wire:model.defer="factura">
                        <label for="factura">Factura</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <select class="browser-default custom-select" wire:model.defer="tdocumento" id="tdocumento">
                            <option >Tipo de Comprobante</option>
                            <option value="1">Ninguno</option>
                            <option value="2">Ticket</option>
                            <option value="3">Factura</option>
                            <option value="4">Credito Fiscal</option>
                            <option value="5">Otro</option>
                        </select>  

                    </div>
                </div>
            </div>


            <div class="form-row my-0">
                <div class="col">
                    <div class="md-form">
                        <input type="number" step="any" id="cantidad" class="form-control" wire:model.defer="cantidad">
                        <label for="cantidad">Cantidad</label>
                        @error('cantidad')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">

                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input wire:model.defer="fecha"  type="date" id="fecha" name="fecha" class="form-control">
                            <label for="fecha">Fecha Limite</label>
                        </div>
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

          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>