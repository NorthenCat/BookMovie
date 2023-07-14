<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('build/assets/app-f09de27e.css') }}">
    <script type="module" src="{{asset('build/assets/app-4373205d.js')}}"></script>
    <title>Movie</title>
</head>

<body class="bg-[#0F0F0F]">

    <!-- NAV -->
    @if (!request()->is('login') && !request()->is('register'))
        <nav class="bg-transparent border-b-2 text-white w-full z-10 shadow-lg shadow-gray-600">
            <div class="flex flex-wrap justify-between items-center mx-5 py-2 md:py-4 md:mx-10">
                <a href="{{ route('movies') }}" class="font-bold text-xl italic">BookMovies</a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-default" aria-expanded="false" onclick="toggleNavbar()">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="hidden w-full md:flex md:w-auto" id="navbar-default">
                    <ul
                        class="flex flex-col font-semibold space-y-4 justify-center md:space-y-0 md:items-center md:flex-row md:space-x-10 ">
                        <li>
                            <a href="{{ route('movies') }}"
                                class="block w-full px-2 transition duration-200 ease-in-out hover:scale-105"
                                onmouseover="toggleDropdown(true)" onmouseout="toggleDropdown(false)">
                                Movies
                            </a>
                        </li>
                        @auth
                            <li>
                                <a href="{{ route('profile') }}"
                                    class="block w-full px-2 transition duration-200 ease-in-out hover:scale-105"
                                    onmouseover="toggleDropdown(true)" onmouseout="toggleDropdown(false)">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('history', ['name' => auth()->user()->username]) }}"
                                    class="block w-full px-2 transition duration-200 ease-in-out hover:scale-105"
                                    onmouseover="toggleDropdown(true)" onmouseout="toggleDropdown(false)">
                                    History
                                </a>
                            </li>
                        @endauth
                        @guest
                            <li>
                                <a href="{{ route('login') }}"
                                    class="block w-full text-black bg-white rounded-3xl py-2 px-5 hover:bg-gray-400 transition duration-200 ease-in-out hover:scale-105">
                                    Login
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="block w-full px-2 text-white md:bg-red-500 md:rounded-3xl md:py-2 md:px-5 hover:bg-white hover:text-black transition duration-200 ease-in-out hover:scale-105">
                                    Logout
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    @endif

    <!-- CONTENTS -->
    @yield('content', 'movies')

    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @elseif(session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif

</body>

</html>
