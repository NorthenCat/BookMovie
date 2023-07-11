@extends ('main')

@section('content')
    <main class="p-10 w-full">

        <article
            class="flex flex-col w-full bg-gray-900 border border-gray-800 rounded-lg shadow-lg shadow-gray-400 md:flex-row">
            <img class="object-cover w-full rounded-t-lg md:max-w-[500px] md:rounded-none md:rounded-l-lg"
                src="{{ $movies->poster_url }}">
            <section class="flex flex-col mx-auto p-6 my-[50px] md:my-[100px] leading-normal">
                <h5 class="mb-2 text-5xl font-bold tracking-tight text-white">{{ $movies->title }}</h5>
                <p class="mb-2 text-sm font-medium text-gray-400">Age Rating : {{ $movies->age_rating }}</p>
                <p class="mb-2 text-sm font-medium text-gray-400">Release Date : {{ $movies->release_date }}</p>
                <p class="mb-3 font-normal text-justify text-gray-300">{{ $movies->description }}</p>
                <div class="my-5 text-white space-y-2">
                    <h1 class="font-bold text-gray-300">Ticket Price : Rp. {{ number_format($movies->ticket_price) }}</h1>
                    <a href="{{ route('movies.book', $movies->id) }}"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-white bg-red-500 border border-transparent rounded-md hover:bg-primary-700">
                        Book Now
                    </a>
                </div>
            </section>

        </article>

    </main>
@endsection
