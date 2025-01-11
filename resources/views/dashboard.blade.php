<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WBS | Will Be Sent</title>
    <meta name="description" content="willbesent" />
    <meta name="keywords" content="willbesent" />
    <meta name="author" content="willbesent" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- favicon -->
    <link href="{{ asset('image/WBS-Logo.png') }}" rel="shortcut icon" />
    <!-- Main Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body>
    <!-- Navbar Start -->
    <header
      class="bg-[#F4A261] shadow-lg px-6 py-4 flex justify-between items-center"
    >
      <div class="flex items-center">
        <img 
        src="{{ asset('images/WBS-Logo.png') }}" alt="Profile" class="h-14" />
      </div>
      <div class="relative">
        <button id="dropdownButton" class="flex items-center gap-2 transition">
          <img
              src="{{ asset('images/user.png') }}"
            alt="Profile"
            class="w-8 h-8 rounded-full"
          />
          <span class="font-medium text-gray-100">Josh</span>
        </button>
        <!-- Dropdown -->
        <div
          id="dropdownMenu"
          class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden"
        >
          <!-- <a
            href="#"
            id="myAccountLink"
            class="block px-4 py-2 hover:bg-gray-200"
            >My Account</a
          > -->
          <a
            href="#"
            class="block px-4 py-2 hover:bg-gray-200 text-red-500 transition-all duration-300"
          >
            <i class="fas fa-sign-out-alt text-red-500"></i> Logout</a
          >
        </div>
      </div>
    </header>

    <!-- Dasboard Start -->
    <section class="bg-[#E2E8F0] p-6">
      <!-- Welcome Section -->
      <div class="text-center bg-[#3A5F8F] text-white py-4 rounded mb-6">
        <h1 class="text-xl font-semibold">Welcome back, Josh</h1>
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
                onchange="handleDocumentUpload('willDocuments')"
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
                onchange="handleDocumentUpload('poaDocuments')"
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
                onclick="openPopup('poaRecipients')"
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
                class="bg-blue-500 text-white px-4 py-2 rounded"
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
    <section id="contact" class="py-20 bg-gray-100">
      <div class="container">
        <div class="grid lg:grid-cols-3 gap-6 items-center">
          <!-- Contact Info -->
          <div>
            <div>
              <span
                class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950 mb-6"
                >Contact Us</span
              >
            </div>
            <h2 class="text-3xl md:text-4xl font-semibold mt-4 text-gray-800">
              Your Questions, Our Support
            </h2>

            <div
              class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10"
            >
              <div
                class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center"
              >
                <i data-lucide="map-pin" class="text-2xl text-primary"></i>
              </div>
              <div>
                <h5 class="text-base text-muted font-medium mb-1">
                  255 South Orange Avenue, Suite 104 - 1715, Orlando, FL 32801
                </h5>
                <a
                  href="#"
                  class="text-xs text-primary font-bold uppercase hover:text-primaryDark"
                  >Address</a
                >
              </div>
            </div>

            <div
              class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10"
            >
              <div
                class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center"
              >
                <i data-lucide="mail" class="text-2xl text-primary"></i>
              </div>
              <div>
                <h5 class="text-base text-muted font-medium mb-1">
                  Help@WillBeSent.com
                </h5>
                <a
                  href="#"
                  class="text-xs text-primary font-bold uppercase hover:text-primaryDark"
                  >Email</a
                >
              </div>
            </div>

            <div
              class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10"
            >
              <div
                class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center"
              >
                <i data-lucide="smartphone" class="text-2xl text-primary"></i>
              </div>
              <div>
                <h5 class="text-base text-muted font-medium mb-1">
                  +1 (833) 462-2786
                </h5>
                <a
                  href="#"
                  class="text-xs text-primary font-bold uppercase hover:text-primaryDark"
                  >Phone</a
                >
              </div>
            </div>
          </div>

          <!-- Form Section -->
          <div class="lg:col-span-2 lg:ms-24">
            <div
              class="p-8 md:p-12 rounded-lg shadow-xl bg-white border border-gray-200"
            >
              <form>
                <div class="grid sm:grid-cols-2 gap-6">
                  <div>
                    <label
                      for="formFirstName"
                      class="block text-sm font-semibold text-black mb-2"
                      >First Name</label
                    >
                    <input
                      type="text"
                      class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary"
                      id="formFirstName"
                      placeholder="Your first name..."
                      required
                    />
                  </div>

                  <div>
                    <label
                      for="formLastName"
                      class="block text-sm font-semibold text-black mb-2"
                      >Last Name</label
                    >
                    <input
                      type="text"
                      class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary"
                      id="formLastName"
                      placeholder="Your last name..."
                      required
                    />
                  </div>

                  <div>
                    <label
                      for="formEmail"
                      class="block text-sm font-semibold text-black mb-2"
                      >Email Address</label
                    >
                    <input
                      type="email"
                      class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary"
                      id="formEmail"
                      placeholder="Your email..."
                      required
                    />
                  </div>

                  <div>
                    <label
                      for="formPhone"
                      class="block text-sm font-semibold text-black mb-2"
                      >Phone Number</label
                    >
                    <input
                      type="text"
                      class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary"
                      id="formPhone"
                      placeholder="Your phone number..."
                      required
                    />
                  </div>

                  <div class="sm:col-span-2">
                    <div class="mb-4">
                      <label
                        for="formMessages"
                        class="block text-sm font-semibold text-black mb-2"
                        >Message</label
                      >
                      <textarea
                        class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-gray-300 focus:ring-primary"
                        id="formMessages"
                        rows="4"
                        placeholder="Your message..."
                        required
                      ></textarea>
                    </div>
                  </div>
                </div>
                <div class="mt-6">
                  <button
                    type="submit"
                    class="py-3 px-8 rounded-md text-white text-base font-medium bg-gradient-to-r from-[#F4A261] to-[#3A5F8F] hover:bg-gradient-to-r hover:from-[#3A5F8F] hover:to-[#F4A261] transition-all duration-300 ease-in-out"
                  >
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
      </div>
    </footer>
    <!-- Footer End -->

    <!-- Js -->
    <script>
      let currentListId = "";
      let editingIndex = null;

      function handleDocumentUpload(containerId) {
        const input = event.target;
        const container = document.getElementById(containerId);
        const file = input.files[0];

        if (file) {
          const fileUrl = URL.createObjectURL(file);
          const div = document.createElement("div");
          div.className =
            "flex items-center justify-between bg-gray-100 p-2 rounded";
          div.innerHTML = `
              <p class="truncate w-3/4">${file.name}</p>
              <button class="text-blue-500" onclick="showDetails('${fileUrl}')">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-green-500" onclick="downloadFile('${fileUrl}')">
               <i class="fas fa-download"></i>
              </button>
              <button class="text-red-500" onclick="this.parentElement.remove()">
                <i class="fas fa-trash-alt"></i>
              </button>

            `;
          container.appendChild(div);
          input.value = "";
        }
      }
      function showDetails(fileUrl) {
        window.open(fileUrl, "_blank");
      }
      function downloadFile(fileUrl) {
        const link = document.createElement("a");
        link.href = fileUrl;
        link.download = fileUrl.split("/").pop(); // Extract the filename from the URL and set it as the download name
        link.click(); // Trigger the download
      }

      function openPopup(listId, index = null) {
        currentListId = listId;
        editingIndex = index;
        const popupModal = document.getElementById("popupModal");
        const form = document.getElementById("popupForm");
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
        document.getElementById("popupModal").classList.add("hidden");
        currentListId = "";
        editingIndex = null;
      }

      document
        .getElementById("popupForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();
          const name = this.recipientName.value;
          const mobile = this.recipientMobile.value;
          const email = this.recipientEmail.value;

          const list = document.getElementById(currentListId);
          if (editingIndex !== null) {
            const item = list.children[editingIndex];
            item.querySelector(".recipient-name").innerText = name;
            item.querySelector(".recipient-mobile").innerText = mobile;
            item.querySelector(".recipient-email").innerText = email;
          } else {
            const li = document.createElement("li");
            li.className =
              "flex items-center justify-between space-x-2 bg-gray-100 p-2 rounded";
            li.innerHTML = `
              <div>
                <p class="recipient-name font-semibold">${name}</p>
                <p class="recipient-mobile text-sm text-gray-600">${mobile}</p>
                <p class="recipient-email text-sm text-gray-600">${email}</p>
              </div>
              <div class="space-x-2">
                <button class="text-blue-500" onclick="openPopup('${currentListId}', ${list.children.length})"><i class="fas fa-edit"></i></button>
                <button class="text-red-500" onclick="deleteRecipient('${currentListId}', ${list.children.length})"><i class="fas fa-trash-alt"></i></button>
              </div>
            `;
            list.appendChild(li);
          }
          closePopup();
        });

      function deleteRecipient(listId, index) {
        const list = document.getElementById(listId);
        list.removeChild(list.children[index]);
      }

      // Dropdown toggle
      const dropdownButton = document.getElementById("dropdownButton");
      const dropdownMenu = document.getElementById("dropdownMenu");
      dropdownButton.addEventListener("click", () => {
        dropdownMenu.classList.toggle("hidden");
      });
    </script>
  </body>
</html>
