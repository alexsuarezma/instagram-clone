<div>
    @isset($likes)  
        @foreach($likes as $like)
            <li class="modal-close py-3 px-4 flex justify-between">
                <a class="flex items-center" href="{{ route('user.profile',['id' => $like->user->id]) }}">
                    @if($like->user->profile_photo_path)
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ $like->user->profile_photo_path }}" alt="{{ $like->user->name }}">
                    @else
                        <img class="h-12 w-12 rounded-full object-cover"  src="{{ $like->user->profile_photo_url }}" alt="{{ $like->user->name }}">
                    @endif
                    <span class="font-medium text-sm pl-4">
                        {{ $like->user->nick }}
                        <br>
                        <p class="font-thin break truncate text-sm">
                            {{ $like->user->name }}
                        </p>
                    </span>
                </a>               
            </li>
        @endforeach
    @endisset

    @if($likes->isEmpty())
        <div class="flex justify-center items-center" style="height:320px;">
            <span class="text-base font-semibold text-gray-400">Esta publicación no tiene likes.</span>
        </div>
    @endif
            

</div>
