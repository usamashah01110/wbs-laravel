<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login - WBS</title>
    <!-- favicon -->
    <link href="{{ asset('image/WBS-Logo.png') }}" rel="shortcut icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <main class="bg-gray-100 min-h-screen flex items-center justify-center">
      <div
        class="bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl w-full flex flex-col md:flex-row"
      >
        <!-- Left Side: Form -->
        <div class="w-full md:w-1/2 p-8">
          <!-- Logo and Header -->
          <div class="mb-8">
            <img
              src="{{ asset('images/WBS-Logo.png') }}"
              alt="WBS Logo"
              class="h-12 mb-4"
            />
            <h2 class="text-xl font-semibold text-gray-700">
              Welcome Back, Admin
            </h2>
            <p class="text-sm text-gray-500 mt-2">
              Log in to manage and oversee the operations of the WBS system.
            </p>
          </div>
          <!-- Login Form -->
          <form method="POST" class="space-y-6">
            <div>
              <label
                for="email"
                class="block text-sm font-medium text-gray-600 mb-1"
                >E-mail Address</label
              >
              <input
                type="email"
                name="email"
                id="email"
                placeholder="admin@example.com"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-[#415a77]"
                required
              />
            </div>
            <div>
              <label
                for="password"
                class="block text-sm font-medium text-gray-600 mb-1"
                >Password</label
              >
              <input
                id="password"
                type="password"
                name="password"
                placeholder="***********"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-[#415a77]"
                required
              />
            </div>
            <button
              type="submit"
              class="w-full bg-[#415a77] text-white py-3 rounded-lg font-medium hover:bg-[#f47d61] transition-all duration-300"
            >
              Login
            </button>
          </form>
          <p class="text-xs text-center text-gray-500 mt-6">
            By logging in, you agree to our
            <a href="#" class="text-black underline">Terms & Conditions</a> and
            <a href="#" class="text-black underline">Privacy Policy</a>.
          </p>
        </div>

        <!-- Right Side: Image -->
        <div
          class="hidden md:flex md:w-1/2 items-center justify-center bg-gray-100"
        >
          <img
              src="{{ asset('images/admin-Logo.png') }}"
            alt="Admin Login Illustration"
          />
        </div>
      </div>
    </main>
  </body>
</html>
