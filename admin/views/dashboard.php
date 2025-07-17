<?php
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../components/backend-header.php';
?>

<body>
    <main class="dashboard">
        <div id="root">
            <div class="min-h-screen bg-gray-50">
                <div class="transition-all duration-300 ">
                    <header class="flex items-center justify-between p-4 bg-white"><button class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-6 h-6 text-gray-700">
                                <line x1="4" x2="20" y1="12" y2="12"></line>
                                <line x1="4" x2="20" y1="6" y2="6"></line>
                                <line x1="4" x2="20" y1="18" y2="18"></line>
                            </svg></button>
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center overflow-hidden border-2 border-orange-400 hover:border-orange-500 transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-6 h-6 text-white">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg></div>
                    </header>
                    <div class="pb-20">
                        <div class="relative px-4 mb-6">
                            <div class="relative"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg><input type="text" placeholder="Search for chicken, fish, turkey..." class="search-input w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all duration-200" value=""></div>
                        </div>
                        <div class="px-4 mb-6 tabs">
                            <div class="flex space-x-2 overflow-x-auto scrollbar-hide">
                                <button class="px-6 py-3 rounded-full whitespace-nowrap font-medium transition-all duration-200 bg-gray-900 text-white hover:bg-gray-200 shadow">All</button>
                                <button class="px-6 py-3 rounded-full whitespace-nowrap font-medium transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200">Chicken</button>
                                <button class="px-6 py-3 rounded-full whitespace-nowrap font-medium transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200">Fish</button>
                                <button class="px-6 py-3 rounded-full whitespace-nowrap font-medium transition-all duration-200 bg-gray-100 text-gray-600">Turkey</button>
                            </div>
                        </div>
                        <div class="px-4 grid grid-cols-2 gap-4">
                            <!-- Products will be dynamically inserted here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../../assets/js/dashboard.js"></script>
</body>

</html>