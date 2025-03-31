<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="flex justify-center">

        <div class="w-[90vw] max-w-4xl h-auto bg-background_grey flex justify-center mx-auto mt-5 rounded-lg">

            <div class="flex flex-col space-y-5 p-5 w-full h-144">
                <div class="flex justify-end">
                    <button onclick="window.history.back();" class="text-black text-3xl font-bold hover:text-red-500">
                        &times;
                    </button>
                </div>
                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col justify-between h-full">
                    @csrf
                    <div class="flex space-x-4">
                        <div class="mt-4 w-full">
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                :value="old('first_name')" required autofocus autocomplete="first_name"
                                placeholder="First Name" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        <!-- Last Name -->
                        <div class="mt-4 w-full">
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                :value="old('last_name')" required autofocus autocomplete="last_name" placeholder="Last Name" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4 w-full">
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="email" placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Username -->
                    <div class="mt-4 w-full">
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                            :value="old('username')" required autocomplete="username" placeholder="Username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 w-full">
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4 w-full">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Password confirmation" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Image and Role Section -->
                    <div class="flex space-x-4 mt-4 w-full justify-center">
                        <!-- Image Upload -->
                        <div class="flex flex-col">
                            <label for="image">Profile Picture</label>
                            <input type="file" name="image" required class="mt-4" accept="image/*">
                        </div>
                        <!-- Role Dropdown -->
                        <div class="flex flex-col">
                            <label for="role" class="text-black">Role</label>
                            <select name="role" id="role" class="p-2 rounded-md mt-1 w-40" required>
                                <option value="admin">Admin</option>
                                <option value="client">User</option>
                            </select>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <div class="mt-4 flex flex-col w-full">
                        <button type="submit"
                            class="bg-apple_button_blue p-3 rounded-md text-white font-bold mt-4 hover:bg-apple_button_blue_hover">Create
                            account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
