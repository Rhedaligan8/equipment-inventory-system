<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>ICTEIIS</title>
    @livewireStyles
</head>

<body class="font-nunito antialiased">
    {{-- Main Content --}}
    <main class="h-screen overflow-hidden">
        {{ $slot }}
    </main>

    @stack('scripts') {{-- For additional scripts --}}
    @livewireScripts
</body>

</html>