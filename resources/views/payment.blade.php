@extends('main')

@section('content')
    <main class="flex p-10 m-16">
        <section
            class="flex flex-col justify-center bg-gray-900 border-gray-800 shadow-lg shadow-gray-400 rounded-lg mx-auto border p-10 m-16">
            @if ($transactions->status)
                <i class="fa-solid fa-check mb-3 text-center rounded-full shadow-lg text-5xl" style="color:green;"></i>
            @else
                <i class="fa-regular fa-clock mb-3 text-center rounded-full shadow-lg text-5xl" style="color:azure;"></i>
            @endif
            <h5 class="mb-1 text-xl font-medium text-white text-center dark:text-white">{{ $movies->title }}</h5>
            <div class="flex flex-col">
                <span class="text-sm text-gray-500 dark:text-gray-400">Booker : {{ $transactions->buyer_name }}</span>
                <p class="text-sm text-gray-500 dark:text-gray-400">Seats Booked : {{ $transactions->seats }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Cost : Rp.
                    {{ number_format($transactions->total_seat * $movies->ticket_price) }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Status : @if ($transactions->status)
                        Payed
                    @else
                        Waiting Pay
                    @endif
                </p>
            </div>
            <div class="flex mt-4 space-x-2 items-center justify-center md:mt-6">
                <a href="{{ route('book.cancel', ['name' => $user->username, 'id' => $transactions->id]) }}"
                    class="block w-full px-2 text-white text-center md:bg-red-500 md:rounded-3xl md:py-2 md:px-5 hover:bg-white hover:text-black transition duration-200 ease-in-out hover:scale-105">
                    Cancel
                </a>
                @if (!$transactions->status && $user->balance < $transactions->total_seat * $movies->ticket_price)
                    <a href="{{ route('profile') }}"
                        class="block w-full px-2 text-white text-center bg-blue-500 md:rounded-3xl md:py-2 md:px-5 hover:bg-white hover:text-black transition duration-200 ease-in-out hover:scale-105">
                        Top-Up
                    </a>
                @elseif(!$transactions->status)
                    <a href="{{ route('book.pay', ['name' => $user->username, 'id' => $transactions->id]) }}"
                        class="block w-full px-2 text-white text-center bg-blue-500 md:rounded-3xl md:py-2 md:px-5 hover:bg-white hover:text-black transition duration-200 ease-in-out hover:scale-105">
                        Pay
                    </a>
                @endif
            </div>
        </section>
    </main>
@endsection
