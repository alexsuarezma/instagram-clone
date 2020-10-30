<script src="{{ asset('js/follow-home.js') }}"></script>
<div class="fixed w-1/4">
    <div class="max-w-lg overflow-hidden">
        <div class="flex items-center px-6 py-4">
            <div class="m-2">
                @if(Auth::user()->profile_photo_path)
                    <img class="h-12 w-12 rounded-full object-cover" src="{{ \Auth::user()->profile_photo_path }}" alt="{{ \Auth::user()->name }}">
                @else
                    <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ \Auth::user()->name }}">
                @endif
            </div>
            <div class="text-left pl-2">
                <p class="font-medium text-sm">{{Auth::user()->nick}}</p>
                <p class="font-thin text-xs">{{Auth::user()->name}}</p>
            </div>
        </div>
        <div class="px-6">
            <div class="flex justify-between">
                <div class="font-medium text-gray-400 text-sm mb-4">Sugerencias para ti</div>   
                <div class="font-medium text-xs mb-4">Ver todo</div>   
            </div>
            <ul class="">
                @foreach($users as $user)
                    @if ($user->id != \Auth::user()->id)
                        <li class="flex justify-between">
                            <a class="py-1 px-3 flex items-center" href="{{ route('user.profile',['id' => $user->id]) }}">
                                @if($user->profile_photo_path)
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $user->profile_photo_path }}" alt="{{ $user->name }}">
                                @else
                                    <img class="h-8 w-8 rounded-full object-cover"  src="{{ url('https://ui-avatars.com/api/?name='.$user->name.'+'.$user->surname.'&amp;color=7F9CF5&amp;background=EBF4FF') }}" alt="{{ $user->name }}">
                                @endif
                                <span class="font-medium text-sm ml-2">
                                    {{ $user->nick }}
                                    <br>
                                    <p class="font-thin text-xs">
                                        {{ $user->name }}
                                    </p>
                                </span>
                            </a>
                            <span data-id="{{$user->id}}" class="follow-home cursor-pointer font-bold text-xs flex items-center text-teal-500">Seguir</span>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>