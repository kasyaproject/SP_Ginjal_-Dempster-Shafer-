<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('/img/Kidney Care logo.png') }}">
    <title>Ginjal Sehat | Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .login-bg {
            background-image: url('{{ asset('/img/stethoscope-clipboard.jpg') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="login-bg">
    <div class="relative p-0 laptop:p-2">
        <a href="/">
            <button type="button" class="p-2 rounded-full hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-white bi bi-arrow-left-circle"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                </svg>
            </button>
        </a>
    </div>
    <div class="flex items-center justify-center min-h-screen px-2 -mt-16">
        <div class="w-full max-w-md px-6 mx-auto border-2 border-white rounded-lg shadow-lg bg-white/50">
            <div class="flex items-center justify-center my-8">
                <img class="h-16" src="{{ asset('/img/Kidney Care logo.png') }}" alt="Logo">
            </div>

            <div class="px-2 py-8">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="username" class="block mb-2 text-sm font-bold text-gray-700"
                            for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            class="w-full px-3 py-2 text-gray-700 rounded-lg focus:outline-none focus:border-green-500 focus:ring-green-500"
                            placeholder="Enter your username" required>
                        @error('username')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-10">
                        <label for="password" class="block mb-2 text-sm font-bold text-gray-700"
                            for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-3 py-2 text-gray-700 rounded-lg focus:outline-none focus:border-green-500 focus:ring-green-500"
                            type="password" id="password" name="password" placeholder="Enter your password" required>
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror

                        @if (session('error'))
                            <p id="filled_error_help" class="mt-4 text-xs text-red-600 dark:text-green-400">Username dan
                                Password salah !</p>
                        @endif
                        @if (session('error-admin'))
                            <p id="filled_error_help" class="mt-4 text-xs text-red-600 dark:text-green-400">
                                Hanya Admin yang dapat login !
                            </p>
                        @endif
                    </div>

                    <div class="flex items-center justify-between">
                        <button
                            class="w-full px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none"
                            type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
