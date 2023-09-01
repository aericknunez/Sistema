<x-comandero.principal>

        @livewire('comandero.login')

 
        <div class="fixed-bottom">
            <a href="{{ route('login') }}" class="btn btn-link btn-sm">Cambiar inicio</a>
        </div>

   @push('modals')


    @endpush

    @push('scripts')

    <script>
        Livewire.on('modal', ()=>{
            $('#ModalUser').modal('show');
        });

        Livewire.on('cerrarmodal', ()=>{
            $('#ModalUser').modal('hide');
        });

    </script>


    <script>

        function mostrarContrasena(){
            var tipo = document.getElementById("password");
            if(tipo.type == "password"){
                tipo.type = "text";
                document.getElementById('icon').className = 'fa fa-eye-slash';
                document.getElementById('icon').className = document.getElementById('icon').className.replace( /(?:^|\s)fa fa-eye(?!\S)/g , '' )
                }else{
                tipo.type = "password";
                document.getElementById('icon').className = 'fa fa-eye';
                document.getElementById('icon').className = document.getElementById('icon').className.replace( /(?:^|\s)fa fa-eye-slash(?!\S)/g , '' )
            }
        }
    </script>
    @endpush

</x-comandero.principal>