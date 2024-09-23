<nav x-data="{ open: false }" class="bg-white border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <div id="navbar" class="w-full  bg-gradient-to-r from-primary to-green-200 max-laptop:h-[]">
        {{-- Navbar --}}
        <div
            class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto max-tablet:py-2 max-tablet:px-0">
            <div class="flex">
                <button data-collapse-toggle="navbar-multi-level" type="button"
                    class="inline-flex items-center justify-center w-10 h-10 p-2 mr-2 text-sm text-gray-100 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-multi-level" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
                    <img class="object-cover w-10 max-laptop:w-10" src="{{ asset('/img/Kidney Care logo.png') }}"
                        alt="">
                    <span class="self-center text-2xl font-semibold text-white whitespace-nowrap">Ginjal Sehat</span>
                </a>
            </div>
            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul
                    class="flex flex-col p-4 mt-4 font-bold text-white rounded-lg md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="/" class="block px-3 py-2 md:p-0 md:dark:bg-transparent hover:text-gray-100"
                            aria-current="page">Home</a>
                    </li>
                    @if (Auth::check())
                        <li>
                            <a href="{{ route('form') }}"
                                class="block px-3 py-2 md:p-0 md:dark:bg-transparent hover:text-gray-100"
                                aria-current="page">Diagnosa</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('loginPasien.index') }}"
                                class="block px-3 py-2 md:p-0 md:dark:bg-transparent hover:text-gray-100"
                                aria-current="page">Diagnosa</a>
                        </li>
                    @endif
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full px-3 py-2 md:hover:bg-transparent md:border-0 hover:text-gray-100 md:p-0 md:w-auto">Artikel
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="grid grid-flow-col grid-rows-4 px-2 py-4 text-sm font-bold text-gray-700"
                                aria-labelledby="dropdownLargeButton">
                                @php
                                    $artikels = DB::table('artikels')->take(8)->get();
                                @endphp
                                @foreach ($artikels as $item)
                                    <li>
                                        <a href="{{ route('Artikel.show', $item->id) }}"
                                            class="block px-4 py-2 rounded-lg min-w-40 hover:text-primary hover:bg-gray-100">
                                            {{ $item->judul }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button id="scrollToBottom"
                            class="block px-3 py-2 md:p-0 md:dark:bg-transparent hover:text-gray-100"
                            aria-current="page">About
                        </button>
                    </li>
                    <li>
                        @if (Auth::check())
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2"
                                class="px-4 border-2 rounded-full border-primary hover:bg-primary max-laptop:w-full">
                                Profil
                            </button>
                            <div id="dropdownNavbar2"
                                class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="w-40 px-2 py-4 text-sm font-bold text-gray-700 "
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="{{ route('settingPasien.show', Auth::user()->id) }}"
                                            class="block px-4 py-2 rounded-lg hover:text-primary hover:bg-gray-100">
                                            Setting Profil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logoutPasien.logout') }}"
                                            class="block px-4 py-2 rounded-lg hover:text-primary hover:bg-gray-100">
                                            Keluar
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('loginPasien.index') }}">
                                <button
                                    class="px-4 border-2 rounded-full border-primary hover:bg-primary max-laptop:w-full">Login</button>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
