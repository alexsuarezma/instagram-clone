<x-guest-layout>
    <div class="flex justify-center items-center bg-gray-100 h-screen">
        <div class="">
            <div class="flex flex-col bg-white border border-gray-300 p-10 pb-4" style="width:450px;">
                <div class="flex justify-center items-center">
                    <img class="w-2/5" src="{{ asset('images/header-instagram.png') }}" alt="">
                </div>
                <div class="">
                    <p class="mt-2 text-gray-800 text-base font-semibold text-center">Gracias por registrarte!</p>
                    <p class="mt-2 text-gray-500 text-sm font-normal text-center">
                        Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibió el correo electrónico, con gusto le enviaremos otro.
                    </p>
                    @if (session('status') == 'verification-link-sent')
                        <div class="border-t mt-2 mb-4 font-semibold text-sm text-green-600 text-center">
                            {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.') }}
                        </div>
                    @endif

                </div>
                <div class="mt-4">
                    <form method="POST" action="/email/verification-notification">
                        @csrf

                        <button type="submit" class="w-full py-1 bg-blue-300 text-white text-sm font-semibold px-2 rounded">
                                {{ __('Reenviar correo electrónico de verificación') }}
                        </button>
                    </form>
                </div>
                <div class="flex justify-center items-center mt-4 mb-2">
                        ------------------ o ------------------
                </div>
            </div>
            <div class="flex justify-center items-center bg-white mx-auto h-12 border border-gray-300">
                <form method="POST" action="/logout">
                    @csrf
                 
                    <button type="submit" class="text-sm font-semibold">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
