<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('/img/Kidney Care logo.png') }}">
    <title>Admin Ginjal Sehat</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    {{-- DATATABLE DARI FLOWBITE --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    {{-- CHARTS DARI FLOWBITE --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        .datatable-dropdown {
            display: none;
        }

        .datatable-wrapper .datatable-top .datatable-dropdown .datatable-selector {
            padding: 5px;
        }

        .datatable-wrapper .datatable-table thead {
            background-color: rgb(243 244 246);
        }
    </style>
</head>

<body class="w-full min-h-screen font-sans antialiased bg-gray-100">
    <div class="flex">
        @include('layouts.user.sidebar')

        <!-- Page Content -->
        <main class="w-full bg-yellow- laptop:ml-64">
            @include('layouts.user.navigation')

            {{ $slot }}
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.min.js"></script>
</body>

</html>
