<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    @forelse (current_user()->follows as $user)
        <li class="{{  $loop->last ? '' : 'mb-4' }}">
            <a href="{{ route('profile', $user) }}" class="flex items-center text-small hover:underline hover:opacity-75">
                <img
                    src="{{ $user->avatar }}"
                    alt=""
                    class="rounded-full mr-2"
                    width="40"
                    height="40"
                >
                {{ $user->name }}
            </a>
        </li>
    @empty
        <p class="p-4">No friends yet</p>
    @endforelse
</ul>
