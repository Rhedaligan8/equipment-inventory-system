<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-start',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })

        Livewire.on('trigger-toast', (message, type) => {
            Toast.fire({
                icon: type,
                title: message,
            })
        });
    </script>
</body>

</html>