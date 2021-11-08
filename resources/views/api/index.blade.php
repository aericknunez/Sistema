<x-principal-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('API Tokens') }}
        </h2>
    </x-slot>

    <div>
        @livewire('api.api-token-manager')
    </div>
</x-principal-layout>