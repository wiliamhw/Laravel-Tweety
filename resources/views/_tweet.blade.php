<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img
                src="{{ $tweet->user->avatar }}"
                alt=""
                class="rounded-full mr-2 hover:opacity-75"
                width="50"
                height="50"
            >
        </a>
    </div>

    <div class="flex-col w-full">
        <div class="relative">
            <div class="flex justify-between mb-3">
                <span class="">
                    <a href="{{ $tweet->user->path() }}">
                        <h5 class="font-bold hover:underline">{{ $tweet->user->name }}</h5>
                    </a>
                </span>
                <x-three-dot/>
            </div>
        </div>

        @if ($tweet->body)
            <p class="text-sm" style="font-size: 15px; line-height: 1.3125;">
                {{ $tweet->body }}
            </p>
        @endif

        @if ($tweet->image)
            <img src="{{ $tweet->image }}" onclick="on({{ $tweet->id }})"
                 class="mt-4 border border-cool-gray-400 rounded-lg object-cover outline-none cursor-pointer"
                 style="width: 560px; height: 337px"
            >
            <div id="{{ $tweet->id }}" class="overlay" onclick="off({{ $tweet->id }})">
                <div id="overlay-img">
                    <img src="{{ $tweet->image }}">
                </div>
            </div>
        @endif

        <x-like-buttons :tweet="$tweet"/>
    </div>
</div>
