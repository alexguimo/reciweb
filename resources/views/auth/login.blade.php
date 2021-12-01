<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/img/logo2.png" alt="Logo ReciWeb" width="250" height="250">
        </x-slot>
        @section('title', 'ReciWeb - Login')


        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <center><h1>Entrada de Usuarios</h1></center>
            </div>
            <div>
                <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!--CORREGIR-->
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('¿No estás registrado?') }}
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Ingresar') }}
                </x-jet-button>
                
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
