<script src="{{ asset('js/publication.js') }}"></script>
<div class="flex justify-center">
    <div class="flex items-center w-3/5 h-auto border-r">
        <img class="w-full" style="max-height:600px;" src="{{ url('/user/image/'.$image->id) }}" alt="Imagen">
    </div>
    <div class="w-2/5 h-auto">
        <div class="">
            <div class="flex border-b">
                <div class="text-center pl-3 py-2 m-2">
                    <a href="{{route('user.profile',['id' => $image->user->id])}}">
                        @if($image->user->profile_photo_path)
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ url('/user/avatar/'.$image->user->id) }}" alt="{{ $image->user->name }}">
                        @else
                            <img class="h-8 w-8 rounded-full object-cover"  src="{{ url('https://ui-avatars.com/api/?name='.$image->user->name.'+'.$image->user->surname.'&amp;color=7F9CF5&amp;background=EBF4FF') }}" alt="{{ $image->user->name }}">
                        @endif
                    </a>
                </div>
                <div class="text-left m-3">
                    <a href="{{route('user.profile',['id' => $image->user->id])}}">
                        <span class="font-medium text-sm">{{$image->user->nick}}</span>
                    </a>
                    <?php $userFollow = false; ?>
                    <!-- YA ESTOY SIGUIENDO AL USUARIO?¿ -->
                    @foreach( $image->user->followed as $follow)
                        @if($follow->user_id_follower == \Auth::user()->id)
                            <?php $userFollow = true; ?>
                        @endif
                    @endforeach
                    @if ( $image->user->id != \Auth::user()->id )
                        <span class="text-xl font-bold" style="margin-top:10px;">&nbsp;·&nbsp;</span>
                        <span class="follow text-sm font-medium" data-id="{{$image->user->id}}" style="cursor:pointer;">{{ $userFollow ? 'Siguiendo' : 'Seguir'}}</span>                    
                    @endif
                </div>
            </div>
            <div id="card-comment" class="overflow-y-auto" style="min-height:300px; max-height:365px;">
                <div class="flex">
                    <div class="w-1/5 py-5 pl-5">
                        @if($image->user->profile_photo_path)
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ url('/user/avatar/'.$image->user->id) }}" alt="{{ $image->user->name }}">
                        @else
                            <img class="h-8 w-8 rounded-full object-cover"  src="{{ url('https://ui-avatars.com/api/?name='.$image->user->name.'+'.$image->user->surname.'&amp;color=7F9CF5&amp;background=EBF4FF') }}" alt="{{ $image->user->name }}">
                        @endif
                    </div>
                    <div class="w-4/6 py-5 text-sm">
                        <span class="font-bold ...">{{$image->user->nick}}</span> {{$image->description}}
                        <p class="font-thin text-xs">{{\FormatTime::LongTimeFilter($image->created_at)}}</p>
                    </div>
                </div>
                <div id="new-comment">
                    @foreach($image->comments as $comment)
                        @include('image.comments-publication')
                    @endforeach
                
                </div>
            </div>
            <hr>
            <div class="flex px-4 pt-3">
                <?php $userLike = false; ?>
                @foreach($image->likes as $like)
                    @if($like->user_id == \Auth::user()->id)
                        <?php $userLike = true; ?>
                    @endif
                @endforeach
                <div class="likes publication">
                    <i style="cursor:pointer; font-size:25px;" class="far fa-heart {{$userLike ? 'dislike' : 'like'}}" data-id="{{$image->id}}"></i>
                </div>
                <a href="{{ url('/image/'.$image->id) }}"><i style="margin-left:10px; margin-right:10px; -moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1);transform: scaleX(-1); filter: FlipH; font-size:25px;" class="far fa-comment"></i></a>
                    <a href="">
                        <svg aria-label="Direct" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="22"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path>
                        </svg>
                    </a>
            </div>
            <div class="px-4 py-2">
                <a href=""><div class="font-semibold text-sm py-1"><span class="likesCount">{{count($image->likes)}}</span> Me gusta</div></a>
                <a href="{{ url('/image/'.$image->id) }}"><div class="font-thin text-xs py-1">{{\FormatTime::LongTimeFilter($image->created_at)}}</div></a>
            </div>
            <hr>
            <!-- <form class="w-full" action="{{route('comment.save')}}" method="POST" autocomplete="off"> -->
            <form class="w-full" onsubmit="comentSave(event)" method="POST" autocomplete="off">
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
    </div>
</div>    