<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>ICTEIIS</title>
    @livewireStyles
</head>

<body class="font-nunito antialiased">
    {{-- Main Content --}}
    <main class="h-screen">
        {{ $slot }}
    </main>

    @stack('scripts') {{-- For additional scripts --}}
    @livewireScripts
</body>

</html>