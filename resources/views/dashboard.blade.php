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
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- favicon -->
         <link rel="icon" href="{{ asset('images/WBS-Logo.png') }}" type="image/png">
    <!-- Main Css -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<!-- Navbar Start -->
@include('user-header')
<!-- Dasboard Start -->
<section class="bg-[#E2E8F0] p-6">
    <!-- Welcome Section -->
    <div class="text-center bg-[#415a77] text-white py-2 rounded mb-6">
        <h1 class="text-xl font-semibold">Welcome back, {{ Auth::user()->firstname }} {{ Auth::user()->lastname  }}</h1>
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
                        class="bg-[#415a77] text-white px-3 py-1 rounded hover:bg-[#f47d61] transition-all duration-300"
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
                <div
                    class="border-2 border-dashed border-gray-300 rounded h-40 flex flex-col items-center justify-center text-gray-500 cursor-pointer w-1/4 p-4"
                    onclick="document.getElementById('poaUpload').click()"
                >
                    <i class="fas fa-plus"></i>
                    <p>Click to upload.</p>
                    <p class="text-sm">Must be a Word or PDF document.</p>
                    <input
                        type="file"
                        id="poaUpload"
                        accept=".pdf,.doc,.docx"
                        class="hidden"
                        onchange="uploadAttornyAjax(this)"
                    />
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
                        onclick="openattPopup('poaRecipients')"
                    >
                        +
                    </button>
                    <p>Click here to add recipient</p>
                </li>
            </ul>
        </div>
    </div>

    <!-- Popup Modal -->
    <div
        id="popupModal"
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden"
    >
        <div class="bg-white rounded shadow p-6 w-80">
            <h3 class="text-lg font-semibold mb-4">Add Recipient</h3>
            <form id="popupForm" class="space-y-4">
                <div>
                    <label for="recipientName" class="block text-sm font-medium"
                    >Name</label
                    >
                    <input
                        type="text"
                        id="recipientName"
                        class="w-full border border-gray-300 rounded p-2"
                        required
                    />
                </div>
                <div>
                    <label for="recipientMobile" class="block text-sm font-medium"
                    >Mobile Number</label
                    >
                    <input
                        type="text"
                        id="recipientMobile"
                        class="w-full border border-gray-300 rounded p-2"
                        required
                    />
                </div>
                <div>
                    <label for="recipientEmail" class="block text-sm font-medium"
                    >Email</label
                    >
                    <input
                        type="email"
                        id="recipientEmail"
                        class="w-full border border-gray-300 rounded p-2"
                        required
                    />
                </div>
                <div class="flex justify-end space-x-4">
                    <button
                        type="button"
                        class="bg-gray-300 px-4 py-2 rounded"
                        onclick="closePopup()"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="bg-[#415a77] text-white px-4 py-2 rounded hover:bg-[#f47d61]"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div
        id="popattoronyModal"
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden"
    >
        <div class="bg-white rounded shadow p-6 w-80">
            <h3 class="text-lg font-semibold mb-4">Add Recipient</h3>
            <form id="popupAttornyForm" class="space-y-4">
                <div>
                    <label for="recipientName" class="block text-sm font-medium"
                    >Name</label
                    >
                    <input
                        type="text"
                        id="recipientName"
                        class="w-full border border-gray-300 rounded p-2"
                        required
                    />
                </div>
                <div>
                    <label for="recipientMobile" class="block text-sm font-medium"
                    >Mobile Number</label
                    >
                    <input
                        type="text"
                        id="recipientMobile"
                        class="w-full border border-gray-300 rounded p-2"
                        required
                    />
                </div>
                <div>
                    <label for="recipientEmail" class="block text-sm font-medium"
                    >Email</label
                    >
                    <input
                        type="email"
                        id="recipientEmail"
                        class="w-full border border-gray-300 rounded p-2"
                        required
                    />
                </div>
                <div class="flex justify-end space-x-4">
                    <button
                        type="button"
                        class="bg-gray-300 px-4 py-2 rounded"
                        onclick="closePopup()"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="bg-[#415a77] text-white px-4 py-2 rounded hover:bg-[#f47d61]"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Dasboard End -->

@include('footer')
@include('toast')

