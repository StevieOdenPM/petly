<x-main>
    <section class="py-10 relative">
            <h2 class="font-semibold text-2xl  text-black mb-5">Transaction History</h2>

            <div class="flex sm:flex-col lg:flex-row sm:items-center justify-between">
                <ul class="flex max-sm:flex-col sm:items-center gap-x-14 gap-y-3">
                    <li
                        class="font-medium text-md leading-8 cursor-pointer text-gray-500 transition-all duration-500 hover:text-[#FE9494]">
                        All Order</li>
                    <li
                        class="font-medium text-md leading-8 cursor-pointer text-gray-500 transition-all duration-500 hover:text-[#FE9494]">
                        Pending</li>
                    <li
                        class="font-medium text-md leading-8 cursor-pointer text-gray-500 transition-all duration-500 hover:text-[#FE9494]">
                        Completed</li>
                    <li
                        class="font-medium text-md leading-8 cursor-pointer text-gray-500 transition-all duration-500 hover:text-[#FE9494]">
                        Cancelled</li>
                </ul>
                <div class="flex max-sm:flex-col items-center justify-end gap-2 max-lg:mt-5">
                    <div class="flex rounded-full py-3 px-4 border border-gray-300 relative">
                        <svg class="relative " width="18" height="20" viewBox="0 0 18 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.5 7.75H16.5M11.9213 11.875H11.928M11.9212 14.125H11.9279M9.14676 11.875H9.1535M9.14676 14.125H9.1535M6.37088 11.875H6.37762M6.37088 14.125H6.37762M5.25 4.75V1.75M12.75 4.75V1.75M7.5 18.25H10.5C13.3284 18.25 14.7426 18.25 15.6213 17.3713C16.5 16.4926 16.5 15.0784 16.5 12.25V9.25C16.5 6.42157 16.5 5.00736 15.6213 4.12868C14.7426 3.25 13.3284 3.25 10.5 3.25H7.5C4.67157 3.25 3.25736 3.25 2.37868 4.12868C1.5 5.00736 1.5 6.42157 1.5 9.25V12.25C1.5 15.0784 1.5 16.4926 2.37868 17.3713C3.25736 18.25 4.67157 18.25 7.5 18.25Z"
                                stroke="#111827" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input type="text" name="from-dt" id="from-dt"
                            class="font-semibold px-2 text-sm text-gray-900 outline-0 appearance-none flex flex-row-reverse cursor-pointer w-28 placeholder-gray-900" placeholder="11-01-2023">
                    </div>
                    <p class="font-medium text-lg leading-8 text-black">To</p>
                    <div class="flex rounded-full py-3 px-4 border border-gray-300 relative">
                        <svg class="relative " width="18" height="20" viewBox="0 0 18 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.5 7.75H16.5M11.9213 11.875H11.928M11.9212 14.125H11.9279M9.14676 11.875H9.1535M9.14676 14.125H9.1535M6.37088 11.875H6.37762M6.37088 14.125H6.37762M5.25 4.75V1.75M12.75 4.75V1.75M7.5 18.25H10.5C13.3284 18.25 14.7426 18.25 15.6213 17.3713C16.5 16.4926 16.5 15.0784 16.5 12.25V9.25C16.5 6.42157 16.5 5.00736 15.6213 4.12868C14.7426 3.25 13.3284 3.25 10.5 3.25H7.5C4.67157 3.25 3.25736 3.25 2.37868 4.12868C1.5 5.00736 1.5 6.42157 1.5 9.25V12.25C1.5 15.0784 1.5 16.4926 2.37868 17.3713C3.25736 18.25 4.67157 18.25 7.5 18.25Z"
                                stroke="#111827" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input type="text" name="to-dt" id="to-dt"
                            class="font-semibold px-2 text-sm text-gray-900 outline-0 appearance-none flex flex-row-reverse cursor-pointer w-28 placeholder-gray-900" placeholder="11-01-2023">
                    </div>
                </div>
            </div>
            <div class="mt-7 border border-gray-300 pt-9 rounded-lg" x-data="{ open: false }">
                <div class="flex max-md:flex-col items-center justify-between px-3 md:px-11">
                    <div class="data">
                        <p class="font-medium text-lg leading-8 text-black whitespace-nowrap">Order : #10234987</p>
                        <p class="font-medium text-lg leading-8 text-black mt-3 whitespace-nowrap">Order Payment : 18th march 2021</p>
                        <p class="font-medium text-lg leading-8 text-black mt-3 whitespace-nowrap">
                            Status : <span class="text-green-500">Completed</span>
                        </p>
                    </div>
                    <div class="flex items-center gap-3 max-md:mt-5">
                        <button @click="open = !open" 
                        class="flex items-center gap-2 rounded-full px-7 py-3 bg-[#FE9494] shadow-sm shadow-transparent text-white font-semibold text-sm transition-all duration-500 hover:shadow-[#E57373] hover:bg-[#E57373]">
                            <span x-text="open ? 'Hide Transaction Details' : 'Show Transaction Details'"></span>
                            <!-- Chevron down icon (when closed) -->
                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <!-- Chevron up icon (when open) -->
                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Added space at the bottom when collapsed -->
                <div class="py-4" x-show="!open"></div>
                
                <div x-show="open" x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="opacity-0 transform scale-95" 
                     x-transition:enter-end="opacity-100 transform scale-100" 
                     x-transition:leave="transition ease-in duration-200" 
                     x-transition:leave-start="opacity-100 transform scale-100" 
                     x-transition:leave-end="opacity-0 transform scale-95">
                    <svg class="my-9 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2" fill="none">
                        <path d="M0 1H1216" stroke="#D1D5DB" />
                    </svg>
            
                    <div class="flex max-lg:flex-col items-center gap-8 lg:gap-24 px-3 md:px-11">
                        <div class="grid grid-cols-4 w-full">
                            <div class="col-span-4 sm:col-span-1">
                                <img src="https://pagedone.io/asset/uploads/1705474774.png" alt="" class="max-sm:mx-auto object-cover">
                            </div>
                            <div class="col-span-4 sm:col-span-3 max-sm:mt-4 sm:pl-8 flex flex-col justify-center max-sm:items-center">
                                <h6 class="font-semibold text-xl leading-5 text-black mb-2">
                                    Decoration Flower Port
                                </h6>                  
                                <p class="text-md leading-8 text-gray-500 mb-8 whitespace-nowrap">By: Dust Studios</p>
                                <div class="flex items-center max-sm:flex-col gap-x-10 gap-y-3">
                                    <span class="text-lg leading-8 text-gray-500 whitespace-nowrap">Weight: 500g</span>
                                    <span class="text-lg leading-8 text-gray-500 whitespace-nowrap">Quantity: 1</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-around w-full sm:pl-28 lg:pl-0">
                            <div class="flex flex-col justify-center items-start max-sm:items-center">
                                <p class="text-lg text-gray-500 leading-8 mb-2 text-left whitespace-nowrap">PRICE</p>
                                <p class="font-semibold text-lg leading-8 text-black text-left whitespace-nowrap">IDR 500.000,00</p>
                            </div>
                        </div>
                    </div>
            
                    <svg class="my-9 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2" fill="none">
                        <path d="M0 1H1216" stroke="#D1D5DB" />
                    </svg>
            
                    <div class="flex max-lg:flex-col items-center gap-8 lg:gap-24 px-3 md:px-11">
                        <div class="grid grid-cols-4 w-full">
                            <div class="col-span-4 sm:col-span-1">
                                <img src="https://pagedone.io/asset/uploads/1705474672.png" alt="" class="max-sm:mx-auto object-cover">
                            </div>
                            <div class="col-span-4 sm:col-span-3 max-sm:mt-4 sm:pl-8 flex flex-col justify-center max-sm:items-center">
                                <h6 class="font-semibold text-xl leading-5 text-black mb-2">
                                    Decoration Item
                                </h6>
                                <p class="text-md leading-8 text-gray-500 mb-8 whitespace-nowrap">By: Dust Studios</p>
                                <div class="flex items-center max-sm:flex-col gap-x-10 gap-y-3">
                                    <span class="text-lg leading-8 text-gray-500 whitespace-nowrap">Weight: 500g</span>
                                    <span class="text-lg leading-8 text-gray-500 whitespace-nowrap">Quantity: 1</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-around w-full sm:pl-28 lg:pl-0">
                            <div class="flex flex-col justify-center items-start max-sm:items-center">
                                <p class="text-lg text-gray-500 leading-8 mb-2 text-left whitespace-nowrap">PRICE</p>
                                <p class="font-semibold text-lg leading-8 text-black text-left whitespace-nowrap">IDR 500.000,00</p>
                            </div>
                        </div>
                    </div>
                    
                    <svg class="mt-9 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2" fill="none">
                        <path d="M0 1H1216" stroke="#D1D5DB" />
                    </svg>
            
                    <div class="px-3 md:px-11 py-8 flex justify-end">
                        <p class="font-medium text-xl leading-8 text-black"> 
                            <span class="text-gray-500">Total Price: </span> &nbsp;$200.00
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-7 border border-gray-300 pt-9 rounded-lg" x-data="{ open: false }">
                <div class="flex max-md:flex-col items-center justify-between px-3 md:px-11">
                    <div class="data">
                        <p class="font-medium text-lg leading-8 text-black whitespace-nowrap">Order : #10234987</p>
                        <p class="font-medium text-lg leading-8 text-black mt-3 whitespace-nowrap">Order Payment : 18th march 2021</p>
                        <p class="font-medium text-lg leading-8 text-black mt-3 whitespace-nowrap">
                            Status : <span class="text-red-500">Cancelled</span>
                        </p>
                    </div>
                    <div class="flex items-center gap-3 max-md:mt-5">
                        <button @click="open = !open" 
                        class="flex items-center gap-2 rounded-full px-7 py-3 bg-[#FE9494] shadow-sm shadow-transparent text-white font-semibold text-sm transition-all duration-500 hover:shadow-[#E57373] hover:bg-[#E57373]">
                            <span x-text="open ? 'Hide Transaction Details' : 'Show Transaction Details'"></span>
                            <!-- Chevron down icon (when closed) -->
                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <!-- Chevron up icon (when open) -->
                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Added space at the bottom when collapsed -->
                <div class="py-4" x-show="!open"></div>
                
                <div x-show="open" x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="opacity-0 transform scale-95" 
                     x-transition:enter-end="opacity-100 transform scale-100" 
                     x-transition:leave="transition ease-in duration-200" 
                     x-transition:leave-start="opacity-100 transform scale-100" 
                     x-transition:leave-end="opacity-0 transform scale-95">
                    <svg class="my-9 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2" fill="none">
                        <path d="M0 1H1216" stroke="#D1D5DB" />
                    </svg>
            
                    <div class="flex max-lg:flex-col items-center gap-8 lg:gap-24 px-3 md:px-11">
                        <div class="grid grid-cols-4 w-full">
                            <div class="col-span-4 sm:col-span-1">
                                <img src="https://pagedone.io/asset/uploads/1705474774.png" alt="" class="max-sm:mx-auto object-cover">
                            </div>
                            <div class="col-span-4 sm:col-span-3 max-sm:mt-4 sm:pl-8 flex flex-col justify-center max-sm:items-center">
                                <h6 class="font-semibold text-xl leading-5 text-black mb-2">
                                    Decoration Flower Port
                                </h6>                  
                                <p class="text-md leading-8 text-gray-500 mb-8 whitespace-nowrap">By: Dust Studios</p>
                                <div class="flex items-center max-sm:flex-col gap-x-10 gap-y-3">
                                    <span class="text-lg leading-8 text-gray-500 whitespace-nowrap">Weight: 500g</span>
                                    <span class="text-lg leading-8 text-gray-500 whitespace-nowrap">Quantity: 1</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-around w-full sm:pl-28 lg:pl-0">
                            <div class="flex flex-col justify-center items-start max-sm:items-center">
                                <p class="text-lg text-gray-500 leading-8 mb-2 text-left whitespace-nowrap">PRICE</p>
                                <p class="font-semibold text-lg leading-8 text-black text-left whitespace-nowrap">IDR 500.000,00</p>
                            </div>
                        </div>
                    </div>
            
                    <svg class="my-9 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2" fill="none">
                        <path d="M0 1H1216" stroke="#D1D5DB" />
                    </svg>
            
                    <div class="flex max-lg:flex-col items-center gap-8 lg:gap-24 px-3 md:px-11">
                        <div class="grid grid-cols-4 w-full">
                            <div class="col-span-4 sm:col-span-1">
                                <img src="https://pagedone.io/asset/uploads/1705474672.png" alt="" class="max-sm:mx-auto object-cover">
                            </div>
                            <div class="col-span-4 sm:col-span-3 max-sm:mt-4 sm:pl-8 flex flex-col justify-center max-sm:items-center">
                                <h6 class="font-semibold text-xl leading-5 text-black mb-2">
                                    Decoration Item
                                </h6>
                                <p class="text-md leading-8 text-gray-500 mb-8 whitespace-nowrap">By: Dust Studios</p>
                                <div class="flex items-center max-sm:flex-col gap-x-10 gap-y-3">
                                    <span class="text-lg leading-8 text-gray-500 whitespace-nowrap">Weight: 500g</span>
                                    <span class="text-lg leading-8 text-gray-500 whitespace-nowrap">Quantity: 1</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-around w-full sm:pl-28 lg:pl-0">
                            <div class="flex flex-col justify-center items-start max-sm:items-center">
                                <p class="text-lg text-gray-500 leading-8 mb-2 text-left whitespace-nowrap">PRICE</p>
                                <p class="font-semibold text-lg leading-8 text-black text-left whitespace-nowrap">IDR 500.000,00</p>
                            </div>
                        </div>
                    </div>
                    
                    <svg class="mt-9 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2" fill="none">
                        <path d="M0 1H1216" stroke="#D1D5DB" />
                    </svg>
            
                    <div class="px-3 md:px-11 py-8 flex justify-end">
                        <p class="font-medium text-xl leading-8 text-black"> 
                            <span class="text-gray-500">Total Price: </span> &nbsp;$200.00
                        </p>
                    </div>
                </div>
            </div>
    </section>
                                            

</x-main>
