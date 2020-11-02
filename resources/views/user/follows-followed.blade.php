<div>
    <script src="{{ asset('js/follow-home.js') }}"></script>
    @isset($followers)  
        @foreach($followers as $follower)
            <li class="modal-close py-3 px-4 flex justify-between">
                <a class="flex items-center" href="{{ route('user.profile',['id' => $follower->userFollowed->id]) }}">
                    @if($follower->userFollowed->profile_photo_path)
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ $follower->userFollowed->profile_photo_path }}" alt="{{ $follower->userFollowed->name }}">
                    @else
                        <img class="h-12 w-12 rounded-full object-cover"  src="{{ $follower->userFollowed->profile_photo_url }}" alt="{{ $follower->userFollowed->name }}">
                    @endif
                    <span class="font-medium text-sm pl-4">
                        {{ $follower->userFollowed->nick }}
                        <br>
                        <p class="font-thin break truncate text-sm">
                            {{ $follower->userFollowed->name }}
                        </p>
                    </span>
                </a>
                <!-- SI EL PERFIL QUE VISITE ES IGUAL AL AUTENTICADO -->
                @if($follower->userFollowers->id == \Auth::user()->id)
                    <span data-id="{{$follower->userFollowed->id}}" class="follow-home cursor-pointer font-bold text-xs flex items-center text-teal-500 pr-4">Siguiendo</span>
                @else
                    @if($followersUserAuthenticate->isEmpty())
                        @if($follower->userFollowed->id != \Auth::user()->id)
                            <span data-id="{{$follower->userFollowed->id}}" class="follow-home cursor-pointer font-bold text-xs flex items-center text-teal-500 pr-4">Seguir</span>
                        @endif
                    @else
                        @foreach($followersUserAuthenticate as $auth)
                            @if($follower->userFollowed->id != \Auth::user()->id)
                                @if($auth->user_id_followed == $follower->userFollowed->id)
                                    <span data-id="{{$auth->user_id_followed}}" class="follow-home cursor-pointer font-bold text-xs flex items-center text-teal-500 pr-4">Siguiendo</span>
                                @else
                                    <span data-id="{{$auth->user_id_followed}}" class="follow-home cursor-pointer font-bold text-xs flex items-center text-teal-500 pr-4">Seguir</span>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endif
                
            </li>
        @endforeach

        @empty($follower)
            <div class="flex justify-center items-center" style="height:320px;">
                <span class="text-base font-semibold text-gray-400">{{($user == \Auth::user()->id) ? 'Parece que aun no sigues a nadie.' : 'Este usuario aun no sigue a nadie.'}}</span>
            </div>
        @endempty
    @endisset
    
    @isset($followed)
        @foreach($followed as $follow)
            <li class="modal-close py-3 px-4 flex justify-between">
                <a class="flex items-center" href="{{ route('user.profile',['id' => $follow->userFollowers->id]) }}">
                    @if($follow->userFollowers->profile_photo_path)
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ $follow->userFollowers->profile_photo_path }}" alt="{{ $follow->userFollowers->name }}">
                    @else
                        <img class="h-12 w-12 rounded-full object-cover"  src="{{ $follow->userFollowers->profile_photo_url }}" alt="{{ $follow->userFollowers->name }}">
                    @endif
                    <span class="font-medium text-sm pl-4">
                        {{ $follow->userFollowers->nick }}
                        <br>
                        <p class="font-thin break truncate text-sm">
                            {{ $follow->userFollowers->name }}
                        </p>
                    </span>
                </a>
                <!-- SI EL PERFIL QUE VISITE ES IGUAL AL AUTENTICADO -->
                @if($follow->userFollowers->id != \Auth::user()->id)
                    <span data-id="{{$follow->userFollowers->id}}" class="follow-home cursor-pointer font-bold text-xs flex items-center text-teal-500 pr-4">Siguiendo</span>
                @else
                    @if($followedUserAuthenticate->isEmpty())
                        @if($follow->userFollowers->id != \Auth::user()->id)
                            <span data-id="{{$follow->userFollowers->id}}" class="follow-home cursor-pointer font-bold text-xs flex items-center text-teal-500 pr-4">Seguir tambien</span>
                        @endif
                    @else
                        @foreach($followedUserAuthenticate as $auth)
                            @if($follow->userFollowers->id != \Auth::user()->id)
                                @if($auth->user_id_followed == $follow->userFollowers->id)
                                    <span data-id="{{$auth->user_id_followed}}" class="follow-home cursor-pointer font-bold text-xs flex items-center text-teal-500 pr-4">Siguiendo</span>
                                @else
                                    <span data-id="{{$auth->user_id_followed}}" class="follow-home cursor-pointer font-bold text-xs flex items-center text-teal-500 pr-4">Seguir taambien</span>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endif
            </li>
        @endforeach

        @empty($follow)
            <div class="flex justify-center items-center" style="height:320px;">
                <span class="text-base font-semibold text-gray-400">{{($user == \Auth::user()->id) ? 'Parece que aun no tienes seguidores.' : 'Parece que este usuario aun no tiene seguidores.'}}</span>
            </div>
        @endempty
    @endisset
    
            

</div>
