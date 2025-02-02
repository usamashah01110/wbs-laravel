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
    @include('user-header')

    <!-- User Account -->
    <main id="myAccountSection" class="flex-1 p-6 tab-content">
      <section class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center mb-6 justify-between">
          <div class="relative">
          <img
                  src="{{ optional(auth()->user())->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/user.png') }}"
                  alt="Profile"
                  class="w-24 h-24 rounded-full"
            />

            <button
              id="editProfileImage"
              class="absolute top-0 left-0 bg-gray-800 text-white text-sm px-2 py-1 rounded-full border"
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
            class="bg-[#415a77] text-white px-6 py-2 rounded-lg hover:bg-[#f47d61] transition-all duration-300 ease-in-out"
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
                        class="mt-4 bg-[#415a77] text-white py-2 px-6 rounded-lg hover:bg-[#f47d61] transition-all duration-300"
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
                        class="mt-4 bg-[#415a77] text-white py-2 px-6 rounded-lg hover:bg-[#f47d61] transition-all duration-300"
                        href="{{ route('checkout') }}"
                    >
                        Get Started
                    </a>
                @endif
            </div>
        </section>
    </main>


    <!-- Footer Start -->
@include('footer')
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

  </script>
</html>
