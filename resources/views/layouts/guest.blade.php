<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('/img/Kidney Care logo.png') }}">
    <title>Ginjal Sehat</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- FLOWBITE --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        .fade-in-left {
            opacity: 0;
            transform: translateX(-20px);
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }

        .fade-in-left.show {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
</head>

<body class="min-h-screen font-sans antialiased bg-stone-50 dark:text-white">
    @include('layouts.guest.navigation')

    {{ $slot }}

    @include('layouts.guest.footer')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.min.js"></script>

    <script>
        document.getElementById('scrollToBottom').addEventListener('click', function(event) {
            // Cek jika halaman saat ini bukan '/'
            if (window.location.pathname !== '/') {
                // Jika bukan '/', arahkan ke '/'
                window.location.href = '/';

                // Tambahkan event listener untuk menangani scroll setelah navigasi selesai
                window.addEventListener('DOMContentLoaded', () => {
                    setTimeout(() => {
                        window.scrollTo({
                            top: document.body.scrollHeight,
                            behavior: 'smooth' // Menambahkan animasi smooth
                        });
                    }, 100); // Delay untuk memastikan navigasi selesai
                });
            } else {
                // Jika sudah berada di '/', jalankan scroll
                setTimeout(() => {
                    window.scrollTo({
                        top: document.body.scrollHeight,
                        behavior: 'smooth' // Menambahkan animasi smooth
                    });
                }, 100); // Delay untuk memastikan animasi scroll
            }
        });
    </script>

</body>

</html>
