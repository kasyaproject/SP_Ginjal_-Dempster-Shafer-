<x-app-layout>
    @section('sidebar#gejala', 'border-b-2 border-gray-200')

    <div class="px-2 py-8 lg:px-8 laptop:py-12">
        <div class="relative w-full p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            <div class="grid items-center justify-between px-8 mb-8 lg:flex">
                <div class="max-lg:mb-4">
                    <h1 class="mb-1 text-4xl font-bold">Gejala</h1>
                    <span class="font-medium">Daftar gejala penyakit untuk penyakit ginjal</span>
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
                        Tambah Gejala
                    </button>
                </div>
            </div>

            {{-- Tabel Usia Pasien --}}
            <div class="relative w-full p-4 py-2 mb-4 overflow-x-auto border-2 rounded-md shadow-md">
                <h1 class="px-4 mt-2 mb-4 text-xl font-medium">Tabel Usia Pasien</h1>
                <table id="table_usia" class="w-full text-sm text-left text-gray-500 rounded-t-lg rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 rounded-t-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                rentang usia
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                bobot
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usia as $item)
                            <tr class="bg-white border-b hover:bg-gray-50 ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item->nama }}
                                </th>
                                <td class="px-6 py-4 text-center">
                                    {{ $item->min }} - {{ $item->max }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $item->bobot }}
                                </td>
                                <td class="flex justify-center gap-4 px-4 text-right max-lg:gap-1">
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

            {{-- Tabel Jenis Kelamin Pasien --}}
            <div class="relative w-full p-4 py-2 mb-4 overflow-x-auto border-2 rounded-md shadow-md">
                <h1 class="px-4 mt-2 mb-4 text-xl font-medium">Tabel Jenis Kelamin Pasien</h1>
                <table id="table_kelamin"
                    class="w-full mb-4 text-sm text-left text-gray-500 rounded-t-lg rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 rounded-t-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                bobot
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelamin as $item)
                            <tr class="bg-white border-b hover:bg-gray-50 ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $item->nama }}
                                </th>
                                <td class="px-6 py-4 text-center">
                                    {{ $item->bobot }}
                                </td>
                                <td class="flex justify-center gap-4 px-4 text-right max-lg:gap-1">
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

            {{-- Table Gejala Klinis Pasien --}}
            <div class="relative w-full p-4 py-2 mb-4 overflow-x-auto border-2 rounded-md shadow-md">
                <h1 class="px-4 mt-2 mb-4 text-xl font-medium">Tabel Gejala Klinis</h1>
                <table id="table_gejala" style="width:100%"
                    class="w-full text-sm text-left text-gray-500 rounded-t-lg rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 rounded-t-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                bobot
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Jenis Penyakit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejalaKlinis as $item)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $item->nama }}
                                </th>
                                <td class="px-6 py-4 text-center">
                                    {{ $item->bobot }}
                                </td>
                                <td class="px-6 py-4 font-medium text-center">
                                    {{ $item->penyakit->pluck('nama')->implode(', ') }}
                                </td>
                                <td class="flex justify-center gap-4 px-4 text-right max-lg:gap-1">
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

            {{-- Table Riwayat Medis Pasien --}}
            <div class="relative p-4 py-2 mb-4 border-2 rounded-md shadow-md overflow-x-autow-full">
                <h1 class="px-4 mt-2 mb-4 text-xl font-medium">Tabel Riwayat Medis</h1>
                <table id="table_riwayat" style="width:100%"
                    class="w-full text-sm text-left text-gray-500 rounded-t-lg rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 rounded-t-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                bobot
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Jenis Penyakit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayatMedis as $item)
                            <tr class="bg-white border-b hover:bg-gray-50 ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $item->nama }}
                                </th>
                                <td class="px-6 py-4 text-center">
                                    {{ $item->bobot }}
                                </td>
                                <td class="px-6 py-4 font-medium text-center">
                                    {{ $item->penyakit->pluck('nama')->implode(', ') }}
                                </td>
                                <td class="flex justify-center gap-4 px-4 text-right max-lg:gap-1">
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
    <!-- Overlay -->
    <div id="modal-overlay" class="fixed inset-0 bg-gray-900/80 z-40 hidden"></div>

    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-3xl max-h-full p-4">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Tambah Gejala Baru
                    </h3>
                    <button type="button" id="button-close"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('Gejala.store') }}" method="POST" class="w-full p-4 space-y-4 md:p-5">
                    @csrf
                    <div class="mb-5">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Gejala</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                            class="bg-gray-50 border border-gray-300 focus:ring-2 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                            placeholder="Masukan nama gejala . . . " required />
                        @error('nama')
                            <p id="filled_error_help" class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Pilih
                            Kategori Gejala</label>
                        <select name="kategori" id="kategori"
                            data-hs-select='{
                                "placeholder": "Select option...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-green-500",
                                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                                "optionClasses": "py-2 px-4 w-full text-sm font-semibold text-gray-800 cursor-pointer hover:bg-green-200 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
                                "optionTemplate": "<div class=\"flex justify-between items-center  w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-green-600  \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                              }'
                            class="hidden" required>
                            <option value="">Choose</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item }}" {{ old('kategori') == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <p id="filled_error_help" class="mt-1 text-xs text-red-600 ">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div id="min-max-section" class="hidden md:grid-cols-2 md:gap-6">
                        <div class="mb-5">
                            <label for="min" class="block mb-2 text-sm font-medium text-gray-900">
                                Masukan nilai minimal
                            </label>
                            <input type="number" id="min" value="0" name="min"
                                class="bg-gray-50 border [&::-webkit-inner-spin-button]:appearance-none border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                placeholder="Masukan nama gejala . . . " required />
                            @error('min')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600 ">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="max" class="block mb-2 text-sm font-medium text-gray-900">
                                Masukan nilai maximal
                            </label>
                            <input type="number" id="max" value="0" name="max"
                                class="bg-gray-50 [&::-webkit-inner-spin-button]:appearance-none border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                placeholder="Masukan nama gejala . . . " required />
                            @error('max')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600 ">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="bobot" class="block mb-2 text-sm font-medium text-gray-900">Bobot
                            Gejala</label>
                        <input type="text" id="bobot" name="bobot" value="{{ old('bobot') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                            placeholder="Masukan bobot gejala . . . " required />
                        @error('bobot')
                            <p id="filled_error_help" class="mt-1 text-xs text-red-600 ">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Multiple Select dari https://preline.co/ --}}
                    <div class="mb-5">
                        <label for="penyakit" class="block mb-2 text-sm font-medium text-gray-900">Kategori
                            Penyakit</label>
                        <select id="penyakit" multiple="" name="penyakit[]"
                            data-hs-select='{
                                "placeholder": "Pilih kaetori penyakit . . .",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-green-500 text-black",
                                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-white dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 text-black",
                                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-green-600 dark:text-green-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 fill-green-400  dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">Choose</option>
                            @foreach ($kategoriPenyakit as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('penyakit') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>

                        @error('penyakit')
                            <p id="filled_error_help" class="mt-1 text-xs text-red-600 ">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <button type="submit" data-modal-target="static-modal" data-modal-toggle="static-modal"
                        class="w-full px-5 py-2 mb-2 text-base font-medium text-center text-white rounded-lg bg-gradient-to-tr from-primary to-green-200 hover:bg-gradient-to-tl focus:ring-4 focus:outline-none focus:ring-green-300 me-2">
                        Tambah Gejala
                    </button>
                </form>
                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 ">
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT DATA --}}
    @foreach ($data as $item)
        <div id="modal-edit-{{ $item->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-xl max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Perbarui Data Gejala
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
                    <form action="{{ route('Gejala.update', $item->id) }}" method="POST" class="p-4 md:p-5">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="col-span-2">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Nama {{ $item->kategori }}
                                </label>
                                <input type="text" name="nama" id="nama" value="{{ $item->nama }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="Type product name" required="">
                            </div>

                            @if ($item->kategori == 'Usia')
                                <div class="col-span-1">
                                    <label for="min" class="block mb-2 text-sm font-medium text-gray-900 ">
                                        Nilai Minimal
                                    </label>
                                    <input type="number" name="min" id="min" value="{{ $item->min }}"
                                        class="bg-gray-50 [&::-webkit-inner-spin-button]:appearance-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                        placeholder="Type product name" required="">
                                </div>
                                <div class="col-span-1">
                                    <label for="max" class="block mb-2 text-sm font-medium text-gray-900 ">
                                        Nilai Maximal
                                    </label>
                                    <input type="numer" name="max" id="max" value="{{ $item->max }}"
                                        class="bg-gray-50 [&::-webkit-inner-spin-button]:appearance-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                        placeholder="Type product name" required="">
                                </div>
                            @endif

                            <div class="col-span-2">
                                <label for="bobot" class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Nilai Bobot (0.0 - 1.0)
                                </label>
                                <input type="text" name="bobot" id="bobot" value="{{ $item->bobot }}"
                                    class="bg-gray-50 border [&::-webkit-inner-spin-button]:appearance-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="Type product name" required="">
                            </div>

                            {{-- Multiple Select dari https://preline.co/ --}}
                            <div class="col-span-2 mb-5">
                                <label for="penyakit" class="block mb-2 text-sm font-medium text-gray-900">Kategori
                                    Penyakit</label>
                                <select id="penyakit" multiple="" name="penyakit[]"
                                    data-hs-select='{
                                "placeholder": "Pilih kaetori penyakit . . .",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-green-500 text-black",
                                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-white dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 text-black",
                                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-green-600 dark:text-green-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 fill-green-400  dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                                    class="hidden">
                                    <option value="">Choose</option>
                                    @foreach ($kategoriPenyakit as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            @foreach ($item->penyakit as $penyakit)
                                                {{ $kategori->nama == $penyakit->nama ? 'selected' : '' }} @endforeach>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
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
    @foreach ($data as $item)
        <div id="modal-delete-{{ $item->id }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full p-4">
                <div class="relative bg-white rounded-lg shadow">
                    <form action="{{ route('Gejala.destroy', $item->id) }}" method="POST"
                        class="p-4 text-center md:p-5">
                        @csrf
                        @method('DELETE')
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 ">
                            Apakah Anda Yakin ingin menghapus data gejala <span
                                class="font-bold text-black">[{{ $item->nama }}]</span> ini?
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
        // MENAMPILKAN MODAL TAMBAH JIKA ADA ERROR INPUT
        document.addEventListener('DOMContentLoaded', function() {
            // Mengecek jika ada error
            var modal = new Modal(document.getElementById('static-modal'));
            var overlay = document.getElementById('modal-overlay');

            @if ($errors->any())
                modal.show(); // Tampilkan modal
                overlay.classList.remove('hidden'); // Tampilkan overlay
            @endif

            // Menyembunyikan modal dan overlay saat ditutup
            document.getElementById('button-close').addEventListener('click', function() {
                modal.hide(); // Sembunyikan modal
                overlay.classList.add('hidden'); // Sembunyikan overlay
            });
        });

        // Data Table Flowbite untuk table gejala & riwayat
        if (document.getElementById("table_usia") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#table_usia", {
                paging: false,
                searchable: false,
                sortable: true
            });
        }
        if (document.getElementById("table_kelamin") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#table_kelamin", {
                paging: false,
                searchable: false,
                sortable: true
            });
        }
        if (document.getElementById("table_riwayat") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#table_riwayat", {
                paging: true,
                perPage: 15,
                searchable: true,
                sortable: true
            });
        }
        if (document.getElementById("table_gejala") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#table_gejala", {
                paging: true,
                perPage: 15,
                searchable: true,
                sortable: true
            });
        }

        // Fungsi untuk menambahkan kelas hidden setelah 2 detik
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alertSuccess = document.getElementById('alert-success');
                var alertErorr = document.getElementById('alert-error');
                if (alertSuccess || alertErorr) {
                    alertSuccess.classList.add('opacity-0');
                    alertSuccess.classList.add('ease-out');
                    alertSuccess.classList.add('transition-all');
                    alertSuccess.classList.add('duration-500');
                    alertSuccess.classList.add('hidden');
                    alertErorr.classList.add('opacity-0');
                    alertErorr.classList.add('ease-out');
                    alertErorr.classList.add('transition-all');
                    alertErorr.classList.add('duration-500');
                    alertErorr.classList.add('hidden');
                }
            }, 2000); // Waktu penundaan dalam milidetik (2000 ms = 2 detik)
        });

        // Fungsi untuk menampilkan input max & min untuk Modal Tambah Usia
        document.getElementById('kategori').addEventListener('change', function() {
            var minMaxSection = document.getElementById('min-max-section');
            if (this.value === "Usia") {
                minMaxSection.classList.remove('hidden');
                minMaxSection.classList.add('grid');
                console.log("Usia");
            } else {
                minMaxSection.classList.add('hidden');
                minMaxSection.classList.remove('grid');
                console.log(this.value);

            }
        });
    </script>
</x-app-layout>
