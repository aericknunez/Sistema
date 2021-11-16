<div wire:ignore.self >
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 custom-scrollbar">
            <ul class="custom-scrollbar" id="menuconscroll">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <img src="{{ asset('img/logo/pizto.png') }}" class="img-fluid flex-center">
                    </div>
                </li>
                <!--/. Logo -->
        
                <!-- Side navigation links -->
            <ul class="collapsible collapsible-accordion">
            
        
                
        
        {{-- MENU  --}}
    
        @foreach ($datos as $panel)
        <li><a wire:click="cambiarPanel({{ $panel->id }})" class="waves-effect arrow-r"><i class="fab fa-first-order-alt"></i> Ordenes de {{ $panel->nombre }} </a></li>
    
        </li>
    @endforeach
        
        
        
        <li><a 
            href="{{ route('logout') }}" 
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
            class="waves-effect arrow-r"><i class="fas fa-power-off"></i> {{ __('SALIR') }} </a></li>
        
        <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
        </form>
        
        
        </ul>
        </li>
        
        <small>Version: </small>
    
        {{-- MENU  --}}
        
        
                <hr>
                <small> Powered By</small>  
                <a href="https://www.hibridosv.com" target="_blank"><img src="{{ asset('img/logo/lgb.png') }}" class="img-fluid flex-center"></a>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
            </div>
            <!--/. Sidebar navigation -->
        
    
    
    
    
    
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>
        <!-- Breadcrumb-->
    
        <div class="breadcrumb-dn mr-auto">
            <p>Pantalla</p>
        </div>
        
        
    
    
        <div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                    
            @foreach ($datos as $panel)
                <li class="nav-item">
                    <a wire:click="cambiarPanel({{ $panel->id }})" class="nav-link"><i class="fab fa-first-order-alt"></i> <span class="clearfix d-none d-sm-inline-block">{{ $panel->nombre }}</span></a>
                </li>
            @endforeach
            </ul>
        </div>
                    
        </nav>
        <!-- /.Navbar -->
    
        
        </header>
    
    
</div>