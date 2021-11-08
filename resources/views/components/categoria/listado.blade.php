<div>

    
@if (count($datos))
    
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped table-round">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Categoria</th>
              <th scope="col">Editar</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($datos as $categoria)
                <tr>
                    <th scope="row"><img src="{{ asset('img/ico/'. $categoria->img) }}" class="imgSize img-fluid z-depth-1 rounded-circle" alt="Responsive image"></th>
                    <td><div class="font-weight-bold text-uppercase">{{ $categoria->nombre }}</div></td>
                    <td>
                        <div>
                          <a wire:click="editar({{ $categoria->id }})" class="btn btn-mdb-color btn-sm"><i class="fas fa-file-signature"></i> Modificar</a>
                          <a wire:click="$emit('deleteCategory', {{ $categoria->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar </a>
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
