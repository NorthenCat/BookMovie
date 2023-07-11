@extends('main')

@section('content')
    <main class="p-10 text-white space-y-2">
        <div class="flex justify-between items-center">
            <div class="block text-md md:text-lg lg:text-xl space-x-1 my-2 md:space-x-2">
                <i class="fa-sharp fa-solid fa-fire"></i>
                <span class="font-semibold ">Popular</span>
            </div>
        </div>

        <hr>

        <section class="flex flex-wrap justify-center items-center py-2 gap-4">
            @foreach ($movies as $movie)
                <article
                    class="flex flex-col justify-centers items-center space-x-2 max-w-[250px] bg-gray-900 border border-gray-900 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition duration-200 ease-in-out hover:scale-105">
                    <a href="{{ route('movies.detail', ['id' => $movie->id]) }}">
                        <img src="{{ $movie->poster_url }}" class="rounded-lg object-cover" alt="">
                    </a>
                    <h1 class="text-md truncate max-w-[230px]">{{ $movie->title }}</h1>
                    <p class="font-semibold text-sm text-left text-gray-500">
                        {{ date('Y', strtotime($movie->release_date)) }}</p>
                </article>
            @endforeach
        </section>

    </main>
@endsection
