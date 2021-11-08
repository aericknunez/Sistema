<div>

    @if (count($datos))
        
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Modificador</th>
                  <th scope="col">Opciones</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $opcion)
                    <tr>
                        <td><div class="font-weight-bold text-uppercase">{{ $opcion->nombre }}</div></td>
                        <td><div class="text-uppercase">
                          @foreach ($opcion->sub as $subOption)
                            {{ $subOption->nombre }} | 
                          @endforeach
                        </div></td>
                        <td>
                            <div>
                              <a wire:click="editar({{ $opcion->id }})" wire:key="{{ $loop->index }}" class="btn btn-mdb-color btn-sm"><i class="fas fa-file-signature"></i> Modificar</a>
                              <a wire:click="$emit('deleteOpcion', {{ $opcion->id }})" wire:key="{{ $loop->index }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar </a>
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
    