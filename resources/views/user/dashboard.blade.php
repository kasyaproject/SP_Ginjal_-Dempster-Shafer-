<x-app-layout>
    @section('sidebar#dashboard', 'border-b-2 border-gray-200')

    <div class="px-2 pt-12 pb-6">
        {{-- CARD --}}
        <div class="grid w-full grid-cols-1 gap-12 mx-auto mb-8 lg:grid-cols-4 sm:px-6 lg:px-8">
            <a href="{{ route('Pasien.index') }}"
                class="flex items-center justify-center h-10 overflow-hidden transition bg-white shadow-md rounded-2xl duration-10 hover:-translate-y-1 hover:translate-x-1 lg:mx-0 lg:h-40">
                <?php
                $pasien = \App\Models\user::where('tittle', '=', 'pasien')->count();
                ?>
                <div class="flex items-center justify-between w-full h-full p-6 text-gray-900">
                    <div class="gap=2">
                        <p class="text-2xl font-medium">{{ $pasien }}</p>
                        <p class="font-medium text-gray-500">Jumlah Data Pasien </p>
                    </div>
                    <div
                        class="flex items-center justify-center w-24 h-24 p-5 rounded-full from-gray-200 to-gray-300 bg-gradient-to-b">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-full transition duration-75 bi bi-hospital bi-hospital-fill fill-gray-500"
                            viewBox="0 0 16 16">
                            <path
                                d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4m13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z" />
                        </svg>
                    </div>
                </div>
            </a>
            <a href="{{ route('Penyakit.index') }}"
                class="flex items-center justify-center h-10 overflow-hidden transition bg-white shadow-md rounded-2xl duration-10 hover:-translate-y-1 hover:translate-x-1 lg:mx-0 lg:h-40">
                <div class="flex items-center justify-between w-full h-full p-6 text-gray-900">
                    <?php
                    $penyakit = \App\Models\penyakit::count();
                    ?>
                    <div class="gap=2">
                        <p class="text-2xl font-medium">{{ $penyakit }}</p>
                        <p class="font-medium text-gray-500">Jumlah Data Penyakit</p>
                    </div>
                    <div
                        class="flex items-center justify-center w-24 h-24 p-5 rounded-full from-gray-200 to-gray-300 bg-gradient-to-b">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-full transition duration-75 bi bi-hospital bi-hospital-fill fill-gray-500"
                            viewBox="0 0 16 16">
                            <path
                                d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9z" />
                            <path
                                d="M.88 8C-2.427 1.68 4.41-2 7.823 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8z" />
                        </svg>
                    </div>
                </div>
            </a>
            <a href="{{ route('Gejala.index') }}"
                class="flex items-center justify-center h-10 overflow-hidden transition bg-white shadow-md rounded-2xl duration-10 hover:-translate-y-1 hover:translate-x-1 lg:mx-0 lg:h-40">
                <div class="flex items-center justify-between w-full h-full p-6 text-gray-900">
                    <?php
                    $gejala = \App\Models\gejala::count();
                    ?>
                    <div class="gap=2">
                        <p class="text-2xl font-medium">{{ $gejala }}</p>
                        <p class="font-medium text-gray-500">Jumlah Data Gejala</p>
                    </div>
                    <div
                        class="flex items-center justify-center w-24 h-24 p-5 rounded-full from-gray-200 to-gray-300 bg-gradient-to-b">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-full transition duration-75 bi bi-hospital bi-hospital-fill fill-gray-500"
                            viewBox="0 0 16 16">
                            <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018" />
                            <path
                                d="M13 6.5a6.47 6.47 0 0 1-1.258 3.844q.06.044.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11" />
                        </svg>
                    </div>
                </div>
            </a>
            <a href="{{ route('Solusi.index') }}"
                class="flex items-center justify-center h-10 overflow-hidden transition bg-white shadow-md rounded-2xl duration-10 hover:-translate-y-1 hover:translate-x-1 lg:mx-0 lg:h-40">
                <?php
                $solusi = \App\Models\solusi::count();
                ?>
                <div class="flex items-center justify-between w-full h-full p-6 text-gray-900">
                    <div class="gap=2">
                        <p class="text-2xl font-medium">{{ $solusi }}</p>
                        <p class="font-medium text-gray-500">Jumlah Data Solusi</p>
                    </div>
                    <div
                        class="flex items-center justify-center w-24 h-24 p-5 rounded-full from-gray-200 to-gray-300 bg-gradient-to-b">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-full transition duration-75 bi bi-hospital bi-hospital-fill fill-gray-500"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 5.982c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>

        {{-- CHART --}}
        <div class="w-full mx-auto mb-8 sm:px-6 lg:px-8">
            <div class="flex w-full gap-8">
                {{-- CHART DISINI --}}
                <div class="flex flex-col justify-between w-full bg-white border-2 rounded-lg shadow-md md:p-6">
                    <div class="w-full">
                        <dl class="">
                            <h5 class="pb-2 text-3xl font-bold leading-none text-gray-900 ">Provinsi Penyakit Ginjal
                            </h5>
                            <p class="text-base font-normal text-gray-500 ">Berikut sebaran penyakit ginjal yang
                                tersebar di provinsi di Indonesia hingga 15 Juli 2024.</p>
                        </dl>
                    </div>

                    <div id="column-chart"></div>
                </div>
                {{-- Graph DISINI --}}
                <div class="w-full max-w-md bg-white border-2 rounded-lg shadow md:p-6">
                    <div class="flex justify-between mb-5">
                        <div>
                            <dt class="text-base font-semibold text-gray-600 me-1">PREVELENSI
                                (PERMIL) Penyakit Ginjal Kronis berdasarkan diagnosis dokter pada umur ≥ 15 Tahun
                            </dt>
                        </div>
                    </div>

                    <div id="tooltip-chart"></div>
                </div>

            </div>
        </div>

        {{-- Pasien --}}
        <div class="w-full mx-auto shadow-sm sm:px-6 lg:px-8">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <div class="w-full p-4">
                    <h5 class="pb-2 text-3xl font-bold leading-none text-gray-900 ">Pasien
                    </h5>
                </div>
                <div class="w-full">
                    {{-- TABEL PASIEN DISINI --}}
                    <div class="relative p-4 mb-4 border-2 rounded-md shadow-md overflow-x-autow-full">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pasien = \App\Models\user::where('tittle', 'pasien')->orderBy('name', 'asc')->get();
                                ?>
                                @foreach ($pasien as $item)
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            {{ $item->name }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            {{ $item->username }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            {{ $item->email }}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Konfigurasi untuk grafik pertama (column-chart)
            const columnChartOptions = {
                colors: ["#1A56DB"],
                series: [{
                    name: "Jumlah",
                    color: "#FDBA8C",
                    data: [{
                            x: "DKI Jakarta",
                            y: 83
                        },
                        {
                            x: "Jawa Barat",
                            y: 42
                        },
                        {
                            x: "Aceh",
                            y: 32
                        },
                        {
                            x: "Jawa Timur",
                            y: 25
                        },
                        {
                            x: "Banten",
                            y: 21
                        },
                        {
                            x: "Sumatera Barat",
                            y: 20
                        },
                        {
                            x: "Bali",
                            y: 16
                        },
                        {
                            x: "Sumatera Utara",
                            y: 15
                        },
                        {
                            x: "Sulawesi Selatan",
                            y: 9
                        },
                        {
                            x: "Jambi",
                            y: 8
                        },
                        {
                            x: "NTT",
                            y: 6
                        },
                    ],
                }, ],
                chart: {
                    type: "bar",
                    height: "320px",
                    fontFamily: "Inter, sans-serif",
                    toolbar: {
                        show: false
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                    },
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    style: {
                        fontFamily: "Inter, sans-serif"
                    },
                },
                states: {
                    hover: {
                        filter: {
                            type: "darken",
                            value: 1
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 0,
                    colors: ["transparent"],
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -14
                    },
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    floating: false,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                yaxis: {
                    show: false
                },
                fill: {
                    opacity: 1
                },
            };

            if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                const columnChart = new ApexCharts(document.getElementById("column-chart"), columnChartOptions);
                columnChart.render();
            }

            // Konfigurasi untuk grafik kedua (tooltip-chart)
            const tooltipChartOptions = {
                tooltip: {
                    enabled: true,
                    x: {
                        show: true
                    },
                    y: {
                        show: true
                    },
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -26
                    },
                },
                series: [{
                        name: "Laki - laki",
                        data: [13.3, 32.3, 59.4, 83.3],
                        color: "#1A56DB",
                    },
                    {
                        name: "Perempuan",
                        data: [9.2, 26.6, 52.2, 78.8],
                        color: "#7E3BF2",
                    },
                ],
                chart: {
                    height: "100%",
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false
                    },
                    toolbar: {
                        show: false
                    },
                },
                legend: {
                    show: true
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 6
                },
                xaxis: {
                    categories: [
                        '15 - 19', '20 - 30', '31 - 59', '60+'
                    ],
                    labels: {
                        show: false
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function(value) {
                            return value + '%';
                        }
                    }
                },
            };

            if (document.getElementById("tooltip-chart") && typeof ApexCharts !== 'undefined') {
                const tooltipChart = new ApexCharts(document.getElementById("tooltip-chart"), tooltipChartOptions);
                tooltipChart.render();
            }
        });

        // Data Table Flowbite untuk table pasien
        if (document.getElementById("table_pasien") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#table_pasien", {
                paging: true,
                searchable: true,
                sortable: true
            });
        }
    </script>
</x-app-layout>
