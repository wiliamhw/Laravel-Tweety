<x-master>
    <div class="mb-10">
        <livewire:search-dropdown :users="$users_arr"/>
        @foreach ($users as $user)
            <a href="{{ $user->path() }}" class="py-2.5 px-5 flex items-center
                                          hover:bg-gray-800 transition duration-350 ease-in-out">
                <img src="{{ $user->avatar }}"
                      alt="{{ $user->username }}'s avatar"
                      width="60"
                      class="mr-4 rounded"
                >

                <div>
                    <h4 class="text-white font-bold">{{ $user->name }}</h4>
                    <h5 class="text-gray-400">{{ '@' . $user->username }}</h5>
                </div>
            </a>
        @endforeach

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-master>
