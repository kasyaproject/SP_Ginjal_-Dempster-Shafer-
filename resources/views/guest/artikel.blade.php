<x-guest-layout>
    {{-- Artikel --}}
    <div class="flex justify-center w-full">
        <div id="artikel" class="w-full px-3 py-8 text-justify text-black max-w-7xl md:py-20 md:px-40">
            <h1 class="mb-24 text-3xl font-semibold text-center md:text-5xl">{{ $read->judul }}</h1>
            <h1 class="text-sm font-medium text-left">{{ $read->user->name }}
                <span class="font-normal text-center text-gray-500">Published : {{ $read->created_at }}</span>
            </h1>
            <p
                class="mb-3 font-medium text-justify text-gray-500 dark:text-gray-400 first-line:uppercase first-line:tracking-widest first-letter:text-7xl first-letter:font-bold first-letter:text-gray-900 dark:first-letter:text-gray-100 first-letter:me-3 first-letter:float-start">
                {!! nl2br(e($firstParagraph)) !!}
            </p>
            @foreach ($nextParagraphs as $paragraph)
                <p class="mb-3 font-medium text-justify text-gray-500 dark:text-gray-400 indent-6">
                    {!! nl2br(e($paragraph)) !!}
                </p>
            @endforeach
        </div>
    </div>

    <hr class="border-gray-200 mx-14 dark:border-gray-700 lg:my-8 max-laptop:mx-6" />

    {{-- Rekomendasi --}}
    <div id="rekomendasi" class="flex justify-center w-full gap-4 py-8 overflow-x-auto px-14">
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
