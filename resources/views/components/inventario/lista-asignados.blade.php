<div>

    @if (count($proIco))
  
          
          <div class="table-responsive">
              <table class="table table-sm table-hover table-striped table-round">
                <thead>
                  <tr>
                    <th scope="col" colspan="2" class="text-center">Producto</th>
                    <th scope="col">Asignados</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
      
                  @foreach ($proIco as $dato)
  
                      <tr>
                          <td><img src="{{ asset('img/ico/'. $dato->img) }}" class="imgSize img-fluid z-depth-1 rounded-circle" alt="Responsive image"></td>
                          <td class="font-weight-bold text-uppercase text-center">{{ $dato->nombre }}</td>
                          <td class="text-uppercase text-left">

                          <ul class="list-group">
                            @if ($dato->asignados)
                                @foreach ($dato->asignados as $data)
                                    @if ($data)
                                        <li class="my-1 border d-flex justify-content-between align-items-center">
                                          {{ $data->dependientes->dependiente }}
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                          </ul>

                          </td>
                          <td>
                            <a wire:click="seleccionarProducto({{ $dato->id }})" data-toggle="modal" data-target="#AddAsignado" title="Agregar Nuevo Asignado" class="btn btn-success"><i class="fas fa-plus"></i> Agregar</a>
                                                        
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
      