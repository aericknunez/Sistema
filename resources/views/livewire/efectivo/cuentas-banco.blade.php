<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Cuentas Bancarias</h2> 
                <h2 class="float-right">
                    <a data-toggle="modal" data-target="#ModalTransferir" class="btn btn-secondary btn-sm"><i class="fas fa-sync"></i> Transferir</a>
                    <a data-toggle="modal" data-target="#ModalAddCuenta" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Agregar Nueva Cuenta</a>
                </h2>
            </div>


        <x-efectivo.cuentas-banco.lista-cuentas :datos="$datos" />

        </x-slot>
    
        <x-slot name="lateral">


        </x-slot>

    </x-cuerpo>

    <x-efectivo.cuentas-banco.modal-agregar />
    <x-efectivo.cuentas-banco.modal-transferir :datos="$datos" :origenx="$origenx" :destinox="$destinox" />

</div>
