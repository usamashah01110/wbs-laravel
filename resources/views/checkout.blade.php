<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout - WBS</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link href="assets/images/WBS-Logo.png" rel="shortcut icon" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-[#3A5F8F] px-6 text-white shadow-md">
      <div class="container mx-auto flex justify-between items-center">
        <img src="{{ asset('images/WBS-Logo.png') }}" alt="WBS Logo" class="h-10" />
        <h1 class="text-xl font-semibold">Checkout</h1>
      </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto my-8 px-6 grid md:grid-cols-2 gap-6">
      <!-- Subscription Section -->
      <section class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
          Customize Your Subscription
        </h2>
        <p class="text-gray-600 mb-6">
          Select the services you want and choose a billing cycle. Each option
          includes detailed features to meet your needs.
        </p>
{{--        <form class="space-y-6" method="GET" action="{{ route('paymentPage') }}">--}}
{{--          <!-- Billing Cycle Selection -->--}}
{{--          <div>--}}
{{--            <h3 class="text-lg font-semibold text-gray-800">--}}
{{--              Choose Billing Cycle--}}
{{--            </h3>--}}
{{--            <div class="flex gap-4 mt-3">--}}
{{--              <label class="flex items-center gap-2">--}}
{{--                <input--}}
{{--                  type="radio"--}}
{{--                  name="billingCycle"--}}
{{--                  value="monthly"--}}
{{--                  class="hidden peer"--}}
{{--                  checked--}}
{{--                />--}}
{{--                <div--}}
{{--                  class="flex items-center justify-center py-2 px-4 border-2 border-gray-300 rounded-lg cursor-pointer text-gray-700 font-medium peer-checked:border-[#3A5F8F] peer-checked:bg-[#3A5F8F] peer-checked:text-white transition-all duration-300"--}}
{{--                >--}}
{{--                  Monthly--}}
{{--                </div>--}}
{{--              </label>--}}
{{--              <label class="flex items-center gap-2">--}}
{{--                <input--}}
{{--                  type="radio"--}}
{{--                  name="billingCycle"--}}
{{--                  value="yearly"--}}
{{--                  class="hidden peer"--}}
{{--                />--}}
{{--                <div--}}
{{--                  class="flex items-center justify-center py-2 px-4 border-2 border-gray-300 rounded-lg cursor-pointer text-gray-700 font-medium peer-checked:border-[#3A5F8F] peer-checked:bg-[#3A5F8F] peer-checked:text-white transition-all duration-300"--}}
{{--                >--}}
{{--                  Yearly--}}
{{--                </div>--}}
{{--              </label>--}}
{{--            </div>--}}
{{--          </div>--}}

{{--          <!-- Subscription Options -->--}}
{{--          <div class="grid md:grid-cols-1 gap-6">--}}
{{--            <label--}}
{{--              class="flex items-start gap-4 border p-4 rounded-lg hover:shadow-lg transition"--}}
{{--            >--}}
{{--              <input--}}
{{--                type="checkbox"--}}
{{--                id="fullWill"--}}
{{--                value="10"--}}
{{--                class="hidden peer"--}}
{{--              />--}}
{{--              <div--}}
{{--                class="w-5 h-5 border-2 border-gray-300 rounded-lg peer-checked:bg-[#3A5F8F] peer-checked:border-[#3A5F8F] transition-all duration-300"--}}
{{--              ></div>--}}
{{--              <div>--}}
{{--                <h3 class="font-semibold">Full Will</h3>--}}
{{--                <p class="text-sm text-gray-500">--}}
{{--                  Create 1 full will and add up to 2 recipients.--}}
{{--                </p>--}}
{{--                <span class="text-gray-700 font-medium"--}}
{{--                  >$10/month or $100/year</span--}}
{{--                >--}}
{{--              </div>--}}
{{--            </label>--}}

{{--            <label--}}
{{--              class="flex items-start gap-4 border p-4 rounded-lg hover:shadow-lg transition"--}}
{{--            >--}}
{{--              <input type="checkbox" id="poa" name="poa" value="1" class="hidden peer" />--}}
{{--              <div--}}
{{--                class="w-5 h-5 border-2 border-gray-300 rounded-lg peer-checked:bg-[#3A5F8F] peer-checked:border-[#3A5F8F] transition-all duration-300"--}}
{{--              ></div>--}}
{{--              <div>--}}
{{--                <h3 class="font-semibold">Power of Attorney (POA)</h3>--}}
{{--                <p class="text-sm text-gray-500">--}}
{{--                  Add a power of attorney document to your plan.--}}
{{--                </p>--}}
{{--                <span class="text-gray-700 font-medium"--}}
{{--                  >+$1/month or $10/year</span--}}
{{--                >--}}
{{--              </div>--}}
{{--            </label>--}}

{{--            <label--}}
{{--              class="flex items-start gap-4 border p-4 rounded-lg hover:shadow-lg transition"--}}
{{--            >--}}
{{--              <input--}}
{{--                type="checkbox"--}}
{{--                id="executor"--}}
{{--                value="1"--}}
{{--                class="hidden peer"--}}
{{--              />--}}
{{--              <div--}}
{{--                class="w-5 h-5 border-2 border-gray-300 rounded-lg peer-checked:bg-[#3A5F8F] peer-checked:border-[#3A5F8F] transition-all duration-300"--}}
{{--              ></div>--}}
{{--              <div>--}}
{{--                <h3 class="font-semibold">Executor of Will</h3>--}}
{{--                <p class="text-sm text-gray-500">--}}
{{--                  Assign an executor to manage your will.--}}
{{--                </p>--}}
{{--                <span class="text-gray-700 font-medium"--}}
{{--                  >+$1/month or $10/year</span--}}
{{--                >--}}
{{--              </div>--}}
{{--            </label>--}}
{{--          </div>--}}

{{--          <!-- Total and Subscribe Button -->--}}
{{--          <div class="text-right">--}}
{{--            <h3 class="text-xl font-semibold">--}}
{{--              Total: $<span id="subscriptionTotal">0</span>--}}
{{--            </h3>--}}
{{--            <button--}}
{{--              type="button"--}}
{{--              class="mt-4 bg-[#3A5F8F] text-white py-2 px-6 rounded-lg hover:bg-[#F4A261] transition-all duration-300"--}}
{{--            >--}}
{{--              Subscribe--}}
{{--            </button>--}}
{{--          </div>--}}
{{--        </form>--}}

          <form
              class="space-y-6"
              method="GET"
              action="{{ route('paymentPage') }}"
          >
              <!-- Billing Cycle Selection -->
              <div>
                  <h3 class="text-lg font-semibold text-gray-800">
                      Choose Billing Cycle
                  </h3>
                  <div class="flex gap-4 mt-3">
                      <label class="flex items-center gap-2">
                          <input
                              type="radio"
                              name="billingCycle"
                              value="monthly"
                              class="hidden peer"
                              checked
                          />
                          <div
                              class="flex items-center justify-center py-2 px-4 border-2 border-gray-300 rounded-lg cursor-pointer text-gray-700 font-medium peer-checked:border-[#3A5F8F] peer-checked:bg-[#3A5F8F] peer-checked:text-white transition-all duration-300"
                          >
                              Monthly
                          </div>
                      </label>
                      <label class="flex items-center gap-2">
                          <input
                              type="radio"
                              name="billingCycle"
                              value="yearly"
                              class="hidden peer"
                          />
                          <div
                              class="flex items-center justify-center py-2 px-4 border-2 border-gray-300 rounded-lg cursor-pointer text-gray-700 font-medium peer-checked:border-[#3A5F8F] peer-checked:bg-[#3A5F8F] peer-checked:text-white transition-all duration-300"
                          >
                              Yearly
                          </div>
                      </label>
                  </div>
              </div>

              <!-- Subscription Options -->
              <div class="grid md:grid-cols-1 gap-6">
                  <label
                      class="flex items-start gap-4 border p-4 rounded-lg hover:shadow-lg transition"
                  >
                      <input
                          type="checkbox"
                          name="subscription[]"
                          value="fullWill,10,100"
                          class="hidden peer"
                          @if(isset(Auth::user()->subscriptions->first()->fullWill) && Auth::user()->subscriptions->first()->fullWill == '1') checked @endif
                      />
                      <div
                          class="w-5 h-5 border-2 border-gray-300 rounded-lg peer-checked:bg-[#3A5F8F] peer-checked:border-[#3A5F8F] transition-all duration-300"
                      ></div>
                      <div>
                          <h3 class="font-semibold">Full Will</h3>
                          <p class="text-sm text-gray-500">
                              Create 1 full will and add up to 2 recipients.
                          </p>
                          <span class="text-gray-700 font-medium"
                          >$10/month or $100/year</span
                          >
                      </div>
                  </label>

                  <label
                      class="flex items-start gap-4 border p-4 rounded-lg hover:shadow-lg transition"
                  >
                      <input
                          type="checkbox"
                          name="subscription[]"
                          value="poa,1,10"
                          class="hidden peer"
                          @if(isset(Auth::user()->subscriptions->first()->poa) && Auth::user()->subscriptions->first()->poa == '1') checked @endif
                      />
                      <div
                          class="w-5 h-5 border-2 border-gray-300 rounded-lg peer-checked:bg-[#3A5F8F] peer-checked:border-[#3A5F8F] transition-all duration-300"
                      ></div>
                      <div>
                          <h3 class="font-semibold">Power of Attorney (POA)</h3>
                          <p class="text-sm text-gray-500">
                              Add a power of attorney document to your plan.
                          </p>
                          <span class="text-gray-700 font-medium"
                          >+$1/month or $10/year</span
                          >
                      </div>
                  </label>

                  <label
                      class="flex items-start gap-4 border p-4 rounded-lg hover:shadow-lg transition"
                  >
                      <input
                          type="checkbox"
                          name="subscription[]"
                          value="executor,1,10"
                          class="hidden peer"
                          @if(isset(Auth::user()->subscriptions->first()->executor) && Auth::user()->subscriptions->first()->executor == '1') checked @endif
                      />
                      <div
                          class="w-5 h-5 border-2 border-gray-300 rounded-lg peer-checked:bg-[#3A5F8F] peer-checked:border-[#3A5F8F] transition-all duration-300"
                      ></div>
                      <div>
                          <h3 class="font-semibold">Executor of Will</h3>
                          <p class="text-sm text-gray-500">
                              Assign an executor to manage your will.
                          </p>
                          <span class="text-gray-700 font-medium"
                          >+$1/month or $10/year</span
                          >
                      </div>
                  </label>
              </div>

              <!-- Hidden Input for Total -->
              <input type="hidden" name="totalAmount" id="totalAmount"/>

              <!-- Total and Subscribe Button -->
              <div class="text-right">
                  <h3 class="text-xl font-semibold">
                      Total: $<span id="subscriptionTotal">0</span>
                  </h3>
                  <button
                      type="submit"
                      class="mt-4 bg-[#3A5F8F] text-white py-2 px-6 rounded-lg hover:bg-[#F4A261] transition-all duration-300"
                  >
                      Subscribe
                  </button>
              </div>
          </form>
      </section>

      <!-- One-Time Payments -->
        <!-- One-Time Payments -->
        <section class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between">
            <form method="GET" action="{{ route('paymentPage') }}">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">
                    One-Time Payments
                </h2>
                <!-- Notarization -->
                <label class="flex items-start gap-4 border rounded-lg p-4 hover:shadow-lg transition">
                    <input
                        type="checkbox"
                        class="hidden peer payment-checkbox"
                        value="25"
                        name="notarization"
                        onchange="updateTotal()"
                    />
                    <div
                        class="w-5 h-5 border-2 border-gray-300 rounded-lg peer-checked:bg-[#3A5F8F] peer-checked:border-[#3A5F8F] transition-all duration-300"
                    ></div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Notarization</h3>
                        <p class="text-sm text-gray-600">
                            Ensure your documents are notarized for $25 per document.
                        </p>
                        <h4 class="text-lg font-semibold mt-2">$25</h4>
                    </div>
                </label>

                <!-- Document Writer Drafted Will -->
                <label class="flex items-start gap-4 border rounded-lg p-4 hover:shadow-lg transition">
                    <input
                        type="checkbox"
                        class="hidden peer payment-checkbox"
                        value="250"
                        name="writerWill"
                        onchange="updateTotal()"
                    />
                    <div
                        class="w-5 h-5 border-2 border-gray-300 rounded-lg peer-checked:bg-[#3A5F8F] peer-checked:border-[#3A5F8F] transition-all duration-300"
                    ></div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">
                            Document Writer Drafted Will
                        </h3>
                        <p class="text-sm text-gray-600">
                            Get a professionally drafted will by a document writer for $250.
                        </p>
                        <h4 class="text-lg font-semibold mt-2">$250</h4>
                    </div>
                </label>

                <!-- Lawyer Drafted Will -->
                <label class="flex items-start gap-4 border rounded-lg p-4 hover:shadow-lg transition">
                    <input
                        type="checkbox"
                        class="hidden peer payment-checkbox"
                        value="450"
                        name="lawyerWill"
                        onchange="updateTotal()"
                    />
                    <div
                        class="w-5 h-5 border-2 border-gray-300 rounded-lg peer-checked:bg-[#3A5F8F] peer-checked:border-[#3A5F8F] transition-all duration-300"
                    ></div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">
                            Lawyer Drafted Will
                        </h3>
                        <p class="text-sm text-gray-600">
                            Receive a will drafted by a professional lawyer for $450.
                        </p>
                        <h4 class="text-lg font-semibold mt-2">$450</h4>
                    </div>
                </label>

                <!-- Total and Buy Button -->
                <div class="text-right flex-end mt-4">
                    <h3 class="text-xl font-semibold">
                        Total: $<span id="oneTimeTotal">0</span>
                    </h3>
                    <button
                        type="submit"
                        class="mt-4 bg-[#3A5F8F] text-white py-2 px-6 rounded-lg hover:bg-[#F4A261] transition-all duration-300"
                        id="buyButton"
                    >
                        Buy: $0
                    </button>
                    <input type="hidden" name="totalAmount" id="totalAmount1" />
                    <input type="hidden" name="billingCycle" value="one_time" />
                </div>
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
        const billingCycleRadios = document.querySelectorAll('input[name="billingCycle"]');
        const subscriptionCheckboxes = document.querySelectorAll('input[name="subscription[]"]');
        const totalAmountInput = document.getElementById('totalAmount');
        const totalAmountDisplay = document.getElementById('subscriptionTotal');

        function calculateTotal() {
            let total = 0;
            const billingCycle = document.querySelector('input[name="billingCycle"]:checked').value;

            subscriptionCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    const [name, monthlyPrice, yearlyPrice] = checkbox.value.split(',');
                    total += billingCycle === 'monthly' ? parseFloat(monthlyPrice) : parseFloat(yearlyPrice);
                }
            });

            totalAmountInput.value = total.toFixed(2);
            totalAmountDisplay.textContent = total.toFixed(2);
        }

        billingCycleRadios.forEach((radio) => radio.addEventListener('change', calculateTotal));
        subscriptionCheckboxes.forEach((checkbox) => checkbox.addEventListener('change', calculateTotal));

        // Initial calculation
        calculateTotal();

        function updateTotal() {
            // Get all checkboxes
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            let total = 0;

            // Calculate total
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    total += parseFloat(checkbox.value);
                }
            });

            // Update total in the DOM
            document.getElementById("oneTimeTotal").innerText = total.toFixed(2);
            document.getElementById("buyButton").innerText = `Buy for $${total.toFixed(
                2
            )}`;
            document.getElementById("totalAmount1").value = total.toFixed(2);
        }
    </script>



