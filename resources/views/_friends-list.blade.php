<div class="py-1">
    <div class="flex">
        <div class="flex-1 m-2">
            <h2 class="px-4 py-2 text-xl w-48 font-semibold text-white">Following</h2>
        </div>
    </div>

    <hr class="border-gray-800">
    @forelse (current_user()->follows as $user)
        <div class="flex flex-shrink-0 pb-4 hover:bg-gray-800 hover:text-blue-300">
            <a href="{{ route('profile', $user) }}">
                <div class="flex-1 ">
                    <div class="flex items-center w-48">
                        <div>
                            <img class="inline-block h-10 w-auto rounded-full ml-4 mt-2" src="{{ $user->avatar }}"
                                 alt="">
                        </div>
                        <div class="ml-3 mt-3">
                            <p class="text-base leading-6 font-medium">
                                {{ $user->name }}
                            </p>
                            <p class="text-sm leading-5 font-medium text-gray-400 transition ease-in-out duration-150">
                                {{ '@' . $user->username }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <hr class="border-gray-800">
    @empty
        <p class="p-4">No friends yet</p>
    @endforelse
</div>
