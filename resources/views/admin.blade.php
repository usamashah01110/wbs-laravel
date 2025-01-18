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
    <!-- Navbar -->
    <header
      class="bg-[#F4A261] shadow-lg px-6 py-4 flex justify-between items-center"
    >
      <div class="flex items-center">
        <img
        src="{{ asset('images/WBS-Logo.png') }}" alt="Profile" class="h-14" />
      </div>
      <div class="flex items-center gap-4">
        <span class="text-gray-100 font-medium hidden md:block"
          >Welcome Back!</span
        >
        <div class="flex items-center gap-2">
          <img
              src="{{ asset('storage/' . auth()->user()->profile_image) ?? asset('images/user.png') }}"
            alt="Profile"
            class="w-8 h-8 rounded-full"
          />
          <span class="font-bold text-white">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
        </div>
      </div>
    </header>

    <div class="flex h-screen">
      <!-- Sidebar -->
      <nav
        id="sidebar"
        class="bg-[#3A5F8F] text-gray-100 w-64 h-full flex-shrink-0 transition-all duration-300 flex flex-col justify-between"
      >
        <div>
          <div class="p-4">
            <button id="sidebarToggle" class="text-gray-400 hover:text-white">
              <i id="toggleArrow" class="fas fa-arrow-left"></i>
            </button>
          </div>
          <ul>
            <li
              id="dashboardLink"
              class="hover:bg-gray-700 px-4 py-2 flex items-center gap-4 cursor-pointer"
            >
              <i class="fas fa-tachometer-alt h-6 w-6"></i>
              <span class="sidebar-text">Dashboard</span>
            </li>
            <li
              id="myAccountLink"
              class="hover:bg-gray-700 px-4 py-2 flex items-center gap-4 cursor-pointer"
            >
              <i class="fas fa-user-circle h-6 w-6"></i>
              <span class="sidebar-text">My Account</span>
            </li>
            <li
              id="logoutLink"
              class="hover:bg-gray-700 px-4 py-2 flex items-center gap-4 cursor-pointer"
            >
              <i class="fas fa-sign-out-alt h-6 w-6"></i>
              <span class="sidebar-text">
               <form method="POST" action="{{ route('logout') }}" >
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
              </span>
            </li>
          </ul>
        </div>
      </nav>

      <div class="w-full">
        <!-- Main Content -->
        <main
          id="dashboardContent"
          class="flex-1 p-6 overflow-hidden tab-content active"
        >
          <!-- Cards -->
          <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
              class="bg-[#E2E8F0] p-6 rounded-lg shadow hover:shadow-lg transition"
            >
              <h2 class="text-gray-600 font-bold">Total Clients</h2>
              <p class="text-gray-800 text-2xl mt-2" id="totalclient"></p>
            </div>
            <div
              class="bg-[#E2E8F0] p-6 rounded-lg shadow hover:shadow-lg transition"
            >
              <h2 class="text-gray-600 font-bold">Total Documents</h2>
              <p class="text-gray-800 text-2xl mt-2" id="totaldocument"></p>
            </div>
            <div
              class="bg-[#E2E8F0] p-6 rounded-lg shadow hover:shadow-lg transition"
            >
              <h2 class="text-gray-600 font-bold">Total Recipients</h2>
              <p class="text-gray-800 text-2xl mt-2" id="totalrecipent"></p>
            </div>
          </section>

          <!-- Table -->
          <section class="mt-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-gray-700 font-bold mb-4">Clients</h2>
            <div class="overflow-auto h-72">
              <table class="w-full border-collapse border border-gray-200" id="clientTable">
                <thead
                  class="sticky top-0 bg-gray-200 z-10 border border-gray-300"
                >
                  <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">ID</th>
                    <th class="border border-gray-300 p-2">First Name</th>
                    <th class="border border-gray-300 p-2">Last Name</th>
                    <th class="border border-gray-300 p-2">Email</th>
                    <th class="border border-gray-300 p-2">Mobile Number</th>
                    <th class="border border-gray-300 p-2">Date of Joining</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                  </tr>
                </thead>
                <tbody >
                  <!-- Rows will be dynamically generated here -->
                </tbody>
              </table>
            </div>
          </section>
        </main>

        <!-- My Account Section -->
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

        <!-- My User Details Section -->
        <main id="userDetailsSection" class="flex-1 p-6 tab-content">
          <section class="bg-white p-6 rounded-lg shadow">
            <!-- User Profile Section -->
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

            <!-- Three Column Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <!-- User Will Documents -->
              <div>
                <h2 class="text-lg font-bold text-gray-700 mb-4">
                  User Will Documents
                </h2>
                <div id="willDocuments" class="space-y-2">
                  <!-- Documents will be appended here -->
                </div>
              </div>

              <!-- User Power of Attorney Documents -->
              <div>
                <h2 class="text-lg font-bold text-gray-700 mb-4">
                  Power of Attorney Documents
                </h2>
                <div id="powerDocuments" class="space-y-2">
                  <!-- Documents will be appended here -->
                </div>
              </div>

              <!-- User Recipient Table -->
              <div>
                <h2 class="text-lg font-bold text-gray-700 mb-4">
                  Recipient Details
                </h2>
                <table class="w-full border-collapse border border-gray-300" id="recipientTable">
                  <thead>
                    <tr class="bg-gray-100">
                      <th class="border border-gray-300 px-4 py-2 text-left">
                        Name
                      </th>
                      <th class="border border-gray-300 px-4 py-2 text-left">
                        Number
                      </th>
                      <th class="border border-gray-300 px-4 py-2 text-left">
                        Email
                      </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Phone
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            Created at
                        </th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Recipient rows will be added dynamically -->
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </main>
      </div>
      <div
        id="toastContainer"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 space-y-2 z-50"
      ></div>
    </div>

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

