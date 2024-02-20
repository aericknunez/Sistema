<x-principal-layout>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Listado de Transacciones</h2> 
                <h2 class="float-right">
                    {{-- <a wire:click="newForm()" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Agregar Categoria</a> --}}
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

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Saldos de Cuentas</h2> 
                <h2 class="float-right">
                    {{-- <a wire:click="newForm()" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Agregar Categoria</a> --}}
                </h2>
            </div>

            <div class="card">
                <div class="card-body px-lg-5 pt-0 mt-3" style="color: #757575;">
                    @foreach ($saldos as $saldo)
                    <div class="row h5 font-weight-bold text-uppercase">
                        <div class="col-8 float-left">{{ $saldo->cuenta }}</div>
                        <div class="col-4">{{ dinero($saldo->saldo) }}</div>
                    </div>  
                    @endforeach
                </div>
            </div>

        </x-slot>
    </x-cuerpo>

   
    @push('scripts')
        <script>
            $(function () {
                 $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    @endpush

</x-principal-layout>