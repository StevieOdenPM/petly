<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/lucide@latest"></script>
    <title>User Profile</title>
</head>
<body class="bg-gray-100 flex min-h-screen items-center justify-center p-6">

    <!-- Layout Wrapper -->
    <div class="flex gap-10 max-w-6xl w-full">

        <!-- User Profile Sidebar (Same Style as Profile Container) -->
        <aside class="bg-white shadow-md rounded-xl p-6 w-80 flex flex-col items-center self-start">
            <h2 class="text-xl font-semibold text-center mb-6">User Profile</h2>
            
            <nav class="space-y-4 w-full">
                <a href="#" class="flex items-center gap-2 text-red-500 font-semibold px-4 py-2 rounded-lg relative group">
                    <i data-lucide="user"></i> User Info
                    <span class="absolute right-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-red-500 rounded-full"></span>
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-red-500 font-medium px-4 py-2 rounded-lg">
                    <i data-lucide="banknote"></i> Bank Account
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-red-500 font-medium px-4 py-2 rounded-lg">
                    <i data-lucide="paw-print"></i> Add Pet
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-red-500 font-medium px-4 py-2 rounded-lg">
                    <i data-lucide="settings"></i> Settings
                </a>
            </nav>

            <div class="border-t w-full mt-6 pt-4">
                <a href="#" class="flex items-center gap-2 text-red-500 font-semibold px-4 py-2">
                    <i data-lucide="log-out"></i> Logout
                </a>
            </div>
        </aside>

        <!-- Profile Container -->
        <main class="flex-1 flex justify-center items-center">
            <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl w-full">
                <!-- Profile Header -->
                <div class="flex items-center mb-6">
                    <div class="relative">
                        <img src="{{ URL('img/registercat1.png') }}" alt="Profile" class="w-24 h-24 rounded-full object-cover border-4 border-gray-300">
                        <button class="absolute bottom-0 right-0 bg-white p-2 rounded-full shadow-md">
                            ✎
                        </button>
                    </div>
                    <div class="ml-4"> <!-- Menambahkan margin kiri agar ada jarak -->
                        <h1 class="text-xl font-semibold">Joni Sutedja</h1>
                        <p class="text-gray-500">Palmerah, Jakarta</p>
                    </div>
                </div>
                
                <!-- Profile Form -->
                <form>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700">First Name</label>
                            <input type="text" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-gray-700">Last Name</label>
                            <input type="text" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-gray-700">Email</label>
                            <input type="email" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-gray-700">Phone Number</label>
                            <input type="tel" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-gray-700">City</label>
                            <input type="text" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-gray-700">Province</label>
                            <input type="text" class="w-full p-2 border rounded">
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <button class="bg-red-400 text-white px-6 py-2 rounded-lg">Save</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons(); // Load Lucide Icons
    </script>

</body>
</html>
