<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WBS | Dashboard</title>
    <meta name="description" content="willbesent" />
    <meta name="keywords" content="willbesent" />
    <meta name="author" content="willbesent" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/WBS-Logo.png') }}" type="image/png">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @include('user-header')

    <!-- Dasboard Start -->
    <section class="bg-[#E2E8F0] p-6">
        <!-- Welcome Section -->
        <div class="text-center bg-[#415a77] text-white py-2 rounded mb-6">
            <h1 class="text-xl font-semibold">Welcome back, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
            </h1>
            <button id="press">click</button>
        </div>
        <!-- Main Grid Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Loader -->
            <div id="loader" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center">
                <div class="w-16 h-16 border-4 border-white border-t-blue-500 rounded-full animate-spin"></div>
            </div>
            <!-- First Row -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-lg font-semibold">Will</h2>
                <div class="flex gap-4 pt-4">
                    <div class="border-2 border-dashed border-gray-300 rounded h-40 flex flex-col items-center justify-center text-gray-500 cursor-pointer w-1/4 p-4"
                        onclick="document.getElementById('willUpload').click()">
                        <i class="fas fa-plus"></i>
                        <p>Click to upload.</p>
                        <p class="text-sm">Must be a Word or PDF document.</p>
                        <input type="file" id="willUpload" accept=".pdf,.doc,.docx" class="hidden"
                            onchange="uploadDocumentAjax(this)" />
                    </div>
                    <div id="willDocuments" class="space-y-2 w-3/4"></div>
                </div>
            </div>

            <div class="bg-white p-6 rounded shadow space-y-4">
                <h2 class="text-lg font-semibold">Will Recipients</h2>
                <ul id="willRecipients" class="space-y-2">
                    <li class="flex items-center space-x-2">
                        <button
                            class="bg-[#415a77] text-white px-3 py-1 rounded hover:bg-[#f47d61] transition-all duration-300"
                            onclick="openPopup('willRecipients')">
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
                    <div class="border-2 border-dashed border-gray-300 rounded h-40 flex flex-col items-center justify-center text-gray-500 cursor-pointer w-1/4 p-4"
                        onclick="document.getElementById('poaUpload').click()">
                        <i class="fas fa-plus"></i>
                        <p>Click to upload.</p>
                        <p class="text-sm">Must be a Word or PDF document.</p>
                        <input type="file" id="poaUpload" accept=".pdf,.doc,.docx" class="hidden"
                            onchange="uploadAttornyAjax(this)" />
                    </div>
                    <div id="poaDocuments" class="space-y-2 w-3/4"></div>
                </div>
            </div>

            <div class="bg-white p-6 rounded shadow space-y-4">
                <h2 class="text-lg font-semibold">Power of Attorney Recipients</h2>
                <ul id="poaRecipients" class="space-y-2">
                    <li class="flex items-center space-x-2">
                        <button
                            class="bg-[#415a77] text-white px-3 py-1 rounded hover:bg-[#f47d61] transition-all duration-300"
                            onclick="openattPopup('poaRecipients')">
                            +
                        </button>
                        <p>Click here to add recipient</p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Popup Modal -->
        <div id="popupModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Add Recipient</h3>
                <form id="popupForm" class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="recipientFirstName" class="block text-sm font-medium text-gray-700">First
                            Name</label>
                        <input type="text" id="recipientFirstName"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="recipientLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="recipientLastName"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="recipientMobile" class="block text-sm font-medium text-gray-700">Mobile
                            Number</label>
                        <input type="text" id="recipientMobile"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="recipientEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="recipientEmail"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="recipientState" class="block text-sm font-medium text-gray-700">State</label>
                        <input type="text" id="recipientState"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="recipientZip" class="block text-sm font-medium text-gray-700">Zip</label>
                        <input type="text" id="recipientZip"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div class="col-span-2">
                        <label for="recipientCity" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" id="recipientCity"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div class="col-span-2 flex justify-end space-x-4 mt-4">
                        <button type="button"
                            class="bg-gray-300 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-400"
                            onclick="closePopup()">Cancel</button>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="popattoronyModal"
            class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Add Power of Attorney Recipient</h3>
                <form id="popupAttornyForm" class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="attRecipientFirstName" class="block text-sm font-medium text-gray-700">First
                            Name</label>
                        <input type="text" id="attRecipientFirstName"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="attRecipientLastName" class="block text-sm font-medium text-gray-700">Last
                            Name</label>
                        <input type="text" id="attRecipientLastName"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="attRecipientMobile" class="block text-sm font-medium text-gray-700">Mobile
                            Number</label>
                        <input type="text" id="attRecipientMobile"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="attRecipientEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="attRecipientEmail"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="attRecipientState" class="block text-sm font-medium text-gray-700">State</label>
                        <input type="text" id="attRecipientState"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div>
                        <label for="attRecipientZip" class="block text-sm font-medium text-gray-700">Zip</label>
                        <input type="text" id="attRecipientZip"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div class="col-span-2">
                        <label for="attRecipientCity" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" id="attRecipientCity"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                    </div>
                    <div class="col-span-2 flex justify-end space-x-4 mt-4">
                        <button type="button"
                            class="bg-gray-300 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-400"
                            onclick="closePopupPOA()">Cancel</button>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- Dasboard End -->

    @include('footer')
    @include('toast')
    @include('popup')

    <script>
        fetchDocuments();
        fetchAttorny();


        function uploadDocumentAjax(input) {
            const file = input.files[0];
            const loader = document.getElementById("loader");
            if (!file) return;
            const fullWill = {{ Auth::user()->subscriptions[0]['fullWill'] ?? 0 }};

            if (fullWill !== 1) {
                openPopupSub("You don't have a subscription plan.", 'error');
                return;
            }

            const formData = new FormData();
            formData.append("document", file);
            formData.append("document_type", 'will');
            loader.classList.remove("hidden");

            // Send AJAX request
            fetch("/documents", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                }).then(response => response.text()) // Use text() if unsure about response format
                .then(text => {
                    try {
                        const data = JSON.parse(text);
                        if (data.success) {
                            loader.classList.add("hidden");
                            window.location.reload();
                        } else {
                            showToast(data.message || "Document upload failed.");
                            loader.classList.add("hidden");
                        }
                    } catch {
                        showToast("Unexpected response format.");
                        loader.classList.add("hidden");
                    }
                })
        }



        function uploadAttornyAjax(input) {
            const file = input.files[0];
            if (!file) return;

            const fullWill = {{ Auth::user()->subscriptions[0]['fullWill'] ?? 0 }};
            const poa = {{ Auth::user()->subscriptions[0]['poa'] ?? 0 }};
            const executor = {{ Auth::user()->subscriptions[0]['executor'] ?? 0 }};


            if (fullWill !== 1 || poa !== 1) {
                showToast("You need a valid subscription plan to upload this document.", 'error');
                return;
            }

            const formData = new FormData();
            formData.append("document", file);
            formData.append("document_type", 'attorny');
            loader.classList.remove("hidden");
            // Send AJAX request
            fetch("/documents", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                }).then(response => response.text()) // Use text() if unsure about response format
                .then(text => {
                    try {
                        const data = JSON.parse(text);
                        if (data.success) {
                            window.location.reload();
                            loader.classList.add("hidden");
                        } else {
                            showToast(data.message || "Document upload failed.");
                            loader.classList.add("hidden");
                        }
                    } catch {
                        showToast("Unexpected response format.");
                        loader.classList.add("hidden");
                    }
                })
        }
        async function fetchDocuments() {
            const response = await fetch('/all/documents');
            const documents = await response.json();

            const container = document.getElementById("willDocuments");
            container.innerHTML = "";

            documents.forEach(doc => {
                const div = document.createElement("div");
                div.className = "flex items-center justify-between bg-gray-100 p-2 rounded";
                div.innerHTML = `
                <p class="truncate w-3/4">${doc.name}</p>
                <button class="text-blue-500" onclick="viewDocument('${doc.path}')">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="text-red-500" onclick="deleteDocument(${doc.id})">
                    <i class="fas fa-trash-alt"></i>
                </button>
            `;
                container.appendChild(div);
            });
        }

        async function fetchAttorny() {
            const response = await fetch('/all/attorny/documents');
            const documents = await response.json();

            const container = document.getElementById("poaDocuments");
            container.innerHTML = "";

            documents.forEach(doc => {
                const div = document.createElement("div");
                div.className = "flex items-center justify-between bg-gray-100 p-2 rounded";
                div.innerHTML = `
                <p class="truncate w-3/4">${doc.name}</p>
                <button class="text-blue-500" onclick="viewDocument('${doc.path}')">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="text-red-500" onclick="deleteDocument(${doc.id})">
                    <i class="fas fa-trash-alt"></i>
                </button>
            `;
                container.appendChild(div);
            });
        }

        function viewDocument(path) {
            window.open(`/storage/${path}`, "_blank");
        }

        async function deleteDocument(id) {
            loader.classList.remove("hidden");
            await fetch(`/documents/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            fetchDocuments();
            fetchAttorny();
            loader.classList.add("hidden");
            showToast("Deleted successfully");
        }

        let currentListId = "";
        let editingIndex = null;
        fetchRecipients();
        fetchAttornyRecipients();

        function openattPopup(listId, index = null, id = null) {
            currentListId = listId;
            editingIndex = id;
            updateId = id;
            const popupModal = document.getElementById("popattoronyModal");
            const form = document.getElementById("popupAttornyForm");

            if (index !== null) {
                const list = document.getElementById(listId);
                const item = list.children[index];
                const name = item.querySelector(".recipient-name").innerText;
                const mobile = item.querySelector(".recipient-mobile").innerText;
                const email = item.querySelector(".recipient-email").innerText;
                const id = item.querySelector(".recipient-email").innerText;

                form.recipientFirstName.value = name;
                form.recipientMobile.value = mobile;
                form.recipientEmail.value = email;
            } else {
                form.reset();
            }
            popupModal.classList.remove("hidden");
        }

        function closePopupPOA() {
            document.getElementById("popattoronyModal").classList.add("hidden");
            currentListId = ""; // Reset listId
            editingIndex = null; // Reset editing index
        }

        document.getElementById("popupAttornyForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const firstName = this.attRecipientFirstName.value;
            const lastName = this.attRecipientLastName.value;
            const mobile = this.attRecipientMobile.value;
            const email = this.attRecipientEmail.value;
            const state = this.attRecipientState.value;
            const zip = this.attRecipientZip.value;
            const city = this.attRecipientCity.value;

            const recipientData = {
                first_name: firstName,
                last_name: lastName,
                mobile: mobile,
                email: email,
                state: state,
                zip: zip,
                city: city,
                type: 'attorny'
            };

            // Check if we're editing an existing item
            const url = editingIndex !== null ? `/recipients/update/${editingIndex}` : '/recipients/store';
            const method = editingIndex !== null ? 'PUT' : 'POST';

            fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify(recipientData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success === true) {
                        closePopupPOA();
                        window.location.reload();
                    } else {
                        showToast(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred while saving recipient data!');
                });
        });


        function fetchAttornyRecipients() {
            const list = document.getElementById('poaRecipients');
            console.log('List element with id ' + currentListId + ' not found.');
            if (!list) {
                console.error('List element with id ' + currentListId + ' not found.');
                return;
            }

            fetch('/recipients/att/list', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content') // Ensure CSRF protection
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.recipients.length > 0) {
                        data.recipients.forEach((recipient, index) => {
                            const li = document.createElement("li");
                            li.className =
                                "flex items-center justify-between space-x-2 bg-gray-100 p-2 rounded";
                            li.innerHTML = `
                    <div>
                        <p class="recipient-name font-semibold">${recipient.name}</p>
                        <p class="recipient-mobile text-sm text-gray-600">${recipient.mobile}</p>
                        <p class="recipient-email text-sm text-gray-600">${recipient.email}</p>
                    </div>
                    <div class="space-x-2">
                        <button class="text-blue-500" onclick="openattPopup('willRecipients', ${list.children.length}, ${recipient.id})"><i class="fas fa-edit"></i></button>
                        <button class="text-red-500" onclick="deleteattRecipient('willRecipients', ${recipient.id})"><i class="fas fa-trash-alt"></i></button>
                    </div>
                `;
                            list.appendChild(li);
                        });
                    } else {
                        console.log('No recipients found.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching recipients:', error);

                });
        }

        function deleteattRecipient(listId, index) {
            const list = document.getElementById(listId);
            const item = list.children[index];

            if (confirm('Are you sure you want to delete this recipient?')) {
                fetch(`/recipients/delete/${index}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                            showToast('Delete Successfully');
                        } else {
                            showToast('Failed to delete recipient.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('An error occurred while deleting the recipient!');
                    });
            }
        }






        function openPopup(listId, index = null, id = null) {
            currentListId = listId;
            editingIndex = id;
            updateId = id;
            const popupModal = document.getElementById("popupModal");
            const form = document.getElementById("popupForm");

            if (index !== null) {
                const list = document.getElementById(listId);
                const item = list.children[index];
                const name = item.querySelector(".recipient-name").innerText;
                const mobile = item.querySelector(".recipient-mobile").innerText;
                const email = item.querySelector(".recipient-email").innerText;
                const state = item.querySelector(".recipient-email").innerText;
                const id = item.querySelector(".recipient-email").innerText;

                form.recipientFirstName.value = name;
                form.recipientMobile.value = mobile;
                form.recipientEmail.value = email;
            } else {
                form.reset();
            }
            popupModal.classList.remove("hidden");
        }

        function closePopup() {
            document.getElementById("popupModal").classList.add("hidden");
            currentListId = ""; // Reset listId
            editingIndex = null; // Reset editing index
        }

        document
            .getElementById("popupForm")
            .addEventListener("submit", function(e) {
                e.preventDefault();

                const recipientData = {
                    name: this.recipientFirstName.value + " " + this.recipientLastName.value,
                    mobile: this.recipientMobile.value,
                    email: this.recipientEmail.value,
                    state: this.recipientState.value,
                    zip: this.recipientZip.value,
                    city: this.recipientCity.value,
                    type: 'will'
                };

                // Check if we're editing an existing item
                const url = editingIndex !== null ? `/recipients/update/${editingIndex}` : '/recipients/store';
                const method = editingIndex !== null ? 'PUT' : 'POST';

                fetch(url, {
                        method: method,
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify(recipientData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success === true) {
                            closePopup();
                            window.location.reload();
                        } else {
                            showToast(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('An error occurred while saving recipient data!');
                    });
            });


        function fetchRecipients() {
            const list = document.getElementById('willRecipients');
            console.log('List element with id ' + currentListId + ' not found.');
            // Check if the list exists before proceeding
            if (!list) {
                console.error('List element with id ' + currentListId + ' not found.');
                return;
            }

            fetch('/recipients/list', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content') // Ensure CSRF protection
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.recipients.length > 0) {
                        data.recipients.forEach((recipient, index) => {
                            const li = document.createElement("li");
                            li.className =
                                "flex items-center justify-between space-x-2 bg-gray-100 p-2 rounded";
                            li.innerHTML = `
                    <div>
                        <p class="recipient-name font-semibold">${recipient.name}</p>
                        <p class="recipient-mobile text-sm text-gray-600">${recipient.mobile}</p>
                        <p class="recipient-email text-sm text-gray-600">${recipient.email}</p>
                    </div>
                    <div class="space-x-2">
                        <button class="text-blue-500" onclick="openPopup('willRecipients', ${list.children.length}, ${recipient.id})"><i class="fas fa-edit"></i></button>
                        <button class="text-red-500" onclick="deleteRecipient('willRecipients', ${recipient.id})"><i class="fas fa-trash-alt"></i></button>
                    </div>
                `;
                            list.appendChild(li);
                        });
                    } else {
                        console.log('No recipients found.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching recipients:', error);

                });
        }

        function deleteRecipient(listId, index) {
            const list = document.getElementById(listId);
            const item = list.children[index];

            if (confirm('Are you sure you want to delete this recipient?')) {
                fetch(`/recipients/delete/${index}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                            showToast('Deleted successfully');
                        } else {
                            showToast('Failed to delete recipient.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('An error occurred while deleting the recipient!');
                    });
            }
        }

        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting normally

            const firstName = document.getElementById('formFirstName').value;
            const lastName = document.getElementById('formLastName').value;
            const email = document.getElementById('formEmail').value;
            const phone = document.getElementById('formPhone').value;
            const message = document.getElementById('formMessages').value;

            const formData = {
                firstName: firstName,
                lastName: lastName,
                email: email,
                phone: phone,
                message: message
            };

            fetch('/send-email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content') // For CSRF protection
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Your message has been sent successfully!');
                        document.getElementById('contactForm').reset();
                    } else {
                        showToast('There was an issue sending your message. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Failed to send the message. Please try again later.');
                });
        });
    </script>
</body>

</html>
