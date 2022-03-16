<div>

    <x-cuerpo>
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2 float-left">Resumen de Datos</div>
                <div class="h2 float-right font-weight-bold text-uppercase">
                    {{-- {{ $porcentaje }} --}}
                </div>
            </div>


            <div>

                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
                        <div class="card-counter success z-depth-2">
                            <i class="far fa-money-bill-alt"></i>
                            <span class="count-numbers">
                                <h5 class="font-weight-bold">{{ dinero($ventas) }}</h5>
                            </span>
                            <span class="count-name">Total de Ventas</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
                        <div class="card-counter danger z-depth-2 pointer" data-toggle="modal" data-target="#DetalleGastos">
                            <i class="far fa-money-bill-alt"></i>
                            <span class="count-numbers">
                                <h5 class="font-weight-bold">{{ dinero($gastos) }}</h5>
                            </span>
                            <span class="count-name">Total de gastos</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
                        <div class="card-counter light z-depth-2">
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="count-numbers">
                                <h5 class="font-weight-bold">{{ $noOrdenes }}</h5>
                            </span>
                            <span class="count-name">No de Ordenes</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
                        <div class="card-counter light z-depth-2 pointer" data-toggle="modal" data-target="#DetalleCuentas">
                            <i class="fas fa-dollar-sign"></i>
                            <span class="count-numbers">
                                <h5 class="font-weight-bold">{{ dinero(collect($cuentas)->sum('saldo')) }}</h5>
                            </span>
                            <span class="count-name">Total en Cuentas</span>
                        </div>
                    </div>


                </div>


                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
                        <div class="card-counter primary z-depth-2">
                            <i class="fas fa-hand-holding-usd"></i>
                            <span class="count-numbers">
                                <h5 class="font-weight-bold">{{ $promedioPollo }}</h5>
                            </span>
                            <span class="count-name">Promedio de Pollo</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
                        <div class="card-counter info z-depth-2">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="count-numbers">
                                <h5 class="font-weight-bold">{{ $cortesAbiertos }}</h5>
                            </span>
                            <span class="count-name">Cajas Abiertas</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
                        <div class="card-counter light z-depth-2">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="count-numbers">
                                <h5 class="font-weight-bold">{{ CodigoValidacionHora() }}</h5>
                            </span>
                            <span class="count-name">Código</span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
                        <div class="card-counter light z-depth-2">
                            <i class="fas fa-money-bill-alt"></i>
                            <span class="count-numbers">
                                <h5 class="font-weight-bold">{{ formatJustHora($lastUpdate) }}</h5>
                                {{ formatJustFecha($lastUpdate) }}
                            </span>
                            <span class="count-name">Ultima Actualización</span>
                        </div>
                    </div>

                </div>




            </div>

        </x-slot>

        <x-slot name="lateral">

            <div class="clearfix mb-2">
                <div class="h2 float-left">Porcentaje {{ $porcentaje['facturado'] }} / {{ $porcentaje['nofacturado'] }} </div>
            </div>

            <canvas id="pieChart"></canvas>

        </x-slot>

    </x-cuerpo>

    @include('historial.includes.resumen-detalle-cuentas')

    @include('historial.includes.resumen-detalle-gastos')
</div>

@push('scripts')
<script>
            var ctxP = document.getElementById("pieChart").getContext('2d');
            var myPieChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                    labels: ["Facturado", "No Facturado"],
                    datasets: [{
                        data: [{{ $porcentaje['facturado'] }}, {{ $porcentaje['nofacturado'] }}],
                        backgroundColor: ["#46BFBD", "#F7464A"],
                        hoverBackgroundColor: ["#5AD3D1","#FF5A5E"]
                    }]
                },
                options: {
                    responsive: true
                }
            });
</script>
@endpush