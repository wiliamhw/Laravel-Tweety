<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/svg" sizes="16x16" href="{{ asset('images/title-icon.svg') }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script src="https://unpkg.com/turbolinks"></script>
</head>
<body class="h-screen overflow-hidden" style="background: #edf2f7;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<div class="bg-gradient-to-br from-indigo-900 to-green-900 min-h-screen overflow-auto">
    <div class="container mx-auto px-4">
        @if (!Request::is('/'))
            <header class="flex px-8 py-4 justify-center {{ $marginTop }} container mx-auto">
                <a href="{{ route('landing') }}">
                    <img class="h-8 w-8 text-white ml-8" src="{{ asset('images/logo.svg') }}" alt="logo">
                </a>
            </header>
        @endif
        {{ $slot }}
    </div>
</div>
</body>
</html>
