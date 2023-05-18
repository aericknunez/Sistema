<header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 custom-scrollbar">
    <ul class="custom-scrollbar" id="menuconscroll">
        <!-- Logo -->
        <li>
            <div class="logo-wrapper waves-light">
                

                @if (session('data_special'))
                    <a href="{{ route('historial.resumen') }}">
                @else
                    <a href="{{ route('panel.control') }}">
                @endif
                    <img src="{{ asset('img/logo/pizto.png') }}" class="img-fluid flex-center">
                </a>
            </div>
        </li>
        <!--/. Logo -->
    
        <!-- Side navigation links -->
    <ul class="collapsible collapsible-accordion">
    

        

{{-- MENU  --}}

@if (isAdmin()) 
<li><a href="{{ route('panel.control') }}" class="waves-effect arrow-r"><i class="fas fa-tv"></i> PANEL DE CONTROL </a></li>
@endif





@if (isGrandAdmin())
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-calendar-alt"></i></i> HISTORIAL<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
        <li><a href="{{ route('historial.resumen') }}" class="waves-effect"><i class="fas fa-cog"></i> Resumen de Efectivo</a></li>
        <li><a href="{{ route('historial.reporte') }}" class="waves-effect"><i class="fas fa-cog"></i> Reporte Diario</a></li>
        <li><a href="{{ route('historial.ventas') }}" class="waves-effect"><i class="fas fa-cog"></i> Ventas</a></li>
        <li><a href="{{ route('historial.gastos') }}" class="waves-effect"><i class="fas fa-cog"></i> Gastos</a></li>
        <li><a href="{{ route('historial.cortes') }}" class="waves-effect"><i class="fas fa-cog"></i> Cortes de Caja</a></li>
        <li><a href="{{ route('historial.meseros') }}" class="waves-effect"><i class="fas fa-cog"></i> Resumen Meseros</a></li>
        {{-- <li><a href="{{ route('historial.ventas') }}" class="waves-effect"><i class="fas fa-cog"></i> Resumen Repartidores</a></li> --}}
        <li><a href="{{ route('historial.ordenes') }}" class="waves-effect"><i class="fas fa-cog"></i> Ordenes</a></li>
        <li><a href="{{ route('historial.entradas') }}" class="waves-effect"><i class="fas fa-cog"></i> Entradas y Salidas</a></li>

    </ul>
    </div>
</li>   
@endif




@if (auth()->user()->canany(['efectivo.transacciones']))
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-dollar-sign"></i> EFECTIVO<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    

@can('efectivo.transacciones')
<li><a href="{{ route('efectivo.transacciones') }}" class="waves-effect"><i class="fas fa-cog"></i> Lista de Transacciones</a></li>  
@endcan


    </ul>
    </div>
    </li>    
@endif






@if (isAdmin())
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user"></i> FACTURACION<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    
    
    <li><a href="{{ route('facturacion.emitidas') }}" class="waves-effect"><i class="fas fa-cog"></i> Facturas Emitidas</a></li>
    <li><a href="{{ route('facturacion.reporte') }}" class="waves-effect"><i class="fas fa-cog"></i> Reporte Ventas</a></li>
       
    </ul>
    </div>
</li>
@endif


@if (isAdmin())
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user"></i> INVENTARIO<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    
    
    <li><a href="{{ route('inventario') }}" class="waves-effect"><i class="fas fa-cog"></i> Inventario Actual</a></li>
 
    </ul>
    </div>
</li>
@endif







<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-cog"></i> CONFIGURACIONES<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    <li><a href="{{ route('profile.show') }}" class="waves-effect"><i class="fas fa-cog"></i> {{ __('Perfil de Usuario') }}</a></li>

    </ul>
    </div>
</li>  





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

<small>Version: 3.4</small>










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
        <p>{{ Str::upper(Auth::user()->name) }}</p>
    </div>
    

    




    <div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
                

            <li class="nav-item">

            @if (session('data_special'))
                <a href="{{ route('historial.resumen') }}" class="nav-link"><i class="fas fa-home"></i> <span class="clearfix d-none d-sm-inline-block">Inicio</span></a>
            @else
                <a href="{{ route('panel.control') }}" class="nav-link"><i class="fas fa-home"></i> <span class="clearfix d-none d-sm-inline-block">Inicio</span></a>
            @endif

            </li>

     
    
        </ul>
    </div>

    





                
    </nav>
    <!-- /.Navbar -->

    
    </header>




