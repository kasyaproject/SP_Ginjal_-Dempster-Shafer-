<nav x-data="{ open: false }" class="bg-white border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <div id="footer" class="w-full text-white md:pt-10 md:px-40 bg-secondary">
        <div class="w-full p-4 py-6 mx-auto lg:py-8">
            <div class="flex justify-between">
                <div class="w-full mb-6 md:mb-0 bg-yellow-">
                    <a href="" class="flex items-center gap-2">
                        <img class="object-cover w-8 max-laptop:w-10" src="{{ asset('/img/Kidney Care logo.png') }}"
                            alt="">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Ginjal
                            Sehat</span>
                    </a>
                </div>

                <div class="grid w-full grid-cols-2 gap-10 sm:grid-cols-3 bg-blue-">
                    <div>
                        <div class="mb-3">
                            <a href="/" class="flex justify-end mb-3 text-sm font-semibold text-white uppercase">
                                Home
                            </a>
                        </div>
                        <div class="hidden text-sm font-semibold text-white uppercase text-start max-laptop:block">
                            <h2 class="mb-1 text-sm font-semibold text-white uppercase">
                                Admin</h2>
                            <ul class="font-medium text-gray-400">
                                <li class="mb-1">
                                    <a href="{{ route('Admin.index') }}"
                                        class="hover:underline hover:text-gray-100 ">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="">
                        <h2 class="mb-3 text-sm font-semibold text-white uppercase">
                            Artikel</h2>
                        <div class="grid grid-cols-2 gap-4">
                            @php
                                $artikel = DB::table('artikels')->take(8)->get();
                                $artikelsChunked = $artikel->chunk(ceil($artikel->count() / 2)); // Bagi artikel menjadi 2 kolom
                            @endphp
                            @foreach ($artikelsChunked as $chunk)
                                <div>
                                    <ul class="font-medium text-gray-400">
                                        @foreach ($chunk as $artikel)
                                            <li class="mb-1">
                                                <a href="{{ route('Artikel.show', $artikel->id) }}"
                                                    class="hover:underline line-clamp-2 hover:text-gray-100">
                                                    {{ $artikel->judul }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="hidden laptop:block">
                        <h2 class="mb-3 text-sm font-semibold text-white uppercase">
                            Admin</h2>
                        <ul class="font-medium text-gray-400">
                            <li class="mb-1">
                                <a href="{{ route('Admin.index') }}"
                                    class="hover:underline hover:text-gray-100 ">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

            <div class="sm:flex sm:items-center sm:justify-center">
                <span class="text-sm text-gray-400 sm:text-center">© 2024 <a href="https://unpam.ac.id/"
                        class="hover:underline">Universitas Pamulang</a>. All Rights
                    Reserved.
                </span>
            </div>
        </div>
    </div>
</nav>
