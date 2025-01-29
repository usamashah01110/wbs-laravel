<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WBS | Will Be Sent</title>
    <meta name="description" content="willbesent" />
    <meta name="keywords" content="willbesent" />
    <meta name="author" content="willbesent" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- favicon -->
    <link href="assets/images/WBS-Logo.png" rel="shortcut icon" />
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Main Css -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body>
    <!-- Navbar Start -->
    <header
      class="bg-[#F4A261] shadow-lg px-6 py-4 flex justify-between items-center"
    >
      <div class="flex items-center">
        <img src="{{ asset('images/WBS-Logo.png') }}" alt="Profile" class="h-14" />
          </a>
      </div>
      <div class="relative">
        <button id="dropdownButton" class="flex items-center gap-2 transition">
        <img
    src="{{ optional(auth()->user())->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/user.png') }}"
    alt="Profile"
    class="w-8 h-8 rounded-full"
/>

          <span class="font-medium text-gray-100">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span>
        </button>
        <!-- Dropdown -->
        <div
          id="dropdownMenu"
          class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden"
        >
          <a
            href="#"
            id="myAccountLink"
            class="block px-4 py-2 hover:bg-gray-200"
            >My Account</a
          >
          <a
            href="#"
            class="block px-4 py-2 hover:bg-gray-200 text-red-500 transition-all duration-300"
          >
            <i class="fas fa-sign-out-alt text-red-500"></i> Logout</a
          >
        </div>
      </div>
    </header>

    <!-- User Account -->
    <main id="myAccountSection" class="flex-1 p-6 tab-content">
      <section class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center mb-6 justify-between">
          <div class="relative">
          <img
   src="{{ asset('storage/' . auth()->user()->profile_image) ?? asset('images/usere.png') }}"
    alt="Profile"
    class="w-24 h-24 rounded-full"
/>

            <button
              id="editProfileImage"
              class="absolute top-0 left-0 bg-gray-800 text-white text-sm px-2 py-1 rounded-full"
            >
              Edit
            </button>
            <input id="fileInput" type="file" class="hidden" />
          </div>
          <a class="text-2xl cursor-pointer" href="{{url('/dashboard')}}"
            ><i class="fas fa-times"></i
          ></a>
        </div>
          <form action="{{ route('user.update') }}" method="POST">
              @csrf
        <div id="profileFields" class="grid grid-cols-2 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-gray-600">First Name</label>
            <input
              type="text"
              id="firstName"
              name="firstname"
              class="w-full p-2 border border-gray-300 rounded-lg"
              value="{{ Auth::user()->firstname }}"
            />
          </div>
          <div>
            <label class="block text-gray-600">Last Name</label>
            <input
              type="text"
              id="lastName"
              name="lastname"
              class="w-full p-2 border border-gray-300 rounded-lg"
              value="{{ Auth::user()->lastname }}"
            />
          </div>
          <div>
            <label class="block text-gray-600">Email</label>
            <input
                readonly
              type="email"
              id="email"
              name="phone"
              class="w-full p-2 border border-gray-300 rounded-lg"
              value="{{ Auth::user()->email }}"
            />
          </div>
          <div>
            <label class="block text-gray-600">Phone Number</label>
            <input
              type="text"
              id="phoneNumber"
              name="phone"
              class="w-full p-2 border border-gray-300 rounded-lg"
              value="{{ Auth::user()->phone }}"
            />
          </div>
{{--          <div>--}}
{{--            <label class="block text-gray-600">State</label>--}}
{{--            <select--}}
{{--              id="gender"--}}
{{--              class="w-full p-2 border border-gray-300 rounded-lg"--}}
{{--              disabled--}}
{{--            >--}}
{{--              <option value="male">Male</option>--}}
{{--              <option value="female">Female</option>--}}
{{--            </select>--}}
{{--          </div>--}}
            <div>
            <label class="block text-gray-600">City</label>
            <input
              type="text"
              id="dob"
              name="city"
              class="w-full p-2 border border-gray-300 rounded-lg"
              value="{{ Auth::user()->city }}"
            />
          </div>
          <div>
            <label class="block text-gray-600">State</label>
            <input
              type="text"
              id="country"
              name="country"
              class="w-full p-2 border border-gray-300 rounded-lg"
              value="{{ Auth::user()->state }}"
            />
          </div>
        </div>
        <div class="text-right mt-6">
          <button
              type="submit"
            id="editProfileButton"
            class="bg-[#3A5F8F] text-white px-6 py-2 rounded-lg hover:bg-[#F4A261] transition-all duration-300 ease-in-out"
          >
            Update
          </button>
        </div>
          </form>
      </section>
    </main>

