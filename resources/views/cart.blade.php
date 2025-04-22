<x-main>
    <section class="py-10 relative">

        <h2 class="font-semibold text-2xl  text-black mb-5">Shopping Cart</h2>

        <div class="sm:mt-8 md:gap-6 lg:flex lg:items-start lg:pr-26 xl:gap-10">
            <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                <div id= 'cart-container' class="space-y-6">
                    {{-- <div
                        class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0"> <a
                                href="#" class="shrink-0 md:order-1"> <img class="h-20 w-20 dark:hidden ml-2"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                    alt="imac image" /> <img class="hidden h-20 w-20 dark:block"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                    alt="imac image" /> </a>
                            <div class="flex items-center justify-between md:order-3 md:justify-end">
                                <div class="text-end md:order-4 md:w-32">
                                    <p class="text-base font-semibold text-gray-900 dark:text-white">$1,499</p>
                                </div>
                            </div>
                            <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md"> <a href="#"
                                    class="text-base font-medium text-gray-900 hover:underline dark:text-white">PC Apple
                                    M3, 24" Retina 4.5K, 8GB, SSD 256GB, 10-core GPU, Keyboard layout INT</a>
                                <div class="flex items-center gap-4 mt-4"> <button type="button"
                                        class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                        <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                        </svg> Remove </button> </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="mx-auto mt-6 max-w-lg flex-1 space-y-6 lg:mt-0 lg:w-2/3">
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original Price</dt>
                                <dd id="original-price" class="text-base font-medium text-gray-900 dark:text-white">
                                    IDR 0.00</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Flat Tax</dt>
                                <dd id="tax" class="text-base font-medium text-gray-900 dark:text-white">IDR 0.00
                                </dd>
                            </dl>
                        </div>

                        <dl
                            class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd id="total" class="text-base font-bold text-gray-900 dark:text-white">IDR 0.00</dd>
                        </dl>
                    </div>

                    <a href="checkout" id="checkout-btn"
                        class="flex w-full items-center justify-center rounded-lg bg-[#FE9494] px-5 py-2.5 text-sm font-medium text-white hover:bg-[#e58585] focus:outline-none focus:ring-4 focus:ring-[#ffc1c1] dark:bg-[#FE9494] dark:hover:bg-[#e58585] dark:focus:ring-[#ff9a9a]">
                        Proceed to Checkout
                    </a>

                    <div class="flex items-center justify-center gap-2">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                        <a href="product" title=""
                            class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                            Continue Shopping
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const token = "1|yqRnhDHiWhgwQ75DBi2BTi2PrNaovVzegA6Dh6Zbe1920269";
            const cartContainer = document.getElementById("cart-container");
            const originalPriceElement = document.getElementById("original-price");
            const taxElement = document.getElementById("tax");
            const totalElement = document.getElementById("total");
            const checkoutButton = document.getElementById("checkout-btn");

            function fetchCart() {
                fetch("http://petly.test:8080/api/customer/cart/", {
                        method: "GET",
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        cartContainer.innerHTML = "";
                        let originalPrice = 0; // Total price of all products
                        let isCartEmpty = true;

                        if (!data.data || data.data.length === 0) {
                            cartContainer.innerHTML = "<p class='text-center py-4'>Your cart is empty</p>";
                            updateReceipt(0); // Update receipt when cart is empty
                            checkoutButton.classList.add("opacity-50", "cursor-not-allowed");
                            checkoutButton.setAttribute("disabled", "true"); // Disable button
                            return;
                        }

                        data.data.forEach(cartItem => {
                            cartItem.products.forEach(product => {
                                isCartEmpty = false;
                                originalPrice += product.pivot
                                    .total_price; // Sum all product total prices

                                cartContainer.innerHTML += `
                                <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                        <a href="#" class="shrink-0 md:order-1">
                                            <img class="h-20 w-20 dark:hidden ml-2" src="https://via.placeholder.com/80" alt="${product.product_name}" />
                                        </a>
                                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                                            <div class="text-end md:order-4 md:w-32">
                                                <p class="text-base font-semibold text-gray-900 dark:text-white">IDR ${product.product_price.toLocaleString()}</p>
                                                <p class="text-sm text-gray-500">Quantity: ${product.pivot.quantity}</p>
                                                <p class="text-sm text-gray-500">Total: IDR ${product.pivot.total_price.toLocaleString()}</p>
                                            </div>
                                        </div>
                                        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                            <a href="#" class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                                                ${product.product_name}
                                            </a>
                                            <div class="flex items-center gap-4 mt-4">
                                                <button type="button" class="delete-btn inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500" data-id="${cartItem.cart_id}">
                                                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                                    </svg>
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            });
                        });

                        updateReceipt(originalPrice); // Update receipt with the new total
                        attachDeleteEvent();

                        if (isCartEmpty) {
                            checkoutButton.classList.add("opacity-50", "cursor-not-allowed");
                        } else {
                            checkoutButton.classList.remove("opacity-50", "cursor-not-allowed");
                        }
                    })
                    .catch(error => console.error("Error fetching cart:", error));
            }

            function attachDeleteEvent() {
                document.querySelectorAll(".delete-btn").forEach(button => {
                    button.addEventListener("click", function() {
                        const cartId = this.getAttribute("data-id");
                        fetch(`http://petly.test:8080/api/customer/cart/${cartId}`, {
                                method: "DELETE",
                                headers: {
                                    Authorization: `Bearer ${token}`
                                }
                            })
                            .then(() => {
                                fetchCart(); // Refresh cart after deletion
                            })
                            .catch(error => console.error("Error deleting item:", error));
                    });
                });
            }

            function updateReceipt(originalPrice) {
                const tax = 25000; // Fixed tax amount
                const total = originalPrice + tax;

                originalPriceElement.textContent = `IDR ${originalPrice.toLocaleString()}`;
                taxElement.textContent = `IDR ${tax.toLocaleString()}`;
                totalElement.textContent = `IDR ${total.toLocaleString()}`;
            }

            fetchCart();
        });
    </script>
</x-main>
