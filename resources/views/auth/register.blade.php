<x-header></x-header>
<x-guest-layout>
    <div class="flex flex-col justify-center items-center">
    <form method="POST" action="{{ route('register') }}" class="form flex flex-col m-5 max-w-md border-2 border-gray-200 p-5 rounded-md">
        @csrf

        <!-- First Name -->
        <div class="mt-4">
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required
                autofocus autocomplete="first_name"
                placeholder="First Name"/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
       <!-- Last Name -->
        <div class="mt-4">
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required
                autofocus autocomplete="last_name"
                placeholder="Last Name"/>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username"
                placeholder="Username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password"
                placeholder="Password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password"
                placeholder="Password confirmation"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


    </form>
</div>
</x-guest-layout>

