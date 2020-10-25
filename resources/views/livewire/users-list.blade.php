<div>
    @empty(!$newMessage)
        <li class="flex py-4 pl-8 bg-gray-100" wire:click="" style="cursor:pointer;">
            @if($newMessage->profile_photo_path)
                <img class="h-12 w-12 rounded-full object-cover" src="{{ $newMessage->profile_photo_path }}" alt="{{$newMessage->name}}" width="150">
            @else
                <img class="h-12 w-12 rounded-full object-cover" src="{{ $newMessage->profile_photo_url }}" alt="{{$newMessage->name}}" width="150">
            @endif   
            <div class="w-3/4 pl-4">
                <p class="font-normal text-sm" style="font-weight: 450;">
                    {{$newMessage->nick}}
                </p>
                <div class="flex w-full">
                    <div class="w-3/4">
                        <p class="font-normal text-sm text-gray-400 truncate"></p>
                    </div>
                    <div class="w-1/4">
                        <p class="font-normal text-sm text-gray-400">&nbsp;·&nbsp;4 sem</p>
                    </div>
                </div>
            </div>
        </li>
    @endempty
    @foreach($chatsUsers as $chatUser)
        @php 
            $cont = count($chatUser->messages)-1; 
            $messageNotRead = 0;
            $content;
            $emisor='';
        @endphp
        @foreach ($chatUser->messages as $key => $message) 
            @if($key == $cont)
                @php
                    $content = $message;
                    $emisor = $message->user_id_emisor;
                @endphp
            @endif
            @if($message->user_id_emisor != \Auth::user()->id)
                @if($message->was_read == 0)
                    @php 
                        $messageNotRead++; 
                    @endphp
                @endif
            @endif
        @endforeach
        <li class="flex py-4 pl-8 {{ ($chat == $chatUser->id ) ? 'bg-gray-100' : 'hover:bg-gray-100'}}" wire:click="changeChatUser({{$chatUser->id}}, {{($chatUser->user_id_one == \Auth::user()->id) ? $chatUser->userTwo->id : $chatUser->userOne->id}}, {{$messageNotRead}})" style="cursor:pointer;">
            @if($chatUser->user_id_one == \Auth::user()->id)
                @if($chatUser->userTwo->profile_photo_path)
                    <img class="h-12 w-12 rounded-full object-cover" src="{{ $chatUser->userTwo->profile_photo_path }}" alt="{{$chatUser->userTwo->name}}" width="150">
                @else
                    <img class="h-12 w-12 rounded-full object-cover" src="{{ $chatUser->userTwo->profile_photo_url }}" alt="{{$chatUser->userTwo->name}}" width="150">
                @endif   
            @else
                @if($chatUser->userOne->profile_photo_path)
                    <img class="h-12 w-12 rounded-full object-cover" src="{{ $chatUser->userOne->profile_photo_path }}" alt="{{$chatUser->userOne->name}}" width="150">
                @else
                    <img class="h-12 w-12 rounded-full object-cover" src="{{ $chatUser->userOne->profile_photo_url }}" alt="{{$chatUser->userOne->name}}" width="150">
                @endif   
            @endif
            <div class="w-3/4 pl-4">
                <p class="font-normal text-sm" style="font-weight: 450;">
                    {{($chatUser->user_id_one == \Auth::user()->id) ? $chatUser->userTwo->nick : $chatUser->userOne->nick}}
                </p>
                <div class="flex w-full">
                    <div class="font-normal text-sm text-gray-400 w-3/5 max-w-full truncate">
                        {{$content->content}}
                        @if($messageNotRead > 0 && $emisor != \Auth::user()->id)
                            <span class="read bg-red-600 rounded-full px-1 text-xs text-white">{{ $messageNotRead }}</span>
                        @endif
                    </div>
                    <div class="w-2/5 max-w-full">
                        <p class="font-normal text-sm text-gray-400 truncate">&nbsp;·&nbsp;{{$content->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</div>
