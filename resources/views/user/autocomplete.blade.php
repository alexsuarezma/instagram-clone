@if(count($users) > 0)

    <ul class="bg-white border-gray-300 w-64 absolute border rounded overflow-y-auto h-auto" style="max-height:350px;">
    @foreach($users as $user)
        <li class="">
        <a class="py-3 px-3 flex items-center hover:bg-gray-100" href="{{ route('user.profile',['id' => $user->id]) }}">
        @if($user->profile_photo_path)
            <img class="h-8 w-8 rounded-full object-cover" src="{{ $user->profile_photo_path }}" alt="{{ $user->name }}">
        @else
            <img class="h-8 w-8 rounded-full object-cover"  src="{{ url('https://ui-avatars.com/api/?name='.$user->name.'+'.$user->surname.'&amp;color=7F9CF5&amp;background=EBF4FF') }}" alt="{{ $user->name }}">
        @endif
            <span class="font-medium text-sm ml-2">
                {{ $user->nick }}
            <br>
            <p class="font-thin break truncate text-sm">
                {{ $user->name }}
            </p>
        </span>
        </a>
        </li>
        <hr>
    @endforeach
    </ul>
@else
    <ul class="flex justify-center items-center bg-white border-gray-300 w-64 absolute border rounded overflow-y-auto" style="height:50px;">
        <li class="">
            <span class="text-gray-500 font-medium text-sm ml-2">
                No se han encontrado resultados.
            </span>
        </li>
    </ul>
@endif