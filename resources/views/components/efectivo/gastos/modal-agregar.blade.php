<div class="modal" wire:ignore.self id="ModalAddGasto" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR NUEVO GASTO</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}

                <form  class="md-form" wire:submit.prevent="btnGasto">
      
                    <small>Tipo Gasto</small>
                    <select class="browser-default custom-select mb-3" wire:model="tipo" id="tipo">
                        <option value="1">Sin Comprobante</option>
                        <option value="2">Con Comprobante</option>
                        <option value="3">Adelanto a personal</option>
                    </select>
                    @error('tipo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror


                    <input type="text" wire:model.defer="nombre" class="form-control mb-3" placeholder="Gasto" id="nombre">
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    <div class="form-group green-border-focus mt-4">
                        <textarea class="form-control" id="descripcion" placeholder="Descripcion" rows="3" wire:model.defer="descripcion" id="descripcion"></textarea>
                    </div>
                    @error('descripcion')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
      

                <small>Tipo Pago</small>
                <select class="browser-default custom-select mb-3" wire:model="tipo_pago"  id="tipo_pago">
                    <option value="1">Efectivo</option>
                    <option value="2">Tarjeta</option>
                    <option value="3">Transferencia</option>
                    <option value="4">Cheque</option>
                </select>
                @error('tipo_pago')
                    <span class="text-danger">{{$message}}</span>
                @enderror   

                    <input type="number" step="any" wire:model.defer="cantidad" class="form-control mb-3" placeholder="Cantidad" id="cantidad">
                    @error('cantidad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                @if ($tipo['tipo_pago'] != 1)
                    <small>Cuenta Transferencia</small>
                    <select class="browser-default custom-select mb-3" wire:model.defer="idbanco" id="idbanco">
                        <option selected>Seleccione ...</option>  
                        @foreach ($datos['bancos'] as $dato)
                            <option value="{{ $dato->id }}">{{ $dato->banco }}</option>  
                        @endforeach
                    </select>
                    @error('idbanco')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                   
                @endif



            @if ($tipo['tipo'] == 2)
                        
                    <small>Tipo Comprobante</small>
                    <select class="browser-default custom-select mb-3" wire:model="tipocomprobante" id="tipocomprobante">
                        <option value="1">Ninguno</option>
                        <option value="2">Ticket</option>
                        <option value="3">Factura</option>
                        <option value="4">Credito Fiscal</option>
                        <option value="5">Otro</option>
                    </select>
                    @error('tipocomprobante')
                        <span class="text-danger">{{$message}}</span>
                    @enderror      

            @endif
  
            @if ($tipo['tcomprobante'] != 1)
                <input type="text" wire:model.defer="comprobante" id="comprobante" class="form-control mb-3" placeholder="Comprobante">
                @error('comprobante')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            @endif    



                

                    <small>Categoria Gasto</small>
                    <select class="browser-default custom-select mb-3" wire:model.defer="cat_gasto" id="cat_gasto">
                        @foreach ($datos['categorias'] as $dato)
                            <option value="{{ $dato->id }}">{{ $dato->categoria }}</option>  
                        @endforeach
                    </select>
                    @error('cat_gasto')
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