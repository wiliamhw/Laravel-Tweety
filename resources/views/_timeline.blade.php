<div class="mb-8 border border-y-0 border-gray-800">
    <ul class="list-none">
        <li>
            @forelse ($tweets as $tweet)
                @include('_tweet')
                @if (!$loop->last)
                    <hr class="border-gray-800 border"/>
                @endif
            @empty
                <p class="p-4 text-center">No tweets yet</p>
            @endforelse
        </li>
    </ul>
</div>
{{ $tweets->links()  }}
