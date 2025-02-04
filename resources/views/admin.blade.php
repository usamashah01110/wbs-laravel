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

  <body class="bg-gray-100 min-h-screen font-sans">
    @include('header')
    <div class="flex h-screen">
      @include('side-bar')

      <div class="w-full">
        <!-- Main Content -->
        <main id="dashboardContent" class="flex-1 p-6 ">
          <!-- Cards Section -->
          <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-[#E2E8F0] p-6 rounded-lg shadow hover:shadow-lg transition">
              <h2 class="text-gray-600 font-bold">Total Clients</h2>
              <p class="text-gray-800 text-2xl mt-2" id="totalclient"></p>
            </div>
            <div class="bg-[#E2E8F0] p-6 rounded-lg shadow hover:shadow-lg transition">
              <h2 class="text-gray-600 font-bold">Total Documents</h2>
              <p class="text-gray-800 text-2xl mt-2" id="totaldocument"></p>
            </div>
            <div class="bg-[#E2E8F0] p-6 rounded-lg shadow hover:shadow-lg transition">
              <h2 class="text-gray-600 font-bold">Total Recipients</h2>
              <p class="text-gray-800 text-2xl mt-2" id="totalrecipent"></p>
            </div>
          </section>

          <!-- Table Section -->
          <section class="mt-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-gray-700 font-bold mb-4">Clients</h2>
            <div class="">
              <table class="w-full border-collapse border border-gray-200" id="clientTable">
                <thead class="sticky top-0 bg-gray-200 z-10 border border-gray-300">
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
                <tbody>
                  <!-- Dynamically generated rows -->
                </tbody>
              </table>
            </div>
          </section>
        </main>
      </div>

      <!-- Toast Notifications -->
      <div
        id="toastContainer"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 space-y-2 z-50"
      ></div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
  fetchLoggedInUser();
  fetchUsers();
});

// Sidebar Toggle Functionality
const sidebar = document.getElementById("sidebar");
const sidebarToggle = document.getElementById("sidebarToggle");
const toggleArrow = document.getElementById("toggleArrow");
const sidebarText = document.querySelectorAll(".sidebar-text");

sidebarToggle.addEventListener("click", () => {
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

// Fetch and Display Users
function fetchUsers() {
  fetch("/api/users")
    .then((response) => response.json())
    .then((data) => {
      const clientTable = document.querySelector("#clientTable tbody");
      clientTable.innerHTML = "";

      data.users.forEach((client) => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td class="border border-gray-300 p-2">${client.id}</td>
          <td class="border border-gray-300 p-2">${client.firstname}</td>
          <td class="border border-gray-300 p-2">${client.lastname}</td>
          <td class="border border-gray-300 p-2">${client.email}</td>
          <td class="border border-gray-300 p-2">${client.phone}</td>
          <td class="border border-gray-300 p-2">${client.created_at}</td>
          <td class="border border-gray-300 p-2 flex justify-center gap-4">
            <button class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 edit-button" data-id="${client.id}">
              <i class="fas fa-edit"></i>
            </button>
            <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 delete-button" data-id="${client.id}">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>`;
        clientTable.appendChild(row);
      });

      document.getElementById("totalclient").textContent = data.users.length;
      document.getElementById("totaldocument").textContent = data.totalDocuments;
      document.getElementById("totalrecipent").textContent = data.totalRecipients;

      document.querySelectorAll(".delete-button").forEach((button) =>
        button.addEventListener("click", () => {
          const clientId = button.getAttribute("data-id");
          deleteUser(clientId);
        })

      );
      document.querySelectorAll(".edit-button").forEach((button) => {
  button.addEventListener("click", () => {
    const userId = button.getAttribute("data-id");
    const routeUrl = `{{ route('user.details', ':id') }}`.replace(':id', userId);
    window.location.href = routeUrl;
  });
});

    })
    .catch((error) => console.error("Error fetching users:", error));
}

// Delete User
function deleteUser(clientId) {
  if (confirm("Are you sure you want to delete this user?")) {
    fetch(`/api/users/${clientId}`, {
      method: "DELETE",
      headers: {
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
      },
    })
      .then((response) => {
        if (response.ok) {
          alert("User deleted successfully.");
          fetchUsers(); // Refresh user table
        } else {
          alert("Failed to delete user.");
        }
      })
      .catch((error) => console.error("Error deleting user:", error));
  }
}
    </script>
  </body>
</html>
