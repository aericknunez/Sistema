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
                  <th scope="col">Panel</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $producto)

                    <tr>
                        <td scope="row" data-toggle="modal" data-target="#ModalIconos" wire:click="seleccionarProducto({{ $producto->id }})" class="pointer"><img src="{{ asset('img/ico/'. $producto->img) }}" class="imgSize img-fluid z-depth-1 rounded-circle" alt="Responsive image"></td>

                        <td><div class="font-weight-bold text-uppercase"><a title="Cambiar Nombre" data-toggle="modal" data-target="#ModalNombre" wire:click="selectProduct({{ $producto->id }})">{{ $producto->nombre }}</a> </div></td>

                        <td><div class="font-weight-bold text-uppercase">
                          @if ($producto->categoria)
                          <a title="Modificar categorias" data-toggle="modal" data-target="#ModalCategoria" wire:click="selectProduct({{ $producto->id }})">
                            {{ $producto->categoria->nombre }} </a>
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
                      <td><div class="font-weight-bold text-uppercase">
                        @if ($producto->panel)
                        <a title="Modificar Panel" data-toggle="modal" data-target="#ModalPanel" wire:click="selectProduct({{ $producto->id }})">
                          {{ $producto->paneles->nombre }} </a>
                        @else
                        N/A
                        @endif
                      </div>
                    </td>
                        <td><div class="font-weight-bold text-uppercase"><a title="Cambiar Precio" data-toggle="modal" data-target="#ModalPrecio" wire:click="selectProduct({{ $producto->id }})">{{ dinero($producto->precio) }}</a> </div>
                        </td>
                        
                        <td>
                            <div class="text-center">

                              
                              <div class="dropdown">
                                <a title="Opciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars fa-2x"></i></a>
                                <div class="dropdown-menu dropdown-primary">

                                    <a title="Cambiar Precio" data-toggle="modal" data-target="#ModalPrecio" wire:click="selectProduct({{ $producto->id }})" class="dropdown-item"><i class="fa fa-money-bill-alt red-text fa-lg"></i> Cambiar Precio</a>
                                    <a title="Cambiar Nombre" data-toggle="modal" data-target="#ModalNombre" wire:click="selectProduct({{ $producto->id }})"  class="dropdown-item"><i class="fas fa-file-signature green-text fa-lg"></i> Cambiar Nombre</a>
                                    <a title="Modificar Opciones" data-toggle="modal" data-target="#ModalOpciones" wire:click="selectProduct({{ $producto->id }})"  class="dropdown-item"><i class="fas fa-hamburger blue-text fa-lg"></i> Modificar Opciones</a>
                                    <a title="Modificar categorias" data-toggle="modal" data-target="#ModalCategoria" wire:click="selectProduct({{ $producto->id }})"  class="dropdown-item"><i class="fas fa-bars black-text fa-lg"></i> Modificar Categorias</a>
                                    <a title="Modificar Panel" data-toggle="modal" data-target="#ModalPanel" wire:click="selectProduct({{ $producto->id }})"  class="dropdown-item"><i class="fas fa-tv orange-text fa-lg"></i> Modificar Panel</a>
                                    <a title="Eliminar Producto" wire:click="$emit('deleteProducto', {{ $producto->id }})"  class="dropdown-item"><i class="fa fa-trash red-text fa-lg"></i> Eliminar Producto</a>
                                    
                                </div>
                            </div>


                              {{-- <a title="Cambiar Precio" data-toggle="modal" data-target="#ModalPrecio" wire:click="selectProduct({{ $producto->id }})"><i class="fa fa-money-bill-alt red-text fa-lg"></i></a>
                              <a title="Cambiar Nombre" data-toggle="modal" data-target="#ModalNombre" wire:click="selectProduct({{ $producto->id }})"><i class="fas fa-file-signature green-text fa-lg"></i></a>
                              <a title="Modificar Opciones" data-toggle="modal" data-target="#ModalOpciones" wire:click="selectProduct({{ $producto->id }})"><i class="fas fa-hamburger blue-text fa-lg"></i></a>
                              <a title="Modificar categorias" data-toggle="modal" data-target="#ModalCategoria" wire:click="selectProduct({{ $producto->id }})"><i class="fas fa-bars black-text fa-lg"></i></a>
                              <a title="Modificar Panel" data-toggle="modal" data-target="#ModalPanel" wire:click="selectProduct({{ $producto->id }})"><i class="fas fa-tv orange-text fa-lg"></i></a>
                              <a title="Eliminar Producto" wire:click="$emit('deleteProducto', {{ $producto->id }})"><i class="fa fa-trash red-text fa-lg"></i></a> --}}

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
    