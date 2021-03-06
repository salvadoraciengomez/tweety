<div class="flex p-4 border-b border-b-gray-400">
    <div id="avatar" class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}"><img src="{{ $tweet->user->avatar }}" alt="" class="rounded-full mr-2" width="50" height="50"></a>
        {{-- $tweet->user->avatar devuelto por funcion getAvatarAttribute --}}
    </div>
    <div id="userinfo">
        <a href="{{ $tweet->user->path() }}"><h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5></a>
        <p class="text-sm">
            {{ $tweet->body }}
        </p>
        <p><a href="/delete/{{$tweet->id}}">SoftDelete Tweet</a></p>
    </div>
</div>
