<x-principal-login>

    <div class="forny-container">
        <div class="forny-inner">
            <div class="mb-6 text-center forny-logo">
                {{-- <img src="{{ asset('login/img/logo-02.svg') }}"> --}}
            </div>
            <div class="forny-form">
                <div class="text-center">
                    <a class="d-flex justify-content-center mb-4" href="/login">
                        @if (config('sistema.latam') == true)
                        <img src="{{ asset('img/logo/latamPOS.png') }}" height="100" width="100" alt="LatamPOS">
                        @else
                        <img src="{{ asset('img/logo/hibrido_logo.png') }}" height="100" width="100" alt="Hibrido">
                        @endif
                    </a>
    
                    <h4>¿Olvidaste tu contraseña?</h4>
                    <p class="mb-10">No hay problema. Solo háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.</p>
    
                    <x-jet-validation-errors class="mb-3 rounded-0" />
    
                    @if (session('status'))
                        <div class="alert alert-success mb-3 rounded-0" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
    
                </div>

                <form method="POST" action="/forgot-password">
                    @csrf

                    <div class="form-group">
                        <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
                        <g transform="translate(0)">
                        <path d="M23.983,101.792a1.3,1.3,0,0,0-1.229-1.347h0l-21.525.032a1.169,1.169,0,0,0-.869.4,1.41,1.41,0,0,0-.359.954L.017,115.1a1.408,1.408,0,0,0,.361.953,1.169,1.169,0,0,0,.868.394h0l21.525-.032A1.3,1.3,0,0,0,24,115.062Zm-2.58,0L12,108.967,2.58,101.824Zm-5.427,8.525,5.577,4.745-19.124.029,5.611-4.774a.719.719,0,0,0,.109-.946.579.579,0,0,0-.862-.12L1.245,114.4,1.23,102.44l10.422,7.9a.57.57,0,0,0,.7,0l10.4-7.934.016,11.986-6.04-5.139a.579.579,0,0,0-.862.12A.719.719,0,0,0,15.977,110.321Z" transform="translate(0 -100.445)" />
                        </g>
                        </svg>
                        </span>
                        </div>
                        <input class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <button class="btn btn-primary btn-block">Send Reset Link</button>
                        </div>
                        </div>

                        
                    <div class="text-center mt-10">
                        Ya tienes cuenta? <a href="{{ route('login') }}">Ingresa</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    </x-principal-login>