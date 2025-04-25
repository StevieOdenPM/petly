<x-main>
    <section class="py-10 relative">
        <div class="lg:flex lg:items-start xl:gap-16">
            <div class="min-w-0 flex-1 space-y-8">
                <div class="space-y-4">
                    <h2 class="font-semibold text-2xl text-black mb-5">Delivery Details</h2>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="your_name"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Your
                            </label>
                            <input type="text" id="your_name" value="{{ $user['username'] }}"
                                class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none transition focus:border-blue-500 focus:ring focus:ring-blue-500" />
                        </div>

                        <div>
                            <label for="your_email"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" id="your_email" value="{{ $user['email'] }}"
                                class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none transition focus:border-blue-500 focus:ring focus:ring-blue-500" />
                        </div>

                        <div>
                            <label for="your_num"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Phone
                                Number</label>
                            <input type="tel" id="your_num" value="{{ $user['phone_number'] }}"
                                class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none transition focus:border-blue-500 focus:ring focus:ring-blue-500" />
                        </div>
                        @php
                            $addressParts = explode(',', $userDetail['address']);
                            $city = trim(end($addressParts));
                            $fullAddress = trim($addressParts[0]);
                        @endphp
                        <div>
                            <label for="your_city"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">City</label>
                            <input type="text" id="your_city" value="{{ $city }}"
                                class="block w-full p-2.5 text-sm rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none transition focus:border-blue-500 focus:ring focus:ring-blue-500" />
                        </div>
                    </div>

                    <div>
                        <label for="address"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" id="address" value="{{ $fullAddress }}"
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
                                    <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio"
                                        name="payment-method" value=""
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
                        <form method="POST" action="{{ route('checkout.store') }}">
                            @csrf
                        
                            {{-- Radio Button 1 - Regular Delivery --}}
                            <div class="rounded-lg border p-4 mb-2 {{ $shippingFee == 15000 ? 'bg-blue-100' : 'bg-gray-50' }}">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="shipping_fee" value="15000" 
                                           onchange="this.form.submit()" 
                                           {{ $shippingFee == 15000 ? 'checked' : '' }}
                                           class="h-4 w-4 text-blue-600 border-gray-300">
                                    <span class="ml-2 text-gray-900">Regular Delivery - IDR 15.000</span>
                                </label>
                            </div>
                        
                            {{-- Radio Button 2 - Express Delivery --}}
                            <div class="rounded-lg border p-4 {{ $shippingFee == 50000 ? 'bg-blue-100' : 'bg-gray-50' }}">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="shipping_fee" value="50000" 
                                           onchange="this.form.submit()" 
                                           {{ $shippingFee == 50000 ? 'checked' : '' }}
                                           class="h-4 w-4 text-blue-600 border-gray-300">
                                    <span class="ml-2 text-gray-900">Express Delivery - IDR 50.000</span>
                                </label>
                            </div>
                        </form>
                        
                        {{-- Display Selected Shipping Fee --}}
                        <p class="mt-4 text-lg font-semibold">
                            Shipping Fee: IDR {{ number_format($shippingFee, 0, ',', '.') }}
                        </p>
                        
                        {{-- <div
                            class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="fast-delivery" type="radio" name="shipping_method" value="fast"
                                        onchange="updateShippingMethod(this.value, 15000)"
                                        {{ $shippingMethod == 'fast' ? 'checked' : '' }}
                                        class="h-4 w-4 border-gray-300 bg-white text-primary-600" />
                                </div>

                                <div class="ms-4 text-sm">
                                    <label for="fast-delivery"
                                        class="font-medium leading-none text-gray-900 dark:text-white">
                                        15.000 - Fast Delivery
                                    </label>
                                    <p class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">
                                        Get it by 2 up to 4 days
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="express-delivery" type="radio" name="shipping_method" value="express"
                                        onchange="updateShippingMethod(this.value, 50000)"
                                        {{ $shippingMethod == 'express' ? 'checked' : '' }}
                                        class="h-4 w-4 border-gray-300 bg-white text-primary-600" />
                                </div>

                                <div class="ms-4 text-sm">
                                    <label for="express-delivery"
                                        class="font-medium leading-none text-gray-900 dark:text-white">
                                        50.000 - Express Delivery
                                    </label>
                                    <p class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">
                                        Get it by 1 up to 2 days
                                    </p>
                                </div>
                            </div>
                        </div> --}}
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
                            <div class="flex items-center">
                                <div
                                    class="mr-4 h-28 w-28 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="{{ $product['product_image'] }}" alt="${item.name}"
                                        class="h-full w-full object-cover object-center" />
                                </div>
                                <div class="item-details">
                                    <h3 class="text-base font-medium text-gray-900 dark:text-white">
                                        {{ $product['product_name'] }}
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Quantity:
                                        {{ $cart['quantity'] }}
                                    </p>
                                </div>
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
                                {{ number_format($subtotal) }}</dd>
                        </dl>

                        <!-- Shipping -->
                        <dl class="flex items-center justify-between gap-2 py-3">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Shipping Fee</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white"> IDR
                                {{ number_format($shippingFee) }}</dd>
                        </dl>

                        <!-- Taxes -->
                        <dl class="flex items-center justify-between gap-2 py-3">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Flat Tax</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">IDR
                                {{ number_format($taxAmount) }}</dd>
                        </dl>

                        <!-- Total -->
                        <dl class="flex items-center justify-between gap-2 py-3">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-base font-bold text-gray-900 dark:text-white">IDR
                                {{ number_format($total) }}</dd>
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
    </section>
    <script>
        // Initialize with current values
        document.addEventListener('DOMContentLoaded', function() {
            // Get shipping method from localStorage or use default
            const savedMethod = localStorage.getItem('shipping_method') || 'fast';
            const savedFee = parseInt(localStorage.getItem('shipping_fee') || 15000);

            // Update UI to reflect saved values
            document.querySelector('input[value="' + savedMethod + '"]').checked = true;
            updateDisplayedPrices(savedFee);
        });

        function updateShippingMethod(method, fee) {
            // Save to localStorage
            localStorage.setItem('shipping_method', method);
            localStorage.setItem('shipping_fee', fee);

            // Update displayed prices
            updateDisplayedPrices(fee);
        }

        function updateDisplayedPrices(shippingFee) {
            // Get the current subtotal and tax values
            const subtotal = {{ $subtotal }};
            const taxAmount = {{ $taxAmount }};

            // Calculate new total
            const total = subtotal + taxAmount + shippingFee;

            // Update the displayed shipping fee and total
            document.getElementById('shipping-fee').innerText = 'IDR ' + shippingFee.toLocaleString();
            document.getElementById('total-amount').innerText = 'IDR ' + total.toLocaleString();
        }
    </script>
</x-main>
