<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/svg" sizes="16x16" href="{{ asset('images/title-icon.svg') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/overlay.js') }}" defer></script>
    <script src="{{ asset('js/alert.js') }}" defer></script>
    <script src="{{ asset('js/three-dot.js') }}" defer></script>
    <script src="{{ asset('js/preview-image.js') }}" defer></script>
    <script src="{{ asset('js/change-border.js') }}" defer></script>
    <script src="{{ asset('js/dynamic-txtarea.js') }}"></script>
    <script src="https://use.fontawesome.com/b22f9a1bb6.js"></script>
    <script src="https://unpkg.com/turbolinks"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/overlay.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/three-dot.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body class="h-screen overflow-hidden antialiased leading-none font-sans" style="background: #15202b;">
<div id="app">
    <section class="px-8 py-4 mb-4">
        <header class="container mx-auto">
            <img class="h-8 w-8 text-white ml-8" src="{{ asset('images/logo.svg') }}" alt="logo">
        </header>
    </section>
    <x-alerts/>
    <section class="px-8 text-white">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="xl:text-lg w-1/6 max-w-sm">
                    @include ('_sidebar-links')
                </div>

                <div id="middle" class="hide-scrollbar lg:flex-1 mx-5 xl:mx-6 overflow-y-scroll"
                     style="max-width: 650px; height:92.5vh">
                    {{ $slot }}
                </div>

                <div class="max-w-sm rounded-lg bg-dim-700 overflow-hidden shadow-lg m-4" style="height: fit-content;">
                    @include ('_friends-list')
                </div>
            </div>
        </main>
    </section>
</div>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>

<style>
    .bg-dim-700 {
        --bg-opacity: 1;
        background-color: #192734;
    }
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    textarea {
        resize: none;
    }
</style>
</html>
