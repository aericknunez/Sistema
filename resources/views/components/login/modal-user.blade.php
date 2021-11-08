<!--Modal Form Login with Avatar Demo-->
<div class="modal bounceIn" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="ModalLogin" aria-hidden="true" data-backdrop="false" wire:ignore.self>
    <div class="modal-dialog cascading-modal modal-avatar modal-sm bordeado-x1" role="document">
        <!--Content-->
<div class="modal-content bordeado-x1">

<!--Header-->
    <div class="modal-header">
        @php
            ($datos->profile_photo_path) ? $photo = 'storage/' . $datos->profile_photo_path : $photo = 'img/imagenes/avatar.png';
        @endphp
        <img src="{{ asset($photo) }}" id="avatar" class="rounded-circle img-responsive" alt="Avatar photo" >
    </div>
<!--Body-->
    <div class="modal-body text-center mb-1">

        <form method="POST" action="{{ route('login') }}">
            @csrf

        <input type="hidden" name="email" id="email" value="{{ $datos->email }}" />

        <label class="sr-only" for="password">Username</label>
        <div class="input-group mb-2 mr-sm-2">

          <input type="password" name="password" id="password" class="form-control" autocomplete="off" wire:modal.defer="$password" />
            <div class="input-group-prepend"  onclick="mostrarContrasena()">
                <div class="input-group-text"><span id="icon" class="fa fa-eye"></span></div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-10">
                <input type="password" name="password" id="password" class="form-control" autocomplete="off" wire:modal.defer="$password" />
            </div>
            <div class="col-2">
                <div id="show_password"  onclick="mostrarContrasena()">
                    <span id="icon" class="fa fa-eye"></span>
                </div>
            </div>
        </div> --}}


        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <x-jet-checkbox id="remember_me" name="remember" />
                <label class="custom-control-label" for="remember_me">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>


        <button class="btn btn-info my-4" type="submit" id="btn-login" name="btn-login">Ingresar</button>
        </form>

       
    </div>


<div class="modal-footer">
    <a wire:click="cerrarModal()" class="btn btn-secondary">Cancelar</a>
</div>
          
    </div>
    <!--/.Content-->
</div>
</div>