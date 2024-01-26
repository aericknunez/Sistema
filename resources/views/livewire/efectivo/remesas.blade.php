<div>
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Remesas</h2> 
                <h2 class="float-right">
                    <a data-toggle="modal" data-target="#ModalAddRemesa" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Agregar Remesa</a>
                </h2>
            </div>

        <x-efectivo.remesas.lista-remesas :datos="$datos" />

        </x-slot>
    
        <x-slot name="lateral">
            
            <div class="card">
                <div class="card-body px-lg-5 pt-0 text-center mt-3" style="color: #757575;">
                    {{-- Form  --}}
                    <div class="h4">
                        TOTAL REMESAS:
                    </div>
                    <div class="h1">
                        {{ dinero($totalremesas) }} 
                    </div>
                    {{-- form  --}}
                </div>
            </div>

        </x-slot>

    </x-cuerpo>

    <x-efectivo.remesas.modal-agregar :datos="$bancos" />


</div>