<x-main>

    <!-- Layout Wrapper -->
    <div class="flex gap-12 max-w-7xl w-full mt-12 mb-22">

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
        <main class="flex-1">
            <div class="bg-white p-7 rounded-xl shadow-md">
                <!-- Profile Header -->
                <div class="flex items-center mb-12">
                    <div class="relative">
                        <img src="{{ URL('img/registercat1.png') }}" alt="Profile" class="w-24 h-24 rounded-full object-cover border-4 border-gray-300">
                        <button class="absolute bottom-0 right-0 bg-white p-2 rounded-full shadow-md">
                        
                        </button>
                    </div>
                    <div class="ml-4"> 
                        <h1 class="text-xl font-semibold">Joni Sutedja</h1>
                        <p class="text-gray-500">Palmerah, Jakarta</p>
                    </div>
                </div>
                
                <!-- Profile Form -->
                <form>
                     <div class="grid grid-cols-2 gap-x-10 gap-y-8">
                        <div>
                            <label class="block text-gray-700 mb-2">First Name</label>
                            <input type="text" class="w-full p-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Last Name</label>
                            <input type="text" class="w-full p-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full p-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" class="w-full p-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">City</label>
                            <input type="text" class="w-full p-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Province</label>
                            <input type="text" class="w-full p-2 border rounded-lg">
                        </div>
                    </div>
                    <div class="text-center mt-10">
                        <button class="bg-red-400 text-white px-6 py-2 rounded-lg">Save</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons(); // Load Lucide Icons
    </script>

</x-main>
