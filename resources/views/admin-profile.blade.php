<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- favicon -->
    <link href="{{ asset('image/WBS-Logo.png')}}" rel="shortcut icon" />
  </head>
  <body class="bg-gray-100 min-h-screen font-sans overflow-hidden">
    @include('header') 
    <div class="flex h-screen">
    @include('side-bar') 
      <div class="w-full">
        <main id="myAccountSection" class="flex-1 p-6 tab-content">
          <section class="bg-white p-6 rounded-lg shadow">
            <div class="flex flex-col items-center mb-6">
              <div class="relative">
                <img
                  id="profileImage"
                  src="{{ asset('storage/' . auth()->user()->profile_image) ?? asset('images/usere.png') }}"
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
            <form id="editUserProfile">
            <div
              id="profileFields"
              class="grid grid-cols-1 md:grid-cols-2 gap-4"
            >
              <div>
                <label class="block text-gray-600">First Name</label>
                <input
                  type="text"
                  id="firstName"
                  name="firstname"
                  class="w-full p-2 border border-gray-300 rounded-lg"
                />
              </div>
              <div>
                <label class="block text-gray-600">Last Name</label>
                <input
                  type="text"
                  id="lastName"
                  name="lastname"
                  class="w-full p-2 border border-gray-300 rounded-lg"
                />
              </div>
              <div>
                <label class="block text-gray-600">Email</label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="w-full p-2 border border-gray-300 rounded-lg"

                />
              </div>
              <div>
                <label class="block text-gray-600">Phone Number</label>
                <input
                  type="text"
                  id="phoneNumber"
                  name="phone"
                  class="w-full p-2 border border-gray-300 rounded-lg"

                />
              </div>
{{--              <div>--}}
{{--                <label class="block text-gray-600">Gender</label>--}}
{{--                <select--}}
{{--                  id="gender"--}}
{{--                  class="w-full p-2 border border-gray-300 rounded-lg"--}}
{{--                  disabled--}}
{{--                >--}}
{{--                  <option value="male">Male</option>--}}
{{--                  <option value="female">Female</option>--}}
{{--                </select>--}}
{{--              </div>--}}
{{--              <div>--}}
{{--                <label class="block text-gray-600">Country</label>--}}
{{--                <input--}}
{{--                  type="text"--}}
{{--                  id="country"--}}
{{--                  class="w-full p-2 border border-gray-300 rounded-lg"--}}
{{--                  disabled--}}
{{--                />--}}
{{--              </div>--}}
{{--              <div>--}}
{{--                <label class="block text-gray-600">Date of Birth</label>--}}
{{--                <input--}}
{{--                  type="date"--}}
{{--                  id="dob"--}}
{{--                  class="w-full p-2 border border-gray-300 rounded-lg"--}}
{{--                  disabled--}}
{{--                />--}}
{{--              </div>--}}
            </div>
            <div class="text-right mt-6">
              <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg"
              >
                Save
              </button>
            </div>
              </form>
          </section>
        </main>

      <div
        id="toastContainer"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 space-y-2 z-50"
      ></div>

    <script>

const sidebar = document.getElementById("sidebar");
const sidebarToggle = document.getElementById("sidebarToggle");
const toggleArrow = document.getElementById("toggleArrow");
const sidebarText = document.querySelectorAll(".sidebar-text");

sidebarToggle.addEventListener("click", () => {
  sidebar.classList.toggle("w-64");
  sidebar.classList.toggle("w-16");

  toggleArrow.classList.toggle("rotate-180");

  sidebarText.forEach((text) => {
    text.classList.toggle("hidden");
  });
});

const fileInput = document.getElementById("fileInput");
const profileImage = document.getElementById("profileImage");


