<x-guest-layout>
    {{-- Form --}}
    <div id="form" class="flex justify-center w-full px-3 py-4 text-justify text-black bg-blue- laptop:py-10">
        <div class="flex border border-gray-200 shadow-lg group laptop:w-3/4 max-laptop:flex-col-reverse rounded-2xl">
            <div class="px-4 py-4 m-2 laptop:w-3/5 bg-blue-">
                <form class="mx-auto" action="{{ route('result') }}" method="POST">
                    @csrf
                    <h1 class="mb-10 text-2xl font-bold">Periksa Kondisi Kesehatan Ginjal anda disini</h1>

                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="Usia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Usia Pasien <span class="text-red-600">*</span>
                            </label>
                            <input type="number" id="usia" name="usia" value="{{ old('usia') }}"
                                oninput="limitValue(this, {{ $minValue }}, {{ $maxValue }});"
                                class="bg-gray-50 border [&::-webkit-inner-spin-button]:appearance-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                placeholder="Masukan hasil pengukuran . . ." required />
                            @error('usia')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600 dark:text-green-400">Masukan usia
                                    pasien !</p>
                            @enderror
                        </div>
                        <div>
                            <label for="Kelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin <span class="text-red-600">*</span>
                            </label>
                            <select name="kelamin"
                                data-hs-select='{
                                    "placeholder": "Pilih jenis kelamin . . .",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-green-600 dark:text-green-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                }'>
                                <option value="">Choose</option>
                                @foreach ($kelamin as $item)
                                    <option value="{{ $item->nama }}" {{-- {{ old('kelamin') == $option->value ? 'selected' : '' }} --}}>{{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kelamin')
                                <p id="filled_error_help" class="mt-1 text-xs text-red-600 dark:text-green-400">Pilih jenis
                                    kelamin pasien !</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Multiple Select dari https://preline.co/ --}}
                    <div class="mb-5">
                        <label for="gejalaKlinis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gejala Klinis</label>
                        <select id="gejalaKlinis" multiple="" name="gejala[]"
                            data-hs-select='{
                                "placeholder": "Pilih gejala klinis . . .",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-green-600 dark:text-green-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 fill-green-400  dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">Choose</option>
                            @foreach ($gejala as $item)
                                <option value="{{ $item->id }}" {{ old('gejala') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Multiple Select dari https://preline.co/ --}}
                    <div class="mb-8">
                        <label for="riwayatMedis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Riwayat Medis</label>
                        <select id="riwayatMedis" multiple="" name="riwayat[]"
                            data-hs-select='{
                                "placeholder": "Pilih riwayat medis . . .",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-green-600 dark:text-green-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 fill-green-400  dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">Choose</option>
                            @foreach ($riwayat as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('riwayat') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="text-white w-full bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-1 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        Mulai Pemeriksaan
                    </button>
                </form>
            </div>

            <div class="laptop:w-2/5 flex min-h-60 laptop:items-center laptop:min-h-[600px] bg-green-200 py-8 laptop:bg-center bg-no-repeat bg-cover max-laptop:rounded-t-2xl laptop:rounded-r-2xl"
                style="background-image: url('{{ asset('img/background-form.jpg') }}');">
                <!-- Deskripsi akan muncul saat input difokuskan -->
                <div id="infoDiagnosa"
                    class="w-full px-5 text-center text-white fade-in-left show laptop:py-10 rounded-r-2xl">
                    <h1 class="mb-8 text-2xl font-semibold">Penyakit Ginjal Kronis (PGK)</h1>
                    <p class="text-justify indent-11">Penyakit Ginjal Kronis PGK adalah kondisi jangka panjang di mana
                        ginjal
                        mengalami penurunan
                        fungsi secara bertahap,
                        menyebabkan ginjal tidak mampu lagi menyaring limbah dan kelebihan cairan dari darah secara
                        efektif. Penyakit ini sering kali berlangsung tanpa gejala yang jelas hingga mencapai stadium
                        lanjut, di mana kerusakan ginjal telah signifikan. Faktor risiko utama termasuk diabetes,
                        hipertensi, dan riwayat keluarga dengan penyakit ginjal.</p>
                </div>
            </div>
        </div>

    </div>

    <hr class="border-gray-200 mx-14 dark:border-gray-700 lg:my-8 max-laptop:mx-6" />

    {{-- Rekomendasi --}}
    <div id="rekomendasi" class="flex justify-center w-full gap-4 py-8 overflow-x-auto px-14">
        {{-- artikel > 4 = justify-start ! justify-center --}}
        @foreach ($artikel as $item)
            <a href="{{ route('Artikel.show', $item->id) }}">
                <div class="flex border border-gray-200 shadow-xl h-36 w-96 max-laptop:w-64 max-laptop:h-24 rounded-xl">
                    <img class="object-cover h-full rounded-l-xl" src="{{ asset('/img/Ginjal.jpg') }}" alt="">
                    <div class="w-full px-2 py-4 max-laptop:py-0">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight line-clamp-1">{{ $item->judul }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400 line-clamp-3">
                            {{ $item->isi }}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <script>
        // Membatasi input berdasarkan min dan max
        function limitValue(input, min, max) {
            console.log(input.value);

            if (input.value < min) {
                input.value = input.value;
            } else if (input.value >= max) {
                input.value = max;
            }
        }
    </script>
</x-guest-layout>