{{--    <script>--}}
{{--      // Script for Subscription Section--}}
{{--      const subscriptionCheckboxes = document.querySelectorAll(--}}
{{--        "#subscriptionForm input[type='checkbox']"--}}
{{--      );--}}
{{--      const subscriptionTotalElement =--}}
{{--        document.getElementById("subscriptionTotal");--}}
{{--      const subscriptionBillingCycle = document.querySelectorAll(--}}
{{--        "#subscriptionForm input[name='billingCycle']"--}}
{{--      );--}}

{{--      let subscriptionTotal = 0;--}}

{{--      function updateSubscriptionTotal() {--}}
{{--        subscriptionTotal = 0;--}}
{{--        subscriptionCheckboxes.forEach((checkbox) => {--}}
{{--          if (checkbox.checked) {--}}
{{--            subscriptionTotal += parseInt(checkbox.value);--}}
{{--          }--}}
{{--        });--}}

{{--        const isYearly =--}}
{{--          document.querySelector(--}}
{{--            "#subscriptionForm input[name='billingCycle']:checked"--}}
{{--          ).value === "yearly";--}}

{{--        subscriptionTotal = isYearly--}}
{{--          ? subscriptionTotal * 10--}}
{{--          : subscriptionTotal;--}}
{{--        subscriptionTotalElement.innerText = subscriptionTotal;--}}
{{--      }--}}

{{--      subscriptionCheckboxes.forEach((checkbox) =>--}}
{{--        checkbox.addEventListener("change", updateSubscriptionTotal)--}}
{{--      );--}}
{{--      subscriptionBillingCycle.forEach((radio) =>--}}
{{--        radio.addEventListener("change", updateSubscriptionTotal)--}}
{{--      );--}}

{{--      function processSubscription() {--}}
{{--        alert(--}}
{{--          `Your subscription total is $${subscriptionTotal}. Proceeding...`--}}
{{--        );--}}
{{--        // Add your payment processing logic here.--}}
{{--      }--}}

{{--      // Script for One-Time Payment Section--}}
{{--      const oneTimeCheckboxes = document.querySelectorAll(--}}
{{--        "#oneTimePaymentForm input[type='checkbox']"--}}
{{--      );--}}
{{--      const oneTimeTotalElement = document.getElementById("oneTimeTotal");--}}

{{--      let oneTimeTotal = 0;--}}

{{--      function updateOneTimeTotal() {--}}
{{--        oneTimeTotal = 0;--}}
{{--        oneTimeCheckboxes.forEach((checkbox) => {--}}
{{--          if (checkbox.checked) {--}}
{{--            oneTimeTotal += parseInt(checkbox.value);--}}
{{--          }--}}
{{--        });--}}
{{--        oneTimeTotalElement.innerText = oneTimeTotal;--}}
{{--      }--}}

{{--      oneTimeCheckboxes.forEach((checkbox) =>--}}
{{--        checkbox.addEventListener("change", updateOneTimeTotal)--}}
{{--      );--}}

{{--      function processOneTimePayment() {--}}
{{--        alert(`Your one-time payment total is $${oneTimeTotal}. Proceeding...`);--}}
{{--        // Add your payment processing logic here.--}}
{{--      }--}}
{{--    </script>--}}


  </body>
</html>