<script>
    fetchDocuments();
    fetchAttorny();

    function uploadDocumentAjax(input) {
        const fullWill = {{ Auth::user()->subscriptions[0]['fullWill'] ?? 0 }};

        if (fullWill !== 1) {
            showToast("You don't have a subscription plan.", "error");
            return;
        }

        const file = input.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append("document", file);

        // Send AJAX request
        fetch("/documents", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    displayUploadedDocument(data.fileName, data.fileUrl);
                } else {
                    fetchDocuments();
                }
            })
            .catch(() => {
                showToast("An error occurred during the upload.");
            });
    }

    function uploadDocumentAjax(input) {
        const file = input.files[0];
        if (!file) return;

        const fullWill = {{ Auth::user()->subscriptions[0]['fullWill'] ?? 0 }};

        if (fullWill !== 1) {
            showToast("You don't have a subscription plan.", "error");
            return;
        }

        const formData = new FormData();
        formData.append("document", file);
        formData.append("document_type", "will");

        // Send AJAX request
        fetch("/documents", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                if (data.success) {
                    displayUploadedDocument(data.fileName, data.fileUrl);
                } else {
                    fetchDocuments();
                }
            })
            .catch(() => {
                showToast("An error occurred during the upload.");
            });
    }

    function uploadAttornyAjax(input) {
        const file = input.files[0];
        if (!file) return;

        const fullWill = {{ Auth::user()->subscriptions[0]['fullWill'] ?? 0 }};
        const poa = {{ Auth::user()->subscriptions[0]['poa'] ?? 0 }};
        const executor = {{ Auth::user()->subscriptions[0]['executor'] ?? 0 }};

        // Check conditions before uploading
        if (fullWill !== 1 || poa !== 1 || executor !== 1) {
            showToast(
                "You need a valid subscription plan to upload this document.",
                "error"
            );
            return;
        }

        const formData = new FormData();
        formData.append("document", file);
        formData.append("document_type", "attorny");

        // Send AJAX request
        fetch("/documents", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    displayUploadedDocument(data.fileName, data.fileUrl);
                } else {
                    fetchAttorny();
                }
            })
            .catch(() => {
                showToast("An error occurred during the upload.");
            });
    }

    async function fetchDocuments() {
        const response = await fetch("/all/documents");
        const documents = await response.json();

        const container = document.getElementById("willDocuments");
        container.innerHTML = "";

        documents.forEach((doc) => {
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
        const response = await fetch("/all/attorny/documents");
        const documents = await response.json();

        const container = document.getElementById("poaDocuments");
        container.innerHTML = "";

        documents.forEach((doc) => {
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
        await fetch(`/documents/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
        });

        fetchDocuments();
        fetchAttorny();
    }

    // Initialize recipient fetch
    let currentListId = "";
    let editingIndex = null;
    fetchRecipients();
    fetchAttornyRecipients();

    function openattPopup(listId, index = null, id = null) {
        currentListId = listId;
        editingIndex = id;

        const popupModal = document.getElementById("popattoronyModal");
        const form = document.getElementById("popupAttornyForm");

        if (index !== null) {
            const list = document.getElementById(listId);
            const item = list.children[index];

            const name = item.querySelector(".recipient-name").innerText;
            const mobile = item.querySelector(".recipient-mobile").innerText;
            const email = item.querySelector(".recipient-email").innerText;

            form.recipientName.value = name;
            form.recipientMobile.value = mobile;
            form.recipientEmail.value = email;
        } else {
            form.reset();
        }

        popupModal.classList.remove("hidden");
    }

    function closePopup() {
        document.getElementById("popattoronyModal").classList.add("hidden");
        currentListId = ""; // Reset listId
        editingIndex = null; // Reset editing index
    }

    document.getElementById("popupAttornyForm").addEventListener("submit", function (e) {
        e.preventDefault();

        const name = this.recipientName.value;
        const mobile = this.recipientMobile.value;
        const email = this.recipientEmail.value;

        const recipientData = {
            name: name,
            mobile: mobile,
            email: email,
            type: "attorny",
        };

        // Check if we're editing an existing item
        const url =
            editingIndex !== null ? `/recipients/update/${editingIndex}` : "/recipients/store";
        const method = editingIndex !== null ? "PUT" : "POST";

        fetch(url, {
            method: method,
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"), // Ensure CSRF protection
            },
            body: JSON.stringify(recipientData),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success === true) {
                    closePopup();
                    window.location.reload();
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                showToast("An error occurred while saving recipient data!");
            });
    });

    async function fetchAttornyRecipients() {
        const list = document.getElementById("poaRecipients");

        if (!list) {
            console.error("List element with id " + currentListId + " not found.");
            return;
        }

        try {
            const response = await fetch("/recipients/att/list", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
            });

            const data = await response.json();
            list.innerHTML = ""; // Clear existing list

            if (data.success && data.recipients.length > 0) {
                data.recipients.forEach((recipient, index) => {
                    const li = document.createElement("li");
                    li.className = "flex items-center justify-between space-x-2 bg-gray-100 p-2 rounded";
                    li.innerHTML = `
                        <div>
                            <p class="recipient-name font-semibold">${recipient.name}</p>
                            <p class="recipient-mobile text-sm text-gray-600">${recipient.mobile}</p>
                            <p class="recipient-email text-sm text-gray-600">${recipient.email}</p>
                        </div>
                        <div class="space-x-2">
                            <button class="text-blue-500" onclick="openattPopup('poaRecipients', ${index}, ${recipient.id})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-500" onclick="deleteattRecipient('poaRecipients', ${recipient.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    `;
                    list.appendChild(li);
                });
            } else {
                console.log("No recipients found.");
            }
        } catch (error) {
            console.error("Error fetching recipients:", error);
        }
    }

    async function deleteattRecipient(listId, recipientId) {
        if (!confirm("Are you sure you want to delete this recipient?")) return;

        try {
            const response = await fetch(`/recipients/delete/${recipientId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
            });

            const data = await response.json();

            if (data.success) {
                window.location.reload();
            } else {
                showToast("Failed to delete recipient.");
            }
        } catch (error) {
            console.error("Error:", error);
            showToast("An error occurred while deleting the recipient!");
        }
    }

    function openPopup(listId, index = null, id = null) {
        currentListId = listId;
        editingIndex = id;
        const popupModal = document.getElementById("popupModal");
        const form = document.getElementById("popupForm");

        if (index !== null) {
            const list = document.getElementById(listId);
            const item = list.children[index];

            form.recipientName.value = item.querySelector(".recipient-name").innerText;
            form.recipientMobile.value = item.querySelector(".recipient-mobile").innerText;
            form.recipientEmail.value = item.querySelector(".recipient-email").innerText;
        } else {
            form.reset();
        }

        popupModal.classList.remove("hidden");
    }

    function closePopup() {
        document.getElementById("popupModal").classList.add("hidden");
        currentListId = "";
        editingIndex = null;
    }

    document.getElementById("popupForm").addEventListener("submit", async function (e) {
        e.preventDefault();

        const name = this.recipientName.value;
        const mobile = this.recipientMobile.value;
        const email = this.recipientEmail.value;

        const recipientData = {
            name,
            mobile,
            email,
            type: "will",
        };

        const url = editingIndex !== null ? `/recipients/update/${editingIndex}` : "/recipients/store";
        const method = editingIndex !== null ? "PUT" : "POST";

        try {
            const response = await fetch(url, {
                method,
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: JSON.stringify(recipientData),
            });

            const data = await response.json();

            if (data.success) {
                closePopup();
                window.location.reload();
            } else {
                showToast("Failed to save recipient data!");
            }
        } catch (error) {
            console.error("Error:", error);
            showToast("An error occurred while saving recipient data!");
        }
    });

    async function fetchRecipients() {
        const list = document.getElementById("willRecipients");

        if (!list) {
            console.error("List element with id " + currentListId + " not found.");
            return;
        }

        try {
            const response = await fetch("/recipients/list", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
            });

            const data = await response.json();
            list.innerHTML = ""; // Clear existing list

            if (data.success && data.recipients.length > 0) {
                data.recipients.forEach((recipient, index) => {
                    const li = document.createElement("li");
                    li.className = "flex items-center justify-between space-x-2 bg-gray-100 p-2 rounded";
                    li.innerHTML = `
                        <div>
                            <p class="recipient-name font-semibold">${recipient.name}</p>
                            <p class="recipient-mobile text-sm text-gray-600">${recipient.mobile}</p>
                            <p class="recipient-email text-sm text-gray-600">${recipient.email}</p>
                        </div>
                        <div class="space-x-2">
                            <button class="text-blue-500" onclick="openPopup('willRecipients', ${index}, ${recipient.id})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-500" onclick="deleteRecipient('willRecipients', ${recipient.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    `;
                    list.appendChild(li);
                });
            } else {
                console.log("No recipients found.");
            }
        } catch (error) {
            console.error("Error fetching recipients:", error);
        }
    }

    async function deleteRecipient(listId, recipientId) {
        if (!confirm("Are you sure you want to delete this recipient?")) return;

        try {
            const response = await fetch(`/recipients/delete/${recipientId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
            });

            const data = await response.json();

            if (data.success) {
                window.location.reload();
            } else {
                showToast("Failed to delete recipient.");
            }
        } catch (error) {
            console.error("Error:", error);
            showToast("An error occurred while deleting the recipient!");
        }
    }

    document.getElementById("contactForm").addEventListener("submit", async function (e) {
        e.preventDefault(); // Prevent normal form submission

        const formData = {
            firstName: document.getElementById("formFirstName").value,
            lastName: document.getElementById("formLastName").value,
            email: document.getElementById("formEmail").value,
            phone: document.getElementById("formPhone").value,
            message: document.getElementById("formMessages").value,
        };

        try {
            const response = await fetch("/send-email", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: JSON.stringify(formData),
            });

            const data = await response.json();

            if (data.success) {
                showToast("Your message has been sent successfully!");
                document.getElementById("contactForm").reset();
            } else {
                showToast("There was an issue sending your message. Please try again.");
            }
        } catch (error) {
            console.error("Error:", error);
            showToast("Failed to send the message. Please try again later.");
        }
    });

</script>
</body>
</html>
