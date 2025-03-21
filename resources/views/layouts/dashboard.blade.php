<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <title>ICTEIIS</title>
    @livewireStyles
</head>

<body class="font-nunito antialiased flex bg-base-300">
    {{-- Main Content --}}
    <livewire:sidebar />
    <div class="grow">
        <livewire:header />
        <main class="h-screen">
            {{ $slot }}
        </main>
    </div>

    @stack('scripts') {{-- For additional scripts --}}
    @livewireScripts
</body>

</html>