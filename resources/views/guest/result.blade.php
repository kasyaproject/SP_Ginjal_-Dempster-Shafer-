<x-guest-layout>
    {{-- Result --}}

    <div id="result" class="flex justify-center w-full px-3 py-2 my-8 text-justify text-black bg-blue- laptop:py-10">
        <div class="px-2 py-2 border border-gray-200 shadow-lg w- bg-yellow- laptop:py-2 laptop:w-3/4 rounded-2xl">
            <div class="flex items-center justify-center gap-4 mx-auto mb-6">
                {{-- Buruk --}}
                @if ($kondisi == 'BURUK')
                    <div class="flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-500" class="bi bi-emoji-neutral-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m-3 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8" />
                            </svg>
                        </div>
                        <div class="my-2 text-xl font-bold text-center">BURUK</div>
                    </div>
                @elseif($kondisi == 'HATI-HATI')
                    {{-- Waspada --}}
                    <div class="flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-emoji-smile-fill fill-yellow-300"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8" />
                            </svg>
                        </div>
                        <div class="my-2 text-xl font-bold text-center">Hati - hati</div>
                    </div>
                @elseif($kondisi == 'SEHAT')
                    {{-- Sehat --}}
                    <div class="flex-col items-center justify-center">
                        <div class="flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-emoji-laughing-fill fill-green-500"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5c0 .501-.164.396-.415.235C6.42 6.629 6.218 6.5 6 6.5s-.42.13-.585.235C5.164 6.896 5 7 5 6.5 5 5.672 5.448 5 6 5s1 .672 1 1.5m5.331 3a1 1 0 0 1 0 1A5 5 0 0 1 8 13a5 5 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5m-1.746-2.765C10.42 6.629 10.218 6.5 10 6.5s-.42.13-.585.235C9.164 6.896 9 7 9 6.5c0-.828.448-1.5 1-1.5s1 .672 1 1.5c0 .501-.164.396-.415.235" />
                            </svg>
                        </div>
                        <div class="my-2 text-xl font-bold text-center">SEHAT</div>
                    </div>
                @endif
            </div>

            <div class="px-2 py-6 lg:p-8">
                <div class="mb-5">
                    <p class="mb-4 text-xl font-semibold">Laporan Hasil Diagnosa Penyakit Ginjal</p>
                    <table class="text-sm lg:ml-4">
                        <tr>
                            <td class="lg:w-48 w-36">Jenis Kelamin</td>
                            <td class="w-3">:</td>
                            <td class="font-semibold">{{ $inputKelamin }}</td>
                        </tr>
                        <tr>
                            <td class="">Usia</td>
                            <td class="w-3">:</td>
                            <td class="font-semibold">{{ $inputUsia }}</td>
                        </tr>
                        <tr class="">
                            <td class="">Tanggal Pemeriksaan</td>
                            <td class="w-3">:</td>
                            <td class="font-semibold">{{ $tglDiagnosa }}</td>
                        </tr>
                        <tr>
                            <td>&nbsp</td>
                        </tr>
                        @php
                            $n = 1;
                        @endphp
                        @foreach ($results as $penyakit => $nilai)
                            @if ($loop->first)
                                <!-- Tampilan untuk iterasi pertama -->
                                <tr>
                                    <td class="">Diagnosa</td>
                                    <td class="w-3">:</td>
                                    <td class="font-semibold">{{ $n }}. {{ $penyakit }} (
                                        {{ $nilai }} % )</td>
                                </tr>
                            @else
                                <!-- Tampilan untuk iterasi selanjutnya -->
                                <tr>
                                    <td class=""></td>
                                    <td class="w-3"></td>
                                    <td class="font-semibold">{{ $n }}. {{ $penyakit }} (
                                        {{ $nilai }} % )</td>
                                </tr>
                            @endif
                            @php
                                $n++;
                            @endphp
                        @endforeach
                    </table>
                </div>

                <hr class="border-gray-200 dark:border-gray-700 lg:my-8 max-laptop:mx-6" />

                {{-- EVALUASI --}}
                <div class="my-3">
                    <div class="mb-3 font-semibold laptop:text-xl">
                        <p>Berdasarkan evaluasi klinis yang dilakukan, pasien didiagnosis menderita Penyakit Ginjal
                            Kronis
                            (PGK). Berikut ini adalah ringkasan temuan berdasarkan faktor usia, jenis kelamin,
                            gejala
                            klinis, riwayat medis, dan tekanan darah:</p>
                    </div>
                    <div class="mb-3">
                        <h1 class="text-lg font-semibold">1. Usia Pasien</h1>
                        <p class="pl-5 text-base">Pasien berusia <span class="font-semibold">{{ $inputUsia }}
                                tahun</span>.
                            Fungsi ginjal biasanya mengalami penurunan seiring bertambahnya usia, dan pada usia
                            pasien
                            saat
                            ini, risiko PGK meningkat. Faktor usia ini turut mempengaruhi evaluasi fungsi ginjal dan
                            strategi pengobatan.</p>
                    </div>
                    <div class="mb-3">
                        <h1 class="text-lg font-semibold">2. Jenis Kelamin</h1>
                        <p class="pl-5 text-base">Penelitian menunjukkan bahwa pria memiliki risiko yang sedikit
                            lebih
                            tinggi terkena PGK dibandingkan wanita. Salah satu alasan yang mungkin adalah prevalensi
                            kondisi-kondisi yang berhubungan dengan penyakit ginjal, seperti hipertensi dan
                            diabetes,
                            lebih
                            tinggi pada pria. Dimana Pria memiliki risiko yang sedikit lebih tinggi untuk terkena
                            PGK
                            dengan
                            prevalensi sekitar 14-16%, dibandingkan dengan wanita yang memiliki prevalensi sekitar
                            12-14%.
                        </p>
                    </div>
                    @if (!empty($listGejala))
                        <div class="mb-3">
                            <h1 class="text-lg font-semibold">3. Gejala Klinis</h1>
                            <p class="pl-5 text-base">
                                @foreach ($listGejala as $gejala)
                                    <span class="font-semibold">
                                        {{ $gejala }},
                                    </span>
                                @endforeach
                                . Gejala-gejala ini sering dikaitkan dengan gangguan fungsi ginjal dan menjadi indikator
                                penting dalam diagnosa penyakit Ginjal.
                            </p>
                        </div>
                    @endif
                    @if (!empty($listRiwayat))
                        <div class="mb-3">
                            <h1 class="text-lg font-semibold">4. Riwayat Medis</h1>
                            <p class="pl-5 text-base">
                                @foreach ($listRiwayat as $riwayat)
                                    <span class="font-semibold">
                                        {{ $riwayat }},
                                    </span>
                                @endforeach
                                . Riwayat medis ini menambah faktor risiko untuk perkembangan PGK dan harus
                                dipertimbangkan
                                dalam penanganan lebih lanjut.
                            </p>
                        </div>
                    @endif
                </div>

                <hr class="border-gray-200 dark:border-gray-700 lg:my-8 max-laptop:mx-6" />

                {{-- REKOMENDASI --}}
                <div class="my-3">
                    <div class="mb-3 font-semibold laptop:text-xl">
                        <p>Rekomendasi Pengobatan:</p>
                    </div>

                    @php
                        $n = 1;
                    @endphp
                    @if (!empty($solusi))
                        @foreach ($solusi as $item)
                            <div class="mb-3">
                                <h1 class="text-lg font-semibold">{{ $n }}. {{ $item->nama }}</h1>
                                <p class="pl-5 text-base">{{ $item->deskripsi }}</p>
                            </div>

                            @php
                                $n++;
                            @endphp
                        @endforeach
                        <h1 class="text-lg font-semibold">{{ $n }}. Menjaga Kesehatan</h1>
                        <p class="pl-5 text-base">Minum air putih yang cukup setiap hari,
                            Jaga pola makan yang seimbang dengan banyak buah dan sayuran,
                            Lakukan olahraga secara teratur, minimal 30 menit setiap hari,
                            Cukupi waktu tidur dan hindari stres berlebihan,
                            Rutin melakukan pemeriksaan kesehatan untuk deteksi dini masalah kesehatan.</p>
                    @endif
                </div>

                <hr class="border-gray-200 dark:border-gray-700 lg:my-8 max-laptop:mx-6" />

                <div class="my-3">
                    <div class="mb-3 text-xl font-semibold ">
                        <p>Prognosis:</p>
                    </div>
                    {{-- {{ $penyakitIds }} --}}
                    {{-- {{ $penyakit }} --}}
                    @php
                        // Membuat array urutan penyakit dari $results
                        $penyakitOrder = array_keys($results);
                        $n = 1;
                    @endphp

                    @foreach ($penyakitOrder as $penyakitNama)
                        @foreach ($penyakitArray as $data)
                            @if ($data['nama'] === $penyakitNama)
                                <h1 class="text-lg font-semibold">{{ $n }}. {{ $data['nama'] }}</h1>
                                <div class="mb-3">
                                    <p class="font-semibold indent-6">{{ $data['deskripsi'] }}</p>
                                </div>
                                @php
                                    $n++;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach
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
</x-guest-layout>
