<div class="text-center border border-secondary rounded font-weight-bold z-depth-2">

    @if ($porcentaje > 0)

        <div class="row mr-2 ml-2">
            <div class="col-6 text-left mt-2">SubTotal:</div>
            <div class="col-6 text-right mt-2">{{ dinero($subtotal) }}</div>
        </div>
        <div class="row mr-2 ml-2">
            <div class="col-6 text-left">Propina | {{ nFormat($porcentaje) }}%:</div>
            <div class="col-6 text-right">{{ dinero($propina) }}</div>
        </div>        

    @endif

        <div class="row mr-2 ml-2 h3-responsive">
            <div class="col-6 text-left mt-2 mb-2">Total:</div>
            <div class="col-6 text-right mt-2 mb-2">{{ dinero($total) }}</div>
        </div>

</div>