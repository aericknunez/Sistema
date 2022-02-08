<div>

    @if (count($datos))
            
          <div class="table-responsive">
              <table class="table table-sm table-hover table-striped table-round">
                <thead>
                  <tr>
                    <th scope="col">Producto</th>
                    <th scope="col" data-toggle="tooltip" data-html="true"
                    title="<p>Producto del que depende</p>">Depende</th>
                    <th scope="col" data-toggle="tooltip" data-html="true"
                    title="<p>Porciones que dependen del producto principal</p>">Relación</th>
                    <th scope="col">Cantidad Relacionada</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
      
                  @foreach ($datos as $dato)
  
                      <tr>
                          <td class="font-weight-bold text-uppercase">{{ $dato->dependiente }}</td>
                          <td class="text-uppercase text-center">{{ $dato->product->medida->unidad }} de {{ $dato->product->producto }}</td>
                          <td class="text-uppercase text-center">{{ $dato->relacion }}</td>
                          <td class="font-weight-bold text-uppercase text-center">{{ $dato->cantidad_descontar }}</td>
                          <td>
                            <a wire:click="seleccionarProducto({{ $dato->id }})" data-toggle="modal" data-target="#ProductoNuevo" title="Editar Producto"><i class="fas fa-edit fa-2x green-text mx-2"></i></a>
                            <a wire:click="$emit('deleteProducto', {{ $dato->id }})" title="Eliminar Producto"><i class="fas fa-trash fa-2x red-text mx-2"></i> </a>
                                                        
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
      