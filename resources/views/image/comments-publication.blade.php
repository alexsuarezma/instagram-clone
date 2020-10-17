@if ($comment)
    <div id="comment-{{ $comment->id }}" class="flex">
        <a href="{{route('user.profile',['id' => $comment->user->id])}}" class="w-1/5 py-5 pl-5">
            @if($comment->user->profile_photo_path)
                <img class="h-8 w-8 rounded-full object-cover" src="{{ $image->user->profile_photo_path }}" alt="{{ $comment->user->name }}">
            @else
                <img class="h-8 w-8 rounded-full object-cover"  src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}">
            @endif
        </a>
        <div class="w-4/6 py-5 text-sm">
        <a href="{{route('user.profile',['id' => $comment->user->id])}}"><span class="font-bold ...">{{$comment->user->nick}}</span></a> {{$comment->content}}
            <p class="font-thin text-xs">{{\FormatTime::LongTimeFilter($comment->created_at)}}</p>
        </div>
        <div class="w-1/6 flex py-5 {{\Auth::check() && ($comment->user_id == \Auth::user()->id || $comment->image->user_id == \Auth::user()->id) ? '' : 'justify-center'}}">                                        
        @if(\Auth::check() && ($comment->user_id == \Auth::user()->id || $comment->image->user_id == \Auth::user()->id))
            <div class="deletecomments">
                <i data-id="{{ $comment->id }}" style="cursor:pointer; font-size:12px;" class="fas fa-minus pr-3"></i>
            </div>
        @endif                                        
            <a href=""><i style="font-size:12px;" class="far fa-heart"></i></a>
        </div>
    </div>
@else
    <div class="">
        Oh, parece que algo fallo al publicar tu comentario
    </div>
@endif