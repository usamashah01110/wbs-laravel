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
    <div class="text-center bg-[#3A5F8F] text-white py-2 rounded mb-6">
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
                        class="bg-[#3A5F8F] text-white px-3 py-1 rounded hover:bg-[#F4A261] transition-all duration-300"
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
                        class="bg-[#3A5F8F] text-white px-4 py-2 rounded hover:bg-[#F4A261]"
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
                        class="bg-[#3A5F8F] text-white px-4 py-2 rounded hover:bg-[#F4A261]"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Dasboard End -->

<!-- Contact Start -->
<section id="contact" class="py-10 bg-gray-100">
    <div class="container">
        <div class="grid lg:grid-cols-3 gap-6 items-center">
            <!-- Contact Info -->
            <div>
                <div>
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950 mb-6">Contact Us</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-semibold mt-4 text-gray-800">Your Questions, Our Support</h2>
                <!-- Address, Email, Phone, etc. -->
                <!-- This section remains unchanged -->
            </div>

            <!-- Form Section -->
            <div class="lg:col-span-2 lg:ms-24">
                <div class="p-8 md:p-12 rounded-lg shadow-xl bg-white border border-gray-200">
                    <form id="contactForm">
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="formFirstName" class="block text-sm font-semibold text-black mb-2">First Name</label>
                                <input type="text" class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary" id="formFirstName" placeholder="Your first name..." required />
                            </div>

                            <div>
                                <label for="formLastName" class="block text-sm font-semibold text-black mb-2">Last Name</label>
                                <input type="text" class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary" id="formLastName" placeholder="Your last name..." required />
                            </div>

                            <div>
                                <label for="formEmail" class="block text-sm font-semibold text-black mb-2">Email Address</label>
                                <input type="email" class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary" id="formEmail" placeholder="Your email..." required />
                            </div>

                            <div>
                                <label for="formPhone" class="block text-sm font-semibold text-black mb-2">Phone Number</label>
                                <input type="text" class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary" id="formPhone" placeholder="Your phone number..." required />
                            </div>

                            <div class="sm:col-span-2">
                                <div class="mb-4">
                                    <label for="formMessages" class="block text-sm font-semibold text-black mb-2">Message</label>
                                    <textarea class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary" id="formMessages" rows="4" placeholder="Your message..." required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="py-3 px-8 rounded-md text-white text-base font-medium bg-gradient-to-r from-[#F4A261] to-[#3A5F8F] hover:bg-gradient-to-r hover:from-[#3A5F8F] hover:to-[#F4A261] transition-all duration-300 ease-in-out">
                                Send Message <i class="mdi mdi-send ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact End -->

<!-- Footer Start -->
<footer class="bg-[#3A5F8F]">
    <div class="container">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 py-4">
            <div class="col-span-full lg:col-span-2">
                <div class="max-w-2xl mx-auto">
                    <div class="flex items-center">
                        <img
                            src="{{ asset('images/WBS-Logo.png') }}"
                            alt=""
                            class="h-10 me-5"
                        />
                    </div>
                    <p class="text-gray-300 max-w-xs mt-6">
                        Will Be Sent is a proud subsidary of
                        <a herf="" target="blank" href="https://arvoequities.com"
                        >Arvo Equities.</a
                        >
                    </p>
                </div>

                <div class="mt-6 grid space-y-3">
                    <a
                        class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300"
                        href="#"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-mail"
                        >
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                        Help@WillBeSent.com
                    </a>

                    <a
                        class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300"
                        href="#"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-phone"
                        >
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                            />
                        </svg>
                        + 1 (833) 462 2786
                    </a>
                </div>
            </div>

            <div class="col-span-1">
                <h4 class="font-semibold text-gray-100 uppercase">Pages</h4>

                <div class="mt-6 grid space-y-3">
                    <p>
                        <a
                            class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="#"
                        >Services</a
                        >
                    </p>
                    <p>
                        <a
                            class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="#"
                        >Pricing</a
                        >
                    </p>
                    <p>
                        <a
                            class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="#"
                        >Reviews</a
                        >
                    </p>
                    <p>
                        <a
                            class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="#"
                        >Blog</a
                        >
                    </p>
                    <p>
                        <a
                            class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="#"
                        >Contact</a
                        >
                    </p>
                </div>
            </div>
            <div class="col-span-1">
                <h4 class="font-semibold text-gray-100 uppercase">Policies</h4>

                <div class="mt-6 grid space-y-3">
                    <p>
                        <a
                            class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="#"
                        >Privacy Policy</a
                        >
                    </p>
                    <p>
                        <a
                            class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="#"
                        >Terms & Conditions</a
                        >
                    </p>
                    <p>
                        <a
                            class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="#"
                        >Arvo Equities</a
                        >
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-[#F4A261]">
        <!-- 1B283F -->
        <div class="container">
            <div class="flex justify-between items-center">
                <p class="text-base text-white">
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    © Will Be Sent. <a href="willbesent.com">All Rights Reserved.</a>
                </p>

                <div class="flex gap-2">
                    <a
                        class="p-2 text-sm font-semibold rounded-md text-white hover:bg-[#3A5F8F] transition-all duration-300"
                        href="#"
                    >
                        <svg
                            class="flex-shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                            />
                        </svg>
                    </a>
                    <a
                        class="p-2 text-sm font-semibold rounded-md text-white hover:bg-[#3A5F8F] transition-all duration-300"
                        href="#"
                    >
                        <svg
                            class="flex-shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"
                            />
                        </svg>
                    </a>
                    <a
                        class="p-2 text-sm font-semibold rounded-md text-white hover:bg-[#3A5F8F] transition-all duration-300"
                        href="#"
                    >
                        <svg
                            class="flex-shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

      <div
        id="toastContainer"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 space-y-2 z-50"
      ></div>
    </div>
</footer>
<!-- Footer End -->
      <!-- Toast Notifications -->
      <div
        id="toastContainer"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 space-y-2 z-50"
      ></div>
    </div>
<!-- Js -->
<script>


    fetchDocuments();
    fetchAttorny();


     function uploadDocumentAjax(input) {
          const fullWill = {{ Auth::user()->subscriptions[0]['fullWill'] ?? 0 }};

    if (fullWill !== 1) {
        showToast("You don't have a subscription plan.", 'error');
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
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
        })
            .then(response => response.json())
            .then(response => {
                if (response.success) {
                    displayUploadedDocument(data.fileName, data.fileUrl);
                } else {
                    fetchDocuments();
                }
            })
            .catch(() => alert("An error occurred during the upload."));
    }



   function uploadDocumentAjax(input) {
    const file = input.files[0];
    if (!file) return;

    const fullWill = {{ Auth::user()->subscriptions[0]['fullWill'] ?? 0 }};

    if (fullWill !== 1) {
        showToast("You don't have a subscription plan.", 'error');
        return;
    }

    const formData = new FormData();
    formData.append("document", file);
    formData.append("document_type", 'will');

    // Send AJAX request
    fetch("/documents", {
        method: "POST",
        body: formData,
        headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        },
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                displayUploadedDocument(data.fileName, data.fileUrl);
            } else {
                // alert(data.message || "Document upload failed.");
                fetchDocuments();
            }
        })
        .catch(() => alert("An error occurred during the upload."));
}



  function uploadAttornyAjax(input) {
        const file = input.files[0];
        if (!file) return;

            const fullWill = {{ Auth::user()->subscriptions[0]['fullWill'] ?? 0 }};
    const poa = {{ Auth::user()->subscriptions[0]['poa'] ?? 0 }};
    const executor = {{ Auth::user()->subscriptions[0]['executor'] ?? 0 }};

    // Check conditions before uploading
    if (fullWill !== 1 || poa !== 1 || executor !== 1) {
        showToast("You need a valid subscription plan to upload this document.", 'error');
        return;
    }

        const formData = new FormData();
        formData.append("document", file);
        formData.append("document_type", 'attorny');

        // Send AJAX request
        fetch("/documents", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayUploadedDocument(data.fileName, data.fileUrl);
                } else {
                    // alert(data.message || "Document upload failed.");
                    fetchAttorny();                  }
            })
            .catch(() => alert("An error occurred during the upload."));
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
        await fetch(`/documents/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        fetchDocuments();
        fetchAttorny();
    }

    let currentListId = "";
    let editingIndex = null;
    fetchRecipients();
    fetchAttornyRecipients();

    function openattPopup(listId, index = null, id =  null) {
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
        currentListId = "";  // Reset listId
        editingIndex = null;  // Reset editing index
    }

    document
        .getElementById("popupAttornyForm")
        .addEventListener("submit", function (e) {
            e.preventDefault();

            const name = this.recipientName.value;
            const mobile = this.recipientMobile.value;
            const email = this.recipientEmail.value;

            const list = document.getElementById(currentListId);
            const recipientData = {
                name: name,
                mobile: mobile,
                email: email,
                type: 'attorny'
            };

            // Check if we're editing an existing item
            const url = editingIndex !== null ? `/recipients/update/${editingIndex}` : '/recipients/store';
            const method = editingIndex !== null ? 'PUT' : 'POST';

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Ensure CSRF protection
                },
                body: JSON.stringify(recipientData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success === true) {
                        closePopup();
                        window.location.reload();
                    } else {
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving recipient data!');
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
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Ensure CSRF protection
            },
        })
            .then(response => response.json())
            .then(data => {
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
                    } else {
                        alert('Failed to delete recipient.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the recipient!');
                });
        }
    }






    function openPopup(listId, index = null, id =  null) {
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
            const id = item.querySelector(".recipient-email").innerText;

            form.recipientName.value = name;
            form.recipientMobile.value = mobile;
            form.recipientEmail.value = email;
        } else {
            form.reset();
        }
        popupModal.classList.remove("hidden");
    }

    function closePopup() {
        document.getElementById("popupModal").classList.add("hidden");
        currentListId = "";  // Reset listId
        editingIndex = null;  // Reset editing index
    }

    document
        .getElementById("popupForm")
        .addEventListener("submit", function (e) {
            e.preventDefault();

            const name = this.recipientName.value;
            const mobile = this.recipientMobile.value;
            const email = this.recipientEmail.value;

            const list = document.getElementById(currentListId);
            const recipientData = {
                name: name,
                mobile: mobile,
                email: email,
                type: 'will'
            };

            // Check if we're editing an existing item
            const url = editingIndex !== null ? `/recipients/update/${editingIndex}` : '/recipients/store';
            const method = editingIndex !== null ? 'PUT' : 'POST';

            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Ensure CSRF protection
                },
                body: JSON.stringify(recipientData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success === true) {
                        closePopup();
                        window.location.reload();
                    } else {
                        alert('Failed to save recipient data!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving recipient data!');
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
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Ensure CSRF protection
            },
        })
            .then(response => response.json())
            .then(data => {
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
                    } else {
                        alert('Failed to delete recipient.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the recipient!');
                });
        }
    }

    // Dropdown toggle
    const dropdownButton = document.getElementById("dropdownButton");
    const dropdownMenu = document.getElementById("dropdownMenu");
    dropdownButton.addEventListener("click", () => {
        dropdownMenu.classList.toggle("hidden");
    });



    document.getElementById('contactForm').addEventListener('submit', function (e) {
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
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // For CSRF protection
            },
            body: JSON.stringify(formData)
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Your message has been sent successfully!');
                    document.getElementById('contactForm').reset();
                } else {
                    alert('There was an issue sending your message. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to send the message. Please try again later.');
            });
    });

    function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `p-3 rounded shadow-md text-white ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}`;
            toast.innerText = message;
            document.getElementById('toastContainer').appendChild(toast);
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

</script>
</body>
</html>
