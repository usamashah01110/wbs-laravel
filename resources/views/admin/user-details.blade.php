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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="bg-gray-100 min-h-screen font-sans">
    <!-- Header -->
    @include('components.header')
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('components.side-bar')
        <!-- Main Content -->
        <div class="w-full overflow-y-auto">
            <main class="flex-1 p-6">
                <section class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-start gap-6">
                            <div class="relative">
                                <img id="profileImage"
                                    src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/user.png') }}"
                                    alt="Profile" class="w-24 h-24 rounded-full object-cover border-2 border-gray-200" />
                                <label for="fileInput" class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow cursor-pointer">
                                    <i class="fas fa-camera text-gray-600"></i>
                                </label>
                                <input type="file" id="fileInput" class="hidden" accept="image/*" />
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 w-full">
                                <div class="col-span-2">
                                    <h2 class="text-2xl font-semibold mb-4">User Information</h2>
                                </div>
                                <div class="mb-3">
                                    <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input type="text" id="firstname" name="firstname" value="{{ $user->firstname }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mb-3">
                                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" value="{{ $user->lastname }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <input type="text" id="phone" name="phone" value="{{ $user->phone }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mb-3">
                                    <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                                    <input type="text" id="street" name="street" value="{{ $user->street }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" id="city" name="city" value="{{ $user->city }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mb-3">
                                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                    <input type="text" id="state" name="state" value="{{ $user->state }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="mb-3">
                                    <label for="zip" class="block text-sm font-medium text-gray-700">ZIP</label>
                                    <input type="text" id="zip" name="zip" value="{{ $user->zip }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div class="col-span-2 flex gap-3">
                                    <button id="updateUserInfo" class="bg-[#415a77] text-white px-4 py-2 rounded hover:bg-[#1B263B] transition-all duration-300">
                                        Update Information
                                    </button>
                                    <button id="deleteUserBtn" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-all duration-300">
                                        Delete User
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Subscription Details -->
                        <div class="flex gap-4">
                            <div class="bg-white p-4 rounded-lg shadow w-64">
                                <h3 class="text-lg font-semibold mb-2">Subscription Status</h3>
                                <p class="font-semibold {{ $user->subscription_status == 'active' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ ucfirst('Active') }}
                                </p>
                                @if ($user->subscriptions)
                                    <div class="mt-4">
                                        <ul id="packageFeatures" class="list-disc pl-6 space-y-2">
                                            <li class="text-gray-800">
                                                {{ isset($user->subscriptions[0]) && isset($user->subscriptions[0]->fullWill) && $user->subscriptions[0]->fullWill == '1' ? 'Full will Subscription' : 'No active full will' }}
                                            </li>
                                            <li class="text-gray-800">
                                                {{ isset($user->subscriptions[0]) && isset($user->subscriptions[0]->poa) && $user->subscriptions[0]->poa == '1' ? 'Power of Attorney Subscription' : 'No active Power of Attorney' }}
                                            </li>
                                            <li class="text-gray-800">
                                                {{ isset($user->subscriptions[0]) && isset($user->subscriptions[0]->executor) && $user->subscriptions[0]->executor == '1' ? 'Executor Subscription' : 'No active Executor Subscription' }}
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <p class="text-gray-500 mt-2">No active subscription</p>
                                @endif
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow w-64">
                                <h3 class="text-lg font-semibold mb-2">Onetime Packages</h3>
                                <p
                                    class="font-semibold {{ isset($user->transactions) && $user->transactions->first() && $user->transactions->first()->stripe_status == 'succeeded' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ ucfirst(isset($user->transactions) && $user->transactions->first() && $user->transactions->first()->stripe_status == 'succeeded' ? 'Active' : 'Inactive') }}
                                </p>

                                @if ($user->transactions)
                                    <div class="mt-4">
                                        <ul id="packageFeatures" class="list-disc pl-6 space-y-2">
                                            <li class="text-gray-800">
                                                {{ isset($user->transactions->first()->notarization) && $user->transactions->first()->notarization == '1' ? 'Notarization Package' : 'No Notarization Package' }}
                                            </li>
                                            <li class="text-gray-800">
                                                {{ isset($user->transactions->first()->winterwill) && $user->transactions->first()->winterwill == '1' ? 'Writer Will Package' : 'No Winter Package' }}
                                            </li>
                                            <li class="text-gray-800">
                                                {{ isset($user->transactions->first()->layer) && $user->transactions->first()->layer == '1' ? 'Lawyer Draft Will Package' : 'No lawyer Package' }}
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <p class="text-gray-500 mt-2">No active packages</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Main Grid Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <!-- Will Documents Section -->
                        <div class="bg-white p-6 rounded shadow">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">Will Documents</h2>
                                <div class="border-2 border-dashed border-gray-300 rounded p-2 flex items-center justify-center text-gray-500 cursor-pointer"
                                    onclick="document.getElementById('willUpload').click()">
                                    <i class="fas fa-plus mr-2"></i>
                                    <span>Upload Will</span>
                                    <input type="file" id="willUpload" accept=".pdf,.doc,.docx" class="hidden"
                                        onchange="uploadDocumentAjax(this, 'will')" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-4 pt-2">
                                @forelse ($user->documents->where('documnet_type', 'will') as $doc)
                                    <div class="flex items-center justify-between bg-gray-100 p-3 rounded">
                                        <p class="truncate w-3/4">{{ $doc->name }}</p>
                                        <div class="flex items-center gap-3">
                                            <a href="{{ asset('storage/' . $doc->path) }}" class="text-green-500 hover:text-green-700"
                                                target="_blank" download>
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="{{ asset('storage/' . $doc->path) }}" class="text-blue-500 hover:text-blue-700"
                                                target="_blank" onclick="viewDocument('{{ $doc->path }}')">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="text-red-500 hover:text-red-700" 
                                                onclick="deleteDocument({{ $doc->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500">No will documents found</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Will Recipients Section -->
                        <div class="bg-white p-6 rounded shadow">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">Will Recipients</h2>
                                <button
                                    class="bg-[#415a77] text-white px-3 py-1 rounded hover:bg-[#f47d61] transition-all duration-300"
                                    onclick="openPopup('will-popup', 'will')">
                                    <i class="fas fa-plus mr-1"></i> Add Recipient
                                </button>
                            </div>
                            
                            <div class="space-y-4">
                                @forelse ($user->recipients->where('type', 'will') as $recipient)
                                    <div class="bg-gray-100 p-3 rounded shadow relative group">
                                        <div class="absolute right-2 top-2 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button class="text-blue-500 hover:text-blue-700 editRecipient" data-id="{{ $recipient->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-500 hover:text-red-700" onclick="deleteRecipient({{ $recipient->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <p class="recipient-name font-semibold">{{ $recipient->name ?? 'N/A' }}</p>
                                        <p class="recipient-mobile text-sm text-gray-600">{{ $recipient->mobile ?? 'N/A' }}</p>
                                        <p class="recipient-email text-sm text-gray-600">{{ $recipient->email ?? 'N/A' }}</p>
                                        <p class="recipient-address text-sm text-gray-600">
                                            {{ $recipient->street ?? '' }}{{ $recipient->street ? ',' : '' }}
                                            {{ $recipient->city ?? 'N/A' }},
                                            {{ $recipient->state ?? 'N/A' }}, {{ $recipient->zip ?? 'N/A' }}
                                        </p>
                                    </div>
                                @empty
                                    <p class="text-gray-500">No will recipients found</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Power of Attorney Documents -->
                        <div class="bg-white p-6 rounded shadow">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">Power of Attorney Documents</h2>
                                <div class="border-2 border-dashed border-gray-300 rounded p-2 flex items-center justify-center text-gray-500 cursor-pointer"
                                    onclick="document.getElementById('poaUpload').click()">
                                    <i class="fas fa-plus mr-2"></i>
                                    <span>Upload POA</span>
                                    <input type="file" id="poaUpload" accept=".pdf,.doc,.docx" class="hidden"
                                        onchange="uploadDocumentAjax(this, 'attorny')" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-4 pt-2">
                                @forelse ($user->documents->where('documnet_type', 'attorny') as $doc)
                                    <div class="flex items-center justify-between bg-gray-100 p-3 rounded">
                                        <p class="truncate w-3/4">{{ $doc->name }}</p>
                                        <div class="flex items-center gap-3">
                                            <a href="{{ asset('storage/' . $doc->path) }}" class="text-green-500 hover:text-green-700"
                                                target="_blank" download>
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="{{ asset('storage/' . $doc->path) }}" class="text-blue-500 hover:text-blue-700"
                                                target="_blank" onclick="viewDocument('{{ $doc->path }}')">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="text-red-500 hover:text-red-700" 
                                                onclick="deleteDocument({{ $doc->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500">No POA documents found</p>
                                @endforelse
                            </div>
                        </div>
                        
                        <!-- Power of Attorney Recipients -->
                        <div class="bg-white p-6 rounded shadow">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">Power of Attorney Recipients</h2>
                                <button
                                    class="bg-[#415a77] text-white px-3 py-1 rounded hover:bg-[#f47d61] transition-all duration-300"
                                    onclick="openPopup('attorny-popup', 'attorny')">
                                    <i class="fas fa-plus mr-1"></i> Add Recipient
                                </button>
                            </div>
                            
                            <div class="space-y-4">
                                @forelse ($user->recipients->where('type', 'attorny') as $recipient)
                                    <div class="bg-gray-100 p-3 rounded shadow relative group">
                                        <div class="absolute right-2 top-2 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button class="text-blue-500 hover:text-blue-700 editRecipient" data-id="{{ $recipient->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-500 hover:text-red-700" onclick="deleteRecipient({{ $recipient->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <p class="recipient-name font-semibold">{{ $recipient->name ?? 'N/A' }}</p>
                                        <p class="recipient-mobile text-sm text-gray-600">{{ $recipient->mobile ?? 'N/A' }}</p>
                                        <p class="recipient-email text-sm text-gray-600">{{ $recipient->email ?? 'N/A' }}</p>
                                        <p class="recipient-address text-sm text-gray-600">
                                            {{ $recipient->street ?? '' }}{{ $recipient->street ? ',' : '' }}
                                            {{ $recipient->city ?? 'N/A' }},
                                            {{ $recipient->state ?? 'N/A' }}, {{ $recipient->zip ?? 'N/A' }}
                                        </p>
                                    </div>
                                @empty
                                    <p class="text-gray-500">No POA recipients found</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Add/Edit Recipient Modal -->
    <div id="popupModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold" id="modalTitle">Add Recipient</h2>
                <button class="text-gray-500 hover:text-gray-700" onclick="closePopup()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="recipientForm">
                <input type="hidden" id="recipientId" name="id" value="">
                <input type="hidden" id="recipientType" name="type" value="">
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-3">
                        <label for="recipientFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="recipientFirstName" name="first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="recipientLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="recipientLastName" name="last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="recipientEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="recipientEmail" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="recipientMobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                        <input type="text" id="recipientMobile" name="mobile" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-3 col-span-2">
                        <label for="recipientStreet" class="block text-sm font-medium text-gray-700">Street</label>
                        <input type="text" id="recipientStreet" name="street" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="recipientCity" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" id="recipientCity" name="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="recipientState" class="block text-sm font-medium text-gray-700">State</label>
                        <input type="text" id="recipientState" name="state" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="recipientZip" class="block text-sm font-medium text-gray-700">ZIP</label>
                        <input type="text" id="recipientZip" name="zip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition-all duration-300" onclick="closePopup()">
                        Cancel
                    </button>
                    <button type="submit" class="bg-[#415a77] text-white px-4 py-2 rounded hover:bg-[#1B263B] transition-all duration-300">
                        Save Recipient
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete User Confirmation Modal -->
    <div id="deleteUserModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-red-600">Delete User</h2>
                <button class="text-gray-500 hover:text-gray-700" onclick="closeDeleteModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mb-6">
                <p class="text-gray-700">Are you sure you want to delete this user? This action cannot be undone.</p>
                <p class="font-semibold mt-2">{{ $user->firstname }} {{ $user->lastname }} ({{ $user->email }})</p>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition-all duration-300" onclick="closeDeleteModal()">
                    Cancel
                </button>
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-all duration-300" onclick="confirmDeleteUser()">
                    Delete User
                </button>
            </div>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loader" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-5 rounded-lg flex items-center">
            <svg class="animate-spin h-8 w-8 text-[#415a77] mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Processing...</span>
        </div>
    </div>

    <!-- Toast Container -->
    <div id="toastContainer" class="fixed top-4 right-4 space-y-2 z-50"></div>

    <script>
        // Sidebar Toggle Functionality
        document.getElementById("sidebarToggle").addEventListener("click", () => {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("w-48");
            sidebar.classList.toggle("w-16");

            document
                .getElementById("toggleArrow")
                .classList.toggle("rotate-180");

            document
                .querySelectorAll(".sidebar-text")
                .forEach((text) => text.classList.toggle("hidden"));
        });

        // Profile Image Upload
        document.getElementById("fileInput").addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                showLoader();
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
                        hideLoader();
                        if (data.profile_image) {
                            document.getElementById("profileImage").src = data.profile_image;
                            showToast("Profile image updated successfully");
                        } else {
                            showToast("Failed to update profile image", "error");
                        }
                    })
                    .catch(() => {
                        hideLoader();
                        showToast("Error uploading image", "error");
                    });
            }
        });

        // Update User Information
        document.getElementById("updateUserInfo").addEventListener("click", () => {
            const userData = {
                firstname: document.getElementById("firstname").value,
                lastname: document.getElementById("lastname").value,
                email: document.getElementById("email").value,
                phone: document.getElementById("phone").value,
                street: document.getElementById("street").value,
                city: document.getElementById("city").value,
                state: document.getElementById("state").value,
                zip: document.getElementById("zip").value
            };
            
            showLoader();
            fetch("/admin/users/{{ $user->id }}", {
                method: "PUT",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(userData)
            })
            .then(response => response.json())
            .then(data => {
                hideLoader();
                if (data.success) {
                    showToast("User information updated successfully");
                } else {
                    showToast(data.message || "Failed to update user information", "error");
                }
            })
            .catch(error => {
                hideLoader();
                showToast("An error occurred while updating user information", "error");
            });
        });

        // Document functions
        function viewDocument(path) {
            window.open(`/storage/${path}`, "_blank");
        }

    </script>
</body>
    
</html>