<div>

    @if ($factura)

    <div class="row">

        <div class="col-xs-4 col-sm-12 col-md-4">

            <div class="card">
                <div class="card-body px-lg-5 pt-0 click text-center" style="color: #757575;">
                    @if ($factura->edo == 1)
                    <a class="btn-floating btn-lg btn-success" wire:click="imprimir()"><i class="fas fa-print"></i></a>
                    <a class="btn-floating btn-lg btn-danger" wire:click="$emit('deleteFactura')"><i class="fas fa-trash"></i></a>
                    @endif 
                    <a class="btn-floating btn-lg btn-secondary" data-toggle="modal" data-target="#ModalTipoVenta"><i class="fas fa-sync"></i></a>
                            
                
                    {{ mensajex(session('idSearch') . ' Documento seleccionado: ' . tipoVenta(session('impresion_seleccionado')), 'info') }}

                    @if ($factura->edo == 2)
                    {{ mensajex('ESTA FACTURA HA SIDO ELIMINADA', 'danger') }}
                    @endif 
                </div>
            </div>

        </div>
    
        <div class="col-xs-4 col-sm-12 col-md-4">
        
            @php
            $subtotal = $factura->subtotal; 
            $propinaCantidad = $factura->propina_cant; 
            $propinaPorcentaje = $factura->propina_porcent; 
            $total = $factura->total;
            $productosFactura = $detalles;
            @endphp
                {{-- <x-venta.cambios-productos-cliente :datos="$detalles" /> --}}
                @include('venta.includes.cambios.productos-cliente')


                @include('venta.includes.inicio.lateral-total')

                {{-- <x-venta.lateral-total 
                :subtotal="$factura->subtotal" 
                :propina="$factura->propina_cant" 
                :porcentaje="$factura->propina_porcent" 
                :total="$factura->total" />     --}}

{{-- {{ $datos->total }} --}}
        </div>
    
        <div class="col-xs-4 col-sm-12 col-md-4">

        </div>
    
    </div>

    @else
        <x-globales.no-registros />

        <div class="text-center">
            <a class="btn-floating btn-lg btn-secondary" data-toggle="modal" data-target="#ModalTipoVenta"><i class="fas fa-sync"></i></a>
        </div>
    @endif

    @include('venta.includes.modales.tventa')



</div>


