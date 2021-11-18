<x-comandero.principal>

    {{-- wire de cambios en los productos --}}
    @if (session('clientes'))
        @livewire('venta.cambios')
    @else
        {{ mensaje('danger', 'No exissten clientes agregados') }}
    @endif

   
   @push('modals')

    @endpush

    @push('scripts')
        <script>
            window.addEventListener('modal-opcion-hide', event => {
                $('#'+ event.detail.modal).modal('hide');
                $("#cantidad").focus();
            });

            window.addEventListener('modal-cambio-venta', event => {
                $('#ModalCambioVenta').modal('show');
                $('#fact_subtotal').text(event.detail.subtotal);
                $('#fact_propina').text(event.detail.propina);
                $('#fact_total').text(event.detail.total);
                $('#fact_efectivo').text(event.detail.efectivo);
                $('#fact_cambio').text(event.detail.cambio);
            });


            window.addEventListener('realizado', event => {
                toastr.success(event.detail.texto, event.detail.titulo, {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "md-toast-top-right", 
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": 100,
                    "hideDuration": 100,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }) 
            });
        </script>
    @endpush

</x-comandero.principal>