<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-16 bg-white flex flex-col items-center py-4 shadow-sm">
            <div class="mb-8">
                <a href="/">
                    <img src="/img/logopet.png" alt="Petty Logo" class="w-10 h-7">
                </a>
            </div>
            <div class="flex flex-col items-center gap-8">
                {{-- <a href="/" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
            <i class="ri-file-list-line text-gray-400 text-xl"></i>
        </a> --}}
                <a href="/" class="p-2 rounded-lg bg-pink-50 hover:bg-pink-100 transition-colors">
                    <i class="ri-user-line text-pink-400 text-xl"></i>
                </a>
                <a href="/parcel-tracking" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="ri-truck-line text-gray-400 text-xl"></i>
                </a>
            </div>
            <div class="mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="cursor-pointer p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <i class="ri-logout-box-r-line text-red-500 text-xl"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4 mx-auto max-w-7xl mt-6 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Profile Card -->



                <div class="bg-white rounded-lg p-8 shadow-sm">
                    <div class="flex flex-col items-center mb-3">
                        <div class="w-14 h-14 rounded-full bg-pink-100 p-0.5 mb-1.5">
                            <img src="/img/courier1.png" alt="Profile" class="w-full h-full rounded-full object-cover">
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">James Alexander Scott
                        </h2>
                        <p class="text-sm text-gray-500">Active Courier</p>
                    </div>


                    <div>
                        <label class="block text-md font-medium text-gray-700 mb-1">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                <i class="ri-lock-line text-gray-400 text-sm"></i>
                            </div>
                            <input type="text"
                                class="block w-full pl-7 pr-2 py-1 border border-gray-200 rounded-md focus:outline-none focus:ring-pink-500 focus:border-pink-500 text-md"
                                placeholder="8467017971">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="mt-4">
                            <label class="block text-md font-medium text-gray-700 mb-1">Your Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                    <i class="ri-mail-line text-gray-400 text-sm"></i>
                                </div>
                                <input type="email"
                                    class="block w-full pl-7 pr-2 py-1 border border-gray-200 rounded-md focus:outline-none focus:ring-pink-500 focus:border-pink-500 text-md"
                                    placeholder="salikinsalimin@gmail.com">
                            </div>
                        </div>

                        <div>
                            <label class="block text-md font-medium text-gray-700 mb-1">Phone Number</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                    <i class="ri-phone-line text-gray-400 text-sm"></i>
                                </div>
                                <input type="tel"
                                    class="block w-full pl-7 pr-2 py-1 border border-gray-200 rounded-md focus:outline-none focus:ring-pink-500 focus:border-pink-500 text-md"
                                    placeholder="+621234567890">
                            </div>
                        </div>


                    </div>

                    <div class="mt-3 text-center">
                        <button class="text-gray-500 text-xs hover:text-pink-500 transition-colors">
                            Show More
                        </button>
                    </div>
                </div>
                <!-- Weather and Stats Cards -->
                <div class="space-y-4">
                    <!-- Weather Card -->
                    <div class="bg-white rounded-lg p-4 shadow-sm relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center">
                                <i class="ri-temp-hot-line text-red-400 mr-2 text-sm"></i>
                                <h2 class="text-3xl font-light text-gray-700">27°C</h2>
                            </div>
                            <div class="absolute right-4 top-4">
                                <i class="ri-sun-cloudy-line text-pink-200 text-3xl"></i>
                            </div>
                        </div>

                        <div class="mt-2 text-right">
                            <p class="text-gray-500 text-xs">Today:</p>
                            <p class="text-gray-400 text-xs">25th December 2025</p>
                        </div>

                        <div class="grid grid-cols-4 gap-2 mt-3">
                            <div class="text-center">
                                <p class="text-gray-500 text-[10px] mb-0.5">HUMIDITY</p>
                                <p class="font-medium text-xs">99%</p>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-500 text-[10px] mb-0.5">VISIBILITY</p>
                                <p class="font-medium text-xs">8km</p>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-500 text-[10px] mb-0.5">AIR PRESSURE</p>
                                <p class="font-medium text-xs">1005hPa</p>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-500 text-[10px] mb-0.5">WIND</p>
                                <p class="font-medium text-xs">2mph</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Delivery Card -->
                    <div class="bg-white rounded-lg p-4 shadow-sm relative">
                        <div class="flex justify-between">
                            <div>
                                <h2 class="text-2xl font-normal text-gray-800">25</h2>
                                <p class="text-gray-500 text-sm mt-0.5">Total Delivery</p>
                            </div>
                            <div class="text-pink-300">
                                <i class="ri-group-line text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Income Card -->
                    <div class="bg-white rounded-lg p-4 shadow-sm relative">
                        <div
                            class="absolute top-3 right-3 bg-pink-100 text-pink-500 rounded-full w-5 h-5 flex items-center justify-center text-xs">
                            <span>3</span>
                        </div>
                        <h2 class="text-2xl font-normal text-gray-800">Mitsubishi Colt L300</h2>
                        <p class="text-gray-500 text-sm mt-0.5">Vehicle Information</p>
                    </div>

                    <!-- Bonus Card -->
                    <div class="bg-white rounded-lg p-4 shadow-sm relative">
                        <div class="absolute top-3 right-3 text-pink-300">
                            <i class="ri-gift-line text-lg"></i>
                        </div>
                        <h2 class="text-2xl font-normal text-gray-800">B 1127 AL</h2>
                        <p class="text-gray-500 text-sm mt-0.5">Plate Number</p>
                    </div>
                </div>
            </div>

            <!-- Delivery History -->
            <div class="mt-4 bg-white rounded-lg p-4 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Delivery History</h2>
                    {{-- <div class="flex items-center gap-2">
                        <div class="relative">
                            <i class="ri-search-line absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input 
                                class="pl-7 pr-3 py-1 w-60 bg-gray-50 border border-gray-200 rounded-md text-xs h-7" 
                                placeholder="Search..." 
                            >
                        </div>
                        <div class="flex items-center gap-1 bg-gray-50 px-2 py-1 rounded-md text-xs text-gray-600 h-7">
                            <i class="ri-calendar-line text-xs"></i>
                            <span>25 Dec 2025</span>
                            <i class="ri-arrow-right-s-line text-xs"></i>
                        </div>
                    </div> --}}
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-[#373737] border-t border-b">
                                <th class="py-3 pl-2 font-medium text-sm">ID</th>
                                <th class="py-3 pl-2 font-medium text-sm">Customer Name</th>
                                <th class="py-3 pl-2 font-medium text-sm">Items</th>
                                <th class="py-3 pl-2 font-medium text-sm">Date</th>
                                <th class="py-3 pl-11 font-medium text-sm">Status</th>
                                <th class="py-3 pl-2 font-medium text-sm">Sent</th>
                                <th class="py-3 pl-6 font-medium text-sm">Received</th>
                                <th class="py-3 pl-2 font-medium text-sm">Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100">
                                <td class="py-3 text-gray-800 px-2">TR001</td>
                                <td class="py-3 text-gray-800 px-2">Ahmed Rashdan</td>
                                <td class="py-3 text-gray-800 px-2">Dog Food</td>
                                <td class="py-3 text-gray-500 px-2">25 December 2025</td>
                                <td class="py-3 px-2">
                                    <span class="px-2 py-1 bg-green-100 text-green-600 rounded text-[13px]">
                                        Delivered On Time
                                    </span>
                                </td>
                                <td class="py-3 text-gray-800 px-2">09:00</td>
                                <td class="py-3 px-2">
                                    <div class="flex items-center">
                                        <span class="text-gray-400 mr-1">------</span>
                                        9:25
                                    </div>
                                </td>
                                <td class="py-3 text-gray-800 px-2">25m</td>
                            </tr>
                            <tr class="border-b border-gray-100">
                                <td class="py-3 text-gray-800 px-2">TR002</td>
                                <td class="py-3 text-gray-800 px-2">Ahmed Ali</td>
                                <td class="py-3 text-gray-800 px-2">Cat Food</td>
                                <td class="py-3 text-gray-500 px-2">25 December 2025</td>
                                <td class="py-3 px-2">
                                    <span class="px-2 py-1 bg-green-100 text-green-600 rounded text-[13px]">
                                        Delivered On Time
                                    </span>
                                </td>
                                <td class="py-3 text-gray-800 px-2">09:25</td>
                                <td class="py-3 px-2">
                                    <div class="flex items-center">
                                        <span class="text-gray-400 mr-1">------</span>
                                        9:55
                                    </div>
                                </td>
                                <td class="py-3 text-gray-800 px-2">30m</td>
                            </tr>
                            <tr class="border-b border-gray-100">
                                <td class="py-3 text-gray-800 px-2">TR003</td>
                                <td class="py-3 text-gray-800 px-2">Saliwak Enak</td>
                                <td class="py-3 text-gray-800 px-2">Dog Food</td>
                                <td class="py-3 text-gray-500 px-2">25 December 2025</td>
                                <td class="py-3 px-2">
                                    <span class="px-2 py-1 bg-green-100 text-green-600 rounded text-[13px]">
                                        Delivered On Time
                                    </span>
                                </td>
                                <td class="py-3 text-gray-800 px-2">10:00</td>
                                <td class="py-3 px-2">
                                    <div class="flex items-center">
                                        <span class="text-gray-400 mr-1">------</span>
                                        10:21
                                    </div>
                                </td>
                                <td class="py-3 text-gray-800 px-2">21m</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
