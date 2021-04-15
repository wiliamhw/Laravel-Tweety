<x-master>
    <div class="flex p-4">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ $tweet->user->path() }}">
                <img
                    src="{{ $tweet->user->avatar }}"
                    alt=""
                    class="rounded-full mr-2"
                    width="50"
                    height="50"
                >
            </a>
        </div>

        <div class="flex-col">
            <div>
                <a href="{{ $tweet->user->path() }}">
                    <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
                </a>

                @if ($tweet->body)
                    <p class="text-sm">
                        {{ $tweet->body }}
                    </p>
                @endif

                @if ($tweet->image)
                    <img src="{{ $tweet->image }}"
                         class="mt-4 border border-cool-gray-400 rounded-lg object-cover outline-none"
                         style="width: 560px; height: 337px"
                    >
                @endif
            </div>

            <x-like-buttons :tweet="$tweet"/>
        </div>
    </div>
</x-master>
