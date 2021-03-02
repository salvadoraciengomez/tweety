<div class="flex p-4 border-b border-b-gray-400">
    <div id="avatar" class="mr-2 flex-shrink-0">
        <img src="{{ $tweet->user->avatar }}" alt="" class="rounded-full mr-2">
        {{-- $tweet->user->avatar devuelto por funcion getAvatarAttribute --}}
    </div>
    <div id="userinfo">
        <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
        <p class="text-sm">
            {{ $tweet->body }}
        </p>
    </div>
</div>