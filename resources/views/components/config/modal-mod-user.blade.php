<div class="modal" wire:ignore.self id="ModalModUser" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-sm z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar tipo de Usuario</h5>

        </div>
        <div class="modal-body">


            <div class="card">
                <div class="card-body">

                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button id="botones" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Seleccionar Tipo
                          </button>
                          <div class="dropdown-menu" aria-labelledby="botones">
                            <a class="dropdown-item" wire:click="changeUser(2)">{{ tipoUsuario(2) }}</a>
                            <a class="dropdown-item" wire:click="changeUser(3)">{{ tipoUsuario(3) }}</a>
                            <a class="dropdown-item" wire:click="changeUser(4)">{{ tipoUsuario(4) }}</a>
                            <a class="dropdown-item" wire:click="changeUser(5)">{{ tipoUsuario(5) }}</a>
                          </div>
                        </div>
                      </div>

                </div>
            </div>


        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>