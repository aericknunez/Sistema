<x-no-login>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a class="d-flex justify-content-center mb-4" href="/login">
                @if (isLatam() == true)
                <img src="{{ asset('img/logo/latamPOS.png') }}" height="100" width="100" alt="LatamPOS">
                @else
                <img src="{{ asset('img/logo/hibrido_logo.png') }}" height="100" width="100" alt="Hibrido">
                @endif
            </a>
        </x-slot>

        <div class="card-body">
            <div class="mb-3 small text-muted">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jet-button type="submit">
                            {{ __('Resend Verification Email') }}
                        </x-jet-button>
                    </div>
                </form>

                <form method="POST" action="/logout">
                    @csrf

                    <button type="submit" class="btn btn-link">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-no-login>