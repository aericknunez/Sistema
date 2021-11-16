<div class="modal"  wire:ignore.self id="ModalPanel" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">MODIFICAR PANEL</h5>

        </div>
        <div class="modal-body">


<div class="card">
    <div class="ml-3 mt-2 font-weight-bold">Panel Disponibles</div>
    <ul class="list-group">
        @foreach ($datos as $panel)
        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
            {{ $panel->nombre }}
            
            {{-- <a class="btn-floating btn-sm btn-success"><i class="fas fa-plus fa-sm"></i></a> --}}
            <a wire:click="addPanel({{ $panel->id }})"><i class="fas fa-plus green-text fa-lg"></i></a>
        </li>
        @endforeach
        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
            Nunguno
            <a wire:click="addPanel()"><i class="fas fa-plus green-text fa-lg"></i></a>
        </li>
    </ul> 
</div>

   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>