fetchLoggedInUser();
function fetchLoggedInUser() {
    fetch('/api/logged-in-user')  
        .then((response) => response.json())
        .then((data) => {
            // Populate the form fields with the user's data
            document.getElementById('firstName').value = data.firstname;
            document.getElementById('lastName').value = data.lastname;
            document.getElementById('email').value = data.email;
            document.getElementById('phoneNumber').value = data.phone;

        })
        .catch((error) => {
            console.error('Error fetching user data:', error);
        });
}

        function fetchUsers() {
            fetch('/api/users')
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    const clientTable = document.querySelector('#clientTable tbody');
                    clientTable.innerHTML = '';

                    data.users.forEach((client) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                        <td class="border border-gray-300 p-2">${client.id}</td>
                        <td class="border border-gray-300 p-2">${client.firstname}</td>
                        <td class="border border-gray-300 p-2">${client.lastname}</td>
                        <td class="border border-gray-300 p-2">${client.email}</td>
                        <td class="border border-gray-300 p-2">${client.phone}</td>
                        <td class="border border-gray-300 p-2">${client.created_at}</td>
                        <td class="border border-gray-300 p-2 items-center flex justify-center gap-4">
                          <button class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 edit-button" data-id="${client.id}">
                              <i class="fas fa-edit"></i>
                            </button>
                          <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 delete-button" data-id="${client.id}">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </td>`;
                        clientTable.appendChild(row);
                    });
                    document.getElementById('totalclient').textContent = data.users.length;
                    document.getElementById('totaldocument').textContent = data.totalDocuments;
                    document.getElementById('totalrecipent').textContent = data.totalRecipients;
                    // Add event listeners for delete buttons
                    document.querySelectorAll('.delete-button').forEach((button) => {
                        button.addEventListener('click', function () {
                            const clientId = this.getAttribute('data-id');
                            deleteUser(clientId);
                        });
                    });
                })
                .catch((error) => {
                    console.error('Error fetching users:', error);
                });
        }

    document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.getElementById("fileInput");
        const profileImage = document.getElementById("profileImage");
        const editProfileImage = document.getElementById("editProfileImage");

        // Trigger file input when clicking on the Edit button
        editProfileImage.addEventListener("click", () => fileInput.click());

        // Handle file input change (image selection)
        fileInput.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                // Create a FormData object
                const formData = new FormData();
                formData.append("profile_image", file);

                // Send an AJAX request to upload the image
                fetch('/update-profile-image', {
                    method: 'POST',
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.profile_image) {
                            // Update the profile image on the page
                            profileImage.src = data.profile_image;
                            showToast(data.message, "success");
                        } else {
                            showToast("Failed to update profile image.", "error");
                        }
                    })
                    .catch((error) => {
                        console.error('Error uploading image:', error);
                        showToast("Error uploading image.", "error");
                    });
            }
        });

        // Show Toast
        function showToast(message, type = "success") {
            const toastContainer = document.getElementById("toastContainer");
            const toast = document.createElement("div");
            toast.classList.add("toast", type);
            toast.textContent = message;

            toastContainer.appendChild(toast);

            setTimeout(() => {
                toastContainer.removeChild(toast);
            }, 3000);
        }
    });


        document.addEventListener("DOMContentLoaded", function () {
            // Fetch logged-in user details and populate the form
            fetchLoggedInUser();
            fetchUsers();
        });

function switchTab(section) {
    document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
    section.classList.remove('hidden');
}

document.addEventListener("click", (event) => {
    if (event.target.closest(".edit-button")) {
        const userId = event.target.closest(".edit-button").getAttribute("data-id");

        // Fetch user details by ID
        fetch(`/user/details/${userId}`)
            .then((response) => response.json())
            .then((data) => {
                const user = data.user;

                const recipientTable = document.querySelector('#recipientTable tbody');
                const row = document.createElement('tr');
                row.innerHTML = `
                        <td class="border border-gray-300 p-2">${user.id}</td>
                        <td class="border border-gray-300 p-2">${user.firstname}</td>
                        <td class="border border-gray-300 p-2">${user.lastname}</td>
                        <td class="border border-gray-300 p-2">${user.email}</td>
                        <td class="border border-gray-300 p-2">${user.phone}</td>
                        <td class="border border-gray-300 p-2">${user.created_at}</td>
                     `;
                recipientTable.appendChild(row);
                switchTab('userDetailsSection');
            })
            .catch((error) => {
                console.error("Error fetching user details:", error);
            });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Fetch logged-in user details and populate the form
    fetchLoggedInUser();
    fetchUsers();
});
    </script>

  </body>
</html>