const dashboardContent = document.getElementById("dashboardContent");
const myAccountSection = document.getElementById("myAccountSection");
const userDetailsSection = document.getElementById("userDetailsSection");
const dashboardLink = document.getElementById("dashboardLink");
const myAccountLink = document.getElementById("myAccountLink");

function switchTab(show) {
        const tabs = [dashboardContent, myAccountSection, userDetailsSection];
        tabs.forEach((tab) => {
          tab.classList.add("hidden");
          tab.classList.remove("active");
        });
        show.classList.remove("hidden");
        show.classList.add("active");
      }

      dashboardLink.addEventListener("click", () => {
        switchTab(dashboardContent);
      });

      myAccountLink.addEventListener("click", () => {
        switchTab(myAccountSection);
      });

const fileInput = document.getElementById("fileInput");
const profileImage = document.getElementById("profileImage");


fetchLoggedInUser();
function fetchLoggedInUser() {
    fetch('/api/logged-in-user')  // Replace with your API endpoint
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

        // Function to delete a user
        function deleteUser(clientId) {
            if (confirm('Are you sure you want to delete this user?')) {
                fetch(`/api/users/${clientId}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                    .then((response) => {
                        if (response.ok) {
                            alert('User deleted successfully.');
                            fetchUsers(); // Refresh the table
                        } else {
                            alert('Failed to delete the user.');
                        }
                    })
                    .catch((error) => {
                        console.error('Error deleting user:', error);
                    });
            }
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
        const profileForm = document.getElementById("editUserProfile");

        profileForm.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent default form submission

            // Get form field values
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const email = document.getElementById('email').value;
            const phoneNumber = document.getElementById('phoneNumber').value;


            // Collect form data, including additional fields
            const formData = new FormData(profileForm);
            formData.append("firstname", firstName);
            formData.append("lastname", lastName);
            formData.append("email", email);
            formData.append("phone", phoneNumber);

            fetch('/update-user-details', {
                method: 'POST',
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.user) {
                        // Update the profile image if available
                        const profileImage = document.getElementById("profileImage");
                        const profileImageUrl = data.user.profile_image
                            ? `/storage/${data.user.profile_image}`
                            : "{{ asset('images/usere.png') }}";
                        profileImage.src = profileImageUrl;

                        // Show success message
                        showToast(data.message, "success");
                    } else {
                        showToast("Failed to update profile.", "error");
                    }
                })
                .catch(error => {
                    console.error('Error updating user details:', error);
                    showToast("Error updating profile.", "error");
                });
        });

        // Show Toast function
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



      // View User Details
      // document.addEventListener("click", (event) => {
      //   if (event.target.closest(".viewUserBtn")) {
      //     const userId = event.target
      //       .closest(".viewUserBtn")
      //       .getAttribute("data-id");
      //     const user = clients.find((client) => client.id == userId);
      //
      //     if (user) {
      //       // Populate user details
      //       userDetailsSection.querySelector("#profileImage").src =
      //         "./assets/images/usere.png"; // Update image if needed
      //       userDetailsSection.querySelector("#profileFields").innerHTML = `
      //           <div>
      //             <label class="block text-gray-600">First Name</label>
      //             <input type="text" value="${user.firstName}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
      //           </div>
      //           <div>
      //             <label class="block text-gray-600">Last Name</label>
      //             <input type="text" value="${user.lastName}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
      //           </div>
      //           <div>
      //             <label class="block text-gray-600">Email</label>
      //             <input type="email" value="${user.email}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
      //           </div>
      //           <div>
      //             <label class="block text-gray-600">Mobile Number</label>
      //             <input type="text" value="${user.mobile}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
      //           </div>
      //           <div>
      //             <label class="block text-gray-600">Joining Date</label>
      //             <input type="text" value="${user.joiningDate}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
      //           </div>`;
      //
      //       // Switch to user details section
      //       switchTab(userDetailsSection);
      //     }
      //   }
      // });

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



<<<<<<< HEAD
document.addEventListener("DOMContentLoaded", function () {
    // Fetch logged-in user details and populate the form
    fetchLoggedInUser();
    fetchUsers();
});



      // View User Details
      document.addEventListener("click", (event) => {
        if (event.target.closest(".viewUserBtn")) {
          const userId = event.target
            .closest(".viewUserBtn")
            .getAttribute("data-id");
          const user = clients.find((client) => client.id == userId);

          if (user) {
            // Populate user details
            userDetailsSection.querySelector("#profileImage").src =
              "./assets/images/usere.png"; 
            userDetailsSection.querySelector("#profileFields").innerHTML = `
        <div>
          <label class="block text-gray-600">First Name</label>
          <input type="text" value="${user.firstName}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
        </div>
        <div>
          <label class="block text-gray-600">Last Name</label>
          <input type="text" value="${user.lastName}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
        </div>
        <div>
          <label class="block text-gray-600">Email</label>
          <input type="email" value="${user.email}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
        </div>
        <div>
          <label class="block text-gray-600">Mobile Number</label>
          <input type="text" value="${user.mobile}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
        </div>
        <div>
          <label class="block text-gray-600">Joining Date</label>
          <input type="text" value="${user.joiningDate}" class="w-full p-2 border border-gray-300 rounded-lg" disabled />
        </div>`;

            // Switch to user details section
            switchTab(userDetailsSection);
          }
        }
      });
=======
>>>>>>> 1503a5ceb465b02b48bf5b5e725bff06ec0af5ca
    </script>

  </body>
</html>
