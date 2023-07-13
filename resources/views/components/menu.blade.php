<header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 custom-scrollbar">
    <ul class="custom-scrollbar" id="menuconscroll">
        <!-- Logo -->
        <li>
            <div class="logo-wrapper waves-light">
                <a href="{{ route('venta.rapida') }}">
                    <img src="{{ asset('img/logo/pizto.png') }}" class="img-fluid flex-center">
                </a>
            </div>
        </li>
        <!--/. Logo -->
    
        <!--Search Form-->
        <li>
            <form class="search-form" role="search" method="post" action="{{ route('search') }}">
                @csrf
                <div class="form-group md-form mt-0 pt-1 waves-light">
                    <input type="text" class="form-control" placeholder="Buscar Factura" id="search" name="search">
                </div>
            </form>
        </li>
        <!--/.Search Form-->
        <!-- Side navigation links -->
    <ul class="collapsible collapsible-accordion">
    

        

{{-- MENU  --}}

@if (!session('apertura_caja') and session('config_tipo_usuario'))
    <li><a href="{{ route('caja.select') }}" class="waves-effect arrow-r"><i class="fas fa-cash-register"></i> APERTURAR CAJA </a></li>
@endif

@can('panel.control')
<li><a href="{{ route('panel.control') }}" class="waves-effect arrow-r"><i class="fas fa-tv"></i> PANEL DE CONTROL </a></li> 
@endcan


@can('panel.ordenes')
<li><a href="{{ route('panel.ordenes') }}" class="waves-effect arrow-r"><i class="fas fa-hamburger"></i> ORDENES DEL DIA </a></li>  
@endcan

@can('corte.index')
<li><a href="{{ route('corte.index') }}" class="waves-effect arrow-r"><i class="fas fa-cash-register"></i> CORTE DE CAJA </a></li>
@endcan  



@if (auth()->user()->canany(['efectivo.gastos', 'efectivo.remesas', 'efectivo.cuentas', 'efectivo.categorias','efectivo.ingreso', 'efectivo.transacciones']))
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-dollar-sign"></i> EFECTIVO<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    
@if (session('apertura_caja') == 1)
    @can('efectivo.gastos')
    <li><a href="{{ route('efectivo.gastos') }}" class="waves-effect"><i class="fas fa-cog"></i> Registrar Gastos</a></li>  
    @endcan
    @can('efectivo.remesas')
    <li><a href="{{ route('efectivo.remesas') }}" class="waves-effect"><i class="fas fa-cog"></i> Registrar Remesa</a></li>
    @endcan
@endif   


@can('efectivo.cuentas')
<li><a href="{{ route('efectivo.cuentas') }}" class="waves-effect"><i class="fas fa-cog"></i> Cuentas Bancarias</a></li>
@endcan
@can('efectivo.categorias')
<li><a href="{{ route('efectivo.categorias') }}" class="waves-effect"><i class="fas fa-cog"></i> Categoria de Gastos</a></li>
@endcan

@if (session('apertura_caja') == 1) 
    @can('efectivo.ingreso')
    <li><a href="{{ route('efectivo.ingreso') }}" class="waves-effect"><i class="fas fa-cog"></i> Agregar o Retirar Efectivo</a></li>
    @endcan
@endif   

@can('efectivo.transacciones')
<li><a href="{{ route('efectivo.transacciones') }}" class="waves-effect"><i class="fas fa-cog"></i> Lista de Transacciones</a></li>  
@endcan


    </ul>
    </div>
    </li>    
@endif





