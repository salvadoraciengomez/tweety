<div id="timeline" class="border border-gray-300 rounded-lg">
    @forelse ( $tweets as $tweet)
        @include('_tweet')
    @empty
        No Tweets aún
    @endforelse
</div>