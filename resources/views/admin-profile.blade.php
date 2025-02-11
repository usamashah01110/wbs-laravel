<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
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
                <section class="bg-white p-6 rounded-lg shadow-lg">
                    <!-- Profile Image -->
                    <div class="relative">
                        <img id="profileImage"
                            src="{{ auth()->user() && auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/user.png') }}"
                            alt="Profile" class="w-24 h-24 rounded-full object-cover" />
                        <button id="editProfileImage"
                            class="absolute top-0 left-0 bg-gray-800 text-white text-sm px-2 py-1 rounded-full">
                            Edit
                        </button>
                        <input id="fileInput" type="file" class="hidden" />
                    </div>
                    <!-- User Details Form -->
                    <form id="editUserProfile">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-600">First Name</label>
                                <input type="text" id="firstName" name="firstname"
                                    class="w-full p-2 border border-gray-300 rounded-lg" />
                            </div>
                            <div>
                                <label class="block text-gray-600">Last Name</label>
                                <input type="text" id="lastName" name="lastname"
                                    class="w-full p-2 border border-gray-300 rounded-lg" />
                            </div>
                            <div>
                                <label class="block text-gray-600">Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full p-2 border border-gray-300 rounded-lg" />
                            </div>
                            <div>
                                <label class="block text-gray-600">Phone Number</label>
                                <input type="text" id="phoneNumber" name="phone"
                                    class="w-full p-2 border border-gray-300 rounded-lg" />
                            </div>
                        </div>
                        <div class="text-right mt-6">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                                Save
                            </button>
                        </div>
                    </form>
                </section>
            </main>
        </div>
    </div>

    <!-- Toast Container -->
    @include('toast')

    <script>
        // Sidebar Toggle Functionality
        const sidebar = document.getElementById("sidebar");
        const sidebarToggle = document.getElementById("sidebarToggle");
        const toggleArrow = document.getElementById("toggleArrow");
        const sidebarText = document.querySelectorAll(".sidebar-text");

        sidebarToggle?.addEventListener("click", () => {
            sidebar.classList.toggle("w-64");
            sidebar.classList.toggle("w-16");
            toggleArrow.classList.toggle("rotate-180");

            sidebarText.forEach((text) => text.classList.toggle("hidden"));
        });

        // Fetch Logged-In User Data
        function fetchLoggedInUser() {
            fetch("/api/logged-in-user")
                .then((response) => response.json())
                .then((data) => {
                    document.getElementById("firstName").value = data.firstname;
                    document.getElementById("lastName").value = data.lastname;
                    document.getElementById("email").value = data.email;
                    document.getElementById("phoneNumber").value = data.phone;
                })
                .catch((error) => console.error("Error fetching user data:", error));
        }

        // Handle Profile Image Upload
        document.addEventListener("DOMContentLoaded", () => {
            const fileInput = document.getElementById("fileInput");
            const profileImage = document.getElementById("profileImage");
            const editProfileImage = document.getElementById("editProfileImage");

            editProfileImage.addEventListener("click", () => fileInput.click());

            fileInput.addEventListener("change", (event) => {
                const file = event.target.files[0];
                if (file) {
                    const formData = new FormData();
                    formData.append("profile_image", file);

                    fetch("/update-profile-image", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                            },
                            body: formData,
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.profile_image) {
                                profileImage.src = data.profile_image;
                                showToast("Profile image updated successfully.", "success");
                            } else {
                                showToast("Failed to update profile image.", "error");
                            }
                        })
                        .catch((error) => {
                            showToast("Error uploading image.", "error");
                        });
                }
            });
        });

        // Initialize Page
        document.addEventListener("DOMContentLoaded", () => {
            fetchLoggedInUser();
        });
    </script>
</body>

</html>
