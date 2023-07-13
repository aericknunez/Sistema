<div>
    <ul class="nav navbar-nav nav-flex-icons ml-auto">
            
        @if (session('config_tipo_servicio') == 1)
        
    @if (session('config_tipo_usuario') != 5)
        <li class="nav-item">
            <a wire:click="selectDelivery()" class="nav-link"><i class="fas fa-truck"></i> <span class="clearfix d-none d-sm-inline-block">Delivery</span></a>
        </li>
        <li class="nav-item">
            <a wire:click="selectMesa()" class="nav-link"><i class="fas fa-utensils"></i> <span class="clearfix d-none d-sm-inline-block">Ordenes</span></a>
        </li>
    @endif
    
        @if (session('principal_ver_delivery'))
        <li class="nav-item">
            <a wire:click="selectDelivery()" class="nav-link"><i class="fas fa-truck"></i> <span class="clearfix d-none d-sm-inline-block">Delivery</span></a>
        </li>            
        @endif
        @if (session('principal_ver_mesas'))
        <li class="nav-item">
            <a wire:click="selectMesa()" class="nav-link"><i class="fas fa-utensils"></i> <span class="clearfix d-none d-sm-inline-block">Ordenes</span></a>
        </li>           
        @endif


        <li class="nav-item">
            <a href="{{ route('venta.rapida') }}" class="nav-link"><i class="fas fa-home"></i> <span class="clearfix d-none d-sm-inline-block">Inicio</span></a>
        </li>
        @endif



        @if (session('config_tipo_servicio') == 2)

    @if (session('config_tipo_usuario') != 5)
        <li class="nav-item">
            <a wire:click="selectDelivery()" class="nav-link"><i class="fas fa-truck"></i> <span class="clearfix d-none d-sm-inline-block">Delivery</span></a>
        </li>
        <li class="nav-item">
            <a wire:click="selectRapida()" class="nav-link"><i class="fas fa-hamburger"></i> <span class="clearfix d-none d-sm-inline-block">Venta</span></a>
        </li>
    @endif
    
        @if (session('principal_ver_delivery'))
        <li class="nav-item">
            <a wire:click="selectDelivery()" class="nav-link"><i class="fas fa-truck"></i> <span class="clearfix d-none d-sm-inline-block">Delivery</span></a>
        </li>            
        @endif
        @if (session('principal_ver_mesas'))
        <li class="nav-item">
            <a wire:click="selectMesa()" class="nav-link"><i class="fas fa-utensils"></i> <span class="clearfix d-none d-sm-inline-block">Ordenes</span></a>
        </li>           
        @endif

        <li class="nav-item">
            <a href="{{ route('venta.mesas') }}" class="nav-link"><i class="fas fa-home"></i> <span class="clearfix d-none d-sm-inline-block">Inicio</span></a>
        </li>
        @endif



    @if (session('config_tipo_servicio') == 3)
    @if (session('config_tipo_usuario') != 5)
        <li class="nav-item">
            <a wire:click="selectMesa()" class="nav-link"><i class="fas fa-utensils"></i> <span class="clearfix d-none d-sm-inline-block">Ordenes</span></a>
        </li>
        <li class="nav-item">
            <a wire:click="selectRapida()" class="nav-link"><i class="fas fa-hamburger"></i> <span class="clearfix d-none d-sm-inline-block">Venta</span></a>
        </li>
    @endif

        @if (session('principal_ver_delivery'))
        <li class="nav-item">
            <a wire:click="selectDelivery()" class="nav-link"><i class="fas fa-truck"></i> <span class="clearfix d-none d-sm-inline-block">Delivery</span></a>
        </li>            
        @endif
        @if (session('principal_ver_mesas'))
        <li class="nav-item">
            <a wire:click="selectMesa()" class="nav-link"><i class="fas fa-utensils"></i> <span class="clearfix d-none d-sm-inline-block">Ordenes</span></a>
        </li>           
        @endif
        <li class="nav-item">
            <a href="{{ route('venta.delivery') }}" class="nav-link"><i class="fas fa-home"></i> <span class="clearfix d-none d-sm-inline-block">Inicio</span></a>
        </li>
    @endif

 

    </ul>
</div>
