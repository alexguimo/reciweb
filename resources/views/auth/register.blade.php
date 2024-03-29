<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{ route('dashboard') }}">
                <img src="/img/logo2.png" alt="Logo ReciWeb" width="150" height="150">
            </a>
        </x-slot>
        @section('title', 'ReciWeb - Registro de Usuario')


        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nombre Completo') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                <x-jet-input id="cedula" class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula')" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!--style="display:none"-->
            <div class="mt-4" style="display:none">
                <label for="tienehogar" value="TieneHogar" />
                <input id="tienehogar" class="block mt-1 w-full" type="text" name="tienehogar" value="0" readonly/>
            </div>
            <div class="mt-4" style="display:none">
                <label for="rol" value="Rol" />
                <input id="rol" class="block mt-1 w-full" type="text" name="rol" value="0" readonly/>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya se encuentra registrad@?') }}
                </a>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('registeradmin.create') }}">
                    {{ __('¿Serás Administrador?') }}
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Registrarse') }}
                </x-jet-button>
                
            </div>
        </form>
    </x-jet-authentication-card>

    <script>
        jQuery(document).ready(function(){
			// Listen for the input event.
			jQuery("#cedula").on('input', function (evt) {
				// Allow only numbers.
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
		});
    </script>

</x-guest-layout>
