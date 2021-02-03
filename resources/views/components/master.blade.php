<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        textarea {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div id="app">
    <section class="px-8 py-4 mb-6">
        <header class="container mx-auto">
            <h1>
                <img src="/images/logo.svg" alt="Tweety">
            </h1>
        </header>
    </section>

    {{ $slot }}
</div>
</body>

<script src="https://unpkg.com/turbolinks"></script>
</html>
