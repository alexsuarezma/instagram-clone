<div>
    
    <div class="flex items-center" style="height:60px;">
        <p class="sm:pl-4 pt-3 font-light text-3xl"><p class="font-medium">{{ count($user->images) }}&nbsp;</p>publicaciones</p> 
        <p class="sm:pl-4 pr-1 sm:pr-8 pt-3 font-light text-3xl"><p class="font-medium cursor-pointer">{{ count($user->followed) }}&nbsp;</p>seguidores</p> 
        <p class="sm:pl-4 pr-1 sm:pr-8 pt-3 font-light text-3xl"><p class="font-medium cursor-pointer">{{ count($user->followers) }}&nbsp;</p>seguidos</p> 
    </div>
    <!-- <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center" >
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-1/4 shadow-lg z-50 rounded-xl">

            <div class="w-full h-auto" style="height:400px;">
                <div class="border-b w-full flex justify-between items-center p-3">
                    <div class="modal-close cursor-pointer text-white text-base">
                        <svg class="fill-current text-gray-700" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                    <span class="text-center text-base font-semibold text-gray-700 mr-6">Seguidores</span>
                    <div class="text-base font-semibold text-gray-700"></div>
                </div>
                <div class="w-full h-full pt-3 overflow-y-auto" style="height:290px;">
                    @for($i=1;$i <= 10; $i++)
                        <ul class="w-full h-auto">
                            <li class="modal-close py-3 px-4 flex items-center hover:bg-gray-100 cursor-pointer" wire:click="createNewMessage({{$user->id}})">
                                @if(\Auth::user()->profile_photo_path)
                                    <img class="h-12 w-12 rounded-full object-cover" src="{{ \Auth::user()->profile_photo_path }}" alt="{{ \Auth::user()->name }}">
                                @else
                                    <img class="h-12 w-12 rounded-full object-cover"  src="{{ \Auth::user()->profile_photo_url }}" alt="{{ \Auth::user()->name }}">
                                @endif
                                <span class="font-medium text-sm pl-4">
                                    {{ \Auth::user()->nick }}
                                    <br>
                                    <p class="font-thin break truncate text-sm">
                                        {{ \Auth::user()->name }}
                                    </p>
                                </span>
                            </li>
                        </ul>
                    @endfor
                </div>
            </div>
        </div>
    </div> -->
</div>