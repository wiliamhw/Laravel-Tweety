@if (auth()->user()->isNot($user))
    <form method="POST" action="{{ route('follow', $user->username) }}">
        @csrf

        <button type="submit"
                class="flex justify-center max-h-max whitespace-nowrap focus:outline-none focus:ring
                            rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800
                            hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full
                            mr-0 ml-auto hover:bg-blue-800 hover:text-gray-200">
            {{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
        </button>
    </form>
@endif
