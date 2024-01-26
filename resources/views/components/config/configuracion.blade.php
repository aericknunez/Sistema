<div>
    
    <div class="clearfix mb-2">
        <h2 class="h2 float-left">Datos del Sistema</h2> 
        <div class="float-right pointer click">
            <small wire:click="asignData()" data-toggle="modal" data-target="#ModalAddConfig"><i class="fas fa-edit"></i> Cambiar</small>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            {{-- @json($datos) --}}
            <div class="h3-responsive">{{ $datos->cliente }}</div>
            <div class="right-text">{{ $datos->slogan }}</div>

            <ul class="list-group font-weight-bold">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Propietario:
                    <span>{{ $datos->propietario }}</span>
                  </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Direccion:
                  <span>{{ $datos->direccion }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Pais:
                  <span>{{ $datos->paisNombre }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Telefono:
                    <span>{{ $datos->telefono }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Email:
                    <span>{{ $datos->email }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $datos->paisDocumento }}:
                    <span>{{ $datos->nit }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Giro:
                    <span>{{ $datos->giro }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Impuestos:
                    <span>{{ $datos->imp }} %</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Propina:
                    <span>{{ $datos->propina }} %</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Envio:
                    <span>{{ dinero($datos->envio) }}</span>
                </li>
            </ul>

        </div>
    </div>


</div>