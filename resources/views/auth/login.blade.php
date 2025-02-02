<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - WBS</title>
    <!-- favicon -->
    <link href="{{ asset('images/WBS-Logo.png')}}" rel="shortcut icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <main class="bg-gray-100 min-h-screen flex items-center justify-center">
      <div
        class="bg-white shadow-lg rounded-lg overflow-hidden max-w-5xl w-full flex flex-col md:flex-row"
      >
        <!-- Left Side: Form -->
        <div class="w-full md:w-1/2 p-8">
          <!-- Logo and Info -->
          <div class="mb-6 text-center md:text-left">
            <img
              src="{{ asset('images/WBS-Logo.png') }}"
              alt="WBS Logo"
              class="h-12 mb-2 mx-auto md:mx-0"
            />
            <h2 class="text-xl font-semibold text-gray-700">Welcome Back</h2>
            <p class="text-sm text-gray-500 mt-2">
              Log in to your account to manage your will and power of attorney
              with WBS. Secure your legacy and ensure your loved ones are cared
              for with professionalism.
            </p>
          </div>
          <!-- Form -->
          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <form method="POST" action="{{ route('login') }}" class="space-y-4">
          @csrf
            <div>
              <input
                type="email"
                name="email"
                placeholder="E-mail address"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                required
              />
            </div>
            <div>
              <input
                id="passwordInput"
                type="password"
                name="password"
                placeholder="Password"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                required
              />
            </div>
            <button
              type="submit"
              class="w-full bg-[#3A5F8F] text-white font-medium py-3 rounded-lg hover:bg-[#f47d61] transition-all duration-300 ease-in-out"
            >
              Login
            </button>
            <p class="text-sm text-center text-gray-900 mt-4">
              Don't have an account?
              <a
                href="{{ route('register') }}"
                class="text-[#3A5F8F] underline font-medium hover:text-[#f47d61] transition-all duration-300 ease-in-out"
                >Create a new account</a
              >
            </p>
          </form>
          <p class="text-xs text-center text-gray-500 mt-4">
            By logging in, you agree to the
            <a href="#" class="text-black underline">Terms & Conditions</a> and
            the <a href="#" class="text-black underline">Privacy Policy</a>.
          </p>
        </div>
        <!-- Right Side: Picture -->
        <div class="hidden md:block w-full md:w-1/2">
          <img
            src="{{ asset('images/login.png') }}"
            alt="Secure Login Illustration"
            class="w-full h-full object-cover"
          />
        </div>
      </div>
    </main>
  </body>
</html>



