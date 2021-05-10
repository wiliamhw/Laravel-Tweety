<x-master>
    <div class="mb-10">
        <livewire:search-dropdown :users="$users_arr"/>
        @foreach ($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center mb-5">
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

        {{ $users->links() }}
    </div>
</x-master>
