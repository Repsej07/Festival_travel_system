<x-header></x-header>
<x-guest-layout>
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-3xl font-bold text-center m-5">Register here!</h1>
        <div class="flex justify-center items-center max-h-full">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                class="form flex flex-col m-5 border-2 border-gray-200 p-5 rounded-md">
                @csrf

                <!-- First Name -->
                <div class="flex space-x-4">
                    <div class="mt-4">
                        <x-text-input id="first_name" class="block mt-1 " type="text" name="first_name"
                            :value="old('first_name')" required autofocus autocomplete="first_name" placeholder="First Name" />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>
                    <!-- Last Name -->
                    <div class="mt-4">
                        <x-text-input id="last_name" class="block mt-1" type="text" name="last_name"
                            :value="old('last_name')" required autofocus autocomplete="last_name" placeholder="Last Name" />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-text-input id="email" class="block mt-1 w-96" type="email" name="email" :value="old('email')"
                        required autocomplete="email" placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!--username-->
                <div class="mt-4">
                    <x-text-input id="username" class="block mt-1 w-96" type="text" name="username"
                        :value="old('username')" required autocomplete="username" placeholder="Username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-text-input id="password" class="block mt-1 w-96" type="password" name="password" required
                        autocomplete="new-password" placeholder="Password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-text-input id="password_confirmation" class="block mt-1 w-96" type="password"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="Password confirmation" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <!-- Register Button -->
                <div class=" flex flex-col">
                    <label class="flex content-center items-center mt-4 justify-center">
                        <input type="file" name="image">
                    </label>
                    <button type="submit"
                        class="bg-apple_button_blue p-3 rounded-md text-white font-bold mt-4 hover:bg-apple_button_blue_hover">Create
                        account</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
