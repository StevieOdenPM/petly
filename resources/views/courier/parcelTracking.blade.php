<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Tracking Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        .route-line {
            border-top: 2px dashed #FF9999;
            position: absolute;
            top: 50%;
            left: 100px;
            /* Increased from 80px */
            width: 60%;
            /* Changed from calc(100% - 160px) to a percentage */
            height: 0 !important;
            z-index: 0 !important;
        }

        .no-destination .route-line {
            width: 50%;
            /* Shorter for no destination */
        }

        .route-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #FF9999;
            position: relative;
            z-index: 1;
        }

        .route-dot.start {
            background-color: #FF9999;
            padding-right: 8px;
        }

        .route-dot.end {
            background-color: white;
            border: 2px solid #FF9999;
            padding-left: 8px;
        }

        .map-placeholder {
            background-color: #f0f0f0;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
        }

        .map-placeholder::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, #e0e0e0 25%, transparent 25%, transparent 75%, #e0e0e0 75%),
                linear-gradient(45deg, #e0e0e0 25%, transparent 25%, transparent 75%, #e0e0e0 75%);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            opacity: 0.3;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
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
                <a href="/courier-info" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="ri-user-line text-gray-400 text-xl"></i>
                </a>
                <a href="/parcel-tracking" class="p-2 rounded-lg bg-pink-50 hover:bg-pink-100 transition-colors">
                    <i class="ri-truck-line text-pink-400 text-xl"></i>
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
        <div class="flex-1 p-4 ml-20 mr-20">
            <!-- Search Bar -->
            <div class="mb-4 flex mt-6">
                <div class="relative flex-1 max-w-md">
                    <i class="ri-search-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Search"
                        class="pl-10 pr-4 py-2 w-full border border-gray-200 rounded-md text-sm">
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-4">
                <!-- Shipping Cards Column -->
                <div class="w-full lg:w-2/5 space-y-4">
                    <?php
                    $shippings = [
                        [
                            'id' => '#731845',
                            'status' => 'On Delivery',
                            'status_class' => 'bg-green-100 text-green-600',
                            'time' => '13:50',
                            'date' => 'Dec 25, 2025',
                            'origin' => 'Petty Kemangisan',
                            'destination' => 'BINUS University',
                            'client' => 'Salimin Saputro',
                            'active' => true
                        ],
                        [
                            'id' => '#123245',
                            'status' => 'On Hold',
                            'status_class' => 'bg-yellow-100 text-yellow-600',
                            'time' => '—',
                            'date' => 'Dec 25, 2025',
                            'origin' => 'Petty Kemangisan',
                            'destination' => 'Melrose Place Residence',
                            'client' => 'Sadikin',
                            'active' => false
                        ],
                        [
                            'id' => '#553423',
                            'status' => 'On Delivery With Another Courier',
                            'status_class' => 'bg-green-100 text-green-600',
                            'time' => '12.10',
                            'date' => 'Dec 25, 2025',
                            'origin' => 'Petty Kemangisan',
                            'destination' => 'Kost 555 - Jalan U21 Puri Indah',
                            'client' => 'Joni Sina',
                            'active' => false
                        ],
                        [
                            'id' => '#5232213',
                            'status' => 'Cancelled',
                            'status_class' => 'bg-red-100 text-red-600',
                            'time' => '—',
                            'date' => 'Dec 25, 2025',
                            'origin' => '',
                            'destination' => '',
                            'client' => '',
                            'active' => false
                        ]
                    ];

                    foreach ($shippings as $shipping) {
                        $timeLabel = isset($shipping['time_label']) ? $shipping['time_label'] : 'Estimated Time of Arrival';
                        if ($shipping['status'] == 'Delivered') {
                            $timeLabel = 'Arrived At';
                        }
                    ?>
                    <div class="bg-white rounded-xl p-4 shadow-sm">
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <span class="text-gray-700 font-medium">Shipping ID : <?php echo $shipping['id']; ?></span>
                            </div>
                            <div>
                                <span class="px-3 py-1 rounded-full text-xs <?php echo $shipping['status_class']; ?>">
                                    <?php echo $shipping['status']; ?>
                                </span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <p class="text-xs text-gray-500"><?php echo $timeLabel; ?></p>
                                <p class="text-xl font-semibold"><?php echo $shipping['time']; ?></p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500"><?php echo $shipping['date']; ?></p>
                            </div>
                        </div>

                        <div class="relative flex items-center justify-between py-2 mb-3 <?php echo empty($shipping['destination']) ? 'no-destination' : ''; ?>">
                            <div class="route-line"></div>
                            <div class="flex items-center">
                                <div class="route-dot start"></div>
                                <div class="ml-2">
                                    <p class="text-xs font-medium">Petty</p>
                                    <p class="text-xs text-gray-500">Kemangisan</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="route-dot end"></div>
                                <div class="ml-2">
                                    <p class="text-xs font-medium"><?php echo explode(' - ', $shipping['destination'])[0]; ?></p>
                                    <?php if (strpos($shipping['destination'], ' - ') !== false): ?>
                                    <p class="text-xs text-gray-500"><?php echo explode(' - ', $shipping['destination'])[1]; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center">
                                <i class="ri-user-line text-pink-500 text-sm"></i>
                            </div>
                            <div class="ml-2">
                                <p class="text-sm"><?php echo $shipping['client']; ?></p>
                                <p class="text-xs text-gray-500">Client</p>
                            </div>
                            <div class="ml-auto">
                                <button class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                                    <i class="ri-chat-1-line text-gray-500 text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <!-- Delivery Details -->
                <div class="w-full md:w-4/5 lg:w-3/5 bg-white rounded-xl p-4 md:p-6 shadow-md dark:bg-gray-800 dark:text-white"
                    role="region" aria-label="Shipping Tracker">
                    <div class="grid grid-cols-1 gap-4 md:gap-6">

                        <!-- Map Overview -->
                        <div>
                            <h2 class="text-sm font-semibold text-gray-700 mb-3">MAP OVERVIEW</h2>
                            <div id="map" class="h-[450px] mb-4 rounded-lg"></div>
                        </div>

                        <script>
                            // Initialize the map
                            var map = L.map('map').setView([-6.2088, 106.8456], 13); // Jakarta coordinates

                            // Add the tile layer (map background)
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);

                            // Zoom functions for the buttons
                            function zoomIn() {
                                map.zoomIn();
                            }

                            function zoomOut() {
                                map.zoomOut();
                            }
                        </script>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                        <!-- Vehicle Information -->
                        <div>
                            <h2 class="text-sm font-semibold text-gray-700 mb-3">VEHICLE INFORMATION</h2>
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="ri-truck-line text-pink-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Mitsubishi Colt L300</p>
                                        <p class="text-sm text-gray-500">Truck</p>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <p class="text-xs text-gray-500">PLATE NUMBER</p>
                                        <p class="text-sm">B 117 AL</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Driver Information -->
                        <div>
                            <h2 class="text-sm font-semibold text-gray-700 mb-3">DRIVER</h2>
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="ri-user-line text-pink-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Salikin Sadikin</p>
                                        <p class="text-sm text-gray-500">Driver</p>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <p class="text-xs text-gray-500">PHONE NUMBER</p>
                                        <p class="text-sm">+62 123 123 123</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-gray-500">EMAIL ADDRESS</p>
                                        <p class="text-sm">salikin95@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-8 max-w-sm w-full text-center relative">
            <button onclick="closeSuccessModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <i class="ri-close-line text-xl"></i>
            </button>
            <div class="mb-4 inline-flex items-center justify-center">
                <div class="w-16 h-16 rounded-full bg-pink-100 p-3 relative">
                    <div class="absolute inset-0 rounded-full bg-pink-400 animate-ping opacity-25"></div>
                    <div class="relative w-full h-full bg-pink-400 rounded-full flex items-center justify-center">
                        <i class="ri-check-line text-white text-2xl"></i>
                    </div>
                </div>
            </div>
            <h2 class="text-xl font-semibold text-gray-800 mb-1">Delivery Successful</h2>
            <p class="text-gray-500">Great Job!</p>
        </div>
    </div>

    <script>
        function showSuccessModal() {
            document.getElementById('successModal').classList.remove('hidden');
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }
    </script>

</body>
</body>

</html>
