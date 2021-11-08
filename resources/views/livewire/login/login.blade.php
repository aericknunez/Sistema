<div>

<div class="row d-flex justify-content-center">


    @foreach ($users as $user)
    <div class="col-lg-2 col-md-2 mb-lg-1 mb-5">
        <div class="avatar mx-auto">
             
            <a wire:click="modal({{$user->id}})">
                 @php
                     ($user->profile_photo_path) ? $photo = 'storage/' . $user->profile_photo_path : $photo = 'img/imagenes/avatar.png';
                 @endphp
                <img src="{{ asset($photo) }}" class="rounded-circle z-depth-3"
                  alt="Sample avatar">
            </a>
        </div>
              <h5 class="font-weight-bold mt-2 mb-0">{{ $user->name }}</h5>
              <small>{{ $user->email }}</small>
    </div>
    @endforeach

</div>

<div class="row d-flex justify-content-center">
@if ($errors->any())
<div class="'alert alert-danger text-sm p-2" role="alert">
    <div class="font-weight-bold">{{ __('Whoops! Algo salio mal') }}</div>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>



    @if ($usuario)
        <x-login.modal-user :datos="$usuario" />
    @endif

    

</div>