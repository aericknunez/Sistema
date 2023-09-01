<div>

    
    @if (count($datos))
        
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Cuenta</th>
                  <th scope="col">Factura</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Abonos</th>
                  <th scope="col">Saldo</th>
                  <th scope="col">Vencimiento</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $cuenta)

                    <tr>
                        <td>{{ $cuenta->proveedor->nombre }}</td>
                        <td>{{ $cuenta->nombre }}</td>
                        <td>{{ $cuenta->factura }}</td>
                        <td>{{ dinero($cuenta->cantidad) }}</td>
                        <td>{{ dinero($cuenta->abonos) }}</td>
                        <td>{{ dinero($cuenta->saldo) }}</td>
                        <td>{{ formatJustFecha($cuenta->caducidad) }}</td>
                        <td>
                          @if ($cuenta->edo == 1)
                          <div class="text-success font-weight-bold">Activo</div>
                          @else
                          <div class="text-danger font-weight-bold">Pagado</div>
                          @endif 
                        </td>
                        
                        <td>
                            <div>
                            <a wire:click="cuentaSelect({{ $cuenta->id }})" data-toggle="modal" data-target="#ModalAddAbono" class="mr-3" title="Agregar Abonos"><i class="fas fa-list blue-text fa-lg"></i></a>
                            @if ($cuenta->abonos == 0)
                                <a title="Eliminar Producto" wire:click="$emit('deleteCuenta', {{ $cuenta->id }})"><i class="fa fa-trash red-text fa-lg"></i></a>
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach    
    
              </tbody>
          
            </table>
          </div>

        @else

      <x-globales.no-registros />
        
    
        @endif
    
    </div>
    