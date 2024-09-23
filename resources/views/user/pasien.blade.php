<x-app-layout>
    @section('sidebar#pasien', 'border-b-2 border-gray-200')

    <div class="px-2 py-8 lg:px-8 laptop:py-12">
        <div class="relative w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <div class="grid items-center justify-between px-8 mb-8 lg:flex">
                <div class="max-lg:mb-4">
                    <h1 class="mb-1 text-4xl font-bold">Pasien</h1>
                    <span class="font-medium">Daftar pasien</span>
                </div>
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
                <div>
                    <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal"
                        class="px-5 py-2 mb-2 text-base font-medium text-center text-white rounded-lg bg-gradient-to-tr from-primary to-green-200 hover:bg-gradient-to-tl focus:ring-2 focus:outline-none focus:ring-green-300 me-2">
                        Tambah Pasien
                    </button>
                </div>
            </div>

            {{-- Table Penyakit --}}
            <div class="relative p-4 py-2 mb-4 border-2 rounded-md shadow-md overflow-x-autow-full">
                <h1 class="px-4 mt-2 mb-4 text-xl font-medium">Tabel Pasien</h1>
                <table id="table_pasien" style="width:100%"
                    class="w-full text-sm text-left text-gray-500 rounded-t-lg rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 rounded-t-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $item)
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{ $item->name }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ $item->username }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    {{ $item->email }}
                                </th>
                                <td class="flex items-center justify-center gap-4 px-4 max-lg:gap-1">
                                    <button data-modal-target="modal-edit-{{ $item->id }}"
                                        data-modal-toggle="modal-edit-{{ $item->id }}"
                                        class="px-2 font-medium text-green-600 hover:underline">
                                        Edit
                                    </button>
                                    <button data-modal-target="modal-delete-{{ $item->id }}"
                                        data-modal-toggle="modal-delete-{{ $item->id }}"
                                        class="font-medium text-red-600 hover:underline">hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH DATA -->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-3xl max-h-full p-4">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Tambah Pasien Baru
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('Pasien.store') }}" method="POST" class="w-full p-4 space-y-4 md:p-5">
                    @csrf
                    <div class="">
                        <div class="">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Pasien</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                class="bg-gray-50 border border-gray-300 focus:ring-2 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                placeholder="Masukan nama pasien . . . " required />
                            @error('nama')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Masukan nama pasien !
                                </p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                Email Pasien</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="bg-gray-50 border border-gray-300 focus:ring-2 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                placeholder="Masukan email pasien . . . " required />
                            @error('email')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Masukan email pasien !
                                </p>
                            @enderror
                        </div>

                        <div class="">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">
                                Masukan Username
                            </label>
                            <input type="text" id="username" name="username" value="{{ old('username') }}"
                                class="bg-gray-50 border border-gray-300 focus:ring-2 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                placeholder="Masukan username pasien . . . " required />
                            @error('username')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Masukan username pasien !
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                                Password Pasien</label>
                            <input type="password" id="password" name="password" value="{{ old('password') }}"
                                class="bg-gray-50 border border-gray-300 focus:ring-2 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                placeholder="Masukan password pasien . . . " required />
                            @error('password')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Masukan password pasien !
                                </p>
                            @enderror
                        </div>

                        <div class="">
                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">
                                Konfirmasi password Pasien
                            </label>
                            <input type="password" id="confirm_password" name="confirm_password"
                                class="bg-gray-50 border border-gray-300 focus:ring-2 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                placeholder="Masukan confim password pasien . . . " required />
                            @error('confirm_password')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                    Konfimrasi password tidak sesuai !
                                </p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" data-modal-target="static-modal" data-modal-toggle="static-modal"
                        class="w-full px-5 py-2 mb-2 text-base font-medium text-center text-white rounded-lg bg-gradient-to-tr from-primary to-green-200 hover:bg-gradient-to-tl focus:ring-4 focus:outline-none focus:ring-green-300 me-2">
                        Tambah Pasien
                    </button>
                </form>
                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 ">
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT DATA --}}
    @foreach ($pasien as $item)
        <div id="modal-edit-{{ $item->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-3xl max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Perbarui Data Penyakit
                        </h3>
                        <button type="button"
                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                            data-modal-toggle="modal-edit-{{ $item->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('Pasien.update', $item->id) }}" method="POST" class="p-4 md:p-5">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-3 mb-4">
                            <div class="">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Pasien</label>
                                <input type="text" id="nama-{{ $item->id }}" name="nama"
                                    value="{{ $item->name }}"
                                    class="bg-gray-50 border border-gray-300 focus:ring-2 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                    placeholder="Masukan nama pasien . . . " required />
                                @error('nama')
                                    <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                        Masukan nama pasien !
                                    </p>
                                @enderror
                            </div>

                            <div class="">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">
                                    Masukan Username
                                </label>
                                <input type="text" id="username-{{ $item->id }}" name="username"
                                    value="{{ $item->username }}"
                                    class="bg-gray-50 border border-gray-300 focus:ring-2 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                    placeholder="Masukan username pasien . . . " required />
                                @error('username')
                                    <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                        Masukan username pasien !
                                    </p>
                                @enderror
                            </div>

                            <div class="">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                    Email Pasien</label>
                                <input type="email" id="email-{{ $item->id }}" name="email"
                                    value="{{ $item->email }}"
                                    class="bg-gray-50 border border-gray-300 focus:ring-2 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                    placeholder="Masukan email pasien . . . " required />
                                @error('email')
                                    <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                        Masukan email pasien !
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="text-white w-full flex justify-center items-center bg-gradient-to-tr from-primary to-green-200 hover:bg-gradient-to-tl focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Perbarui Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- MODAL HAPUS DATA --}}
    @foreach ($pasien as $item)
        <div id="modal-delete-{{ $item->id }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full p-4">
                <div class="relative bg-white rounded-lg shadow">
                    <form action="{{ route('Pasien.destroy', $item->id) }}" method="POST"
                        class="p-4 text-center md:p-5">
                        @csrf
                        @method('DELETE')
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 ">
                            Apakah Anda Yakin ingin menghapus data penyakit <span
                                class="font-bold text-black">[{{ $item->name }}]</span> ini?
                        </h3>
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya, Saya yakin
                        </button>
                        <button data-modal-hide="modal-delete-{{ $item->id }}" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                            Tidak, batalkan!
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        // Data Table Flowbite untuk table gejala & riwayat
        if (document.getElementById("table_pasien") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#table_pasien", {
                paging: true,
                perPage: 100,
                noRows: "Tidak ada data pasien",
                noResults: "Data Pasien tidak ditemukan",
                searchable: true,
            });
        }

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
</x-app-layout>
