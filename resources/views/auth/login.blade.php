<x-guest-layout>
    <div class="flex justify-center bg-gray-100 h-auto py-16">
        <div class="">
            <img class="w-full" src="{{ asset('images/login-instagram.png') }}" alt="">
        </div>
        <div class="p-8">
            <div class="flex flex-col bg-white border border-gray-300 mb-3 p-10" style="width:350px;">
                <div class="flex justify-center items-center">
                    <img class="w-2/4" src="{{ asset('images/header-instagram.png') }}" alt="">
                </div>
                <div class="mt-8">
                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-jet-label value="Correo electronico" />
                            <x-jet-input class="block mt-1 text-sm py-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="">
                            <x-jet-label value="Contraseña" />
                            <x-jet-input class="block mt-1 text-sm py-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                            </label>
                        </div>
                        <div class="flex items-center mt-4">
                            <button type="submit" class="w-full py-1 bg-blue-600 text-white text-sm font-semibold px-2 rounded">
                                Iniciar sesión
                            </button>
                        </div>
                    </form>
                </div>
                <div class="flex justify-center items-center mt-4 mb-4">
                      ------------------ o ------------------
                </div>
                <div class="flex items-center justify-center">
                    @if (Route::has('password.request'))
                        <a class="text-teal-700 text-xs font-semibold" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="flex justify-center items-center bg-white mx-auto h-16 border border-gray-300" style="width:350px;">
                <span class="text-sm font-normal">
                    ¿No tienes una cuenta? 
                    <a href="{{ route('register') }}"><span class="text-teal-500 font-semibold"> Registrate </span></a>
                </span>
            </div>
        </div>
    </div>
</x-guest-layout>
