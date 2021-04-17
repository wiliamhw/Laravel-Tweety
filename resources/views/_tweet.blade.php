<article class="hover:bg-gray-800 transition duration-350 ease-in-out">
    <div class="flex flex-shrink-0 p-4 pb-0 justify-between align-middle">
        <a href="{{ $tweet->user->path() }}" class="flex-shrink-0 group block">
            <div class="flex items-center">
                <div>
                    <img class="inline-block h-10 w-10 rounded-full"
                         src="{{ $tweet->user->avatar }}" alt="">
                </div>
                <div class="ml-3">
                    <p class="text-base leading-6 font-medium text-white">
                        {{ $tweet->user->name }}
                        <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                            {{ '@' . $tweet->user->username }}  . 16 April
                        </span>
                    </p>
                </div>
            </div>
        </a>
        @can('edit', $tweet->user)
            <x-three-dot :tweet="$tweet"/>
        @endcan
    </div>

    <div class="pl-16">
        @if ($tweet->body)
            <p class="text-base font-normal leading-5 font-sans width-auto text-white flex-shrink">
                {{ $tweet->body }}
            </p>
        @endif

        @if ($tweet->image)
            <div class="md:flex-shrink pr-6 pt-3 xl:pr-12">
                <img class="mt-4 border border-cool-gray-400 rounded-lg object-cover outline-none cursor-pointer w-full h-full"
                     style="height: 337px;"
                     src="{{ $tweet->image }}"
                     onclick="on({{ $tweet->id }})"
                     alt="">
            </div>

            <div id="{{ $tweet->id }}" class="overlay" onclick="off({{ $tweet->id }})">
                <div id="overlay-img">
                    <img src="{{ $tweet->image }}">
                </div>
            </div>
        @endif

        <x-like-buttons :tweet="$tweet"/>
    </div>
</article>
