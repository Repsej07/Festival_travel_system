<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="flex">
        <div class="w-[90vw] h-160 bg-background_grey flex justify-center mx-auto mt-5 rounded-lg">
            <div class="flex flex-row space-x-5 p-5">
                <form action="{{ route('admin.busreizen.store') }}" method="POST" class="p-5 grid grid-cols-2 gap-5" enctype="multipart/form-data">
                    @csrf

                    <!-- Festival Dropdown -->
                    <div class="flex flex-col col-span-2 md:col-span-1">
                        <label for="festival" class="text-black">Name of festival</label>
                        <select name="festival_id" id="festival_id" class="p-2 rounded-md" required>
                            @foreach($festivals as $festival)
                                <option value="{{ $festival->id }}">{{ $festival->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Location Field -->
                    <div class="flex flex-col col-span-2">
                        <label for="departure" class="text-black">Departure</label>
                        <select name="departure" id="departure" class="p-2 rounded-md" required>
                            @foreach($locations as $location)
                                <option value="{{ $location }}">{{ $location}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date Field -->
                    <div class="flex flex-col col-span-2">
                        <label for="departure_date" class="text-black">Departure date and time</label>
                        <input type="datetime-local" name="departure_date" id="departure_date" class="p-2 rounded-md" required>
                    </div>

                    <div class="flex flex-col col-span-2">
                        <label for="arrival_date" class="text-black">Arrival date and time</label>
                        <input type="datetime-local" name="arrival_date" id="arrival_date" class="p-2 rounded-md" required>
                    </div>
                    <!-- Submit Button -->
                    <div class="flex col-span-2 justify-center mt-5">
                        <button type="submit" class="bg-Jesper p-2 rounded-md text-white w-full hover:bg-Jesper_light">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var departureInput = document.getElementById('departure_date');
            var arrivalInput = document.getElementById('arrival_date');
            var now = new Date().toISOString().slice(0, 16);
            departureInput.setAttribute('min', now);
            arrivalInput.setAttribute('min', now);
        });
    </script>
</x-app-layout>
