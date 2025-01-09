<x-guest-layout>
    <div class="flex flex-col items-end mr-2">
        <div class="flex flex-col items-center">
            <p class="text-center w-full mt-2">Not yet a member?</p>
            <a href="/register"
                class="border-solid border-2 px-20 py-2 border-Jesper rounded-md text-Jesper max-w-96 text-center mt-2">
                Register
            </a>
        </div>
    </div>



    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex flex-col justify-center items-center max-h-full">
        <a href="/">
            <img src="{{ url('/assets/logo_fts.png') }}" alt="Logo" class="max-h-64">
        </a>
        <form method="POST" action="{{ route('login') }}"
            class="form flex flex-col m-5 border-2 border-gray-200 p-5 rounded-md">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-128" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:Jesper border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                <button type="submit"
                    class="bg-apple_button_blue p-3 rounded-md text-white font-bold w-96 hover:bg-apple_button_blue_hover">Log
                    in</button>
            </div>
        </form>
    </div>
</x-guest-layout>
