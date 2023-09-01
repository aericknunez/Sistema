<div class="modal"  wire:ignore.self id="ModalCategoria" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">MODIFICAR CATEGORIAS</h5>

        </div>
        <div class="modal-body">


<div class="card">
    <div class="ml-3 mt-2 font-weight-bold">Categorias Disponibles</div>
    <ul class="list-group">
        @foreach ($datos as $categoria)
        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
            {{ $categoria->nombre }}
            
            {{-- <a class="btn-floating btn-sm btn-success"><i class="fas fa-plus fa-sm"></i></a> --}}
            <a wire:click="addCategoria({{ $categoria->id }})"><i class="fas fa-plus green-text fa-lg"></i></a>
        </li>
        @endforeach
    </ul> 
</div>

   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>