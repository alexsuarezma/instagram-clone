

<div class="flex {{($messages==[] && $newChat == false) ? 'items-center' : 'flex-col' }} justify-between w-4/6 h-full">
<style>
    #chat-list::-webkit-scrollbar  {
            width: 0.5rem;
    }

    #chat-list::-webkit-scrollbar-track{
            background-color: #e2e8f0;
    }
    #chat-list::-webkit-scrollbar-thumb{
            background-color: #4299e1;
            border-radius: 5px;
    }
    #chat-list::-webkit-scrollbar-thumb:vertical:active {
            background-color: #2c5282;
    }
</style>
@php  $isMe = true; @endphp       
    @if($newChat)  
        <div wire:loading.remove class="border-b w-full flex items-center" style="height:60px; min-height:60px;">
            <a href="{{ route('user.profile',['id' => $idUser->id]) }}">
                <div class="flex items-center ml-4">
                    @if($idUser->profile_photo_path)
                    <img class="h-6 w-6 rounded-full object-cover" src="{{ $idUser->profile_photo_path }}" alt="{{$idUser->name}}" width="150">
                    @else
                    <img class="h-6 w-6 rounded-full object-cover" src="{{ $idUser->profile_photo_url }}" alt="{{$idUser->name}}" width="150">
                    @endif
                    <span class="text-normal ml-4 font-semibold text-gray-700">{{ $idUser->nick }}</span>
                </div>
            </a>
        </div>
        <div wire:loading.remove class="overflow-y-auto px-8 pt-4" style="height:84%;">  </div>
        <div wire:loading.remove class="w-full p-2 px-4" style="">
            <livewire:chat-form/>
        </div>
    @else
        @empty($messages)
            <script src="{{ asset('js/usersFollows.js') }}"></script>
            <div class="w-full flex justify-center items-center">
                <div wire:loading.remove class="text-center">
                    <span class="text-lg text-center font-semibold text-gray-700 mb-4"> 
                        Tus mensajes
                        <p class="text-sm text-gray-500 font-normal">Envía fotos y mensajes privados a un amigo o grupo.</p>
                    </span>
                    <a href="#" class="modal-open py-1 bg-blue-500 text-white text-sm font-semibold px-2 rounded">
                        Enviar Mensaje
                    </a>
                </div>
                <div wire:loading>
                    <div class="text-center">
                        <p class="text-lg text-center font-semibold text-gray-700 mb-8">
                            ...
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center" >
                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                <div class="modal-container bg-white w-1/4 shadow-lg z-50 rounded-xl">
                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                    <div class="w-full h-auto" style="height:400px;">
                        <div class="border-b w-full flex justify-between items-center p-3">
                            <div class="modal-close cursor-pointer text-white text-base">
                                <svg class="fill-current text-gray-700" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                            </div>
                            <span class="text-center text-base font-semibold text-gray-700 mr-6">Nuevo mensaje</span>
                            <div class="text-base font-semibold text-gray-700"></div>
                        </div>
                        <livewire:new-message/>    
                        
                    </div>
                </div>
            </div>
        @endempty
    @endif

    @empty(!$messages)
        <div class="border-b w-full flex items-center" style="height:60px; min-height:60px;">
            <a href="{{ route('user.profile',['id' => $idUser->id]) }}">
                <div class="flex items-center ml-4">
                    @if($idUser->profile_photo_path)
                        <img class="h-6 w-6 rounded-full object-cover" src="{{ $idUser->profile_photo_path }}" alt="{{$idUser->name}}" width="150">
                    @else
                        <img class="h-6 w-6 rounded-full object-cover" src="{{ $idUser->profile_photo_url }}" alt="{{$idUser->name}}" width="150">
                    @endif
                    <span class="text-normal ml-4 font-semibold text-gray-700">{{ $idUser->nick }}</span>
                </div>
            </a>    
        </div>
        <div id="chat-list" class="overflow-y-auto px-8 pt-4" data-id="{{$idUserChat}}"style="height:84%;">
    @endempty

    @foreach($messages as $message)
        @if( $message->user_id_emisor == \Auth::user()->id)        
            <!-- CLOSE FRIEND MESSAGE  -->
            @if ($isMe == false)
                    </div>
                </div>
                @php  $isMe = true; @endphp
            @endif
                <!-- MY MESSAGE -->
                <div class="flex justify-end items-center">
                    <!-- MESSAGE -->
                    <div class="w-2/4">
                        <span class="float-right select-none bg-gray-100 border border-gray-200 rounded-full px-4 py-2 text-left text-sm font-normal text-gray-700 mb-2 break-all" style="">{{ $message->content }}</span>
                        <br/>
                        <br/>
                    </div>
                </div>
        @else
            <!-- PROFILE IMAGE ONLY REPEAT ONE ALONE TIME -->
            @if ($isMe == true)
                <!-- FRIEND MESSAGE -->
                <div class="w-2/4 flex justify-start items-center">
                    <!-- MESSAGE -->
                    <div class="self-end pb-1">
                        @if($message->userSend->profile_photo_path)
                            <img class="h-6 w-6 rounded-full object-cover" src="{{ $message->userSend->profile_photo_path }}" alt="{{$message->userSend->name}}" width="150">
                        @else
                            <img class="h-6 w-6 rounded-full object-cover" src="{{ $message->userSend->profile_photo_url }}" alt="{{$message->userSend->name}}" width="150">
                        @endif   
                    </div>
                    <div class="w-full pl-4">
                @php  $isMe = false; @endphp
            @endif
                        <span class="float-left select-none border border-gray-200 rounded-full px-4 py-2 text-left text-sm font-normal text-gray-700 mt-2 break-all" style="">{{ $message->content }}</span>
                        <br/>
                        <br/>
                    
        @endif
    
    @endforeach
    @if ($isMe == false)
                </div>
            </div>
        @php  $isMe = true; @endphp
    @endif
    @empty(!$messages)
        </div>
        <div class="w-full p-2 px-4" style="">
            <livewire:chat-form/>
        </div>
    @endempty
    <script>
    $(document).ready(function() {
       
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('d73c4a93b5f210144e9c', {
        cluster: 'eu'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
            // alert(JSON.stringify(data));
            window.livewire.emit('notificacionNuevoMensaje',data.idChat)
            setTimeout(() => {
                $('#chat-list').scrollTop($('#chat-list')[0].scrollHeight); 
            }, 4000);
        });
    });
    
    </script>
</div>