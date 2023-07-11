@extends('main')

@section('content')
    @if (request()->is('login'))
        <section>
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="{{ route('movies') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                    <h1 class="font-bold text-4xl text-white italic">BookMovies</h1>
                </a>

                <div
                    class="w-full bg-gray-900 border-gray-800 border rounded-lg shadow-lg shadow-gray-600 md:mt-0 sm:max-w-md xl:p-0">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl">
                            Login Your Account
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-white">Your
                                    username</label>
                                <input type="text" name="username" id="username"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="John Doe" required>
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    required>
                            </div>
                            @if (session('loginError'))
                                <div class="text-gray-300 font-semibold mb-2 text-center">
                                    {{ session('loginError') }}
                                </div>
                            @endif
                            <button type="submit"
                                class="w-full text-black bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login
                                account </button>
                            <p class="text-sm text-gray-400">
                                Already have an account? <a href="{{ route('register') }}"
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">Register
                                    here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @elseif (request()->is('register'))
        <section>
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="{{ route('movies') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                    <h1 class="font-bold text-4xl text-white italic">BookMovies</h1>
                </a>
                <div
                    class="w-full bg-gray-900 border-gray-800 border rounded-lg shadow-lg shadow-gray-600 md:mt-0 sm:max-w-md xl:p-0">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl">
                            Create Your Account
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-white">Your
                                    username</label>
                                <input type="text" name="username" id="username"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="John doe" required>
                                @if (session('loginError'))
                                    <div class="text-gray-300 font-semibold mb-2">
                                        {{ session('loginError') }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" minlength="6"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" aria-describedby="terms" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                                        required>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="text-gray-400 dark:text-gray-300">I accept the Terms
                                        and Conditions</label>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full text-black bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create
                                an account</button>
                            <p class="text-sm text-gray-400">
                                Already have an account? <a href="{{ route('login') }}"
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login
                                    here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
