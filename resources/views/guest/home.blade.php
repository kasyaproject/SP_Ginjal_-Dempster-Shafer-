<x-guest-layout>
    {{-- Home --}}
    <div class="flex h-[520px] bg-gradient-to-r from-primary to-green-200 pt-10 max-laptop:">
        <div
            class="flex items-center w-1/2 pl-20 pr-2 max-laptop:items-start max-laptop:pt-14 max-laptop:p-2 max-laptop:w-full">
            <div class="justify-center max-laptop:text-center">
                <p class="mb-2 text-5xl font-semibold text-white max-laptop:text-4xl">Kenali Tubuh Anda.</p>
                <p class="mb-4 text-lg font-semibold text-gray-100 max-laptop:text-base">Mulailah mengenali
                    tanda-tanda kesehatan dengan
                    pemeriksaan yang
                    tepat. Dapatkan informasi mendalam tentang kondisi kesehatan Anda untuk menjaga kesejahteraan
                    jangka panjang.
                </p>
                @if (Auth::check())
                    <a href="{{ route('form') }}" class="flex w-full max-laptop:justify-center max-laptop:mt-7">
                        <button type="button"
                            class="flex items-center text-white bg-gradient-to-r from-cyan-500 to-green-400 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none text-lg focus:ring-cyan-300 font-medium rounded-full gap-2 px-5 py-2.5 text-center me-2 mb-2">
                            MULAI PEMERIKSAAN
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-8 h-8 bi bi-arrow-right-circle-fill fill-white" viewBox="0 0 16 16">
                                <path
                                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                            </svg>
                        </button>
                    </a>
                @else
                    <a href="{{ route('loginPasien.index') }}"
                        class="flex w-full max-laptop:justify-center max-laptop:mt-7">
                        <button type="button"
                            class="flex items-center text-white bg-gradient-to-r from-cyan-500 to-green-400 hover:bg-gradient-to-bl focus:ring-1 focus:outline-none text-lg focus:ring-cyan-300 font-medium rounded-full gap-2 px-5 py-2.5 text-center me-2 mb-2">
                            MULAI PEMERIKSAAN
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-8 h-8 bi bi-arrow-right-circle-fill fill-white" viewBox="0 0 16 16">
                                <path
                                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                            </svg>
                        </button>
                    </a>
                @endif
            </div>
        </div>
        <div class="flex w-1/2 bg-blue- max-laptop:hidden">
            <img class="object-fill h-full" src="{{ asset('/img/Dokter.png') }}" alt="">
        </div>
    </div>

    <div class="flex items-center justify-center w-full h-40 shadow-md">
        <div class="grid items-center justify-center h-full grid-cols-3 gap-4 py-8 divide-x-2 divide-slate-200">
            <div class="flex flex-col items-center justify-center h-full w-80">
                <p class="text-4xl font-bold text-primary">6.912</p>
                <p class="font-bold">Jumlah Dokter</p>
            </div>
            <div class="flex flex-col items-center justify-center h-full w-80">
                <p class="text-4xl font-bold text-primary">3.168</p>
                <p class="font-bold">Jumlah Rumah Sakit</p>
            </div>
            <div class="flex flex-col items-center justify-center h-full w-80">
                <p class="text-4xl font-bold text-primary">97%</p>
                <p class="font-bold">Akurasi Diagnosa</p>
            </div>
        </div>
    </div>

    {{-- Arikel --}}
    <div id="artikel"
        class="flex flex-col items-center justify-center w-full gap-8 px-2 py-4 md:py-8 max-laptop:gap-4">

        @php
            $i = 0;
        @endphp
        @foreach ($artikel as $item)
            @if ($i % 2 == 0)
                {{-- Kiri --}}
                <a href="{{ route('Artikel.show', $item->id) }}"
                    class="flex flex-row items-center max-w-5xl bg-white border border-gray-200 rounded-lg shadow-lg h-72 hover:bg-gray-100">
                    <div class="w-2/6">
                        <img class="object-cover rounded-t-lg h-72" src="{{ asset('/img/Ginjal.jpg') }}" alt="">
                    </div>
                    <div class="flex flex-col justify-between w-4/6 py-4 mr-8 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $item->judul }} {{-- Judul  --}}
                        </h5>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-6 max-laptop:line-clamp-3">
                            {{-- Deskripsi --}}
                            {{ $item->isi }}
                        </p>
                    </div>
                </a>
            @else
                {{-- Kanan --}}
                <a href="{{ route('Artikel.show', $item->id) }}"
                    class="flex flex-row items-center max-w-5xl bg-white border border-gray-200 rounded-lg shadow-lg h-72 hover:bg-gray-100">
                    <div class="flex flex-col justify-between w-4/6 pl-6 pr-5 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $item->judul }} {{-- Judul  --}}
                        </h5>
                        <p
                            class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-6 max-laptop:line-clamp-3">
                            {{-- Deskripsi --}}
                            {{ $item->isi }}
                        </p>
                    </div>
                    <div class="flex justify-end w-2/6">
                        <img class="object-cover rounded-t-lg h-72 max-laptop:h-30"
                            src="{{ asset('/img/Ginjal.jpg') }}" alt="">
                    </div>
                </a>
            @endif
            @php
                $i++;
            @endphp
        @endforeach

        <div class="flex justify-center w-full gap-8 px-20">
            {{ $artikel->links('components.paginate') }}
        </div>
    </div>

    {{-- About --}}
    <div id="about" class="w-full px-3 py-8 text-center text-white md:py-20 md:px-40 bg-primary">
        <h1 class="mb-5 text-3xl font-semibold md:mb-8 md:text-5xl">About</h1>
        <p class="mb-3 font-semibold md:text-xl">
            Selamat datang di website saya! Website ini dirancang khusus untuk memberikan diagnosa dan solusi berbasis
            teknologi sistem pakar, dengan menggunakan metode Dempster-Shafer. Metode ini memungkinkan saya untuk
            mengolah berbagai informasi dan bukti secara cermat, bahkan dalam kondisi ketidakpastian, sehingga mampu
            memberikan hasil analisis yang lebih akurat dan andal. Kami berkomitmen untuk menyediakan layanan yang
            terpercaya dengan menggabungkan keahlian medis dan teknologi canggih untuk mendukung keputusan Anda.
        </p>
    </div>

</x-guest-layout>
