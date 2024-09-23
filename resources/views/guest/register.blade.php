<x-guest-layout>
    {{-- Register --}}
    <div class="flex justify-center w-full">
        <div class="flex w-full m-4 bg-white rounded-lg shadow-md h-[40rem] max-w-7xl">
            <div class="w-3/5 p-4 border-t-2 border-gray-200 rounded-l-lg bg-yellow-">
                <div class="flex items-center justify-center space-x-1 rtl:space-x-reverse">
                    <div class="relative w-full">
                        <div class="absolute">
                            <div class="alert-massage">
                                {{-- MASSAGE SUCCES --}}
                                @if (session('success'))
                                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg alert bg-green-50 "
                                        role="alert" id="alert-success">
                                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">BERHASIL !!! </span>{{ session('success') }}
                                        </div>
                                    </div>
                                @endif
                                {{-- MASSAGE ERROR --}}
                                @if (session('error'))
                                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg alert bg-red-50"
                                        role="alert" id="alert-error">
                                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">GAGAl !!!</span> {{ session('error') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center w-full h-full">
                    <h1 class="mb-12 text-4xl font-extrabold text-primary">Register Akun !</h1>

                    <div class="w-4/5">
                        <h1 class="mb-2 text-center text-black">Isi form sesuai personal detail</h1>
                        <form action="{{ route('registPasien.store') }}" method="POST" class="">
                            @csrf
                            <div class="mb-6">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 text-gray-500 fill-current" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                                        </svg>
                                    </div>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                        placeholder="Nama Lengkap">
                                </div>
                                @error('name')
                                    <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                <div class="mb-6 ">
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 text-gray-500 fill-gray-500" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg>
                                        </div>
                                        <input type="text" id="username" name="username"
                                            value="{{ old('username') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                            placeholder="Username">
                                    </div>
                                    @error('username')
                                        <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 text-gray-500 fill-gray-500" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671" />
                                                <path
                                                    d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791" />
                                            </svg>
                                        </div>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                            placeholder="name@flowbite.com">
                                    </div>
                                    @error('email')
                                        <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2 mb-4">
                                <div class="mb-6">
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 text-gray-500 fill-gray-500" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                                            </svg>
                                        </div>
                                        <input type="password" id="password" name="password"
                                            value="{{ old('password') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                            placeholder="Password">
                                    </div>
                                    @error('password')
                                        <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 text-gray-500 fill-gray-500" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                                            </svg>
                                        </div>
                                        <input type="password" id="confirm_password" name="confirm_password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                            placeholder="Confirm Password">
                                    </div>
                                    @error('confirm_password')
                                        <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-center w-full">
                                <button type="submit"
                                    class="px-20 py-2 font-semibold transition delay-75 border-2 rounded-full border-primary text-primary hover:bg-primary hover:text-white">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="w-2/5 p-3 rounded-r-lg bg-primary">
                <div class="flex flex-col items-center justify-center w-full h-full">
                    <img class="object-cover w-28" src="{{ asset('/img/Kidney Care logo.png') }}" alt="">
                    <h1 class="mb-8 text-4xl font-extrabold text-white">Masuk dan Mulai !</h1>
                    <p class="mb-8 text-lg font-light text-center text-white px-14">
                        Silahkan login jika sudah memiliki akun untuk memulai diagnosa
                    </p>
                    <a href="{{ route('loginPasien.index') }}">
                        <button
                            class="px-20 py-2 font-semibold text-white transition delay-75 border-2 border-white rounded-full hover:text-primary hover:bg-white">
                            Login
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
