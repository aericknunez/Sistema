<div>
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2 float-left">Cuentas por pagar</div> 
                <div class="h2 float-right">
                    <a data-toggle="modal" data-target="#ModalAddCuenta" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Cuenta</a>
                </div>
            </div>

        <x-cuentas.listado :datos="$cuentas" />

        </x-slot>
    
        <x-slot name="lateral">

        <div class="card">
            <div class="card-body px-lg-5 pt-0 text-center mt-3" style="color: #757575;">
                {{-- Form  --}}
                <div class="h4-responsive">
                    CANTIDAD CUENTAS PENDIENTES:
                </div>
                <div class="h1-responsive">
                    {{ $cpendientes }} 
                </div>
                {{-- form  --}}
            </div>

            <div class="card-body px-lg-5 pt-0 text-center mt-3" style="color: #757575;">
                {{-- Form  --}}
                <div class="h4-responsive">
                    TOTAL CUENTAS PENDIENTES:
                </div>
                <div class="h1-responsive">
                    {{ dinero($ctotal) }} 
                </div>
                {{-- form  --}}
            </div>


            <div class="card">
                <div class="card-body">
                    <small>Cuentas</small>

                    <div class="row justify-content-center click">
                            <a class="btn btn-secondary btn-sm btn-rounded waves-effect" wire:click="btnMostrarCuentas(0)"><i class="fas fa-check-circle mr-1"></i> Todas</a>
                            <a class="btn btn-success btn-sm btn-rounded waves-effect" wire:click="btnMostrarCuentas(1)"><i class="fas fa-check-double mr-1"></i> Pendientes</a>
                            <a class="btn btn-danger btn-sm btn-rounded waves-effect" wire:click="btnMostrarCuentas(2)"><i class="fas fa-ban mr-1"></i> Pagadas</a>

                    </div>

                </div>

            </div>

        </div>



        </x-slot>

    </x-cuerpo>


        <x-cuentas.modal-add-cuenta :datos="$proveedores"  />
        <x-cuentas.modal-add-abonos :datos="$selectCuenta"   
                                   :bancos="$bancos" 
                                   :tipo="$tipo_pago" /> 

</div>