@if (auth()->user()->canany(['historial.reporte', 'historial.ventas', 'historial.gastos', 'historial.cortes', 'historial.meseros', 'historial.ordenes', 'historial.eliminadas']))
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-calendar-alt"></i></i> HISTORIAL<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">

    {{-- <li><a href="{{ route('historial.resumen') }}" class="waves-effect"><i class="fas fa-cog"></i> Resumen de Efectivo</a></li> --}}
    
    @can('historial.reporte')
    <li><a href="{{ route('historial.reporte') }}" class="waves-effect"><i class="fas fa-cog"></i> Reporte Diario</a></li>
    @endcan
    @can('historial.ventas')
    <li><a href="{{ route('historial.ventas') }}" class="waves-effect"><i class="fas fa-cog"></i> Ventas</a></li>
    @endcan
    @can('historial.gastos')
    <li><a href="{{ route('historial.gastos') }}" class="waves-effect"><i class="fas fa-cog"></i> Gastos</a></li>
    @endcan
    @can('historial.gastos')
    <li><a href="{{ route('historial.remesas') }}" class="waves-effect"><i class="fas fa-cog"></i> Remesas</a></li>
    @endcan
    @can('historial.cortes')
    <li><a href="{{ route('historial.cortes') }}" class="waves-effect"><i class="fas fa-cog"></i> Cortes de Caja</a></li>
    @endcan
    @can('historial.meseros')
    <li><a href="{{ route('historial.meseros') }}" class="waves-effect"><i class="fas fa-cog"></i> Resumen Meseros</a></li>
    @endcan
    @can('historial.ordenes')
    <li><a href="{{ route('historial.ordenes') }}" class="waves-effect"><i class="fas fa-cog"></i> Resumen de Ordenes</a></li>
    @endcan
    @can('historial.eliminadas')
    <li><a href="{{ route('historial.eliminadas') }}" class="waves-effect"><i class="fas fa-cog"></i> Ordenes Eliminadas</a></li>
    @endcan
    <li><a href="{{ route('historial.entradas') }}" class="waves-effect"><i class="fas fa-cog"></i> Entradas y Salidas</a></li>

    </ul>
    </div>
</li>   
@endif



@if (auth()->user()->canany(['producto.index', 'producto.create', 'categoria.index', 'opcion.index']))
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-barcode"></i></i> PRODUCTOS<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
        @can('producto.index')
        <li><a href="{{ route('producto.index') }}" class="waves-effect"><i class="fas fa-cog"></i> Lista de Productos</a></li>    
        @endcan
        @can('producto.create')
        <li><a href="{{ route('producto.create') }}" class="waves-effect"><i class="fas fa-cog"></i> Agregar Producto</a></li>    
        @endcan
        @can('categoria.index')
        <li><a href="{{ route('categoria.index') }}" class="waves-effect"><i class="fas fa-cog"></i> Agregar Categorias</a></li>
        @endcan
        @can('opcion.index')
        <li><a href="{{ route('opcion.index') }}" class="waves-effect"><i class="fas fa-cog"></i> Agregar Modificadores</a></li>
        @endcan
    
    </ul>
    </div>
</li>   
@endif





@if (auth()->user()->canany(['directorio.clientes', 'directorio.proveedores', 'directorio.repartidores']))
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user"></i> DIRECTORIO<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    
    @can('directorio.clientes')
    <li><a href="{{ route('directorio.clientes') }}" class="waves-effect"><i class="fas fa-cog"></i> Clientes</a></li>
    @endcan
    @can('directorio.proveedores')
    <li><a href="{{ route('directorio.proveedores') }}" class="waves-effect"><i class="fas fa-cog"></i> Proveedores</a></li>
    @endcan
    @can('directorio.repartidores')
    <li><a href="{{ route('directorio.repartidores') }}" class="waves-effect"><i class="fas fa-cog"></i> Repartidores</a></li>
    @endcan
        
    </ul>
    </div>
</li>
@endif


{{-- @can('cuentas.pendientes') --}}
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user"></i> CUENTAS<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    
    
    <li><a href="{{ route('cuentas.pendientes') }}" class="waves-effect"><i class="fas fa-cog"></i> Cuentas por Pagar</a></li>
    <li><a href="{{ route('cuentas.porcobrar') }}" class="waves-effect"><i class="fas fa-cog"></i> Cuentas por Cobrar</a></li>
        
    </ul>
    </div>
</li>  
{{-- @endcan --}}


