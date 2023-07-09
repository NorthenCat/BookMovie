@extends('main')

@section('content')
    <main class="p-10 text-white space-y-2">
        <div class="flex justify-between items-center">
            <div class="block text-md md:text-lg lg:text-xl space-x-1 md:space-x-2">
                <i class="fa-sharp fa-solid fa-fire"></i>
                <span class="font-semibold ">Popular</span>
            </div>
            <form>
                <div class="flex">
                    <div class="relative w-full">
                        <input type="search" id="movies-search"
                            class="flex rounded-lg w-full z-20 text-sm text-gray-900 bg-white border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 transition duration-200 ease-in-out"
                            placeholder="Search movie" required>
                        <button type="submit"
                            class="absolute top-0 right-0 h-full p-2.5 text-sm font-medium text-black bg-white rounded-r-lg border hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-200 ease-in-out">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <hr>

        <section class="flex flex-wrap justify-center items-center gap-4">
            <article
                class="flex flex-col max-w-xs items-center bg-gray-900 border border-gray-900 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition duration-200 ease-in-out hover:scale-105">
                <a href="#">
                    <img src="https://m.media-amazon.com/images/I/81F5PF9oHhL._AC_UF894,1000_QL80_.jpg"
                        class="rounded-lg max-w-[200px] object-cover" alt="">
                </a>
                <h1 class="text-md">John Wick Wick</h1>
                <p class="font-semibold text-sm text-left text-gray-500">2023</p>
            </article>
            <article
                class="flex flex-col max-w-xs items-center bg-gray-900 border border-gray-900 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition duration-200 ease-in-out hover:scale-105">
                <a href="#">
                    <img src="https://m.media-amazon.com/images/I/81F5PF9oHhL._AC_UF894,1000_QL80_.jpg"
                        class="rounded-lg max-w-[200px] object-cover" alt="">
                </a>
                <h1 class="text-md">John Wick Wick</h1>
                <p class="font-semibold text-sm text-left text-gray-500">2023</p>
            </article>
            <article
                class="flex flex-col max-w-xs items-center bg-gray-900 border border-gray-900 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition duration-200 ease-in-out hover:scale-105">
                <a href="#">
                    <img src="https://m.media-amazon.com/images/I/81F5PF9oHhL._AC_UF894,1000_QL80_.jpg"
                        class="rounded-lg max-w-[200px] object-cover" alt="">
                </a>
                <h1 class="text-md">John Wick Wick</h1>
                <p class="font-semibold text-sm text-left text-gray-500">2023</p>
            </article>
            <article
                class="flex flex-col max-w-xs items-center bg-gray-900 border border-gray-900 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition duration-200 ease-in-out hover:scale-105">
                <a href="#">
                    <img src="https://m.media-amazon.com/images/I/81F5PF9oHhL._AC_UF894,1000_QL80_.jpg"
                        class="rounded-lg max-w-[200px] object-cover" alt="">
                </a>
                <h1 class="text-md">John Wick Wick</h1>
                <p class="font-semibold text-sm text-left text-gray-500">2023</p>
            </article>
            <article
                class="flex flex-col max-w-xs items-center bg-gray-900 border border-gray-900 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition duration-200 ease-in-out hover:scale-105">
                <a href="#">
                    <img src="https://m.media-amazon.com/images/I/81F5PF9oHhL._AC_UF894,1000_QL80_.jpg"
                        class="rounded-lg max-w-[200px] object-cover" alt="">
                </a>
                <h1 class="text-md">John Wick Wick</h1>
                <p class="font-semibold text-sm text-left text-gray-500">2023</p>
            </article>
            <article
                class="flex flex-col max-w-xs items-center bg-gray-900 border border-gray-900 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition duration-200 ease-in-out hover:scale-105">
                <a href="#">
                    <img src="https://m.media-amazon.com/images/I/81F5PF9oHhL._AC_UF894,1000_QL80_.jpg"
                        class="rounded-lg max-w-[200px] object-cover" alt="">
                </a>
                <h1 class="text-md">John Wick Wick</h1>
                <p class="font-semibold text-sm text-left text-gray-500">2023</p>
            </article>
            <article
                class="flex flex-col max-w-xs items-center bg-gray-900 border border-gray-900 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition duration-200 ease-in-out hover:scale-105">
                <a href="#">
                    <img src="https://m.media-amazon.com/images/I/81F5PF9oHhL._AC_UF894,1000_QL80_.jpg"
                        class="rounded-lg max-w-[200px] object-cover" alt="">
                </a>
                <h1 class="text-md">John Wick Wick</h1>
                <p class="font-semibold text-sm text-left text-gray-500">2023</p>
            </article>
        </section>
    </main>
@endsection
