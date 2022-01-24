<x-principal-layout>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Listado de Transacciones</h2> 
                <h2 class="float-right">
                    {{-- <a wire:click="newForm()" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Categoria</a> --}}
                </h2>
            </div>


            <div class="row">
                <div class="mb-2">
                    <div class="card">
                        <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                            
                            <x-efectivo.cuentas-banco.lista-transacciones :datos="$datos" />
                                                 
                           {{  $datos->links() }}
                        </div>
                    </div>
                </div>

            </div>

        </x-slot>
    
        <x-slot name="lateral">



        </x-slot>
    </x-cuerpo>

   
    @push('scripts')
    
    @endpush

</x-principal-layout>