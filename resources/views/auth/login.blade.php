{{--<x-guest-layout>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">--}}
{{--                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - WBS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<main class="bg-gray-100 min-h-screen">
    <div class="p-10 flex justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <div class="flex justify-center pb-8 mb-6 border-b-2">
                <div class="w-1/2 h-1 bg-gray-300 rounded-full">
                    <div class="w-1/4 h-full bg-green-500 rounded-full"></div>
                </div>
            </div>
            <h1 class="text-center text-xl font-semibold mb-4">Login</h1>
            <form  class="space-y-4" method="POST" action="{{ route('login') }}">
                @csrf
                <input
                    type="email"
                    name="email"
                    placeholder="E-mail address"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                    required
                />
                <input
                    id="passwordInput"
                    type="password"
                    name="password"
                    placeholder="***********"
                    class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                />
                <button
                    type="submit"
                    class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800"
                >
                    Login
                </button>
            </form>
            <p class="text-xs text-center text-gray-500 mt-4">
                By signing up I agree to the
                <a href="#" class="text-black underline">Terms & Conditions</a> and
                to the <a href="#" class="text-black underline">Privacy Policy</a>.
            </p>
        </div>
    </div>
</main>
</body>
</html>



