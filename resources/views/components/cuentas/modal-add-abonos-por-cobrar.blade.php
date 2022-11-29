<div class="modal" wire:ignore.self id="ModalAddAbono" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-lg z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Abono</h5>

        </div>
        <div class="modal-body">

            @if ($datos)

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">

                    <div class="row">
                        <div class="col-6 text-center mt-2"><small>Abonos</small><div class="h2-responsive">{{ dinero($datos->abonos) }}</div></div>
                        <div class="col-6 text-center mt-2"><small>Saldo</small><div class="h2-responsive">{{ dinero($datos->saldo) }}</div></div>
                    </div>

                    @if ($datos->edo == 1)
                                       
                        <form wire:submit.prevent="btnAddAbono">
                

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

                        @if ($tipo != 1)
                            <small>Cuenta Transferencia</small>
                            <select class="browser-default custom-select mb-3" wire:model.defer="idbanco" id="idbanco">
                                <option selected>Seleccione ...</option>  
                                @foreach ($bancos as $banco)
                                    <option value="{{ $banco->id }}">{{ $banco->banco }}</option>  
                                @endforeach
                            </select>
                            @error('idbanco')
                                <span class="text-danger">{{$message}}</span>
                            @enderror                   
                        @endif
                        


                            <div class="md-form my-0">
                                <div class="md-form">
                                    <input type="number" step="any" id="cAbono" class="form-control" wire:model.defer="cAbono">
                                    <label for="cAbono">Cantidad</label>
                                    @error('cAbono')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="text-right">
                                <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                            </div>
                        </form>
                    @else
                        <div class="h3 mt-3 border border-danger bordeado-x1 text-center red-text">CUENTA PAGADA</div>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                    <div class="h2-responsive">{{ $datos->nombre }}</div>
                    <p>{{ $datos->detalles }}</p>

                    {{-- {{ $datos->factura }} --}}
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Cant</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Total</th>
                              </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos->factura->productos as $producto)
                            <tr>
                                <td>{{$producto->cantidad}}</td>
                                <td>{{$producto->producto}}</td>
                                <td>{{$producto->total}}</td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-1">
                        <small>Total credito</small>
                        <div class="h1-responsive">{{ dinero($datos->cantidad) }}</div>
                    </div>
                    <strong>Comprobante: {{ tipoVenta($datos->comprobante) }} <br> Factura: {{ $datos->factura->factura }}</strong>
                    <div>  
                        @if ($datos->caducidad)
                        Vence: {{ formatJustFecha($datos->caducidad) }}
                        @endif
                    </div>
                    {{-- contenido --}}
                </div>
            </div>
        </div>
    </div>
            

    {{-- Abonos --}}

    <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Usuario</th>
            <th scope="col">Estado</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($datos->misabonos as $abono)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ formatFecha($abono->created_at) }}</td>
                <td>{{ dinero($abono->cantidad) }}</td>
                <td>{{ $abono->usuario }}</td>
                <td>
                @if ($abono->edo == 1)
                <div class="text-success font-weight-bold">Activo</div>
                @else
                <div class="text-danger font-weight-bold">Eliminado</div>
                @endif    
                </td>
                <td>
                    @if (formatJustFecha($abono->created_at) == date("d-m-Y") and $abono->edo == 1)
                                <a title="Eliminar Abono" wire:click="$emit('deleteAbono', {{ $abono->id }})"><i class="fa fa-trash red-text fa-lg"></i></a>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
      </table>





    @endif




        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>