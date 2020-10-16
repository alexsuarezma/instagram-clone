<x-guest-layout>
        <div class="bg-gray-100 h-auto p-4">
            <div class="flex flex-col bg-white mx-auto border border-gray-300 mb-4 p-10" style="width:350px;">
                <div class="flex justify-center items-center">
                    <img class="w-3/4" src="{{ asset('images/header-instagram.png') }}" alt="">
                </div>
                <div class="">
                    <p class="mt-2 text-gray-400 text-lg font-bold text-center">
                        Regístrate para ver fotos y videos de tus amigos.                    
                    </p>
                </div>
                <div class="flex justify-center items-center mt-4 mb-4">
                      ------------------ o ------------------
                </div>
                <div class="">
                    <form method="POST" action="{{ route('register') }}">
                        <x-jet-validation-errors class="mb-4" />
                        @csrf

                        <div>
                            <x-jet-label value="Name" />
                            <x-jet-input class="block mt-1 text-sm py-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        
                        <div>
                            <x-jet-label value="Surname" />
                            <x-jet-input class="block mt-1 text-sm text-sm py-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
                        </div>

                        <div>
                            <x-jet-label value="Nickname" />
                            <x-jet-input class="block mt-1 text-sm py-1 w-full" type="text" name="nick" :value="old('nick')" required autofocus autocomplete="nick" />
                        </div>

                        <div>
                            <x-jet-label value="Email" />
                            <x-jet-input class="block mt-1 text-sm py-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <div>
                            <x-jet-label value="Password" />
                            <x-jet-input class="block mt-1 text-sm py-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div>
                            <x-jet-label value="Confirm Password" />
                            <x-jet-input class="block mt-1 text-sm py-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="flex items-center mt-4">
                            <button type="submit" class="w-full py-1 bg-blue-300 text-white text-sm font-semibold px-2 rounded">
                                Registrarte
                            </button>
                        </div>
                    </form>
                </div>
                <div class="mt-6">
                    <p class="text-gray-400 text-xs font-medium text-center">
                        Al registrarte, aceptas nuestras Condiciones, la Política de datos y la Política de cookies.
                    </p>
                </div>
            </div>
            <div class="flex justify-center items-center bg-white mx-auto h-16 border border-gray-300" style="width:350px;">
                <span class="text-sm font-normal">
                    ¿Tienes una cuenta? 
                    <a href="{{ route('login') }}"><span class="text-teal-500 font-semibold"> Inicia sesión </span></a>
                </span>
            </div>
        </div>

</x-guest-layout>
