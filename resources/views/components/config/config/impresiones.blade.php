<div>

    <div class="clearfix mb-2">
        <h2 class="h2 float-left">Impresiones</h2> 
        <div class="float-right pointer click">
            <small wire:click="asignImpresiones()" data-toggle="modal" data-target="#ModalImpresiones"><i class="fas fa-edit"></i> Cambiar</small>
        </div>
    </div>

    <ul class="list-group font-weight-bold">

        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar opciones ningun documento:
            <span>{{ isActivo($datos->ninguno) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar registro de Ticket:
            <span>{{ isActivo($datos->ticket) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar registro de Factura:
            <span>{{ isActivo($datos->factura) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar registro de Credito Fiscal:
            <span>{{ isActivo($datos->credito_fiscal) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar registro de No sujeto:
            <span>{{ isActivo($datos->no_sujeto) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar registro de Imprimir Pre Cuenta:
            <span>{{ isActivo($datos->imprimir_antes) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar registro de impresión de comandas:
            <span>{{ isActivo($datos->comanda) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar registro Opcional:
            <span>{{ isActivo($datos->opcional) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Documento por defecto del sistema
            <span>{{ tipoMenu($datos->seleccionado) }}</span>
        </li>
    </ul>
</div>