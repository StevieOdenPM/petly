<x-main>
    <section class="py-10 relative">
        <h2 class="font-semibold text-2xl text-black mb-5">Shopping Cart</h2>

        @if (session('success'))
            <div class="text-green-500 mb-4">{{ session('success') }}</div>
        @endif

        @if (isset($error))
            <div class="text-red-500 mb-4">{{ $error }}</div>
        @endif


        <div class="flex flex-col lg:flex-row gap-10">
            <div class="w-full lg:w-2/3 space-y-6">
                @forelse($items as $item)
                    <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:bg-gray-800">
                        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                            <!-- Checkbox -->
                            <form action="{{ route('cart.index') }}" method="get" id="cart-form">
                                <div class="flex items-center md:order-0 mr-2">
                                    <input type="checkbox" name="selected_items[]" value="{{ $item['cart_id'] }}"
                                        class="h-5 w-5 rounded border-gray-300"
                                        @if (in_array($item['cart_id'], $selectedItems ?? [])) checked @endif onChange="this.form.submit()">
                                </div>
                            </form>

                            <!-- Product Image -->
                            <a href="#" class="shrink-0 md:order-1">
                                <img class="h-20 w-20 dark:hidden ml-2" src="{{ $item['products']['product_image'] }}"
                                    alt="{{ $item['products']['product_name'] }}" />
                            </a>

                            <!-- Price Details -->
                            <div class="flex items-center justify-between md:order-3 md:justify-end">
                                <div class="text-end md:order-4 md:w-32">
                                    <p class="text-base font-semibold text-gray-900 dark:text-white">
                                        IDR {{ number_format($item['products']['product_price']) }}
                                    </p>
                                    <p class="text-sm text-gray-500">Quantity: {{ $item['quantity'] }}</p>
                                    <p class="text-sm text-gray-500">Total: IDR
                                        {{ number_format($item['total_price']) }}</p>
                                </div>
                            </div>

                            <!-- Product Name & Remove Button -->
                            <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                <a href="#"
                                    class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                                    {{ $item['products']['product_name'] }}
                                </a>
                                <div class="flex items-center gap-4 mt-4">
                                    <form action="{{ route('cart.destroy', $item['cart_id']) }}" method="POST"
                                        onsubmit="return confirm('Remove item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="delete-btn inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <p class="text-center text-gray-500">Your cart is empty.</p>
                @endforelse

            </div>

            <div class="w-full lg:w-1/3 space-y-4 bg-white p-4 rounded-lg border shadow-sm dark:bg-gray-800">
                <p class="text-xl font-semibold">Order Summary</p>
                <div class="flex justify-between">
                    <span>Original Price</span>
                    <span>IDR {{ number_format($selectedTotal) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Flat Tax</span>
                    <span>IDR {{ number_format($tax) }}</span>
                </div>
                <div class="border-t pt-2 flex justify-between font-bold">
                    <span>Total</span>
                    <span>IDR {{ number_format($total) }}</span>
                </div>
                <a id="checkout-btn"
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>
</x-main>

<script>
    let selectedItems = [];

    // Saat checkbox dicentang/dibatalkan
    document.querySelectorAll('.item-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const value = this.value;

            if (this.checked) {
                // Tambahkan kalau belum ada
                if (!selectedItems.includes(value)) {
                    selectedItems.push(value);
                }
            } else {
                // Hapus dari array kalau tidak dicentang
                selectedItems = selectedItems.filter(item => item !== value);
            }

            console.log('Selected Items:', selectedItems); // bisa dilihat di console
        });
    });

    function handleSubmit() {
        // Contoh: submit lewat AJAX, atau masukkan ke hidden input
        console.log('Final submit with:', selectedItems);
        
        // Atau kalau mau masukkan ke hidden input:
        // document.getElementById('hiddenInput').value = JSON.stringify(selectedItems);
        // document.getElementById('formId').submit();
    }
</script>
