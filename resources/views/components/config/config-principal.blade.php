<div>
    <div class="row">
        <div class="col-12 col-md-3">
            <ul class="list-group font-weight-bold pointer click">
                <li class="list-group-item align-items-center" wire:click="selectData(1)">
                    <i class="fas fa-cog"></i> Opciones Principales
                  </li>
                <li class="list-group-item align-items-center" wire:click="selectData(2)">
                    <i class="fas fa-money-bill"></i> Monedas
                </li>
                @if (session('config_tipo_usuario') == 1)
                    <li class="list-group-item align-items-center" wire:click="selectData(3)">
                        <i class="fas fa-columns"></i> Paneles
                    </li>
                @endif
                <li class="list-group-item align-items-center" wire:click="selectData(4)">
                    <i class="fas fa-print"></i>  Impresiones
                </li>
                @if (session('config_tipo_usuario') == 1)
                <li class="list-group-item align-items-center" wire:click="selectData(5)">
                    <i class="fas fa-cogs"></i> Sistema
                </li>   
                @endif

            </ul>

        </div>
        <div class="col-12 col-md-9">
            <div class="card">
                <div class="card-body">
                    

                    @if ($datos['tipo'] == 1)
                        <x-config.config.principal :datos="$datos['data']" />
                    @endif
            
                    @if ($datos['tipo'] == 2)
                        <x-config.config.monedas :datos="$datos['data']" />
                    @endif
                
                    @if ($datos['tipo'] == 3)
                        <x-config.config.paneles :datos="$datos['data']" />
                    @endif
                    
                    @if ($datos['tipo'] == 4)
                        <x-config.config.impresiones :datos="$datos['data']" />
                    @endif
                    
                    @if ($datos['tipo'] == 5)
                        @if (session('config_tipo_usuario') == 1)
                            <x-config.config.sistema :datos="$datos['data']" />
                        @endif
                    @endif


                    
                </div>
            </div>
        </div>
    </div>
   
    
</div>