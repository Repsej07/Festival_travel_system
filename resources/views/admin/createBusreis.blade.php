<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="flex">
        <div class="w-[90vw] h-160 bg-background_grey flex justify-center mx-auto mt-5 rounded-lg">
            <div class="flex flex-row space-x-5 p-5">
                <form action="{{ route('admin.busreizen.store') }}" method="POST" class="p-5 grid grid-cols-2 gap-5" enctype="multipart/form-data">
                    @csrf

                    <!-- Festival Dropdown -->
                    <div class="flex flex-col justify-center w-96">
                        <label for="festival" class="text-black">Name of festival</label>
                        <select name="festival_id" id="festival_id" class="p-2 rounded-md" required>
                            @foreach($festivals as $festival)
                                <option value="{{ $festival->id }}">{{ $festival->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Location Field -->
                    <div class="flex flex-col">
                        <label for="departure" class="text-black">Departure</label>
                        <input type="text" name="departure" id="departure" class="p-2 rounded-md" required>
                    </div>

                    <!-- Date Field -->
                    <div class="flex flex-col">
                        <label for="date" class="text-black">Festival date</label>
                        <input type="date" name="date" id="date" class="p-2 rounded-md" required>
                    </div>

                    <!-- Tickets Field -->
                    <div class="flex flex-col">
                        <label for="tickets" class="text-black">Tickets</label>
                        <input type="number" name="tickets" id="tickets" class="p-2 rounded-md" required>
                    </div>

                    <!-- Price Field -->
                    <div class="flex flex-col">
                        <label for="price" class="text-black">Price</label>
                        <input type="number" name="price" id="price" class="p-2 rounded-md" required>
                    </div>

                    <div>
                        <input type="text" name="status" value="active" hidden>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex col-span-2 justify-center">
                        <button type="submit" class="bg-Jesper p-2 rounded-md text-white w-full hover:bg-Jesper_light">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dateInput = document.getElementById('date');
            var today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);
        });
    </script>
</x-app-layout>
