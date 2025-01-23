<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="flex justify-center">
        <div class="w-[80vw] h-[75vh] bg-background_grey flex justify-center mx-auto mt-5 rounded-lg">
            <div class="flex flex-col space-y-5 p-5 w-full h-144"> <!-- Adjust height here -->
                <div class="flex justify-center flex-col space-y-10">
                    <div>
                        <h1 class="text-4xl text-center">Registration for:</h1>
                        <p class="text-center text-2xl font-bold">{{ $festival->name }}</p>
                    </div>
                    <form action="festival.register" class="flex flex-col items-center space-y-3">
                        @csrf
                        <?php
                        $user = Auth::user();
                        $points = $user->points;
                        ?>
                        <p class="text-center">Do you want to cash in points, for every 500 pts you will get €10 off your
                            order.<br> for every €1 spent you get 10 pts</p>
                        <input type="number" name="points" id="points" class="p-2 rounded-md justify-center w-24"
                            placeholder="Pts" required max="{{ $points }}" min="0">
                        <p>After you have registered you will get a email confirmation, and an inquiry with a payment link.
                            You have the ability to pay till 1 day before the festival. </p>

                            <button type="submit"
                class="bg-Jesper p-2 rounded-md text-white w-24 hover:bg-Jesper_light mx-auto">Register</button>

                    </form>

                </div>

            </div>
        </div>
</x-app-layout>
