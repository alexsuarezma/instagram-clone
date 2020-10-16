<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="bg-gray-100 lg:px-10 px-0 pb-8">
        <div class="flex bg-white mt-8 mx-auto lg:w-4/6 w-full h-screen border border-gray-300">
            <div class="w-2/6 h-screen border-r border-gray-300">
                <a href="{{ route('config') }}">
                    <li class="flex py-4 pl-8 hover:border-l-2 hover:bg-gray-100 hover:border-gray-300">
                        <span class="font-ligth text-lg">
                            Editar perfil
                        </span> 
                    </li>
                </a>
                <a href="{{ route('config.updatePassword') }}">
                    <li class="border-l-2 border-gray-900 flex py-4 pl-8">
                        <span class="font-semibold text-lg">
                            Cambiar contraseña
                        </span>
                    </li>
                </a>
            </div>
            <div class="flex w-4/6 h-screen p-10">
                <div class="w-full">
                    <x-jet-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('user.changePassword') }}">
                        @csrf
                        <div class="w-full flex">
                            <div class="w-1/4 flex justify-center items-center">
                                @if(Auth::user()->profile_photo_path)
                                    <img class="h-12 w-12 rounded-full object-cover" src="{{ url('/user/avatar/'.Auth::user()->id) }}" alt="" width="150">
                                @else
                                    <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="" width="150">
                                @endif
                            </div>
                            <div class="w-3/4 flex items-center">
                                <span class="text-gray-800 text-2xl font-medium">{{ \Auth::user()->nick}}</span>
                            </div>
                        </div>         
                        <div class="w-full flex mt-4">
                            <div class="mt-3 w-1/4 flex justify-center font-semibold">
                                Contraseña anterior
                            </div>
                            <div class="w-3/4 pr-12">
                                <x-jet-input class="block mt-1 w-full" type="password" name="current_password" required />
                            </div>
                        </div>     
                        <div class="w-full flex mt-4">
                            <div class="mt-3 w-1/4 flex justify-center font-semibold">
                                Contraseña nueva
                            </div>
                            <div class="w-3/4 pr-12">
                                <x-jet-input class="block mt-1 w-full" type="password" name="password" required />
                            </div>
                        </div> 
                        <div class="w-full flex mt-4">
                            <div class="mt-3 w-1/4 flex justify-center font-semibold">
                                Confirmar contraseña nueva
                            </div>
                            <div class="w-3/4 pr-12">
                                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required />
                            </div>
                        </div> 
                        <div class="pl-32 mt-8">
                            <button type="submit" class="py-1 bg-blue-300 text-white text-sm font-semibold px-2 rounded">
                                Cambiar contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>