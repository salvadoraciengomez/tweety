<h3 class="font-bold text-xl mb-4">Siguiendo</h3>
<ul>
    @forelse (auth()->user()->follows as $user)
        <li class="mb-4">
            <div class="flex items-center text-sm">
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm"><img src="{{ $user->avatar }}" alt="" width="40" height="40" class="rounded-full mr-4">{{ $user->name }}</a>
            </div>
        </li>
    @empty
        No friends following yet
    @endforelse
</ul>