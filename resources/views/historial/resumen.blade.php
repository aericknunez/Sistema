<x-principal-layout>

    {{-- Contenido --}}
        @livewire('historial.resumen')
    {{-- contenido  --}}
   
    @push('scripts')
    <script>

        window.addEventListener('graficar', event => {

                var ctxP = document.getElementById("pieChart").getContext('2d');
                var myPieChart = new Chart(ctxP, {
                    type: 'pie',
                    data: {
                        labels: ["Facturado", "No Facturado"],
                        datasets: [{
                            data: [event.detail.facturado, event.detail.nofacturado],
                            backgroundColor: ["#46BFBD", "#F7464A"],
                            hoverBackgroundColor: ["#5AD3D1","#FF5A5E"]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });


        });

    </script>
    @endpush


</x-principal-layout>