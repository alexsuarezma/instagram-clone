<x-guest-layout>
    <div class="flex justify-center bg-gray-100 h-auto py-16">
        <div class="p-8">
            <div class="flex flex-col bg-white border border-gray-300 p-10 pb-16" style="width:400px;">
                <div class="flex justify-center items-center">
                    <img class="w-2/4" src="{{ asset('images/header-instagram.png') }}" alt="">
                </div>
                <div class="">
                    <p class="mt-2 text-gray-800 text-base font-semibold text-center">¿Tienes problemas para iniciar sesión?</p>
                    <p class="mt-2 text-gray-500 text-sm font-normal text-center">Ingresa tu correo electrónico, teléfono o nombre de usuario y te enviaremos un enlace para que recuperes el acceso a tu cuenta.</p>
                </div>
                <div class="mt-4">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="block">
                            <p class="text-gray-500 text-sm font-normal">
                                <x-jet-label value="Correo electrónico" />
                            </p>
                            <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        
                        <div class="flex items-center mt-4">
                            <button type="submit" class="w-full py-1 bg-blue-300 text-white text-sm font-semibold px-2 rounded">
                                Enviar enlace de inicio de sesión
                            </button>
                        </div>
                    </form>
                </div>
                <div class="flex justify-center items-center mt-4 mb-4">
                      ------------------ o ------------------
                </div>
                <div class="flex justify-center items-center">
                    <span class="text-sm font-semibold">
                        <a href="{{ route('register') }}">Crea una nueva cuenta</a>
                    </span>
                </div>
            </div>
            <div class="flex justify-center items-center bg-white mx-auto h-12 border border-gray-300">
                <span class="text-sm font-semibold">
                    <a href="{{ route('login') }}">Volver al inicio de sesión</a>
                </span>
            </div>
        </div>
    </div>
</x-guest-layout>