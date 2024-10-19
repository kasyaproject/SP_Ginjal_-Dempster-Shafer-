<x-guest-layout>
    {{-- Login --}}
    <div class="flex justify-center w-full py-10">
        <div class="flex w-full m-4 bg-white rounded-lg shadow-md h-[40rem] max-w-7xl">
            <div class="w-2/5 p-3 rounded-l-lg bg-primary">
                <div class="flex flex-col items-center justify-center w-full h-full">
                    <img class="object-cover w-28" src="{{ asset('/img/Kidney Care logo.png') }}" alt="">
                    <h1 class="mb-8 text-4xl font-extrabold text-white">Register Akun</h1>
                    <p class="mb-8 text-lg font-light text-center text-white px-14">
                        Daftarkan diri anda untuk memulai diagnosa
                    </p>
                    <a href="{{ route('registPasien.loginDiagnoisa') }}">
                        <button
                            class="px-20 py-2 font-semibold text-white transition delay-75 border-2 border-white rounded-full hover:text-primary hover:bg-white">
                            Register
                        </button>
                    </a>
                </div>
            </div>
            <div class="flex items-center w-3/5 p-4 border-t-2 border-gray-200 rounded-r-lg bg-yellow-">
                <div class="flex flex-col items-center justify-center w-full">
                    <h1 class="mb-12 text-4xl font-extrabold text-primary">Login untuk Diagnosa</h1>

                    <div class="w-3/5">
                        <h1 class="mb-2 text-center text-black">Login untuk mulai diagnosa penyakit</h1>
                        <form action="{{ route('loginPasien.login') }}" method="POST" class="">
                            @csrf
                            <div class="relative mb-4">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 fill-gray-500"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                </div>
                                <input type="text" id="username" name="username" autocomplete="off"
                                    value="{{ old('username') }}" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                    placeholder="Username">
                            </div>

                            <div class="relative mb-">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 fill-gray-500"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                                    </svg>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                    placeholder="Password">
                            </div>

                            @if (session('error'))
                                <p id="filled_error_help" class="mb-4 text-xs text-red-600 dark:text-green-400">
                                    {{ session('error') }}
                                </p>
                            @endif

                            <div class="mt-4 mb-6">
                                <div class="flex justify-center w-full">
                                    <button
                                        class="px-20 py-2 font-semibold transition delay-75 border-2 rounded-full border-primary text-primary hover:bg-primary hover:text-white">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
