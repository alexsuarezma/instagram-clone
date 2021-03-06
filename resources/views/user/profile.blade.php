<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/component/card-fade.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="bg-gray-50 pb-8 pt-8">
        <div class="flex justify-center lg:justify-between mx-auto lg:w-4/6 w-full {{ ($user->images == []) ? 'h-screen' : 'h-auto' }} lg:px-8 px-0">           
            <div class="w-full">
                <div class="flex border-b border-gray-400 pb-4" style="height:220px;">
                    <div class="w-2/5 lg:w-2/6 flex justify-center items-center">
                        @if($user->profile_photo_path)
                            <img class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover" src="{{ $user->profile_photo_path }}" alt="{{ $user->name }}">
                        @else
                            <img class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover"  src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                        @endif
                    </div>
                    <div class="w-3/5 lg:w-4/6">
                        <div class="flex " style="height:60px;">
                            <p class="pl-4 pt-3 font-light text-3xl">{{ $user->nick }}</p> 
                                @if (\Auth::user()->id == $user->id)
                                    <div class="pt-6 px-5">  
                                        <a href="{{route('config')}}" class="h-8 text-sm text-gray-800 font-semibold py-1 px-2 border border-gray-400 rounded">
                                            Editar perfil
                                        </a>
                                    </div>
                                    <a href="{{route('config')}}" class="hidden sm:block pt-6">
                                        <svg aria-label="Opciones" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                                            <path clip-rule="evenodd" d="M46.7 20.6l-2.1-1.1c-.4-.2-.7-.5-.8-1-.5-1.6-1.1-3.2-1.9-4.7-.2-.4-.3-.8-.1-1.2l.8-2.3c.2-.5 0-1.1-.4-1.5l-2.9-2.9c-.4-.4-1-.5-1.5-.4l-2.3.8c-.4.1-.8.1-1.2-.1-1.4-.8-3-1.5-4.6-1.9-.4-.1-.8-.4-1-.8l-1.1-2.2c-.3-.5-.8-.8-1.3-.8h-4.1c-.6 0-1.1.3-1.3.8l-1.1 2.2c-.2.4-.5.7-1 .8-1.6.5-3.2 1.1-4.6 1.9-.4.2-.8.3-1.2.1l-2.3-.8c-.5-.2-1.1 0-1.5.4L5.9 8.8c-.4.4-.5 1-.4 1.5l.8 2.3c.1.4.1.8-.1 1.2-.8 1.5-1.5 3-1.9 4.7-.1.4-.4.8-.8 1l-2.1 1.1c-.5.3-.8.8-.8 1.3V26c0 .6.3 1.1.8 1.3l2.1 1.1c.4.2.7.5.8 1 .5 1.6 1.1 3.2 1.9 4.7.2.4.3.8.1 1.2l-.8 2.3c-.2.5 0 1.1.4 1.5L8.8 42c.4.4 1 .5 1.5.4l2.3-.8c.4-.1.8-.1 1.2.1 1.4.8 3 1.5 4.6 1.9.4.1.8.4 1 .8l1.1 2.2c.3.5.8.8 1.3.8h4.1c.6 0 1.1-.3 1.3-.8l1.1-2.2c.2-.4.5-.7 1-.8 1.6-.5 3.2-1.1 4.6-1.9.4-.2.8-.3 1.2-.1l2.3.8c.5.2 1.1 0 1.5-.4l2.9-2.9c.4-.4.5-1 .4-1.5l-.8-2.3c-.1-.4-.1-.8.1-1.2.8-1.5 1.5-3 1.9-4.7.1-.4.4-.8.8-1l2.1-1.1c.5-.3.8-.8.8-1.3v-4.1c.4-.5.1-1.1-.4-1.3zM24 41.5c-9.7 0-17.5-7.8-17.5-17.5S14.3 6.5 24 6.5 41.5 14.3 41.5 24 33.7 41.5 24 41.5z" fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                @else
                                    @php 
                                        $imFollower = false;
                                    @endphp
                                    @foreach( $user->followed as $follow)
                                        @if($follow->userFollowers->id == \Auth::user()->id)
                                            @php 
                                                $imFollower = true;
                                            @endphp 
                                        @endif
                                    @endforeach
                                    @if ($imFollower)
                                        <div class="hidden sm:block pt-5 pl-5">  
                                            <a href="/direct/inbox?message={{$user->id}}" class="h-8 text-sm text-gray-800 font-semibold py-1 px-2 border border-gray-400 rounded">
                                                Enviar mensaje
                                            </a>
                                        </div>
                                        <div class="pt-5 px-2">  
                                            <a href="{{ url('/disfollowProfile/'.$user->id)}}" class="h-8 text-sm text-gray-800 font-semibold py-1 px-2 border border-gray-400 rounded">
                                                Dejar de seguir
                                            </a>
                                        </div>
                                        <div class="hidden lg:block pt-5 px-2">  
                                            <button class="h-8 text-gray-800 font-semibold pb-1 px-2 rounded">
                                                <svg aria-label="Opciones" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                                                    <circle clip-rule="evenodd" cx="8" cy="24" fill-rule="evenodd" r="4.5"></circle>
                                                    <circle clip-rule="evenodd" cx="24" cy="24" fill-rule="evenodd" r="4.5"></circle>
                                                    <circle clip-rule="evenodd" cx="40" cy="24" fill-rule="evenodd" r="4.5"></circle>
                                                </svg>
                                            </button>
                                        </div>
                                    @else
                                        <div class="pt-6 pl-5">  
                                            <a href="{{ url('/followProfile/'.$user->id)}}" class="h-8 bg-blue-400 py-1 text-white text-sm font-semibold px-14 rounded">
                                                Seguir
                                            </a>
                                        </div>
                                    @endif
                                @endif
                        </div>
                        <livewire:follows :user="$user"/>
                        <div style="height:60px;">
                            <p class="pl-4 text-gray-900 font-medium">{{ $user->name }}</p>
                            <p class="pl-4 font-normal text-m"> publicaciones</p> 
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center" style="height:50px;">
                    <div class="flex items-center">
                        <svg aria-label="Publicaciones" class="_8-yf5 " fill="#262626" height="12" viewBox="0 0 48 48" width="12">
                            <path clip-rule="evenodd" d="M45 1.5H3c-.8 0-1.5.7-1.5 1.5v42c0 .8.7 1.5 1.5 1.5h42c.8 0 1.5-.7 1.5-1.5V3c0-.8-.7-1.5-1.5-1.5zm-40.5 3h11v11h-11v-11zm0 14h11v11h-11v-11zm11 25h-11v-11h11v11zm14 0h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11zm14 28h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11z" fill-rule="evenodd">
                                </path>
                            </svg>
                        <span class="pl-2 text-gray-900 font-medium text-sm">PUBLICACIONES</span> 
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-1 md:gap-3 pt-4">
                    @foreach($user->images as $image)
                        <div class="">
                            @include('includes.explore.card')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@include('includes.modal')
</x-app-layout>
