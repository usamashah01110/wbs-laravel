{{--<x-guest-layout>--}}
{{--    <form method="POST" action="{{ route('register') }}">--}}
{{--        @csrf--}}

{{--        <!-- Name -->--}}
{{--        <div>--}}
{{--            <x-input-label for="name" :value="__('Name')" />--}}
{{--            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            <x-input-error :messages="$errors->get('name')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Email Address -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Confirm Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--            <x-text-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password_confirmation" required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">--}}
{{--                {{ __('Already registered?') }}--}}
{{--            </a>--}}

{{--            <x-primary-button class="ms-4">--}}
{{--                {{ __('Register') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup - WBS</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<main class="bg-gray-100 min-h-screen">
    <div class="p-10 flex justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-center text-xl font-semibold mb-6">Signup</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="space-y-4"  method="POST" action="{{ route('register') }}">
                @csrf
                <input
                    type="text"
                    name="firstName"
                    placeholder="First Name"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <input
                    type="text"
                    name="lastName"
                    placeholder="Last Name"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <input
                    type="email"
                    name="email"
                    placeholder="E-mail address (verified)"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <input
                    type="tel"
                    name="phone"
                    placeholder="Phone"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <input
                    type="text"
                    name="street"
                    placeholder="Street"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <input
                    type="text"
                    name="city"
                    placeholder="City"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <input
                    type="text"
                    name="state"
                    placeholder="State"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <input
                    type="text"
                    name="zip"
                    placeholder="Zip"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <input
                    type="password"
                    name="password"
                    placeholder="password"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <select
                    name="frequency"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                >
                    <option value="" disabled selected>Check-in Frequency</option>
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
                <button
                    type="submit"
                    class="w-full bg-indigo-500 text-white py-3 rounded-lg hover:bg-indigo-600 transition-all duration-300 ease-in-out"
                >
                    Sign Up
                </button>
            </form>
        </div>
    </div>
</main>

</body>
</html>

