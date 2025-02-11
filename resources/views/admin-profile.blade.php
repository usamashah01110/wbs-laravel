<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - User Details</title>

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
                <section class="bg-white p-6 rounded-lg shadow">
                    <div class="flex flex-col items-center mb-6">
                        <!-- Profile Image -->
                        <div class="relative">
                            <img id="adminProfileImage"
                                src="{{ auth()->user() && auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/user.png') }}"
                                alt="Profile"
                                class="w-24 h-24 rounded-full object-cover border" />
                            <button id="editAdminProfileImage"
                                class="absolute top-0 left-0 bg-gray-800 text-white text-sm px-2 py-1 rounded-full">
                                Edit
                            </button>
                            <input id="adminFileInput" type="file" class="hidden" />
                        </div>
                    </div>

                    <!-- User Details Form -->
                    <form id="editAdminProfile">
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
    <div id="toastContainer" class="fixed bottom-5 right-5 space-y-2 z-50"></div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetchLoggedInAdmin();

            const adminFileInput = document.getElementById("adminFileInput");
            const adminProfileImage = document.getElementById("adminProfileImage");
            const editAdminProfileImage = document.getElementById("editAdminProfileImage");

            editAdminProfileImage.addEventListener("click", () => adminFileInput.click());

            adminFileInput.addEventListener("change", (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        adminProfileImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);

                    const formData = new FormData();
                    formData.append("profile_image", file);

                    adminProfileImage.classList.add("opacity-50");

                    fetch("/admin/update-profile-image", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            },
                            body: formData,
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            adminProfileImage.classList.remove("opacity-50");
                            adminProfileImage.src = data.profile_image;
                            showToast("Profile image updated successfully!", "success");
                            setTimeout(() => location.reload(), 1000);
                        })
                        .catch(() => showToast("Failed to update profile image.", "error"));
                }
            });
        });

        function fetchLoggedInAdmin() {
            fetch("/api/logged-in-admin")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("firstName").value = data.firstname;
                    document.getElementById("lastName").value = data.lastname;
                    document.getElementById("email").value = data.email;
                    document.getElementById("phoneNumber").value = data.phone;
                })
                .catch(error => console.error("Error fetching admin data:", error));
        }

        function showToast(message, type = "success") {
            const toastContainer = document.getElementById("toastContainer");
            const toast = document.createElement("div");
            toast.classList.add("toast", type, "bg-gray-800", "text-white", "p-3", "rounded-md", "shadow-md");
            toast.textContent = message;
            toastContainer.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }
    </script>
</body>

</html>
