@if ($comment)
    <div id="comment-home-{{ $comment->id }}" class="flex justify-between">
        <div class="w-4/6 text-sm">
            <a href="{{route('user.profile',['id' => $comment->user->id])}}"><span class="font-semibold">{{$comment->user->nick}}</span></a> <span class="thin">{{$comment->content}}</span>
        </div>
        <div class="w-1/6 flex justify-end {{($comment->user_id == \Auth::user()->id || $comment->image->user_id == \Auth::user()->id) ? '' : 'justify-center'}}">                                                                           
            <a href=""><i style="font-size:12px;" class="far fa-heart"></i></a>
        </div>
    </div>
@else
    <div class="flex justify-center items-center text-sm font-semibold">
        Oh, parece que algo fallo al publicar tu comentario
    </div>
@endif