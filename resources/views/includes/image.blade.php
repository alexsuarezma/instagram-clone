    <div class="w-full bg-white overflow-hidden border border-gray-300" style="margin-bottom:80px;">
        <div class="flex items-center">
            <div class="text-center pl-3 py-2 m-2">
                <a href="{{route('user.profile',['id' => $image->user->id])}}">
                    @if($image->user->profile_photo_path)
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $image->user->profile_photo_path }}" alt="{{ $image->user->name }}">
                    @else
                        <img class="h-8 w-8 rounded-full object-cover"  src="{{ $image->user->profile_photo_url }}" alt="{{ $image->user->name }}">
                    @endif
                </a>
            </div>
            <div class="text-left ml-1">
                <a href="{{route('user.profile',['id' => $image->user->id])}}">
                    <p class="font-medium text-sm">{{$image->user->nick}}</p>
                    <p class="font-thin text-xs">{{$image->user->name}}</p>
                </a>
            </div>
        </div>
        
        <!-- <img class="w-full" src="{{ url('/user/image/'.$image->id) }}" alt="Imagen"> -->
        <img class="w-full" src="{{ $image->image_path }}" alt="Imagen">
        <div class="flex px-4 pt-3">
                <?php $userLike = false; ?>
                @foreach($image->likes as $like)
                    @if($like->user_id == \Auth::user()->id)
                        <?php $userLike = true; ?>
                    @endif
                @endforeach
            <div class="likes icons">
                <i style="cursor:pointer; font-size:25px;" id="image-icons-{{$image->id}}" class="far fa-heart {{$userLike ? 'dislike' : 'like'}}" data-id="{{$image->id}}"></i>
            </div>
            <a href="{{ url('/image/'.$image->id) }}" ><i style="margin-left:10px; margin-right:10px; -moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1);transform: scaleX(-1); filter: FlipH; font-size:25px;" class="far fa-comment"></i></a>
            <a href="">
                <svg aria-label="Direct" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="22"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path>
                </svg>
            </a>
        </div>
        <div class="px-4 py-2">
            <span class="likes-modal cursor-pointer" onclick="toggleModal('.modal-likes')" data-id="{{$image->id}}"><div class="font-semibold text-sm py-1"><span class="likes-count-{{$image->id}}">{{count($image->likes)}}</span> Me gusta</div></span>
            <span class="font-semibold ...">{{'@'.$image->user->nick}} </span>{{$image->description}}
            <span class="modal-publication cursor-pointer" onclick="toggleModal('.modal')" data-id="{{$image->id}}">
                <div class="font-hairline text-sm py-1">
                   {{ (count($image->comments) > 0) ? 'Ver los '.count($image->comments).' comentarios' : '' }}
                </div>
                <div id="new-comment-{{ $image->id }}">

                </div>
            </span>
            <a href="{{ url('/image/'.$image->id) }}"><div class="font-thin text-xs py-1">{{\FormatTime::LongTimeFilter($image->created_at)}}</div></a>
        </div>
        <hr>
        <form class="w-full" onsubmit="comentSaveHome(event)" method="POST" autocomplete="off">
            @csrf
            <input type="hidden" name="image_id" id="image_id" value="{{$image->id}}">
            <div class="flex items-center px-2 py-2">
                <input class="appearance-none bg-transparent border-none text-sm w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Añade un comentario" id="comment" name="comment">
                <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="submit">
                    Publicar
                </button>
            </div>
        </form>  
    </div>
