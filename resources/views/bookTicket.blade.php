@extends ('main')

@section('content')
    <main class="bookPage p-10 w-full">
        <div class="movie-container">
            <div>
                <label class="text-2xl">Theatre Movie</label>
                <p id="movie" class="text-gray-400">{{ $movies->title }}</p>
                <p class="text-gray-400">Age Rating : {{ $movies->age_rating }}</p>
                <p class="text-gray-400">Ticket Price : Rp.{{ number_format($movies->ticket_price) }}</p>
            </div>
        </div>

        <section id="bookTicket" class="">
            <ul class="flex showcase">
                <li>
                    <div class="seat"></div>
                    <small>N/A</small>
                </li>
                <li>
                    <div class="seat selected"></div>
                    <small>Selected</small>
                </li>
                <li>
                    <div class="seat occupied"></div>
                    <small>Occupied</small>
                </li>
            </ul>


            <div class="container flex flex-col mx-auto">
                <div class="screen"></div>
                <form id="checkoutForm" action="{{ route('movies.checkout', $movies->id) }}" method="POST"
                    class="text-center">
                    @csrf
                    <div class="flex flex-wrap text-white justify-center items-center my-4" id="checkboxgroup">
                        @foreach ($seats as $seat)
                            @if ($seat->is_booked)
                                <div class="flex seat items-center justify-center occupied" style="color:white;"></div>
                            @elseif (!$seat->is_booked)
                                <label for="seat-{{ $seat->seat_id }}" class="seat-label">
                                    <!-- setiap ngeklik ini -->
                                    <div class="flex seat items-center justify-center">
                                        <!-- nambahin class "selected"  -->
                                        <input type="checkbox" name="selected_seats[]" value="{{ $seat->seat_id }}"
                                            id="seat-{{ $seat->seat_id }}"
                                            class="hidden w-4 h-4 mr-2 text-[#6feaf6] bg-gray-100 border-[#6feaf6] rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">{{ $seat->seat_id }}
                                    </div>
                                </label>
                            @endif
                        @endforeach
                    </div>

                    <button id="continueBtn" disabled
                        class="items-center justify-center mx-auto px-5 py-3 text-base font-medium text-white bg-red-400 border border-transparent rounded-md hover:bg-primary-700">
                        Continue
                    </button>
        </section>


        <section id="userForm" class="hidden mx-auto px-[500px] space-y-3">
            <h1 class="text-center text-4xl font-bold">Identity Form</h1>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="buyer_name" id="floating_full_name"
                        class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_full_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Fullname</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="buyer_phone" id="floating_telephone"
                        class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_telephone"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Number
                        Telephone</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="email" name="buyer_email" id="floating_email"
                        class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="buyer_age" id="floating_age"
                        class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_age"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age</label>
                </div>
            </div>
            <button type="submit" id="checkoutBtn" disabled
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </section>

        </form>
        </div>
    </main>

    <script>
        // Reset checkbox values on page load
        window.addEventListener('load', function() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        });

        // Seat click event
        const container = document.querySelector(".container");
        const limit = 6;
        let selectedSeats = 0;

        container.addEventListener("click", (e) => {
            if (
                e.target.classList.contains("seat") &&
                !e.target.classList.contains("occupied")
            ) {
                const seatCheckbox = e.target.querySelector("input[type='checkbox']");
                if (e.target.classList.contains("selected")) {
                    e.target.classList.remove("selected");
                    selectedSeats--;
                } else {
                    if (selectedSeats < limit) {
                        e.target.classList.add("selected");
                        selectedSeats++;
                    } else {
                        console.log("You can select a maximum of " + limit + " seats.");
                        alert("You can select a maximum of " + limit + " seats.");
                        e.preventDefault();
                    }
                }
            }

            if (selectedSeats > 0) {
                continueBtn.disabled = false;
                checkoutBtn.disabled = false;
                continueBtn.classList.remove("bg-red-400");
                continueBtn.classList.add("bg-red-600");
            } else {
                continueBtn.disabled = true;
                checkoutBtn.disabled = true;
                continueBtn.classList.remove("bg-red-600");
                continueBtn.classList.add("bg-red-400");
            }
        });

        continueBtn.addEventListener('click', () => {
            bookTicket.classList.add('hidden');
            userForm.classList.remove('hidden');
        });
    </script>
@endsection
