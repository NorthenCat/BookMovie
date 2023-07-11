@extends ('main')

@section('content')
    <main
        class="flex flex-col p-10 m-16 justify-center text-white max-w-[600px] space-y-3 mx-auto border border-gray-800 bg-gray-900 rounded-lg shadow-lg shadow-gray-400">
        <header class="flex flex-col mx-auto items-center justify-center space-y-3">
            <i class="fa-solid fa-user-astronaut fa-fade text-5xl"></i>
            <h1 class="font-bold text-3xl">Profile</h1>
        </header>
        <hr class="">
        <article>
            <form action="{{ route('profile.update') }}" method="POST" class="flex flex-col mx-auto space-y-4">
                @csrf
                <div class="space-y-2">
                    <label for="username" class="block text-sm font-medium">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username"
                        value="{{ $user->username }}" class="w-full text-black border border-gray-300 rounded-lg p-2">
                </div>
                <div class="flex flex-row items-center justify-between">
                    <div>
                        <button id="changePasswordBtn" type="button"
                            class="block my-2 text-sm font-medium text-blue-500">Change
                            Password</button>
                    </div>
                    <div>
                        <h1 class="text-sm">
                            Balance = Rp. {{ number_format($user->balance) }} |
                            <a class="top-up-link fa-solid fa-plus text-sm"></a>
                            <a class="withdraw-link fa-solid fa-money-bill-transfer"></a>
                        </h1>
                    </div>
                </div>
                <div id="passwordInputContainer" class="hidden space-y-2">
                    <label for="password" class="block text-sm font-medium">New Password</label>
                    <input type="password" name="password" id="password" placeholder="Your new password"
                        class="w-full text-black border border-gray-300 rounded-lg p-2" minlength="6">
                </div>



                @if (session('updateError'))
                    <div class="text-gray-300 font-semibold mb-2 text-center">
                        {{ session('updateError') }}
                    </div>
                @elseif(session('updateSuccess'))
                    <div class="text-gray-300 font-semibold mb-2 text-center">
                        {{ session('updateSuccess') }}
                    </div>
                @endif
                <button type="submit"
                    class="text-white rounded-lg px-4 py-2 bg-gray-700 border-gray-800 border transition duration-200 hover:bg-white hover:text-black">Update
                    Profile</button>
            </form>
            <form action="{{ route('topUp') }}" method="POST">
                @csrf
                <div id="top-up-container" class="hidden space-y-2">
                    <h2>Top Up</h2>
                    <div style="display: flex;">
                        <input type="number" class="flex-grow text-black border border-gray-300 rounded-lg p-2"
                            id="top-up-input" name="balance" placeholder="Enter amount">
                        <button id="top-up-submit" class="text-white p-2">Submit</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('withdraw') }}" method="POST">
                @csrf
                <div id="withdraw-container" class="hidden space-y-2">
                    <h2>Withdrawal</h2>
                    <div style="display: flex;">
                        <input type="number" class="flex-grow text-black border border-gray-300 rounded-lg p-2"
                            id="withdraw-input" name="balance" placeholder="Enter amount" max="500000">
                        <button id="withdraw-submit" class="text-white p-2">Submit</button>
                    </div>
                </div>
            </form>
        </article>
    </main>

    <script>
        const changePasswordBtn = document.getElementById("changePasswordBtn");
        const passwordInputContainer = document.getElementById(
            "passwordInputContainer"
        );
        const topUpLink = document.querySelector('.top-up-link');
        const withdrawLink = document.querySelector('.withdraw-link');
        const topUpContainer = document.getElementById('top-up-container');
        const withdrawContainer = document.getElementById('withdraw-container');

        topUpLink.addEventListener('click', function() {
            topUpContainer.classList.toggle("hidden");
            withdrawContainer.classList.add("hidden");
        });

        withdrawLink.addEventListener('click', function() {
            topUpContainer.classList.add("hidden");
            withdrawContainer.classList.toggle("hidden");
        });

        changePasswordBtn.addEventListener("click", function() {
            passwordInputContainer.classList.toggle("hidden");
        });
    </script>
@endsection
