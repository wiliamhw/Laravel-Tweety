<ul>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{ route('home') }}">
            Home
        </a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="/explore">
            Explore
        </a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="{{ route('profile', auth()->user()) }}">
            Profile
        </a>
    </li>

    <li>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" name="logout-btn" class="font-bold text-lg mb-4 block">Logout</button>
        </form>
    </li>

    <li>
        <form action="/alert" method="post">
            @csrf
            <button type="submit" name="test-alert-btn" class="font-bold text-lg mb-4 block">Test alert</button>
        </form>
    </li
</ul>
