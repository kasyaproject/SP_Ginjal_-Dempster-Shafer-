<x-guest-layout>
    <div class="alert-massage">
        {{-- MASSAGE SUCCES --}}
        @if (session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg alert bg-green-50 " role="alert"
                id="alert-success">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
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
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg alert bg-red-50" role="alert"
                id="alert-error">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
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

    <div class="flex justify-center px-2 pt-12 pb-6">
        <div class="w-full p-4 px-8 bg-white max-w-7xl">
            <div class="flex justify-center w-full mb-12">
                <div class="text-center">
                    <p class="text-3xl font-semibold ">Profile</p>
                    <p class="text-xl">Info tentang profile akun anda</p>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center w-full gap-4">
                <form action="{{ route('profil.update', $profil->id) }}" method="POST"
                    class="w-full max-w-4xl p-8 border-2 border-gray-200 shadow-md rounded-xl">
                    @csrf
                    @method('PUT')
                    <p class="text-2xl">Basic Info</p>
                    <p class="">Info pribadi dan opsi untuk mengelolanya.
                        Anda dapat merubah beberapa informasi ini, seperti nama, username, email Anda.
                        Anda juga dapat mengubah password Anda.</p>

                    <hr class="h-px my-4 bg-gray-200 border-0 ">
                    <div class="px-2 py-4 border-2 border-gray-200 rounded-xl">
                        <div class="mb-4">
                            <label for="default-input" class="block px-2 mb-2 text-sm font-medium text-gray-900">
                                Nama Pengguna
                            </label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                value="{{ $profil->name }}" disabled>
                            @error('name')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Masukan nama pengguna !
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="default-input" class="block px-2 mb-2 text-sm font-medium text-gray-900">
                                Username Pengguna
                            </label>
                            <input type="text" id="username" name="username"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                value="{{ $profil->username }}" disabled>
                            @error('username')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Masukan nama pengguna !
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="default-input" class="block px-2 mb-2 text-sm font-medium text-gray-900">
                                Email Pengguna
                            </label>
                            <input type="text" id="email" name="email"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                value="{{ $profil->email }}" disabled>
                            @error('email')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Masukan nama pengguna !
                                </p>
                            @enderror
                        </div>

                        <button id="edit" type="button"
                            class="w-full p-1 text-sm text-white border-2 rounded-md border-primary bg-primary"
                            style="background-color: rgb(53, 162, 159)">
                            Edit
                        </button>
                        <div id="submit" class="hidden grid-cols-2 gap-2">
                            <button
                                class="w-full p-1 text-sm text-white border-2 rounded-md border-primary bg-primary hover:bg-primary"
                                type="submit" style="background-color: rgb(53, 162, 159)">Perbarui</button>
                            <button id="batal" type="button"
                                class="w-full p-1 text-sm text-black bg-white border-2 rounded-md">Batalkan</button>
                        </div>
                    </div>
                </form>

                <form action="{{ route('profil.changePass', $profil->id) }}" method="POST"
                    class="w-full max-w-4xl p-8 border-2 border-gray-200 shadow-md rounded-xl">
                    @csrf
                    <p class="text-2xl">Perbarui Password</p>
                    <p class="">Perbarui password Anda.</p>

                    <hr class="h-px my-4 bg-gray-200 border-0 ">
                    <div class="px-2 py-4 border-2 border-gray-200 rounded-xl">
                        <div class="mb-4">
                            <label for="default-input" class="block px-2 mb-2 text-sm font-medium text-gray-900">
                                Password baru
                            </label>
                            <input type="password" name="password" value="{{ old('password') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5  "
                                required>
                            @error('password')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Panjang password Harus lebih dari 6 karakter !
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="default-input" class="block px-2 mb-2 text-sm font-medium text-gray-900">
                                Konfirmasi Password baru
                            </label>
                            <input type="password" name="confirmPass"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                required>
                            @error('confirmPass')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Konfirmasi password tidak sesuai !
                                </p>
                            @enderror
                        </div>


                        <button type="submit"
                            class="w-full p-1 text-sm text-white border-2 rounded-md border-primary bg-primary"
                            style="background-color: rgb(53, 162, 159)">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        var InputName = document.getElementById('name');
        var InputUsername = document.getElementById('username');
        var InputEmail = document.getElementById('email');
        var editButton = document.getElementById('edit');
        var submitButton = document.getElementById('submit');
        var batalButton = document.getElementById('batal');

        editButton.addEventListener('click', function() {
            console.log("ada");
            submitButton.classList.remove('hidden');
            submitButton.classList.add('grid');
            InputName.disabled = false;
            InputName.classList.remove('bg-gray-100');
            InputUsername.disabled = false;
            InputUsername.classList.remove('bg-gray-100');
            InputEmail.disabled = false;
            InputEmail.classList.remove('bg-gray-100');

            editButton.classList.add('hidden');
        });
        batalButton.addEventListener('click', function() {
            console.log("ada");
            submitButton.classList.add('hidden');
            submitButton.classList.remove('grid');
            InputName.disabled = true;
            InputName.classList.add('bg-gray-100');
            InputUsername.disabled = true;
            InputUsername.classList.add('bg-gray-100');
            InputEmail.disabled = true;
            InputEmail.classList.add('bg-gray-100');

            editButton.classList.remove('hidden');
        });

        // Fungsi untuk menambahkan kelas hidden setelah 2 detik
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alertSuccess = document.getElementById('alert-success');
                var alertErorr = document.getElementById('alert-error');
                if (alertSuccess) {
                    alertSuccess.classList.add('opacity-0');
                    alertSuccess.classList.add('ease-out');
                    alertSuccess.classList.add('transition-all');
                    alertSuccess.classList.add('duration-500');
                    alertSuccess.classList.add('hidden');
                } else if (alertErorr) {
                    alertErorr.classList.add('opacity-0');
                    alertErorr.classList.add('ease-out');
                    alertErorr.classList.add('transition-all');
                    alertErorr.classList.add('duration-500');
                    alertErorr.classList.add('hidden');
                }
            }, 2000); // Waktu penundaan dalam milidetik (2000 ms = 2 detik)
        });
    </script>
</x-guest-layout>
