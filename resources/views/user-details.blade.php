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
    <link href="{{ asset('image/WBS-Logo.png') }}" rel="shortcut icon" />
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
            <div class="flex flex-col items-center mb-6">
              <div class="relative">
                <img
                  id="profileImage"
                  src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/usere.png') }}"
                  alt="Profile"
                  class="w-24 h-24 rounded-full object-cover"
                />
                <button
                  id="editProfileImage"
                  class="absolute top-0 left-0 bg-gray-800 text-white text-sm px-2 py-1 rounded-full"
                >
                  Edit
                </button>
                <input id="fileInput" type="file" class="hidden" />
              </div>
            </div>

    <!-- Main Grid Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- First Row -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold">Will</h2>
            <div class="flex gap-4 pt-4">
                <div
                    class="border-2 border-dashed border-gray-300 rounded h-40 flex flex-col items-center justify-center text-gray-500 cursor-pointer w-1/4 p-4"
                    onclick="document.getElementById('willUpload').click()"
                >
                    <i class="fas fa-plus"></i>
                    <p>Click to upload.</p>
                    <p class="text-sm">Must be a Word or PDF document.</p>
                    <input
                        type="file"
                        id="willUpload"
                        accept=".pdf,.doc,.docx"
                        class="hidden"
                        onchange="uploadDocumentAjax(this)"
                    />
                </div>
                <div id="willDocuments" class="space-y-2 w-3/4"></div>
            </div>
        </div>

        <div class="bg-white p-6 rounded shadow space-y-4">
            <h2 class="text-lg font-semibold">Will Recipients</h2>
            <ul id="willRecipients" class="space-y-2">
                <li class="flex items-center space-x-2">
                    <button
                        class="bg-[#3A5F8F] text-white px-3 py-1 rounded hover:bg-[#F4A261] transition-all duration-300"
                        onclick="openPopup('willRecipients')"
                    >
                        +
                    </button>
                    <p>Click here to add recipient</p>
                </li>
            </ul>
        </div>

        <!-- Second Row -->
        <div class="bg-white p-6 rounded shadow space-y-4">
            <h2 class="text-lg font-semibold">Power of Attorney</h2>
            <div id="poaContainer" class="flex gap-4">
                <div id="poaDocuments" class="space-y-2 w-3/4"></div>
            </div>
        </div>

        <div class="bg-white p-6 rounded shadow space-y-4">
            <h2 class="text-lg font-semibold">Power of Attorney Recipients</h2>
        </div>
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
