<div>
    <script src="{{ asset('js/followsFollowed.js') }}"></script>
    
    <div class="flex items-center" style="height:60px;">
        <p class="sm:pl-4 pt-3 font-light text-3xl"><p class="font-medium">{{ count($user->images) }}&nbsp;</p>publicaciones</p> 
        <div class="followers sm:ml-4 mr-1 ml-1 sm:mr-4 cursor-pointer" onclick="toggleModal('.modal-followersOrFollowed')" data-id="{{$user->id}}">
            <span class="{{($user->id == \Auth::user()->id) ? 'followers-count' : ''}} font-medium text-base cursor-pointer">{{ count($user->followed) }}</span>
            <span class="pt-3 font-normal text-base">seguidores</span>
        </div>
        <div class="followed cursor-pointer" onclick="toggleModal('.modal-followersOrFollowed')" data-id="{{$user->id}}">
            <span class="{{($user->id == \Auth::user()->id) ? 'followed-count': ''}} font-medium text-base cursor-pointer">{{ count($user->followers) }}</span>
            <span class="pt-3 font-normal text-base">seguidos</span>
        </div>
    </div>
    <!-- MODAL SECTION -->
    <div class="modal-followersOrFollowed opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-40">
        <div class="absolute w-full h-full bg-gray-900 opacity-50" onclick="toggleModal('.modal-followersOrFollowed')"></div>
        <div class="modal-container bg-white w-2/4 md:w-2/5 lg:w-1/4 shadow-lg z-50 rounded-xl">
            <div class="w-full h-auto" style="height:400px;">
                <div class="border-b w-full flex justify-between items-center p-3">
                    <div class="cursor-pointer text-white text-base" onclick="toggleModal('.modal-followersOrFollowed')">
                        <svg class="fill-current text-gray-700" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                    <span class="text-content text-center text-base font-semibold text-gray-700 mr-6"></span>
                    <div class="text-base font-semibold text-gray-700"></div>
                </div>
                <div class="w-full h-full pt-3 overflow-y-auto" style="height:340px;">
                    <!-- PRINT FOLLOWS - FOLLOWED -->
                    <ul class="print-section w-full h-full">
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL SECTION -->
</div>