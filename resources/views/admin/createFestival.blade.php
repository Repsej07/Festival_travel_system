<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="flex">
        <div class="w-[90vw] h-160 bg-background_grey flex justify-center mx-auto mt-5 rounded-lg">
            <div class="flex flex-row space-x-5 p-5">
                <form action="{{ route('admin.festivals.store') }}" method="POST" class="flex flex-col space-y-5 p-5">
                    @csrf
                    <div class="flex flex-row">
                        <label for="name" class="text-white">Name</label>
                        <input type="text" name="name" id="name" class="p-2 rounded-md" required>
                    </div>
                    <div class="flex flex-row ">
                        <label for="location" class="text-white">Location</label>
                        <input type="text" name="location" id="location" class="p-2 rounded-md" required>
                    </div>
                    <div class="flex flex-row ">
                        <label for="date" class="text-white">Start Date</label>
                        <input type="date" name="date" id="date" class="p-2 rounded-md" required>
                    </div>
                    <div class="flex flex-row ">
                        <label for="tickets" class="text-white">Tickets</label>
                        <input type="number" name="tickets" id="tickets" class="p-2 rounded-md" required>
                    <div class="flex flex-row ">
                        <label for="price" class="text-white">Price</label>
                        <input type="number" name="price" id="price" class="p-2 rounded-md" required>
                    </div>
                    <div class="flex flex-row ">
                        <label for="description" class="text-white">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="p-2 rounded-md"
                            required></textarea>
                    </div>
                    <button type="submit" class="bg-Jesper p-2 rounded-md text-white">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
