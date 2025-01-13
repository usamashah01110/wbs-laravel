<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
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
            src="{{ asset('images/usere.png') }}"
            alt="Profile"
            class="w-8 h-8 rounded-full"
          />
          <span class="font-bold text-white">Josh Mikula</span>
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
              <span class="sidebar-text">Logout</span>
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
              <p class="text-gray-800 text-2xl mt-2">1,245</p>
            </div>
            <div
              class="bg-[#E2E8F0] p-6 rounded-lg shadow hover:shadow-lg transition"
            >
              <h2 class="text-gray-600 font-bold">Total Documents</h2>
              <p class="text-gray-800 text-2xl mt-2">3,678</p>
            </div>
            <div
              class="bg-[#E2E8F0] p-6 rounded-lg shadow hover:shadow-lg transition"
            >
              <h2 class="text-gray-600 font-bold">Total Recipients</h2>
              <p class="text-gray-800 text-2xl mt-2">567</p>
            </div>
          </section>

          <!-- Table -->
          <section class="mt-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-gray-700 font-bold mb-4">Clients</h2>
            <div class="overflow-auto h-72">
              <table class="w-full border-collapse border border-gray-200">
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
                <tbody id="clientTable">
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
            src="{{ asset('images/usere.png') }}"
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

            <div
              id="profileFields"
              class="grid grid-cols-1 md:grid-cols-2 gap-4"
            >
              <div>
                <label class="block text-gray-600">First Name</label>
                <input
                  type="text"
                  id="firstName"
                  class="w-full p-2 border border-gray-300 rounded-lg"
                  disabled
                />
              </div>
              <div>
                <label class="block text-gray-600">Last Name</label>
                <input
                  type="text"
                  id="lastName"
                  class="w-full p-2 border border-gray-300 rounded-lg"
                  disabled
                />
              </div>
              <div>
                <label class="block text-gray-600">Email</label>
                <input
                  type="email"
                  id="email"
                  class="w-full p-2 border border-gray-300 rounded-lg"
                  disabled
                />
              </div>
              <div>
                <label class="block text-gray-600">Phone Number</label>
                <input
                  type="text"
                  id="phoneNumber"
                  class="w-full p-2 border border-gray-300 rounded-lg"
                  disabled
                />
              </div>
              <div>
                <label class="block text-gray-600">Gender</label>
                <select
                  id="gender"
                  class="w-full p-2 border border-gray-300 rounded-lg"
                  disabled
                >
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div>
                <label class="block text-gray-600">Country</label>
                <input
                  type="text"
                  id="country"
                  class="w-full p-2 border border-gray-300 rounded-lg"
                  disabled
                />
              </div>
              <div>
                <label class="block text-gray-600">Date of Birth</label>
                <input
                  type="date"
                  id="dob"
                  class="w-full p-2 border border-gray-300 rounded-lg"
                  disabled
                />
              </div>
            </div>
            <div class="text-right mt-6">
              <button
                id="editProfileButton"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg"
              >
                Edit
              </button>
            </div>
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
            src="{{ asset('images/usere.png') }}"
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
                <div
                  class="border-2 border-dashed border-gray-300 rounded h-40 flex flex-col items-center justify-center text-gray-500 cursor-pointer p-5"
                  onclick="document.getElementById('willUpload').click()"
                >
                  <i class="fas fa-plus"></i>
                  <p>Click to upload Will Document</p>
                  <input
                    type="file"
                    id="willUpload"
                    accept=".pdf,.doc,.docx"
                    class="hidden"
                    onchange="handleDocumentUpload('willDocuments')"
                  />
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
                <div
                  class="border-2 border-dashed border-gray-300 rounded h-40 flex flex-col items-center justify-center text-gray-500 cursor-pointer p-5"
                  onclick="document.getElementById('powerUpload').click()"
                >
                  <i class="fas fa-plus"></i>
                  <p>Click to upload Power of Attorney Document</p>
                  <input
                    type="file"
                    id="powerUpload"
                    accept=".pdf,.doc,.docx"
                    class="hidden"
                    onchange="handleDocumentUpload('powerDocuments')"
                  />
                </div>
              </div>

              <!-- User Recipient Table -->
              <div>
                <h2 class="text-lg font-bold text-gray-700 mb-4">
                  Recipient Details
                </h2>
                <table class="w-full border-collapse border border-gray-300">
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
                    </tr>
                  </thead>
                  <tbody id="recipientTable">
                    <!-- Recipient rows will be added dynamically -->
                  </tbody>
                </table>
                <div class="mt-4">
                  <button
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg"
                    onclick="addRecipientRow()"
                  >
                    Add Recipient
                  </button>
                </div>
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
        // Dashboard
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
const dashboardLink = document.getElementById("dashboardLink");
const myAccountLink = document.getElementById("myAccountLink");

