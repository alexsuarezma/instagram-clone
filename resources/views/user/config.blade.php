<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="bg-gray-100 lg:px-10 px-0 py-8">
        <div class="flex bg-white mx-auto lg:w-4/6 w-full h-screen border border-gray-300">
            <div class="w-2/6 h-screen border-r border-gray-300">
                <a href="{{ route('config') }}">
                    <li class="border-l-2 border-gray-900 flex py-4 pl-8">
                        <span class="font-semibold text-lg">
                            Editar perfil
                        </span> 
                    </li>
                </a>
                <a href="{{ route('config.updatePassword') }}">
                    <li class="flex py-4 pl-8 hover:border-l-2 hover:bg-gray-100 hover:border-gray-300">
                        <span class="font-ligth text-lg">
                            Cambiar contraseña
                        </span>
                    </li>
                </a>
            </div>
            <div class="flex w-4/6 h-screen p-10">
                <div class="w-full">
                    <x-jet-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="w-full flex">
                            <div class="w-1/4 flex justify-center items-center">
                                @if(Auth::user()->profile_photo_path)
                                    <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_path }}" alt="" width="150">
                                @else
                                    <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="" width="150">
                                @endif
                            </div>
                            <div class="w-3/4">
                                <span class="text-teal-500 text-sm font-semibold">Cambiar foto del perfil</span>
                                <x-jet-input class="block mt-1" type="file" name="profile_photo_path" autofocus autocomplete="surname" />
                            </div>
                        </div>
                        <div class="w-full flex mt-4">
                            <div class="mt-3 w-1/4 flex justify-center font-semibold">
                                Nombre
                            </div>
                            <div class="w-3/4 pr-12">
                                <x-jet-input class="block mt-1 w-full" type="text" name="name" value="{{Auth::user()->name}}" required autofocus autocomplete="name" />
                                <p class="mt-2 text-gray-400 text-xs font-semibold">
                                    Para ayudar a que las personas descubran tu cuenta, usa el nombre por el que te conoce la gente, ya sea tu nombre completo, apodo o nombre comercial.
                                </p>
                            </div>
                        </div>   
                        <div class="w-full flex mt-4">
                            <div class="mt-3 w-1/4 flex justify-center font-semibold">
                                Apellido
                            </div>
                            <div class="w-3/4 pr-12">
                                <x-jet-input class="block mt-1 w-full" type="text" name="surname" value="{{Auth::user()->surname}}" required autofocus autocomplete="surname" />
                            </div>
                        </div>         
                        <div class="w-full flex mt-4">
                            <div class="mt-3 w-1/4 flex justify-center font-semibold">
                                Nombre de usuario
                            </div>
                            <div class="w-3/4 pr-12">
                                <x-jet-input class="block mt-1 w-full" type="text" name="nick" value="{{Auth::user()->nick}}" required autofocus autocomplete="nick" />
                                <p class="mt-2 text-gray-400 text-xs font-semibold">
                                    En la mayoría de los casos, podrás volver a cambiar tu nombre de usuario a alex_suarezm durante 14 días más.
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex mt-4">
                            <div class="mt-3 w-1/4 flex justify-center font-semibold">
                                Correo electronico
                            </div>
                            <div class="w-3/4 pr-12">
                                <x-jet-input class="block mt-1 w-full" type="email" name="email" value="{{Auth::user()->email}}" required />
                            </div>
                        </div>              
                        <div class="pl-32 mt-8">
                            <button type="submit" class="py-1 bg-blue-300 text-white text-sm font-semibold px-2 rounded">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>