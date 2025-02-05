<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link href="{{ asset('images/WBS-Logo.png') }}" rel="shortcut icon" />
  </head>
  <body class="bg-gray-100 min-h-screen font-sans overflow-hidden">
    <!-- Header -->
    @include('header')

    <div class="flex h-screen">
      <!-- Sidebar -->
      @include('side-bar')

      <!-- Main Content -->
      <div class="w-full">
        <main class="flex-1 p-6">
          <section class="bg-white p-6 rounded-lg shadow">
            <!-- Profile Image -->
            {{-- <div class="flex items-center mb-6">
              <div class="relative">
                <img
                  id="profileImage"
                  src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/usere.png') }}"
                  alt="Profile"
                  class="w-24 h-24 rounded-full object-cover"
                />
              </div>
              <div>

              </div>
            </div> --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                  <div class="relative">
                    <img
                      id="profileImage"
                      src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/usere.png') }}"
                      alt="Profile"
                      class="w-24 h-24 rounded-full object-cover"
                    />
                  </div>
                  <div class="ml-6">
                    <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                  </div>
                </div>

                <!-- Subscription Details -->
                <div class="bg-white p-4 rounded-lg shadow w-1/3">
                  <h3 class="text-lg font-semibold">Subscription Status</h3>
                  <p class="font-semibold {{ $user->subscription_status == 'active' ? 'text-green-500' : 'text-red-500' }}">
                    {{ ucfirst('Active') }}
                  </p>
                  @if($user->subscriptions)
                    <div class="mt-4">
                        <ul id="packageFeatures" class="list-disc pl-6 space-y-2">
                            <li class="text-gray-800">User  have {{ $user->subscriptions[0]->fullWill == '1' ? 'a full will Subscription.' : 'no active full will.' }}</li>
                            <li class="text-gray-800">User have {{ $user->subscriptions[0]->poa == '1' ? 'a Power of Attorney Subscription.' : 'no active Power of Attorney Subscription.' }}</li>
                            <li class="text-gray-800">User have {{ $user->subscriptions[0]->executor == '1' ? 'an Executor Subscription.' : 'no active Executor Subscription.' }}</li>
                        </ul>
                    </div>
                  @else
                    <p class="text-gray-500 mt-2">No active subscription</p>
                  @endif
                </div>
                <div class="bg-white p-4 rounded-lg shadow w-1/3">
                    <h3 class="text-lg font-semibold">Onetime Packages</h3>
                    <p class="font-semibold {{ $user->transactions->first()->stripe_status == 'succeeded' ? 'text-green-500' : 'text-red-500' }}">
                        {{ ucfirst('Active') }}
                    </p>
                    @if($user->transactions)
                        <div class="mt-4">
                            <ul id="packageFeatures" class="list-disc pl-6 space-y-2">
                                <li class="text-gray-800">You have {{ $user->transactions->first()->notarization == '1' ? 'Notarization Package' : 'no active Notarization Package' }}</li>
                                <li class="text-gray-800">You have {{ $user->transactions->first()->winterwill == '1' ? 'Writer Will Package.' : 'no active winter Package.' }}</li>
                                <li class="text-gray-800">You have {{ $user->transactions->first()->layer == '1' ? ' Lawyer Draft Will Package.' : 'no lawyer Package.' }}</li>
                            </ul>
                        </div>
                    @else
                        <p class="text-gray-500 mt-2">No active subscription</p>
                    @endif
                </div>
              </div>
    <!-- Main Grid Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Will</h2>
            <div class="flex flex-col gap-4 pt-4">
              @forelse ($user->documents->where('documnet_type', 'will') as $doc)
                <div class="flex items-center justify-between">
                  <p class="truncate w-3/4">{{ $doc->name }}</p>
                  <div class="flex items-center gap-4">
                    <a href="{{ asset('storage/' . $doc->path) }}" class="text-green-500" target="_blank" download>
                        <i class="fas fa-download"></i>
                      </a>
                      <a href="{{ asset('storage/' . $doc->path) }}" class="text-blue-500" target="_blank" onclick="viewDocument('${doc.path}')">
                        <i class="fas fa-eye"></i>
                    </a>
                  </div>
                </div>
              @empty
                <p class="text-gray-500">N/A</p>
              @endforelse
            </div>
          </div>

    <div class="bg-white p-6 rounded shadow space-y-4">
    <h2 class="text-lg font-semibold">Will Recipients</h2>
    @forelse ($user->recipients->where('type', 'will') as $recipient)
      <div>
        <p class="recipient-name font-semibold">{{ $recipient->name ?? 'N/A' }}</p>
        <p class="recipient-mobile text-sm text-gray-600">{{ $recipient->mobile ?? 'N/A' }}</p>
        <p class="recipient-email text-sm text-gray-600">{{ $recipient->email ?? 'N/A' }}</p>
      </div>
      <div class="space-x-2">
        <button class="text-blue-500" onclick="openattPopup('willRecipients', {{ $recipient->id }})">
         <i class="fas fa-edit"></i>
        </button>
      </div>
    @empty
      <p class="text-gray-500">N/A</p>
    @endforelse
  </div>

        <!-- Second Row -->
 <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Power of Attorney</h2>
            <div class="flex flex-col gap-4 pt-4">
              @forelse ($user->documents->where('documnet_type', 'attorny') as $doc)
                <div class="flex items-center justify-between">
                  <p class="truncate w-3/4">{{ $doc->name }}</p>
                  <div class="flex items-center gap-4">
                    <a href="{{ asset('storage/' . $doc->path) }}" class="text-green-500" target="_blank" download>
                        <i class="fas fa-download"></i>
                      </a>
                      <a href="{{ asset('storage/' . $doc->path) }}" class="text-blue-500" target="_blank" onclick="viewDocument('${doc.path}')">
                        <i class="fas fa-eye"></i>
                    </a>
                  </div>
                </div>
              @empty
                <p class="text-gray-500">N/A</p>
              @endforelse
            </div>
          </div>
<div class="bg-white p-6 rounded shadow space-y-4">
    <h2 class="text-lg font-semibold">Power of Attorney Recipient</h2>
    @forelse ($user->recipients->where('type', 'attorny') as $recipient)
      <div>
        <p class="recipient-name font-semibold">{{ $recipient->name ?? 'N/A' }}</p>
        <p class="recipient-mobile text-sm text-gray-600">{{ $recipient->mobile ?? 'N/A' }}</p>
        <p class="recipient-email text-sm text-gray-600">{{ $recipient->email ?? 'N/A' }}</p>
      </div>
      <div class="space-x-2">
        <button class="text-blue-500" onclick="openattPopup('willRecipients', {{ $recipient->id }})">
         <i class="fas fa-edit"></i>
        </button>
        <button class="text-red-500" onclick="deleteattRecipient('willRecipients', {{ $recipient->id }})">
         <i class="fas fa-trash-alt"></i>
        </button>
      </div>
    @empty
      <p class="text-gray-500">N/A</p>
    @endforelse
  </div>

          </section>
        </main>
      </div>
    </div>

    <!-- Toast Container -->
    <div
      id="toastContainer"
      class="fixed top-4 left-1/2 transform -translate-x-1/2 space-y-2 z-50"
    ></div>

    <script>
      // Sidebar Toggle Functionality
      document.getElementById("sidebarToggle").addEventListener("click", () => {
        const sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("w-64");
        sidebar.classList.toggle("w-16");

        document
          .getElementById("toggleArrow")
          .classList.toggle("rotate-180");

        document
          .querySelectorAll(".sidebar-text")
          .forEach((text) => text.classList.toggle("hidden"));
      });

      // Profile Image Upload
      document.getElementById("editProfileImage").addEventListener("click", () => {
        document.getElementById("fileInput").click();
      });

      document.getElementById("fileInput").addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
          const formData = new FormData();
          formData.append("profile_image", file);

          fetch("/update-profile-image", {
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            },
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.profile_image) {
                document.getElementById("profileImage").src = data.profile_image;
                showToast("Profile image updated successfully.");
              } else {
                showToast("Failed to update profile image.", "error");
              }
            })
            .catch(() => {
              showToast("Error uploading image.", "error");
            });
        }
      });

      // Fetch Data for User Details
      function fetchLoggedInUser() {
        fetch("/api/logged-in-user")
          .then((response) => response.json())
          .then((data) => {
            console.log("Logged-in user data:", data);
          })
          .catch((error) => console.error("Error fetching user data:", error));
      }

      // Toast Notification
      function showToast(message, type = "success") {
        const toastContainer = document.getElementById("toastContainer");
        const toast = document.createElement("div");
        toast.className = `toast ${type}`;
        toast.textContent = message;

        toastContainer.appendChild(toast);

        setTimeout(() => {
          toast.remove();
        }, 3000);
      }

      // Initialize Page
      document.addEventListener("DOMContentLoaded", () => {
        fetchLoggedInUser();
      });
    </script>
  </body>
</html>
