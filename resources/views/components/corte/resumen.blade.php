<div>
    {{-- @json($datos) --}}
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter white z-depth-2">
            <i class="fas fa-cash-register"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->efectivo_final) }}</h5></span>
            <span class="count-name">Efectivo En Caja</span>
          </div>
        </div>
    
        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter white z-depth-2">
            <i class="fas fa-star-of-life"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->efectivo_inicial) }}</h5></span>
            <span class="count-name">Efectivo Apertura</span>
          </div>
        </div>
    
        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter white z-depth-2">
            <i class="fas fa-file-invoice"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->gastos + $datos->remesas) }}</h5></span>
            <span class="count-name">Total de Gastos</span>
          </div>
        </div>
    
        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter white z-depth-2">
            <i class="fas fa-chart-line"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->diferencia) }}</h5></span>
            <span class="count-name">Diferencia</span>
          </div>
        </div>
    
    
      </div>



    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter light z-depth-2">
            <i class="fas fa-money-check-alt"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->total_efectivo) }}</h5></span>
            <span class="count-name">Venta Efectivo</span>
          </div>
        </div>
    
        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter light z-depth-2">
            <i class="fas fa-money-bill-alt"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->total_tarjeta) }}</h5></span>
            <span class="count-name">Venta con Tarjeta</span>
          </div>
        </div>
    
        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter light z-depth-2">
            <i class="fas fa-money-bill-wave"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->total_btc) }}</h5></span>
            <span class="count-name">Otras Ventas</span>
          </div>
        </div>
    
        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter light z-depth-2">
            <i class="fas fa-dollar-sign"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->total_venta) }}</h5></span>
            <span class="count-name">Total de Venta</span>
          </div>
        </div>
    
    
      </div>

      <div class="row">

        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter primary z-depth-2">
            <i class="fas fa-hand-holding-usd"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->propina_efectivo) }}</h5></span>
            <span class="count-name">Propina Efectivo</span>
          </div>
        </div>
    
        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter danger z-depth-2">
            <i class="far fa-credit-card"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->propina_no_efectivo) }}</h5></span>
            <span class="count-name">Propina No Efectivo</span>
          </div>
        </div>
    
        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter success z-depth-2">
            <i class="far fa-money-bill-alt"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->gastos) }}</h5></span>
            <span class="count-name">Gastos</span>
          </div>
        </div>
    
        <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
          <div class="card-counter info z-depth-2">
            <i class="fas fa-money-check-alt"></i>
            <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($datos->remesas) }}</h5></span>
            <span class="count-name">Remesas</span>
          </div>
        </div>
    
    
      </div>

</div>