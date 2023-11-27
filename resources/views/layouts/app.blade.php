<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Prooked' }}</title>
    @vite('resources/css/app.css')
    @stack('style')
</head>

<body>
    {{ $slot }}
    @stack('script')
</body>

</html>
