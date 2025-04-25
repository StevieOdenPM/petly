<x-main>
    <section class="py-10 relative">
        <form action="#">

            <div class="lg:flex lg:items-start xl:gap-16">
                <div class="min-w-0 flex-1 space-y-8">
                    <div class="space-y-4">
                        <h2 class="font-semibold text-2xl text-black mb-5">Delivery Details</h2>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                            <div>
                                <label for="your_name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Your
                                    name</label>
                                <input type="text" id="your_name"
                                    class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none transition focus:border-blue-500 focus:ring focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="your_email"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Your
                                    email</label>
                                <input type="email" id="your_email"
                                    class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none transition focus:border-blue-500 focus:ring focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="your_num"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Phone
                                    Number</label>
                                <input type="tel" id="your_num"
                                    class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none transition focus:border-blue-500 focus:ring focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="your_city"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">City</label>
                                <input type="text" id="your_city"
                                    class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none transition focus:border-blue-500 focus:ring focus:ring-blue-500" />
                            </div>
                        </div>

                        <div>
                            <label for="address"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <input type="text" id="address"
                                class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none transition focus:border-blue-500 focus:ring focus:ring-blue-500" />
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="credit-card" aria-describedby="credit-card-text" type="radio"
                                            name="payment-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                            checked />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="credit-card"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> Credit Card
                                        </label>
                                        <p id="credit-card-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Pay with
                                            your credit card</p>
                                    </div>
                                </div>

                            </div>

                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text"
                                            type="radio" name="payment-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="pay-on-delivery"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> Payment on
                                            delivery </label>
                                        <p id="pay-on-delivery-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Pay with
                                            cash on delivery</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Methods</h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="dhl" aria-describedby="dhl-text" type="radio"
                                            name="delivery-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                            checked />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="dhl"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> 15.000 -
                                            Fast
                                            Delivery </label>
                                        <p id="dhl-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by
                                            2 up to 4 days</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="express" aria-describedby="express-text" type="radio"
                                            name="delivery-method" value=""
                                            class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="express"
                                            class="font-medium leading-none text-gray-900 dark:text-white"> 50.000 -
                                            Express Delivery </label>
                                        <p id="express-text"
                                            class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by
                                            1 up to 2 days</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden p-6 max-w-1/3 w-full">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Product Details</p>
                    <div class="mt-6 space-y-6 sm:mt-8">
                        <div class="flow-root">
                            <div id="checkout-items-container"
                                class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                                <!-- Cart items will be loaded here -->
                                @foreach ($cartIds as $item)
                                
                                @endforeach
                                <div class="flex items-center">
                                    <div
                                        class="mr-4 h-28 w-28 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                        <img src="${item.image}" alt="${item.name}"
                                            class="h-full w-full object-cover object-center" />
                                    </div>
                                    <div class="item-details">
                                        <h3 class="text-base font-medium text-gray-900 dark:text-white">${item.name}
                                        </h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Quantity: ${item.quantity}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">IDR
                                        ${item.totalPrice.toLocaleString()}</p>
                                </div>
                                {{-- <div class="flex items-center justify-center py-3">
                                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-gray-900"></div>
                                </div> --}}
                            </div>
                        </div>

                        <!-- Order summary will be populated here -->
                        <div id="order-summary" class="divide-y divide-gray-200 dark:divide-gray-800">
                            <!-- Summary data will be inserted here -->
                            <!-- Subtotal -->
                            <dl class="flex items-center justify-between gap-2 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">IDR
                                    ${subtotal.toLocaleString()}</dd>
                            </dl>

                            <!-- Shipping -->
                            <dl class="flex items-center justify-between gap-2 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Shipping Fee</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">IDR
                                    ${shipping.toLocaleString()}</dd>
                            </dl>

                            <!-- Taxes -->
                            <dl class="flex items-center justify-between gap-2 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Flat Tax</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">IDR
                                    ${tax.toLocaleString()}</dd>
                            </dl>

                            <!-- Total -->
                            <dl class="flex items-center justify-between gap-2 py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">IDR
                                    ${total.toLocaleString()}</dd>
                            </dl>
                        </div>

                        <!-- Order buttons -->
                        <div class="space-y-2">
                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-[#FE9494] px-5 py-2 text-base font-medium text-white ">Confirm
                                order</button>
                            <button type="cancel"
                                class="flex w-full items-center justify-center rounded-lg border border-red-400 bg-white px-5 py-2 text-base font-medium text-red-500 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200">Cancel
                                order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script>
        // Wait for the page to fully load before running our code
        document.addEventListener("DOMContentLoaded", async function() {

            // Get cart IDs from the URL (example: ?cart=1,2,3)
            const urlParams = new URLSearchParams(window.location.search);
            const cartParam = urlParams.get('cart');
            const cartIds = cartParam ? cartParam.split(',') : [];

            // API information
            const profileApiUrl = "http://petly.test:8080/api/profile";
            const apiToken = session('api_token');

            // Log cart IDs for debugging purposes
            console.log("Cart IDs to process:", cartIds);

            try {
                // Step 1: Fetch user profile data
                console.log("Fetching user profile...");
                const profileResponse = await fetch(profileApiUrl, {
                    method: "GET",
                    headers: {
                        "Authorization": `Bearer ${apiToken}`,
                    }
                });

                if (!profileResponse.ok) {
                    throw new Error("Failed to fetch profile data");
                }

                // Step 2: Extract user data and populate form
                const profileData = await profileResponse.json();
                const userData = profileData.user[0];

                // Fill in the form with user information
                document.getElementById("your_name").value = userData.username || "";
                document.getElementById("your_email").value = userData.email || "";
                document.getElementById("your_num").value = userData.phone_number || "";

                // Fill address information if available
                if (userData.address) {
                    document.getElementById("address").value = userData.address || "";
                    document.getElementById("your_city").value = userData.city || "";
                }

                // Step 3: Setup the checkout items container
                const checkoutItemsContainer = document.getElementById("checkout-items-container");
                checkoutItemsContainer.innerHTML = ''; // Clear any existing content

                // Step 4: Initialize variables for order summary
                let subtotal = 0;
                const cartItems = [];

                // Step 5: Fetch each cart item one by one
                for (const cartId of cartIds) {
                    try {
                        console.log(`Fetching cart item ${cartId}...`);
                        const cartResponse = await fetch(
                            `http://petly.test:8080/api/customer/cart/${cartId}`, {
                                method: "GET",
                                headers: {
                                    "Authorization": `Bearer ${apiToken}`,
                                }
                            });

                        if (!cartResponse.ok) {
                            throw new Error(`Failed to fetch cart ${cartId}: ${cartResponse.status}`);
                        }

                        const cartData = await cartResponse.json();

                        // Step 6: Process cart item if data is valid
                        if (cartData.status && cartData.data) {
                            // Use price directly from API (assumed to be in IDR cents)
                            // Divide by 100 to convert cents to whole IDR
                            const price = cartData.data.products.product_price;
                            const totalPrice = cartData.data.total_price;

                            // Create item object with all needed information
                            const item = {
                                id: cartData.data.cart_id,
                                name: cartData.data.products.product_name,
                                price: price,
                                quantity: cartData.data.quantity,
                                image: cartData.data.products.product_image,
                                totalPrice: totalPrice
                            };

                            // Add item to our list and update subtotal
                            cartItems.push(item);
                            subtotal += totalPrice;
                        }
                    } catch (error) {
                        console.error(`Error fetching cart ${cartId}:`, error);
                    }
                }

                // Step 7: Display cart items
                cartItems.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'flex items-center justify-between py-3';
                    itemElement.innerHTML = `
                    <div class="flex items-center">
                        <div class="mr-4 h-28 w-28 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                            <img src="${item.image}"
                                alt="${item.name}"
                                class="h-full w-full object-cover object-center" />
                        </div>
                        <div class="item-details">
                            <h3 class="text-base font-medium text-gray-900 dark:text-white">${item.name}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Quantity: ${item.quantity}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">IDR ${item.totalPrice.toLocaleString()}</p>
                    </div>
                `;
                    checkoutItemsContainer.appendChild(itemElement);
                });

                // Step 8: Calculate order summary
                const shipping = 15000; // Default shipping cost in IDR
                const tax = 25000; // Flat tax of 25000 IDR
                const total = subtotal + shipping + tax;

                // Step 9: Update order summary section with IDR currency
                const orderSummary = document.getElementById("order-summary");
                orderSummary.innerHTML = `
                <!-- Subtotal -->
                <dl class="flex items-center justify-between gap-2 py-3">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">IDR ${subtotal.toLocaleString()}</dd>
                </dl>

                <!-- Shipping -->
                <dl class="flex items-center justify-between gap-2 py-3">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Shipping Fee</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">IDR ${shipping.toLocaleString()}</dd>
                </dl>

                <!-- Taxes -->
                <dl class="flex items-center justify-between gap-2 py-3">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Flat Tax</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">IDR ${tax.toLocaleString()}</dd>
                </dl>

                <!-- Total -->
                <dl class="flex items-center justify-between gap-2 py-3">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-base font-bold text-gray-900 dark:text-white">IDR ${total.toLocaleString()}</dd>
                </dl>
            `;

                // Step 10: Add listeners to update shipping cost when delivery method changes
                const dhlRadio = document.getElementById('dhl');
                const expressRadio = document.getElementById('express');

                function updateShipping() {
                    // Regular shipping: Rp 15.000
                    // Express shipping: Rp 50.000
                    const shippingCost = expressRadio.checked ? 50000 : 15000;
                    const newTotal = subtotal + shippingCost + tax;

                    // Find and update the shipping and total elements in the summary
                    const shippingElement = orderSummary.querySelector('dl:nth-child(2) dd');
                    const totalElement = orderSummary.querySelector('dl:nth-child(4) dd');

                    shippingElement.textContent = `${shippingCost}`;
                    totalElement.textContent = `${newTotal}`;
                }

                // Add event listeners to shipping method radio buttons
                dhlRadio.addEventListener('change', updateShipping);
                expressRadio.addEventListener('change', updateShipping);

            } catch (error) {
                // Step 11: Handle and display any errors
                console.error("Error in checkout process:", error);
                document.getElementById("checkout-items-container").innerHTML = `
            <div class="py-3 text-center text-red-500">
                <p>Terjadi kesalahan dalam memuat data. Silakan coba lagi nanti.</p>
                <p class="mt-2">Detail error: ${error.message}</p>
            </div>
        `;
            }
        });
    </script>
</x-main>
