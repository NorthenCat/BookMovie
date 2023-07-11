@extends('main')

@section('content')
    <main class="items-center justify-center mx-auto my-[20px]">
        <section class="flex flex-col justify-center mx-[500px]  space-y-[20px]">
            @if ($transactions->isEmpty())
                <h1 class="text-white text-3xl font-bold text-center">Belum Ada Transaksi</h1>
            @else
                @foreach ($transactions as $transaction)
                    @foreach ($movies as $movie)
                        @if ($transaction->movie_id == $movie->id)
                            <a href="{{ route('history.detail', ['name' => auth()->user()->username, 'id' => $transaction->id]) }}"
                                class="flex flex-col items-center bg-gray-900 border border-gray-800 rounded-lg shadow-xl shadow-gray-400 md:flex-row md:max-w-xl hover:bg-gray-800 transition duration-200 ease-in-out dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                    src="{{ $movie->poster_url }}" alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">
                                        {{ $movie->title }}</h5>
                                    <p class="mb-3 font-normal text-gray-400 dark:text-gray-400">Booked Seats :
                                        {{ $transaction->seats }}</p>
                                    <p class="mb-3 font-normal text-gray-400 dark:text-gray-400">Total Price : Rp.
                                        {{ number_format($transaction->total_price) }}</p>
                                    <p class="mb-3 font-normal text-gray-400 dark:text-gray-400">Date :
                                        {{ $transaction->created_at }}</p>
                                    <span class="font-normal text-gray-400 dark:text-gray-400">Click To View Detail</span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @endforeach
            @endif
        </section>
    </main>
@endsection
