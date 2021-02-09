<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('apps/client/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('apps/client/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <app-layout inline-template>
            {{ $slot }}
        </app-layout>
    </div>
</body>
</html>
