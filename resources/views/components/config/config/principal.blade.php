<div>

    <div class="clearfix mb-2">
        <h2 class="h2 float-left">Principal</h2> 
        <div class="float-right pointer click">
            <small wire:click="asignPrincipal()" data-toggle="modal" data-target="#ModalPrincipal"><i class="fas fa-edit"></i> Cambiar</small>
        </div>
    </div>

    <ul class="list-group font-weight-bold">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Cantidad de Mesas para clientes:
            <span>{{ $datos->no_mesas }}</span>
          </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Cantidad de Cajas de cobro:
          <span>{{ $datos->no_cajas }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Forma de mostrar las comandas en cocina:
          <span>{{ tipoComanda($datos->ticket_pantalla) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar el registro de justificación al borrar una orden:
            <span>{{ isActivo($datos->registro_borrar) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar solicitar clave al borrar una orden:
            <span>{{ isActivo($datos->solicitar_clave) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar comentarios en comanda para cocina:
            <span>{{ isActivo($datos->comentarios_comanda) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar opciones para llevar o comer aqui:
            <span>{{ isActivo($datos->llevar_aqui) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar propina establecida en Comida Rapida:
            <span>{{ isActivo($datos->propina_rapida) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar propina establecida en Servicio a Mesa:
            <span>{{ isActivo($datos->propina_mesa) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar propina establecida en Delivery:
            <span>{{ isActivo($datos->propina_delivery) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Establecer predeterminado si es para llevar o Aqui en Comida Rapida:
            <span>{{ isActivo($datos->llevar_rapida) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Establecer predeterminado si es para llevar o Aqui en Servicio a Mesa:
            <span>{{ isActivo($datos->llevar_mesa) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Establecer predeterminado si es para llevar o Aqui en Delivery:
            <span>{{ isActivo($datos->llevar_delivery) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Establecer predeterminado si al cambiar para llevar se debe eliminar la propina:
            <span>{{ isActivo($datos->llevar_aqui_propina_cambia) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar sonido al marcar Ordenes
            <span>{{ isActivo($datos->sonido) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Levantar modal de categorias al marcar producto
            <span>{{ isActivo($datos->levantar_modal) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Tipo de Menu
            <span>{{ tipoMenu($datos->tipo_menu) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar Otras Ventas
            <span>{{ isActivo($datos->otras_ventas) }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Activar Venta Especial
            <span>{{ isActivo($datos->venta_especial) }}</span>
        </li>
    </ul>
</div>