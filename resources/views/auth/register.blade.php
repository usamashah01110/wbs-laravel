<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup - WBS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <!-- favicon -->
    <link href="{{ asset('images/WBS-Logo.png')}}" rel="shortcut icon" />
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
            <h2 class="text-xl font-semibold text-gray-700">Ready to Start</h2>
            <p class="text-sm text-gray-500 mt-2">
              Secure your legacy by registering your will and power of attorney
              with WBS. After your passing, we’ll ensure your family receives
              these documents with care and professionalism.
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
            <form class="space-y-4"  method="POST" action="{{ route('register') }}">
                @csrf
            <div class="flex flex-col md:flex-row md:space-x-4">
              <input
                type="text"
                name="firstName"
                placeholder="First Name"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full md:w-1/2 focus:outline-none focus:border-black"
                required
              />
              <input
                type="text"
                name="lastName"
                placeholder="Last Name"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full md:w-1/2 focus:outline-none focus:border-black mt-4 md:mt-0"
                required
              />
            </div>
            <div class="flex flex-col md:flex-row md:space-x-4">
              <input
                type="email"
                name="email"
                placeholder="E-mail address (verified)"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full md:w-1/2 focus:outline-none focus:border-black"
                required
              />
              <input
                type="tel"
                name="phone"
                placeholder="Phone"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full md:w-1/2 focus:outline-none focus:border-black mt-4 md:mt-0"
                required
              />
            </div>
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                        required
                    />
            <div>
              <input
                type="text"
                name="street"
                placeholder="Street"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:border-black"
                required
              />
            </div>
            <div class="flex flex-col md:flex-row md:space-x-4">
              <input
                type="text"
                name="city"
                placeholder="City"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full md:w-1/3 focus:outline-none focus:border-black"
                required
              />
              <input
                type="text"
                name="state"
                placeholder="State"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full md:w-1/3 focus:outline-none focus:border-black mt-4 md:mt-0"
                required
              />
              <input
                type="text"
                name="zip"
                placeholder="Zip"
                class="px-4 py-3 border border-gray-300 rounded-lg w-full md:w-1/3 focus:outline-none focus:border-black mt-4 md:mt-0"
                required
              />
            </div>
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
            <div>
                <label class="block text-gray-600">Message Time</label>
                <input
                    type="time"
                    name="message_time"
                    class="w-full p-2 border border-gray-300 rounded-lg"
                    {{-- value="{{ Auth::user()->message_time ? \Carbon\Carbon::parse(Auth::user()->message_time)->format('H:i') : '' }}" --}}
                    required
                />
            </div>
            <!--<div>-->
            <!--    <label class="block text-gray-600">Time Zone</label>-->
            <!--    <input-->
            <!--    type="text"-->
            <!--    name="zip"-->
            <!--    placeholder="Zip"-->
            <!--    class="px-4 py-3 border border-gray-300 rounded-lg w-full md:w-1/3 focus:outline-none focus:border-black mt-4 md:mt-0"-->
            <!--    required-->
            <!--  />-->
            <!--</div>-->
            <button
              type="submit"
              class="w-full bg-[#415a77] text-white font-medium py-3 rounded-lg hover:bg-[#f47d61] transition-all duration-300 ease-in-out"
            >
              Sign Up
            </button>
            <p class="text-sm text-center text-gray-900 mt-4">
              Already have an account?
              <a
                href="{{ route('login') }}"
                class="text-[#415a77] underline font-medium hover:text-[#f47d61] transition-all duration-300 ease-in-out"
                >Login</a
              >
            </p>
          </form>
        </div>
        <!-- Right Side: Picture -->
        <div
          class="hidden md:block w-full md:w-1/2 bg-cover bg-center"
          style="background-image: url('{{ asset('images/signup.png') }}')"
        ></div>
      </div>
    </main>
  </body>
</html>
