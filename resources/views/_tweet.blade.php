<div class="flex p-4 border-b border-b-gray-400">
    <div id="avatar" class="mr-2 flex-shrink-0">
        <img src="https://i.pravatar.cc/50?u={{ $tweet->user->email }}" alt="" class="rounded-full mr-2">
    </div>
    <div id="userinfo">
        <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
        <p class="text-sm">
            {{ $tweet->body }}
        </p>
    </div>
</div>