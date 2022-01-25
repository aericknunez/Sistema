<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2 float-left">Movimientos del dia</div> 
                <div class="h2 float-right font-weight-bold">{{ CodigoValidacionHora() }}</div>
            </div>


            <x-panel.control :datos="$datos" />


        </x-slot>
    
        <x-slot name="lateral">
            <div class="clearfix mb-2">
                <div class="h2 float-left">Tipo de Pago</div>
            </div> 

            <canvas id="pieChart"></canvas>

        </x-slot>



    </x-cuerpo>
    <canvas id="lineChart"></canvas>


    @push('scripts')

    <script>
        //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
        type: 'line',
            data: {
            labels: ["{{ $datos['h1']}}", "{{ $datos['h2']}}", "{{ $datos['h3']}}", "{{ $datos['h4']}}", "{{ $datos['h5']}}", "{{ $datos['h6']}}",
            "{{ $datos['h7']}}", "{{ $datos['h8']}}", "{{ $datos['h9']}}", "{{ $datos['h10']}}", "{{ $datos['h11']}}", "{{ $datos['h12']}}",
            "{{ $datos['h13']}}", "{{ $datos['h14']}}", "{{ $datos['h15']}}", "{{ $datos['h16']}}", "{{ $datos['h17']}}", "{{ $datos['h18']}}",
            "{{ $datos['h12']}}", "{{ $datos['h20']}}", "{{ $datos['h21']}}", "{{ $datos['h22']}}", "{{ $datos['h23']}}", "{{ $datos['h24']}}"],
            datasets: [{
                label: "Ventas",
                data: [{{ $datos['d1'] }}, {{ $datos['d2'] }}, {{ $datos['d3'] }}, {{ $datos['d4'] }}, {{ $datos['d5'] }}, {{ $datos['d6'] }},
                {{ $datos['d7'] }}, {{ $datos['d8'] }}, {{ $datos['d9'] }}, {{ $datos['d10'] }}, {{ $datos['d11'] }}, {{ $datos['d12'] }},
                {{ $datos['d13'] }}, {{ $datos['d14'] }}, {{ $datos['d15'] }}, {{ $datos['d16'] }}, {{ $datos['d17'] }}, {{ $datos['d18'] }},
                {{ $datos['d19'] }}, {{ $datos['d20'] }}, {{ $datos['d21'] }}, {{ $datos['d22'] }}, {{ $datos['d23'] }}, {{ $datos['d24'] }}],
            backgroundColor: [
                'rgba(101, 206, 255, .2)',
                ],
            borderColor: [
                'rgba(0, 59, 86, .7)',
                ],
                borderWidth: 2,
                fill: true,
                lineTension: 0
            }

            ]
            },
        options: {
        responsive: true
        }
        });



        //pie
        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
        labels: ["Efectivo", "Tarjeta", "Otros"],
        datasets: [{
        data: [{{ $datos['total_efectivo'] }}, {{ $datos['total_tarjeta'] }}, {{ $datos['total_btc'] }}],
        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870"]
        }]
        },
        options: {
        responsive: true
        }
        });

    </script>

@endpush
</div>