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
                    <?php ?>
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
            <?php include __DIR__ . '/../../components/backend-nav.php' ?>
        </div>
    </main>
    <script src="../../assets/js/dashboard.js"></script>
</body>

</html>