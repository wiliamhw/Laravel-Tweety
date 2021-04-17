<x-app class="pb-14">
    @include ('_publish-tweet-panel')
    @include ('_timeline', $tweets)
    {{ $tweets->links()  }}
</x-app>
