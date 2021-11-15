<div>

    
    @if (count($datos))
        
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Opciones</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $producto)

                    <tr>
                        <th scope="row" data-toggle="modal" data-target="#ModalIconos" wire:click="seleccionarProducto({{ $producto->id }})" class="pointer"><img src="{{ asset('img/ico/'. $producto->img) }}" class="imgSize img-fluid z-depth-1 rounded-circle" alt="Responsive image"></th>
                        <td><div class="font-weight-bold text-uppercase">{{ $producto->nombre }}</div></td>
                        <td><div class="font-weight-bold text-uppercase">
                          @if ($producto->categoria)
                            {{ $producto->categoria->nombre }}
                          @endif
                        </div>
                      </td>
                      <td>
                        @if ($producto->opciones)
                          @foreach ($producto->opciones as $opciones)
                          <div class="text-capitalize font-italic">{{ $opciones->nombre }} </div>
                          @endforeach
                        @endif
                      </td>
                        <td><div class="font-weight-bold text-uppercase">{{ dinero($producto->precio) }}</div></td>
                        <td>
                            <div>
                              <a title="Cambiar Precio" data-toggle="modal" data-target="#ModalPrecio" wire:click="selectProduct({{ $producto->id }})"><i class="fa fa-money-bill-alt red-text fa-lg"></i></a>
                              <a title="Cambiar Nombre" data-toggle="modal" data-target="#ModalNombre" wire:click="selectProduct({{ $producto->id }})"><i class="fas fa-file-signature green-text fa-lg"></i></a>
                              <a title="Modificar Opciones" data-toggle="modal" data-target="#ModalOpciones" wire:click="selectProduct({{ $producto->id }})"><i class="fas fa-hamburger blue-text fa-lg"></i></a>
                              <a title="Eliminar Producto" wire:click="$emit('deleteProducto', {{ $producto->id }})"><i class="fa fa-trash red-text fa-lg"></i></a>
                              {{-- <a wire:click="$emit('deleteProducto', {{ $producto->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar </a> --}}
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
    