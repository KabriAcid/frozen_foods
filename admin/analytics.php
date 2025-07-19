<?php require __DIR__ . '/partials/headers.php'; ?>

<body class="bg-gray-50 font-sans">
    <?php require __DIR__ . '/partials/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content lg:ml-64">
        <!-- Top Navigation -->
        <?php require __DIR__ . '/partials/top-navbar.php'; ?>
        <!-- Analytics Content -->
        <main class="p-6">
            <!-- Filters Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    <h3 class="text-lg font-semibold text-gray-800">Analytics Overview</h3>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-3 sm:space-y-0 sm:space-x-4">
                        <div class="flex items-center space-x-2">
                            <label class="text-sm font-medium text-gray-600">Date Range:</label>
                            <select id="dateRange" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <option value="7">Last 7 days</option>
                                <option value="30" selected>Last 30 days</option>
                                <option value="90">Last 90 days</option>
                                <option value="365">Last year</option>
                            </select>
                        </div>
                        <div class="flex items-center space-x-2">
                            <label class="text-sm font-medium text-gray-600">Category:</label>
                            <select id="categoryFilter" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <option value="all">All Categories</option>
                                <option value="chicken">Chicken</option>
                                <option value="seafood">Seafood</option>
                                <option value="beef">Beef</option>
                                <option value="vegetables">Vegetables</option>
                            </select>
                        </div>
                        <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors flex items-center">
                            <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                            Export Report
                        </button>
                    </div>
                </div>
            </div>

            <!-- KPI Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                            <p class="text-2xl font-bold text-gray-900">$45,231</p>
                            <p class="text-sm text-green-600 flex items-center mt-1">
                            </p>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <i data-lucide="dollar-sign" class="w-6 h-6 text-green-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Orders</p>
                            <p class="text-2xl font-bold text-gray-900">1,847</p>
                            <p class="text-sm text-green-600 flex items-center mt-1">
                            </p>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="shopping-cart" class="w-6 h-6 text-blue-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Active Users</p>
                            <p class="text-2xl font-bold text-gray-900">892</p>
                            <p class="text-sm text-red-600 flex items-center mt-1">
                            </p>
                        </div>
                        <div class="bg-purple-50 p-3 rounded-lg">
                            <i data-lucide="users" class="w-6 h-6 text-purple-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Avg Order Value</p>
                            <p class="text-2xl font-bold text-gray-900">$24.50</p>
                            <p class="text-sm text-green-600 flex items-center mt-1">
                            </p>
                        </div>
                        <div class="bg-orange-50 p-3 rounded-lg">
                            <i data-lucide="credit-card" class="w-6 h-6 text-orange-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Sales Overview Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Sales Overview</h3>
                        <div class="flex items-center space-x-2">
                            <button class="text-sm text-gray-500 hover:text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-50">Daily</button>
                            <button class="text-sm text-white bg-orange-500 px-3 py-1 rounded-lg">Weekly</button>
                            <button class="text-sm text-gray-500 hover:text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-50">Monthly</button>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <!-- Orders by Category Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Orders by Category</h3>
                        <button class="text-sm text-gray-500 hover:text-gray-700">
                            <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                        </button>
                    </div>
                    <div class="h-80">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Revenue Trends Chart -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Revenue Trends</h3>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Revenue</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Orders</span>
                        </div>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            <!-- Analytics Tables -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Top Selling Products -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Top Selling Products</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Product" class="w-10 h-10 rounded-lg object-cover">
                                    <div>
                                        <p class="font-medium text-gray-900">Frozen Chicken Breast</p>
                                        <p class="text-sm text-gray-500">234 sold</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$5,850</p>
                                    <p class="text-sm text-green-600">+15%</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.pexels.com/photos/1516415/pexels-photo-1516415.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Product" class="w-10 h-10 rounded-lg object-cover">
                                    <div>
                                        <p class="font-medium text-gray-900">Salmon Fillet</p>
                                        <p class="text-sm text-gray-500">189 sold</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$6,520</p>
                                    <p class="text-sm text-green-600">+22%</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.pexels.com/photos/1539684/pexels-photo-1539684.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Product" class="w-10 h-10 rounded-lg object-cover">
                                    <div>
                                        <p class="font-medium text-gray-900">Ground Beef</p>
                                        <p class="text-sm text-gray-500">156 sold</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$3,120</p>
                                    <p class="text-sm text-red-600">-5%</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Product" class="w-10 h-10 rounded-lg object-cover">
                                    <div>
                                        <p class="font-medium text-gray-900">Turkey Wings</p>
                                        <p class="text-sm text-gray-500">143 sold</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$2,680</p>
                                    <p class="text-sm text-green-600">+8%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Peak Order Times -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Peak Order Times</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="clock" class="w-5 h-5 text-orange-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">12:00 PM - 2:00 PM</p>
                                        <p class="text-sm text-gray-500">Lunch Rush</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">342 orders</p>
                                    <div class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-orange-500 h-2 rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="clock" class="w-5 h-5 text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">6:00 PM - 8:00 PM</p>
                                        <p class="text-sm text-gray-500">Dinner Time</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">298 orders</p>
                                    <div class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-blue-500 h-2 rounded-full" style="width: 74%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="clock" class="w-5 h-5 text-green-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">10:00 AM - 12:00 PM</p>
                                        <p class="text-sm text-gray-500">Morning Orders</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">156 orders</p>
                                    <div class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-green-500 h-2 rounded-full" style="width: 39%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="clock" class="w-5 h-5 text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">8:00 PM - 10:00 PM</p>
                                        <p class="text-sm text-gray-500">Evening Orders</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">89 orders</p>
                                    <div class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-purple-500 h-2 rounded-full" style="width: 22%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <script src="js/script.js"></script>
</body>

</html>