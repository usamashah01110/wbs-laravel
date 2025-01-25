<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment - WBS</title>
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-[#3A5F8F] px-6 text-white shadow-md">
      <div class="container mx-auto flex justify-between items-center">
        <img src="../assets/images/WBS-Logo.png" alt="WBS Logo" class="h-10" />
        <h1 class="text-xl font-semibold">Payment</h1>
      </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto my-8 px-6 grid md:grid-cols-2 gap-6">
      <!-- Illustration Section -->
      <section
        class="hidden md:flex items-center justify-center bg-white shadow-lg rounded-lg p-8"
      >
        <img
          src="../../assets/images/payment.jpg"
          alt="Payment Illustration"
          class="w-3/4"
        />
      </section>

      <!-- Payment Form Section -->
      <section class="bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">
          Payment Details
        </h2>
        <form id="paymentForm" class="space-y-6">
          <!-- Full Name -->
          <div>
            <label
              for="fullName"
              class="block text-sm font-medium text-gray-700 mb-2"
            >
              Full Name
            </label>
            <input
              type="text"
              id="fullName"
              placeholder="Enter your full name"
              class="w-full border border-gray-300 rounded-lg py-3 px-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#3A5F8F] focus:border-transparent"
            />
          </div>

          <!-- Email -->
          <div>
            <label
              for="email"
              class="block text-sm font-medium text-gray-700 mb-2"
            >
              Email Address
            </label>
            <input
              type="email"
              id="email"
              placeholder="Enter your email"
              class="w-full border border-gray-300 rounded-lg py-3 px-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#3A5F8F] focus:border-transparent"
            />
          </div>

          <!-- Card Number -->
          <div>
            <label
              for="cardNumber"
              class="block text-sm font-medium text-gray-700 mb-2"
            >
              Card Number
            </label>
            <input
              type="text"
              id="cardNumber"
              placeholder="1234 5678 9123 4567"
              class="w-full border border-gray-300 rounded-lg py-3 px-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#3A5F8F] focus:border-transparent"
            />
          </div>

          <!-- Expiry Date and CVV -->
          <div class="grid md:grid-cols-2 gap-4">
            <div>
              <label
                for="expiryDate"
                class="block text-sm font-medium text-gray-700 mb-2"
              >
                Expiry Date
              </label>
              <input
                type="text"
                id="expiryDate"
                placeholder="MM/YY"
                class="w-full border border-gray-300 rounded-lg py-3 px-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#3A5F8F] focus:border-transparent"
              />
            </div>
            <div>
              <label
                for="cvv"
                class="block text-sm font-medium text-gray-700 mb-2"
              >
                CVV
              </label>
              <input
                type="text"
                id="cvv"
                placeholder="123"
                class="w-full border border-gray-300 rounded-lg py-3 px-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#3A5F8F] focus:border-transparent"
              />
            </div>
          </div>

          <!-- Total Amount -->
          <div
            class="flex justify-between items-center bg-gray-50 p-4 rounded-lg shadow-sm border"
          >
            <span class="text-gray-700 font-medium">Total Amount:</span>
            <span class="text-xl font-bold text-gray-800"
              >$<span id="totalAmount">0</span></span
            >
          </div>

          <!-- Pay Button -->
          <button
            type="button"
            onclick="processPayment()"
            class="w-full bg-[#3A5F8F] text-white py-3 rounded-lg hover:bg-[#F4A261] transition-all duration-300"
          >
            Pay Now
          </button>
        </form>
      </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[#3A5F8F] text-white py-4">
      <div class="container mx-auto text-center">
        <p>
          ©
          <script>
            document.write(new Date().getFullYear());
          </script>
          Will Be Sent. All Rights Reserved.
        </p>
      </div>
    </footer>

    <script>
      // Script for Payment
      function processPayment() {
        const fullName = document.getElementById("fullName").value;
        const email = document.getElementById("email").value;
        const cardNumber = document.getElementById("cardNumber").value;
        const expiryDate = document.getElementById("expiryDate").value;
        const cvv = document.getElementById("cvv").value;

        if (!fullName || !email || !cardNumber || !expiryDate || !cvv) {
          alert("Please fill in all the details.");
          return;
        }

        alert(`Payment successful for ${fullName} with the total amount $0.`);
        // Add payment processing logic here.
      }
    </script>
  </body>
</html>
