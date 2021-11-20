<div>
    <footer class="bg-white body_rounded mt-n5 fixed-bottom osahan-footer-nav shadow">
        <div class="row p-0 align-items-center">
        
            <div class="col text-center pointer">
                <a href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="text-muted">
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
                    <h1 class="mb-0"><span class="mdi mdi-power"></span></h1>
                </a>
            </div>

            <div class="col text-center">
                <a data-toggle="modal" data-target="#AddMesa" class="text-danger">
                 <h1 class="mb-0"><span class="mdi mdi-plus-box-multiple"></span></h1>
                    <span class="mdi mdi-circle-medium text-warning"></span>
                </a>
            </div>

            <div data-toggle="modal" data-target="#ModalDatos" class="col text-center">
                <a  class="text-muted">
                 <h1 class="mb-0"><span class="mdi mdi-order-bool-descending"></span></h1>
                </a>
            </div>

        </div>
        </footer>
</div>