function switchTab(show, hide) {
  hide.classList.remove("active");
  setTimeout(() => {
    hide.classList.add("hidden");
    show.classList.remove("hidden");
    setTimeout(() => show.classList.add("active"), 10);
  }, 300);
}

dashboardLink.addEventListener("click", () => {
  switchTab(dashboardContent, myAccountSection);
});

myAccountLink.addEventListener("click", () => {
  switchTab(myAccountSection, dashboardContent);
});

// Edit profile functionality
const editProfileImage = document.getElementById("editProfileImage");
const fileInput = document.getElementById("fileInput");
const profileImage = document.getElementById("profileImage");
const editProfileButton = document.getElementById("editProfileButton");
const profileFields = document.querySelectorAll(
  "#profileFields input, #profileFields select"
);

editProfileImage.addEventListener("click", () => fileInput.click());

fileInput.addEventListener("change", (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      profileImage.src = reader.result;
    };
    reader.readAsDataURL(file);
  }
});

editProfileButton.addEventListener("click", () => {
  const isEditing = editProfileButton.textContent === "Edit";
  profileFields.forEach((field) => (field.disabled = !isEditing));
  editProfileButton.textContent = isEditing ? "Save" : "Edit";

  if (!isEditing) {
    // Save functionality - logic to save changes
    showToast("Profile updated successfully!");
  }

  // Show Toast

  function showToast(message, type = "success") {
    const toastContainer = document.getElementById("toastContainer");

    // Create the toast element
    const toast = document.createElement("div");
    toast.classList.add("toast", type);
    toast.textContent = message;

    // Append the toast to the container
    toastContainer.appendChild(toast);

    // Automatically remove the toast after the animation is complete
    setTimeout(() => {
      toastContainer.removeChild(toast);
    }, 3000); // Toast duration: 3 seconds
  }
});

const clients = [
  {
    id: 1,
    firstName: "Alice",
    lastName: "Johnson",
    email: "alice.johnson@example.com",
    mobile: "123-456-7890",
    joiningDate: "2023-01-15",
  },
  {
    id: 2,
    firstName: "Bob",
    lastName: "Smith",
    email: "bob.smith@example.com",
    mobile: "234-567-8901",
    joiningDate: "2023-02-20",
  },
  {
    id: 3,
    firstName: "Charlie",
    lastName: "Brown",
    email: "charlie.brown@example.com",
    mobile: "345-678-9012",
    joiningDate: "2023-03-10",
  },
  {
    id: 4,
    firstName: "Diana",
    lastName: "Williams",
    email: "diana.williams@example.com",
    mobile: "456-789-0123",
    joiningDate: "2023-04-25",
  },
  {
    id: 5,
    firstName: "Evan",
    lastName: "Davis",
    email: "evan.davis@example.com",
    mobile: "567-890-1234",
    joiningDate: "2023-05-30",
  },
  {
    id: 5,
    firstName: "Evan",
    lastName: "Davis",
    email: "evan.davis@example.com",
    mobile: "567-890-1234",
    joiningDate: "2023-05-30",
  },
  {
    id: 5,
    firstName: "Evan",
    lastName: "Davis",
    email: "evan.davis@example.com",
    mobile: "567-890-1234",
    joiningDate: "2023-05-30",
  },
  {
    id: 5,
    firstName: "Evan",
    lastName: "Davis",
    email: "evan.davis@example.com",
    mobile: "567-890-1234",
    joiningDate: "2023-05-30",
  },
];

const clientTable = document.getElementById("clientTable");

clients.forEach((client) => {
  const row = document.createElement("tr");
  row.innerHTML = `<td class="border border-gray-300 p-2">${client.id}</td>
    <td class="border border-gray-300 p-2">${client.firstName}</td>
    <td class="border border-gray-300 p-2">${client.lastName}</td>
    <td class="border border-gray-300 p-2">${client.email}</td>
    <td class="border border-gray-300 p-2">${client.mobile}</td>
    <td class="border border-gray-300 p-2">${client.joiningDate}</td>
    <td class="border border-gray-300 p-2 items-center flex justify-center gap-4">
      <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
<i class="fas fa-eye"></i>
</button>
<button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
<i class="fas fa-trash-alt"></i></button>
    </td>`;
  clientTable.appendChild(row);
});
    </script>
  </body>
</html>
