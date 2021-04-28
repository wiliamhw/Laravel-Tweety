<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/title-icon.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/overlay.js') }}" defer></script>
    <script src="{{ asset('js/alert.js') }}" defer></script>
    <script src="{{ asset('js/three-dot.js') }}" defer></script>
    <script src="{{ asset('js/preview-image.js') }}" defer></script>
    <script src="{{ asset('js/change-border.js') }}" defer></script>
    <script src="{{ asset('js/dynamic-txtarea.js') }}"></script>
    <script src="https://unpkg.com/turbolinks"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/overlay.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/three-dot.css') }}" rel="stylesheet">
</head>

<body class="h-screen overflow-hidden antialiased leading-none font-sans" style="background: #15202b;">
    <div id="app">
        <section class="px-8 py-4 mb-4">
            <header class="container mx-auto">
                <svg viewBox="0 0 24 24" class="h-8 w-8 text-white ml-3" fill="currentColor">
                    <g>
                        <path
                            d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                        </path>
                    </g>
                </svg>
            </header>
        </section>
        {{ $slot }}
    </div>
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
