<div>
    <div class="border-b w-full flex justify-between items-center p-3">
        <!--CONTENT-->
        <span class="text-center text-base font-semibold text-gray-700">Para:</span>
        <input wire:model="search" class="bg-transparent w-full text-sm text-gray-700 mr-3 py-1 pl-8 pr-2 leading-tight focus:outline-none" type="text" placeholder="Busca...">
    </div>
    <div class="w-full h-full pt-3 overflow-y-auto" style="height:290px;">
        <span class="p-3 text-center text-sm font-semibold text-gray-700">Sugerencias </span>
        @foreach($usersFollows as $user)
        <ul class="w-full h-auto">
            <li class="py-3 px-4 flex items-center hover:bg-gray-100 cursor-pointer" wire:click="createNewMessage({{$user->id}})" onclick="toggleModal('.modal')">
                @if($user->profile_photo_path)
                    <img class="h-12 w-12 rounded-full object-cover" src="{{ $user->profile_photo_path }}" alt="{{ $user->name }}">
                @else
                    <img class="h-12 w-12 rounded-full object-cover"  src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                @endif
                <span class="font-medium text-sm pl-4">
                    {{ $user->nick }}
                    <br>
                    <p class="font-thin break truncate text-sm">
                        {{ $user->name }}
                    </p>
                </span>
            </li>
        </ul>
        @endforeach
    </div>
</div>