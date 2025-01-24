<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="bg-background_grey w-[80vw] h-144 mx-auto mt-10 rounded-lg relative">
        <div class="flex flex-col justify-between p-5 w-full h-full">
            <!-- Top Content -->
            <div class="space-y-5">
                <img src="{{ asset("storage/{$user->profile_picture}") }}" alt="profile_picture"
                class="w-24 h-24 rounded-full">
                <div class="flex items-center space-x-2">
                    <label for="name">Name:</label>
                    <p class="text-2xl">{{ $user->first_name }} {{ $user->last_name }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <label for="email">Email:</label>
                    <p class="text-lg" name="email">{{ $user->email }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <label for="username">Username:</label>
                    <p class="text-lg" name="username">{{ $user->username }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <label for="role">Role:</label>
                    <p class="text-lg" name="role">
                        @if ($user->admin == 1)
                            Admin
                        @else
                            User
                        @endif
                    </p>
                </div>

                <!-- User Points -->
                <div class="flex items-center space-x-2">
                    <label for="points">Points:</label>
                    <p class="text-lg" name="points">{{ $user->points }}</p>
                </div>
            </div>

            <!-- Travel History -->
            <div class="absolute top-5 right-5 bg-white p-4 shadow-md rounded-lg">
                <label for="travel_history" class="font-semibold">Travel History:</label>
                <ul class="mt-2">
                    @foreach ($user->festivals as $festival)
                        <li class="p-1 bg-background_grey mt-5 mb-5 rounded-lg">{{ $festival->name }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Bottom Buttons -->
            <div class="mt-auto">
                <a href="{{ route('admin.user.edit', $user->id) }}">
                    <button class="bg-Jesper p-2 rounded-md text-white w-full hover:bg-Jesper_light">Edit</button>
                </a>
                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this user?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 p-2 rounded-md text-white w-full hover:bg-red-700 mt-3">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
