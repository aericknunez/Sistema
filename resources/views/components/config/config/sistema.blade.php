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
            <span>{{ $datos->server_ftp }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Usuario FTP:
            <span>{{ $datos->user_ftp }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Password FTP:
            <span>{{ $datos->password_ftp }}</span>
        </li>
    </ul>
</div>