@if (auth()->user()->canany(['facturacion.emitidas', 'facturacion.ultimas']))
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user"></i> FACTURACION<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    
    @can('facturacion.emitidas')
    <li><a href="{{ route('facturacion.emitidas') }}" class="waves-effect"><i class="fas fa-cog"></i> Facturas Emitidas</a></li>
    @endcan
    @can('facturacion.ultimas')
    <li><a href="{{ route('facturacion.ultimas') }}" class="waves-effect"><i class="fas fa-cog"></i> Eliminar Facturas</a></li>
    @endcan
    <li><a href="{{ route('facturacion.reporte') }}" class="waves-effect"><i class="fas fa-cog"></i> Reporte Ventas</a></li>
    <li><a href="{{ route('facturacion.rango') }}" class="waves-effect"><i class="fas fa-cog"></i> Imprimir Rango</a></li>
{{-- 
    <li><a href="{{ route('error.nodisponible') }}" class="waves-effect"><i class="fas fa-cog"></i> Ingresar Registros</a></li>
    <li><a href="{{ route('error.nodisponible') }}" class="waves-effect"><i class="fas fa-cog"></i> Detalle de Ventas</a></li>
    <li><a href="{{ route('error.nodisponible') }}" class="waves-effect"><i class="fas fa-cog"></i> Detalle de Gastos</a></li> --}}
        
    </ul>
    </div>
</li>
@endif


@if (isAdmin())
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user"></i> INVENTARIO<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    
    <li><a href="{{ route('inventario') }}" class="waves-effect"><i class="fas fa-cog"></i> Inventario Actual</a></li>
    <li><a href="{{ route('inventario.productos') }}" class="waves-effect"><i class="fas fa-cog"></i> Agregar Producto</a></li>
    <li><a href="{{ route('inventario.asignados') }}" class="waves-effect"><i class="fas fa-cog"></i> Productos Asignados</a></li>
        
    </ul>
    </div>
</li>
@endif


@if (isAdmin())
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user"></i> PLANILLA<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    
    <li><a href="{{ route('error.nodisponible') }}" class="waves-effect"><i class="fas fa-cog"></i> Ver Planilla</a></li>
    <li><a href="{{ route('error.nodisponible') }}" class="waves-effect"><i class="fas fa-cog"></i> Generar Planilla</a></li>
    <li><a href="{{ route('error.nodisponible') }}" class="waves-effect"><i class="fas fa-cog"></i> Gestionar Empleados</a></li>
    <li><a href="{{ route('error.nodisponible') }}" class="waves-effect"><i class="fas fa-cog"></i> Descuentos y Comisiones</a></li>
        
    </ul>
    </div>
</li>
@endif




<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-cog"></i> CONFIGURACIONES<i class="fa fa-angle-down rotate-icon"></i></a>
    <div class="collapsible-body">
    <ul class="list-unstyled">
    <li><a href="{{ route('profile.show') }}" class="waves-effect"><i class="fas fa-cog"></i> {{ __('Perfil de Usuario') }}</a></li>

@can('config.usuarios')
<li><a href="{{ route('config.usuarios') }}" class="waves-effect"><i class="fas fa-cog"></i> Cambiar Usuarios</a></li>
@endcan
@can('roles.index')
<li><a href="{{ route('roles.index') }}" class="waves-effect"><i class="fas fa-cog"></i> Roles Usuarios</a></li>
@endcan
@can('config.configuracion')
<li><a href="{{ route('config.configuracion') }}" class="waves-effect"><i class="fas fa-cog"></i> Configuraciones</a></li> 
@endcan
@if (isGrandAdmin())
<li><a href="{{ route('config.opciones') }}" class="waves-effect"><i class="fas fa-cog"></i> Opciones de Actualización</a></li>
@endif
    
    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
    <li><a href="{{ route('api-tokens.index') }}" class="waves-effect"><i class="fas fa-cog"></i> {{ __('API Tokens') }}</a></li>
    @endif

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
    
            {{-- Menu de venta para elegir que tipo de opcion sera  --}}
            @if (session('apertura_caja'))
                @livewire('common.menu-venta')   
            @endif

                
    </nav>
    <!-- /.Navbar -->

    
    </header>




