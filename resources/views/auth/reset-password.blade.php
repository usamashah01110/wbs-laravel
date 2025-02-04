<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WBS | Reset Password</title>
    <link href="{{ asset('images/WBS-Logo.png') }}" rel="shortcut icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <main class="bg-gray-100 min-h-screen flex items-center justify-center">
      <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-5xl w-full flex flex-col md:flex-row">
        <!-- Left Side: Form -->
        <div class="w-full md:w-1/2 p-8">
          <!-- Logo and Info -->
          <div class="mb-6 text-center md:text-left">
            <img src="{{ asset('images/WBS-Logo.png') }}" alt="WBS Logo" class="h-12 mb-2 mx-auto md:mx-0" />
            <h2 class="text-xl font-semibold text-gray-700">Reset Your Password</h2>
            <p class="text-sm text-gray-500 mt-2">
              Please enter your new password to reset your password.
            </p>
          </div>

          <!-- Form -->
          <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div>
              <input type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="E-mail address" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black" required autofocus autocomplete="username" />
              @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <input id="password" type="password" name="password" placeholder="New Password" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black" required autocomplete="new-password" />
              @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm New Password" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black" required autocomplete="new-password" />
              @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <button type="submit" class="w-full bg-[#415a77] text-white font-medium py-3 rounded-lg hover:bg-[#f47d61] transition-all duration-300 ease-in-out">
              Reset Password
            </button>
          </form>
        </div>

        <!-- Right Side: Picture -->
        <div class="hidden md:block w-full md:w-1/2">
          <img src="{{ asset('images/login.png') }}" alt="Reset Password Illustration" class="w-full h-full object-cover" />
        </div>
      </div>
    </main>
  </body>
</html>
