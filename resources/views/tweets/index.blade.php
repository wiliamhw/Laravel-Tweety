<x-app>
    <div>
        @include ('_publish-tweet-panel')
        @include ('_timeline', $tweets)
    </div>
</x-app>