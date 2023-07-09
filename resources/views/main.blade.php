<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Movie</title>
</head>

<body class="bg-[#0F0F0F]">

    <!-- NAV -->
    <nav class="bg-transparent border-b-2 text-white w-full z-10 shadow-lg shadow-gray-600">
        <div class="flex flex-wrap justify-between items-center mx-5 py-2 md:py-4 md:mx-10">
            <h1 class="font-bold text-xl italic">BookMovies</h1>
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
            <div class="hidden md:flex">
                <ul class="flex font-semibold  items-center flex-col md:flex-row md:space-x-10 ">
                    <li>
                        <a href="#"
                            class="block w-full transition duration-200 ease-in-out hover:scale-110">Profile</a>
                    </li>
                    <li>
                        <button
                            class="block w-full text-black bg-white rounded-xl py-2 px-4 hover:bg-gray-400 transition duration-200 ease-in-out hover:scale-105">
                            Login
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENTS -->
    @yield('content', 'movies')
</body>

</html>
