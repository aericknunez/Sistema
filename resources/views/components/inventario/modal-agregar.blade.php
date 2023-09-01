<div class="modal" wire:ignore.self id="ModalAddProducto" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR NUEVO PRODUCTO</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}

                <form  class="md-form" wire:submit.prevent="btnAddProducto">
                    

                    <div class="md-form my-0">
                        <input type="text" wire:model.defer="producto" id="producto" class="form-control mb-3" placeholder="Producto">
                        @error('producto')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-row  my-0">
                        <div class="col">
                            <div class="md-form">
                                <input type="number" step="any" id="cantidad" class="form-control" wire:model.defer="cantidad" placeholder="Cantidad Inicial">
                                @error('cantidad')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="number" step="any" id="minimo" class="form-control" wire:model.defer="minimo" placeholder="Cantidad Minima">
                                @error('minimo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-row  my-0">
                        <div class="col">
                            <div class="md-form">
                                <div>Unidad de Medida</div>

                                <select class="browser-default custom-select" wire:model.defer="unidad">
                                    @foreach ($unidades as $unidad)
                                        <option value="{{ $unidad->id }}">{{ $unidad->unidad }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <div>Mostrar en resumen</div>

                                <div class="switch">
                                    <label>
                                      Off
                                      <input type="checkbox" wire:model.defer="mostrar">
                                      <span class="lever"></span> On
                                    </label>
                                </div>
                            </div>
                        </div>
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