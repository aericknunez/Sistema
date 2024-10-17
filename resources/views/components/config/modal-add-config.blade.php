<div class="modal" wire:ignore.self id="ModalAddConfig" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar Configuraciones</h5>

        </div>
        <div class="modal-body">

            <form wire:submit.prevent="store">
          

                <!-- Material form register -->
    <div class="card">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0" style="color: #757575;">
    
    
            <div class="md-form my-0">
                <input type="text" id="cliente" class="form-control" wire:model.defer="cliente" placeholder="Cliente" title="Cliente">
                @error('cliente')
                        <span class="text-danger">{{$message}}</span>
                 @enderror
            </div>



                <div class="form-row  my-0">
                    <div class="col">
                        <div class="md-form">
                            <input type="text" id="slogan" class="form-control" wire:model.defer="slogan" placeholder="Eslogan" title="Eslogan">
                        </div>
                        @error('slogan')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="md-form">
                            <input type="text" id="telefono" class="form-control" wire:model.defer="telefono" placeholder="Teléfono" title="Teléfono">
                        </div>
                        @error('telefono')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
    
                <div class="md-form my-0">
                    <input type="text" id="direccion" class="form-control" wire:model.defer="direccion" placeholder="Dirección" title="Dirección">
                    @error('direccion')
                            <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>
    
    
                <div class="md-form my-0">
                    <input type="email" id="email" class="form-control" wire:model.defer="email" placeholder="Email" title="Email">
                </div>


    
                <div class="md-form my-0">
                    <input type="text" id="propietario" class="form-control" wire:model.defer="propietario" placeholder="Propietario" title="Propietario">
                </div>

    
    
    
                <!-- Collapse buttons -->
    <div>
    <a class="btn btn-link btn-sm  my-0" data-toggle="collapse" href="#contribuyente" aria-expanded="false" aria-controls="contribuyente">
    VER OTROS DATOS
    </a>
    </div>
    <!-- / Collapse buttons -->
    
    <!-- Collapsible element -->
    <div class="collapse my-0" id="contribuyente">
    <div class="my-0">
    {{-- Form  --}}
    <div class="form-row my-0">
        <div class="col">
            <div class="md-form my-0">
                <input type="number" step="any" id="imp" class="form-control" wire:model.defer="imp" placeholder="Impuesto" title="Impuesto">
            </div>
        </div>
        <div class="col">
            <div class="md-form my-0">
                <input type="text" id="nit" class="form-control" wire:model.defer="nit" placeholder="NIT" title="NIT">
            </div>
        </div>
    </div>
    
    
    <div class="form-row my-0">
        <div class="col">
            <div class="md-form my-0">
                <input type="text" id="propina" class="form-control" wire:model.defer="propina" placeholder="Propina" title="Propina">
            </div>
        </div>
        <div class="col">
            <div class="md-form my-0">
                <input type="text" id="giro" class="form-control" wire:model.defer="giro" placeholder="Giro" title="Giro">
            </div>
        </div>
    </div>
    
    <div class="form-row my-0">
        <div class="col">
            <div class="md-form my-0">
                <input type="number" step="any" id="envio" class="form-control" wire:model.defer="envio" placeholder="Envio" title="Envio">
            </div>
        </div>
        <div class="col">
            <div class="md-form my-0">
                <select class="browser-default custom-select pr-2" wire:model.defer="pais">
                    <option selected value="1">El Salvador</option>
                    <option value="2">Honduras</option>
                    <option value="3">Guatemala</option>
                </select>

            </div>
        </div>
    </div>

    <div class="form-row my-0">
        <div class="col">
            <div class="md-form mt-0 mb-2">
                <select class="browser-default custom-select pr-2" wire:model.defer="tipo_servicio" title="Tipo venta">
                    <option selected value="1">Venta Rápida</option>
                    <option value="2">Ventas en Mesa</option>
                </select>
    
            </div>
        </div>
    </div>

    <div class="form-row my-0">
        <div class="col">
            <div class="md-form my-0">
                <input type="file" wire:model.defer="logo">
                @error('logo') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col">
            <div class="md-form my-0">

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