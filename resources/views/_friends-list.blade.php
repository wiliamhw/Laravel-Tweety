<div class="py-1">
    <div class="flex">
        <div class="flex-1 m-2">
            <h2 class="px-4 py-2 text-xl w-48 font-semibold text-white">Following</h2>
        </div>
    </div>

    <hr class="border-gray-800">
    @forelse (auth()->user()->follows as $user)
        <div class="flex flex-shrink-0 pb-4
            {{ Request::is('profiles/' . $user->username)
                ? 'bg-gray-900 text-blue-300'
                : 'hover:bg-gray-800 hover:text-blue-300'
            }}
        ">
            <a href="{{ route('profile', $user) }}">
                <div class="flex-1 ">
                    <div class="flex items-center w-48">
                        <div class="flex-shrink-0 ml-4 mt-2">
                            <img class="inline-block h-10 w-10 rounded-full" src="{{ $user->avatar }}"
                                 alt="">
                        </div>
                        <div class="ml-3 mt-3">
                            <p class="text-base leading-6 font-medium truncate" style="max-width: 123px;">
                                {{ $user->name }}
                            </p>
                            <p class="text-sm leading-5 font-medium text-gray-400 transition ease-in-out duration-150 truncate"
                               style="max-width: 123px;">
                                {{ '@' . $user->username }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <hr class="border-gray-800">
    @empty
        <p class="p-4 text-center">No friends yet</p>
    @endforelse
</div>