<!-- Packages Section -->
    <main id="packageDetailsSection" class="flex-1 p-6 tab-content">
        <section class="bg-white p-6 rounded-lg shadow">
            <!-- Header Section -->
            <div class="flex items-center mb-6 justify-between">
                <h2 class="text-2xl font-bold text-gray-800">
        <span id="packageTitle">
          @if(Auth::user()->subscriptions->isNotEmpty())
                Subscription Details
            @else
                Package Details
            @endif
        </span>
                </h2>
            </div>

            <!-- Dynamic Content -->
            <div class="text-gray-700 space-y-4">
                @if(Auth::user()->subscriptions->isNotEmpty())
                    <!-- Show Subscription Details -->
                    <p id="subscriptionInfo" class="text-lg">
                        Your current plan:
                        <strong>
                            @if(Auth::user()->subscriptions->first()->type == 'monthly')
                                Monthly
                            @else
                                Yearly
                            @endif
                        </strong>
                    </p>

                    <ul id="packageFeatures" class="list-disc pl-6">
                        <li>You have {{ isset(Auth::user()->subscriptions->first()->fullWill) && Auth::user()->subscriptions->first()->fullWill == '1' ? 'full will Subscription.' : 'no active full will.' }}</li>

                        <li>You have {{ isset(Auth::user()->subscriptions->first()->poa) && Auth::user()->subscriptions->first()->poa == '1' ? 'Power of Attorney Subscription.' : 'no active Power of Attorney Subscription.' }}</li>

                        <li>You have {{ isset(Auth::user()->subscriptions->first()->executor) && Auth::user()->subscriptions->first()->executor == '1' ? 'Executor Subscription.' : 'no active Executor Subscription.' }}</li>
                    </ul>
                    <br>

                    <!-- Update Button -->
                    <a
                        id="packageButton"
                        class="mt-4 bg-[#3A5F8F] text-white py-2 px-6 rounded-lg hover:bg-[#F4A261] transition-all duration-300"
                        href="{{ route('checkout') }}"
                    >
                        Update
                    </a>
                @else
                    <!-- Package Details and Get Started Button -->
                    <p id="packageDescription" class="text-lg"></p>
                    <ul id="packageFeatures" class="list-disc pl-6 hidden">
                        <li>You can create 1 full will.</li>
                        <li>You can add up to 2 recipients.</li>
                    </ul>

                    <br>

                    <!-- Get Started Button -->
                    <a
                        id="packageButton"
                        class="mt-4 bg-[#3A5F8F] text-white py-2 px-6 rounded-lg hover:bg-[#F4A261] transition-all duration-300"
                        href="{{ route('checkout') }}"
                    >
                        Get Started
                    </a>
                @endif
            </div>
        </section>
    </main>


    <!-- Footer Start -->
    <footer class="bg-[#3A5F8F]">
      <div class="container">
        <div class="flex w-11/12 mx-auto justify-between items-center py-4">
          <div class="flex flex-col">
            <img src="../assets/images/WBS-Logo.png" alt="" class="h-10" />
            <p class="text-gray-300 max-w-xs mt-6">
              Will Be Sent is a proud subsidary of
              <a herf="" target="blank" href="https://arvoequities.com"
                >Arvo Equities.</a
              >
            </p>
          </div>

          <div class="flex flex-col">
            <a
              class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300"
              href="#"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="lucide lucide-mail"
              >
                <rect width="20" height="16" x="2" y="4" rx="2" />
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
              </svg>
              Help@WillBeSent.com
            </a>

            <a
              class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300"
              href="#"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="lucide lucide-phone"
              >
                <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                />
              </svg>
              + 1 (833) 462 2786
            </a>
          </div>
        </div>
      </div>

      <div class="bg-[#F4A261]">
        <!-- 1B283F -->
        <div class="container">
          <div class="flex justify-between items-center w-11/12 mx-auto">
            <p class="text-base text-white">
              <script>
                document.write(new Date().getFullYear());
              </script>
              © Will Be Sent. <a href="willbesent.com">All Rights Reserved.</a>
            </p>

            <div class="flex gap-2">
              <a
                class="p-2 text-sm font-semibold rounded-md text-white hover:bg-[#3A5F8F] transition-all duration-300"
                href="#"
              >
                <svg
                  class="flex-shrink-0 size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                  />
                </svg>
              </a>
              <a
                class="p-2 text-sm font-semibold rounded-md text-white hover:bg-[#3A5F8F] transition-all duration-300"
                href="#"
              >
                <svg
                  class="flex-shrink-0 size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"
                  />
                </svg>
              </a>
              <a
                class="p-2 text-sm font-semibold rounded-md text-white hover:bg-[#3A5F8F] transition-all duration-300"
                href="#"
              >
                <svg
                  class="flex-shrink-0 size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"
                  />
                </svg>
              </a>
            </div>
          </div>
        </div>

      <div
        id="toastContainer"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 space-y-2 z-50"
      ></div>
      </div>
    </footer>
    <!-- Footer End -->
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

        // Dropdown toggle
        const dropdownButton = document.getElementById("dropdownButton");
    const dropdownMenu = document.getElementById("dropdownMenu");
    dropdownButton.addEventListener("click", () => {
        dropdownMenu.classList.toggle("hidden");
    });


      $(document).ready(function () {
          // Show file input when 'Edit' button is clicked
          $("#editProfileImage").on("click", function () {
              $("#fileInput").click();
          });

          // Handle file selection and upload
          $("#fileInput").on("change", function () {
              const file = this.files[0];

              if (file) {
                  // Display selected image preview
                  const reader = new FileReader();
                  reader.onload = function (e) {
                      $("#profileImage").attr("src", e.target.result);
                  };
                  reader.readAsDataURL(file);

                  // Upload file using AJAX
                  const formData = new FormData();
                  formData.append("profile_image", file);

                  $.ajax({
                      url: "/update-profile-image", // Update this URL to your endpoint
                      type: "POST",
                      data: formData,
                      contentType: false,
                      processData: false,
                      headers: {
                          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // Add CSRF token if using Laravel
                      },
                      success: function (response) {
                          showToast("Profile image uploaded successfully!");
                          // Optionally update the image preview with the server URL
                          $("#profileImage").attr("src", response.imageUrl);
                      },
                      error: function (error) {
                        showToast("Failed to update profile image.", "error");
                      },
                  });
              }
          });
      });

//
// // Mock user subscription data
//   const userHasPackage = false;
//
// // DOM Elements
// const packageTitle = document.getElementById("packageTitle");
// const packageDescription = document.getElementById("packageDescription");
// const packageFeatures = document.getElementById("packageFeatures");
// const packageInfo = document.getElementById("packageInfo");
// const packageButton = document.getElementById("packageButton");
//
// // Dynamic Content Based on Subscription Status
// if (userHasPackage) {
//   packageTitle.innerText = "Your Current Package";
//   packageDescription.innerHTML = `
//     <strong>You have subscribed to the <span class="text-[#F4A261]">Will Plan</span>.</strong>
//   `;
//   packageFeatures.classList.remove("hidden");
//   packageInfo.innerText = "Looking for additional features? Upgrade your plan to access more options.";
//   packageButton.innerText = "Upgrade";
// } else {
//   packageTitle.innerText = "No Active Package";
//   packageDescription.innerHTML = `
//     <strong>You do not have an active subscription.</strong>
//   `;
//   packageInfo.innerText = "Get started with our plans to secure your documents.";
//   packageButton.innerText = "Get Started";
// }

  </script>
</html>
