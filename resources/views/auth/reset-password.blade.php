<x-guest-layout>
<div class="flex justify-center items-center bg-gray-100 h-screen">
        <div class="">
            <div class="flex flex-col bg-white border border-gray-300 p-10 pb-16" style="width:400px;">
                <div class="flex justify-center items-center">
                    <img class="w-2/4" src="{{ asset('images/header-instagram.png') }}" alt="">
                </div>
                <div class="mt-4">
                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="block">
                            <p class="text-gray-500 text-sm font-normal">
                                <x-jet-label value="Correo electrónico" />
                            </p>
                            <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-500 text-sm font-normal">
                                <x-jet-label value="Contraseña" />
                            </p>
                            <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>
                        
                        <div class="mt-4">
                            <p class="text-gray-500 text-sm font-normal">
                                <x-jet-label value="Repetir contraseña" />
                            </p>
                            <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="flex items-center mt-8">
                            <button type="submit" class="w-full py-1 bg-blue-300 text-white text-sm font-semibold px-2 rounded">
                                Restablecer contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
