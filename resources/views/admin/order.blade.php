<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="h-full">
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-16 bg-white flex flex-col items-center py-4 shadow-sm">
            <div class="mb-8">
                <a href="/">
                <img src="/img/logopet.png" alt="Petty Logo" class="w-10 h-7">
                </a>
            </div>
            <div class="flex flex-col items-center gap-8">
                <a href="/admin/dashboard" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="ri-pie-chart-line text-gray-400 text-xl"></i>
                </a>
                <a href="/admin/product" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="ri-shopping-bag-3-line text-gray-400 text-xl"></i>
                </a>
                <a href="/admin/order" class="p-2 rounded-lg bg-pink-50 hover:bg-pink-100 transition-colors">
                    <i class="ri-group-line text-pink-400 text-xl"></i>
                </a>
            </div>
            <div class="mt-auto">
                <a href="/" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="ri-settings-line text-gray-400 text-xl"></i>
                </a>
            </div>
        </div>


        <div class="mx-auto mt-10 bg-gray-100">
            <div class="flex items-center justify-between mb-5">
                <div class="relative w-1/3">
                    <input type="text" placeholder="Search" class="w-full border rounded-lg p-3 pl-10 shadow-sm focus:ring-2 focus:ring-gray-300">
                    <svg class="absolute left-3 top-3 text-gray-400 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10 17a7 7 0 1 1 0-14 7 7 0 0 1 0 14z" />
                    </svg>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-gray-600">Showing</span>
                    <select class="border rounded-lg p-2">
                        <option>9</option>
                        <option>15</option>
                        <option>30</option>
                    </select>
                    <button class="flex items-center px-4 py-2 bg-gray-200 rounded-lg shadow-sm">
                        <svg class="w-5 h-5 mr-1 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                        Filter
                    </button>
                </div>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-5">Order Management Dashboard</h2>

            <!-- Product Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="pr-10 pl-6 py-3 text-gray-600">Customer Name</th>
                            <th class="pr-10 pl-6 py-3 text-gray-600">Order ID</th>
                            <th class="pr-10 pl-6 py-3 text-gray-600">Total Price</th>
                            <th class="pr-10 pl-6 py-3 text-gray-600">Total Items</th>
                            <th class="pr-10 pl-8 py-3 text-gray-600">Status</th>
                            <th class="pr-12 pl-8 py-3 text-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($products as $product) --}}
                        {{-- <tr class="border-b last:border-b-0 hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4">#{{ $product->id }}</td>
                            <td class="px-6 py-4">IDR {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $product->stock }} pcs</td>
                            <td class="px-6 py-4 font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-500' }}">
                                {{ $product->stock > 0 ? 'Available' : 'Out of Stock' }}
                            </td>
                            <td class="px-6 py-4">...</td>
                        </tr> --}}
                        <tr class="border-b last:border-b-0 hover:bg-gray-100">
                            <td class="px-6 py-4">Duri</td>
                            <td class="px-6 py-4">#123333</td>
                            <td class="px-6 py-4">IDR 1232333</td>
                            <td class="px-6 py-4">5 pcs</td>
                            <td class="px-6 py-4 font-semibold text-green-600">
                                Available
                            </td>
                            <td class="px-8 py-4">....</td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-center space-x-2">
        <button class="px-4 py-2 bg-gray-200 rounded-lg">Previous</button>
    </div>


</div>

</div>
</body>