<x-landing>
    <div class="flex flex-col">
        <div class="relative self-end space-x-8 mt-14 mr-8">
            @auth
                <a href="{{ route('home') }}" class="text-gray-500 text-base font-medium hover:text-white uppercase">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="hover:text-gray-500 text-base font-medium text-white uppercase">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover:text-gray-500 text-base font-medium text-white uppercase">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    </div>
    <div class="w-4/5">
        <h1 class="lg:mt-24 sm:mt-20 mt-5 text-6xl text-white font-bold">Tweety<br />
            <span class="text-blue-400">Twitter Clone</span>
        </h1>
    </div>

    <div class="w-5/6 my-10 ml-6">
        <h3 class="absolute text-gray-300 z-10">
            Made by <br />
            <strong class="text-white">William Handi Wijaya</strong>
            <br /><a href="https://github.com/wiliamhw" target="_blank">See Github</a>
        </h3>
    </div>

    <div class="hidden sm:block opacity-50 z-0 mt-40">
        <div class="shadow-2xl w-96 h-96 rounded-full -mt-72"></div>
        <div class="shadow-2xl w-96 h-96 rounded-full -mt-96"></div>
        <div class="shadow-xl w-80 h-80 rounded-full ml-8 -mt-96"></div>
    </div>
    <div class="text-white relative">
        <h3 class="text-uppercase font-semibold">Frameworks & Plugins</h3>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 sm:gap-5 uppercase">
            <a href="https://laravel.com/" target="_blank">
                <div
                    class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">
                    <svg class="w-9" viewBox="0 0 50 52" xmlns="http://www.w3.org/2000/svg">
                        <title>Laravel</title>
                        <path
                            d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-.002-21.481L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z"
                            fill="#FF2D20" fill-rule="evenodd"/>
                    </svg>
                    <div>
                        <span>Laravel</span>
                        <span class="text-xs text-blue-300 block">Version 8.0, PHP</span>
                    </div>
                    <div>
                        <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                    </div>
                </div>
            </a>

            <a href="https://tailwindcss.com/" target="_blank">
                <div
                    class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">
                    <svg class="w-9" preserveAspectRatio="xMidYMid" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 256 153.6">
                        <title>Tailwind</title>
                        <linearGradient id="a" x1="-2.778%" y1="32%" y2="67.556%">
                            <stop offset="0" stop-color="#2298bd"/>
                            <stop offset="1" stop-color="#0ed7b5"/>
                        </linearGradient>
                        <path
                            d="M128 0C93.867 0 72.533 17.067 64 51.2 76.8 34.133 91.733 27.733 108.8 32c9.737 2.434 16.697 9.499 24.401 17.318C145.751 62.057 160.275 76.8 192 76.8c34.133 0 55.467-17.067 64-51.2-12.8 17.067-27.733 23.467-44.8 19.2-9.737-2.434-16.697-9.499-24.401-17.318C174.249 14.743 159.725 0 128 0zM64 76.8C29.867 76.8 8.533 93.867 0 128c12.8-17.067 27.733-23.467 44.8-19.2 9.737 2.434 16.697 9.499 24.401 17.318C81.751 138.857 96.275 153.6 128 153.6c34.133 0 55.467-17.067 64-51.2-12.8 17.067-27.733 23.467-44.8 19.2-9.737-2.434-16.697-9.499-24.401-17.318C110.249 91.543 95.725 76.8 64 76.8z"
                            fill="url(#a)"/>
                    </svg>
                    <div>
                        <span>Tailwind</span>
                        <span class="text-xs text-blue-300 block">CSS</span>
                    </div>
                    <div>
                        <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                    </div>
                </div>
            </a>

            <a href="https://laravel-livewire.com/" target="_blank">
                <div
                    class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">
                    <img class="w-9" src="{{ asset("images/livewire.png") }}" alt=""/>
                    <div>
                        <span>Livewire</span>
                        <span class="text-xs text-blue-300 block">Version 2</span>
                    </div>
                    <div>
                        <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                    </div>
                </div>
            </a>

            <a href="https://github.com/turbolinks/turbolinks" target="_blank">
                <div
                    class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">
                    <img class="w-9" src="" alt=""/>
                    <div>
                        <span>Turbolinks</span>
                        <span class="text-xs text-blue-300 block">Ajax</span>
                    </div>
                    <div>
                        <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</x-landing>
