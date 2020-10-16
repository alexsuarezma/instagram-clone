<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/component/card-fade.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-2">
    
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden"> 
                <div class="w-full h-screen flex justify-center border-b border-gray-200">
                    <div class="w-2/3 ">
                        <div class="flex border-b border-gray-400 pb-4" style="height:220px;">
                            <div class="w-2/6 flex justify-center items-center">
                                @if($user->profile_photo_path)
                                    <img class="w-40 rounded-full object-cover" src="{{ url('/user/avatar/'.$user->id) }}" alt="{{ $user->name }}">
                                @else
                                    <img class="w-40 rounded-full object-cover"  src="{{ url('https://ui-avatars.com/api/?name='.$user->name.'+'.$user->surname.'&amp;color=7F9CF5&amp;background=EBF4FF') }}" alt="{{ $user->name }}">
                                @endif
                            </div>
                            <div class="w-4/6">
                                <div class="flex" style="height:60px;">
                                    <p class="pl-4 pt-3 font-light text-3xl">{{ $user->nick }}</p> 
                                        @if (\Auth::user()->id == $user->id)
                                            <div class="pt-6 px-5">  
                                                <a href="{{route('config')}}" class="h-8 text-sm text-gray-800 font-semibold py-1 px-2 border border-gray-400 rounded">
                                                    Editar perfil
                                                </a>
                                            </div>
                                            <button class="pt-3">
                                                <svg aria-label="Opciones" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                                                    <path clip-rule="evenodd" d="M46.7 20.6l-2.1-1.1c-.4-.2-.7-.5-.8-1-.5-1.6-1.1-3.2-1.9-4.7-.2-.4-.3-.8-.1-1.2l.8-2.3c.2-.5 0-1.1-.4-1.5l-2.9-2.9c-.4-.4-1-.5-1.5-.4l-2.3.8c-.4.1-.8.1-1.2-.1-1.4-.8-3-1.5-4.6-1.9-.4-.1-.8-.4-1-.8l-1.1-2.2c-.3-.5-.8-.8-1.3-.8h-4.1c-.6 0-1.1.3-1.3.8l-1.1 2.2c-.2.4-.5.7-1 .8-1.6.5-3.2 1.1-4.6 1.9-.4.2-.8.3-1.2.1l-2.3-.8c-.5-.2-1.1 0-1.5.4L5.9 8.8c-.4.4-.5 1-.4 1.5l.8 2.3c.1.4.1.8-.1 1.2-.8 1.5-1.5 3-1.9 4.7-.1.4-.4.8-.8 1l-2.1 1.1c-.5.3-.8.8-.8 1.3V26c0 .6.3 1.1.8 1.3l2.1 1.1c.4.2.7.5.8 1 .5 1.6 1.1 3.2 1.9 4.7.2.4.3.8.1 1.2l-.8 2.3c-.2.5 0 1.1.4 1.5L8.8 42c.4.4 1 .5 1.5.4l2.3-.8c.4-.1.8-.1 1.2.1 1.4.8 3 1.5 4.6 1.9.4.1.8.4 1 .8l1.1 2.2c.3.5.8.8 1.3.8h4.1c.6 0 1.1-.3 1.3-.8l1.1-2.2c.2-.4.5-.7 1-.8 1.6-.5 3.2-1.1 4.6-1.9.4-.2.8-.3 1.2-.1l2.3.8c.5.2 1.1 0 1.5-.4l2.9-2.9c.4-.4.5-1 .4-1.5l-.8-2.3c-.1-.4-.1-.8.1-1.2.8-1.5 1.5-3 1.9-4.7.1-.4.4-.8.8-1l2.1-1.1c.5-.3.8-.8.8-1.3v-4.1c.4-.5.1-1.1-.4-1.3zM24 41.5c-9.7 0-17.5-7.8-17.5-17.5S14.3 6.5 24 6.5 41.5 14.3 41.5 24 33.7 41.5 24 41.5z" fill-rule="evenodd"></path>
                                                </svg>
                                            </button>
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
                                                <div class="pt-5 pl-5">  
                                                    <button class="h-8 text-sm text-gray-800 font-semibold pb-1 px-2 border border-gray-400 rounded">
                                                        Enviar mensaje
                                                    </button>
                                                </div>
                                                <div class="pt-6 px-2">  
                                                    <a href="{{ url('/disfollowProfile/'.$user->id)}}" class="h-8 text-sm text-gray-800 font-semibold py-1 px-2 border border-gray-400 rounded">
                                                        Dejar de seguir
                                                    </a>
                                                </div>
                                                <div class="pt-5 px-2">  
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
                                <div class="flex items-center" style="height:60px;">
                                    <p class="pl-4 pt-3 font-light text-3xl"><p class="font-medium">{{ count($user->images) }}&nbsp;</p>publicaciones</p> 
                                    <p class="pl-4 pr-8 pt-3 font-light text-3xl"><p class="font-medium">{{ count($user->followed) }}&nbsp;</p>seguidores</p> 
                                    <p class="pl-4 pr-8 pt-3 font-light text-3xl"><p class="font-medium">{{ count($user->followers) }}&nbsp;</p>seguidos</p> 
                                </div>
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
                        <div class="grid grid-cols-3 place-content-start">
                            @foreach($user->images as $image)
                                <a href="#"class="modal-open" data-id="{{$image->id}}">
                                    <div class="card-fade overflow-hidden bg-gray-400 m-2" style="height:300px;">
                                        <img class="photo w-full" style="position:absolute;
                                                left: -100%;
                                                right: -100%;
                                                top: -100%;
                                                bottom: -100%;
                                                margin: auto;
                                                min-height: 100%;
                                                min-width: 100%;" 
                                                src="{{ url('/user/image/'.$image->id) }}" alt="Imagen"
                                        />
                                        <div class="middle">
                                            <div class="icons">
                                                <i style="cursor:pointer; font-size:17px;" class="fas fa-heart" data-id="{{$image->id}}"></i> &nbsp;<span class="font-medium text-base">{{count($image->likes)}}</span>
                                                <i style="margin-left:25px;-moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1);transform: scaleX(-1); filter: FlipH; font-size:17px;" class="fas fa-comment"></i> &nbsp;<span class="font-medium text-base">{{count($image->comments)}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
@include('includes.modal')
</x-app-layout>
