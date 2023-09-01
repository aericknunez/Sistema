<div>
    
    <section class="p-3 bg-info mt-2">
        <div class="d-flex align-items-center">
            <div class="text-white ml-3">
            <div class="mb-1 h4">SELECCIONE UN USUARIO</div>
            </div>
        </div>
    </section>

    
    @foreach ($users as $user)
    <section class="p-3 {{ getColor($user->id) }} mt-2 click pointer">
        <div class="d-flex align-items-center" wire:click="modal({{$user->id}})">
            @php
                ($user->profile_photo_path) ? $photo = 'storage/' . $user->profile_photo_path : $photo = 'img/imagenes/avatar.png';
            @endphp
        <img src="{{ asset($photo) }}" class="img-fluid rounded-circle z-depth-3 profile_img">
        <div class="text-black ml-3">
        <p class="mb-1 h3">{{ $user->name }}</p>
        </div>
        <a wire:click="modal({{$user->id}})" class="ml-auto"><i class="bg-light text-dark p-2 mdi mdi-chevron-right box_rounded h6 mb-0"></i></a>
        </div>
    </section>
    @endforeach


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
