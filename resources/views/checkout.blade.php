<x-main>
    <section class="py-10 relative">
        <form action="#">
      
          <div class="lg:flex lg:items-start xl:gap-16  ">
            <div class="min-w-0 flex-1 space-y-8">
              <div class="space-y-4">
                <h2 class="font-semibold text-2xl text-black mb-5">Delivery Details</h2>
      
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                  <div>
                    <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your name </label>
                    <input type="text" id="your_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"  />
                  </div>
      
                  <div>
                    <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your email </label>
                    <input type="email" id="your_email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"  />
                  </div>
                  
                  <div>
                    <div class="mb-2 flex items-center gap-2">
                      <label for="city-input" class="block text-sm font-medium text-gray-900 dark:text-white"> City </label>
                    </div>
                    <input type="city" id="your_city" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"  />
                  </div>
      
                  <div>
                    <div class="mb-2 flex items-center gap-2">
                      <label for="province-input" class="block text-sm font-medium text-gray-900 dark:text-white"> Province </label>
                    </div>
                    <input type="province" id="your_province" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"  />
                  </div>
      
                  <div>
                    <div class="mb-2 flex items-center gap-2">
                      <label for="phone-input" class="block text-sm font-medium text-gray-900 dark:text-white"> Phone Number (ID) </label>
                    </div>
                    <input type="phonenum" id="your_num" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"  />
                  </div>
      
                  <div>
                    <label for="note" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Note </label>
                    <input type="note" id="note" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" />
                  </div>  
     
                </div>
                <div>
                  <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Address </label>
                  <input type="address" id="address" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" />
                </div>
              </div>
      
              <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>
      
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                  <div class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-start">
                      <div class="flex h-5 items-center">
                        <input id="credit-card" aria-describedby="credit-card-text" type="radio" name="payment-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                      </div>
      
                      <div class="ms-4 text-sm">
                        <label for="credit-card" class="font-medium leading-none text-gray-900 dark:text-white"> Credit Card </label>
                        <p id="credit-card-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Pay with your credit card</p>
                      </div>
                    </div>
      
                  </div>
      
                  <div class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-start">
                      <div class="flex h-5 items-center">
                        <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio" name="payment-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                      </div>
      
                      <div class="ms-4 text-sm">
                        <label for="pay-on-delivery" class="font-medium leading-none text-gray-900 dark:text-white"> Payment on delivery </label>
                        <p id="pay-on-delivery-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Pay with cash on delivery</p>
                      </div>
                    </div>
      
                  </div>
      
                </div>
              </div>
      
              <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Methods</h3>
      
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                  <div class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-start">
                      <div class="flex h-5 items-center">
                        <input id="dhl" aria-describedby="dhl-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                      </div>
      
                      <div class="ms-4 text-sm">
                        <label for="dhl" class="font-medium leading-none text-gray-900 dark:text-white"> $15 - Fast Delivery </label>
                        <p id="dhl-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by 2 up to 4 days</p>
                      </div>
                    </div>
                  </div>
      
                  <div class="rounded-lg border border-gray-200 bg-gray-50 p-7 ps-4 dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-start">
                      <div class="flex h-5 items-center">
                        <input id="express" aria-describedby="express-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                      </div>
      
                      <div class="ms-4 text-sm">
                        <label for="express" class="font-medium leading-none text-gray-900 dark:text-white"> $50 - Express Delivery </label>
                        <p id="express-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by 1 up to 2 days</p>
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
                <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                  <!-- First item -->
                  <div class="flex items-center justify-between py-3">
                    <div class="flex items-center">
                      <div class="mr-4 h-28 w-28 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                        <img src="https://images.unsplash.com/photo-1610714520720-ba92ae46e0e2?q=80&w=1769&auto=format&fit=crop&ixlib=rb-" alt="Black T-shirt" class="h-full w-full object-cover object-center" />
                      </div>
                      <div>
                        <h3 class="text-base font-medium text-gray-900 dark:text-white">Basic Tee</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Black</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Large</p>
                        <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">$32.00</p>
                      </div>  
                    </div>
                    <div class="flex items-center">
                      <select class="rounded-lg border border-gray-300 px-3 py-2 text-sm" aria-label="Quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      <button class="ml-4 text-gray-400 hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </div>
                  </div>
            
                  <!-- Second item -->
                  <div class="flex items-center justify-between py-3">
                    <div class="flex items-center">
                      <div class="mr-4 h-28 w-28 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                        <img src="https://images.unsplash.com/photo-1610714520720-ba92ae46e0e2?q=80&w=1769&auto=format&fit=crop&ixlib=rb-" alt="Sienna T-shirt" class="h-full w-full object-cover object-center" />
                      </div>
                      <div>
                        <h3 class="text-base font-medium text-gray-900 dark:text-white">Basic Tee</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Sienna</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Large</p>
                        <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">$32.00</p>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <select class="rounded-lg border border-gray-300 px-3 py-2 text-sm" aria-label="Quantity">
                        <option value="1">1</option>
                        <option value="2" selected>2</option>
                        <option value="3">3</option>
                      </select>
                      <button class="ml-4 text-gray-400 hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </div>
                  </div>
            
                  <!-- Subtotal -->
                  <dl class="flex items-center justify-between gap-2 py-3">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">$64.00</dd>
                  </dl>
            
                  <!-- Shipping -->
                  <dl class="flex items-center justify-between gap-2 py-3">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Shipping</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">$5.00</dd>
                  </dl>
            
                  <!-- Taxes -->
                  <dl class="flex items-center justify-between gap-2 py-3">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Taxes</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">$5.52</dd>
                  </dl>
            
                  <!-- Total -->
                  <dl class="flex items-center justify-between gap-2 py-3">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-base font-bold text-gray-900 dark:text-white">$75.52</dd>
                  </dl>
                </div>
              </div>
            
              <!-- Order buttons -->
              <div class="space-y-2">
                <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-[#FE9494] px-5 py-2 text-base font-medium text-white ">Confirm order</button>
                <button type="cancel" class="flex w-full items-center justify-center rounded-lg border border-red-400 bg-white px-5 py-2 text-base font-medium text-red-500 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200">Cancel order</button>
              </div>
            </div>
          </div>

          
          </div>
        </form>
      </section>
</x-main>
