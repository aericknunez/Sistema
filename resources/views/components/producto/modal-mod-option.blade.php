<div class="modal"  wire:ignore.self id="ModalOpciones" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">MODIFICAR OPCIONES</h5>

        </div>
        <div class="modal-body">


<div class="card">
    <div class="ml-3 mt-2 font-weight-bold">Opciones Disponibles</div>
    <ul class="list-group">
        @foreach ($opciones as $opcion)
        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
            {{ $opcion->nombre }}
            
            {{-- <a class="btn-floating btn-sm btn-success"><i class="fas fa-plus fa-sm"></i></a> --}}
            <a wire:click="addOpcion({{ $opcion->id }})"><i class="fas fa-plus green-text fa-lg"></i></a>
        </li>
        @endforeach
    </ul> 
</div>

<div class="card mt-3">
    <div class="ml-3 mt-2 font-weight-bold">Opciones Agregadas</div>
    <ul class="list-group">
    @if ($agregados)   
        @foreach ($agregados as $datos)
            <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                {{ $datos->nombre_opcion }}
                
                <a wire:key="{{ $datos->id }}" wire:click="delOpcion({{ $datos->id }})"><i class="fas fa-trash red-text fa-lg"></i></a>
            </li>
        @endforeach
    @endif
    
    </ul> 
</div>
   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>