<div class="modal" wire:ignore.self id="ModalCambiarCliente" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">CAMBIAR CLIENTE</h5>

        </div>
        <div class="modal-body">


          
          <input wire:model="search" type="text" class="form-control" placeholder="Cliente...">

         @if ($busqueda)

          <table class="table table-striped table-sm table-hover click">
            @foreach ($busqueda as $cliente)
              <tr>
                <td scope="row">
                  <a wire:click="btnChangeClient({{ $delivery }}, {{ $cliente->id }})" >
                  <div class="row">
                    <div class="col-2">
                      <img src="{{ asset('img/imagenes/avatar.png') }}" class="img-fluid img-responsive" alt="Avatar">
                      </div>
                      <div class="col-10">
                      <h4>{{ $cliente->nombre }}</h4>
                      <strong>Tel: {{ $cliente->telefono }}</strong>  |  <strong>{{ $cliente->documento }}</strong>
                    </div>
                  </div>
                  </a>
                </td>
              </tr>
            @endforeach
            <tr>
              <td scope="row" class="click"><a wire:click="cancelar()" ><div class="col-md-12">CANCELAR</div></a></td>
            </tr>
          </table>

           
         @endif


        </div>
        <div class="modal-footer">
          <a class="btn btn-blue-grey btn-rounded btn-sm" data-toggle="modal" data-target="#ModalAddCliente" data-dismiss="modal">Agregar Cliente</a>

          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>