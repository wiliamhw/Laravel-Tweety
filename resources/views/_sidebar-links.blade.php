<nav class="mt-5 px-2">
    <a href="{{ route('home') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full
            {{ Request::is('tweets') ? 'rounded-full bg-gray-800 text-blue-300' : 'hover:bg-gray-800 hover:text-blue-300' }}">
        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"></path>
        </svg>
        Home
    </a>
    <a href="/explore" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full
            {{ Request::is('explore') ? 'rounded-full bg-gray-800 text-blue-300' : 'hover:bg-gray-800 hover:text-blue-300' }}">
        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
        </svg>
        Explore
    </a>
    <a href="{{ route('profile', auth()->user()) }}" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full
            {{ Request::is('profiles/' . auth()->user()->username . '*') ? 'rounded-full bg-gray-800 text-blue-300' : 'hover:bg-gray-800 hover:text-blue-300' }}">
        <svg class="mr-4 h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
        </svg>
        Profile
    </a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="bg-blue-400 hover:bg-blue-500 w-full mt-5 text-white font-bold py-2 px-4 rounded-full">
            Logout
        </button>
    </form>
</nav>
