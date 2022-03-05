<div>

    <div class="clearfix mb-2">
        <h2 class="h2 float-left">Sistema</h2> 
        <div class="float-right pointer click">
            <small wire:click="asignSistema()" data-toggle="modal" data-target="#ModalSistema"><i class="fas fa-edit"></i> Cambiar</small>
        </div>
    </div>

    <ul class="list-group font-weight-bold">

        <li class="list-group-item d-flex justify-content-between align-items-center">
            Expira:
            <span>{{ $datos->expira }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Estado del Sistema:
            <span>{{ edoSistema($datos->edo_sistema) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Tipo de Sistema:
            <span>{{ tipoSistema($datos->tipo_sistema) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Plataforma:
            <span>{{ plataforma($datos->plataforma) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            URL de Subida:
            <span>{{ $datos->url_to_upload }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Servidor FTP:
            <span>{{ $datos->ftp_server }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Usuario FTP:
            <span>{{ $datos->ftp_user }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Password FTP:
            <span>********</span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar Login:
            <span>{{ isActivo($datos->sys_login) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar respaldo:
            <span>{{ isActivo($datos->just_data) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Datos Especiales:
            <span>{{ isActivo($datos->data_special) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Impresiones Ticket:
            <span>{{ isActivo($datos->print) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Tiempo Sincronización:
            <span>{{ $datos->sync_time }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Dirección LiveWire:
            <span>{{ $datos->livewire_path }}</span>
        </li>
    </ul>
</div>