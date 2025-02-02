<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-md w-full">
        <h1 class="text-2xl font-semibold text-gray-700 text-center mb-4">Forgot Your Password?</h1>
        <p class="text-sm text-gray-600 text-center mb-6">
            No problem. Just let us know your email address and we will email you a password reset link.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-500 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#415a77] focus:border-[#415a77]"
                    placeholder="Enter your email address"
                    required
                />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button
                    type="submit"
                    class="w-full bg-[#415a77] text-white font-medium py-2 px-4 rounded-lg hover:bg-[#f47d61] transition-all duration-300">
                    Email Password Reset Link
                </button>
            </div>
        </form>
    </div>
</body>
</html>
