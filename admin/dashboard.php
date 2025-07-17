<?php require __DIR__ . '/partials/headers.php'; ?>
<body class="bg-gray-50 font-sans">
    <?php require __DIR__ . '/partials/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content lg:ml-64">
        <!-- Top Navigation -->
        <?php require __DIR__ . '/partials/top-navbar.php'; ?>        
        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- KPI Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Orders</p>
                            <p class="text-3xl font-bold text-gray-900">1,234</p>
                            <p class="text-sm text-green-600 mt-1">+12% from last month</p>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="shopping-cart" class="w-6 h-6 text-blue-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Revenue</p>
                            <p class="text-3xl font-bold text-gray-900">$45,678</p>
                            <p class="text-sm text-green-600 mt-1">+8% from last month</p>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <i data-lucide="dollar-sign" class="w-6 h-6 text-green-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Active Users</p>
                            <p class="text-3xl font-bold text-gray-900">892</p>
                            <p class="text-sm text-orange-600 mt-1">+5% from last month</p>
                        </div>
                        <div class="bg-orange-50 p-3 rounded-lg">
                            <i data-lucide="users" class="w-6 h-6 text-orange-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Reviews</p>
                            <p class="text-3xl font-bold text-gray-900">4.8</p>
                            <p class="text-sm text-green-600 mt-1">+0.2 from last month</p>
                        </div>
                        <div class="bg-yellow-50 p-3 rounded-lg">
                            <i data-lucide="star" class="w-6 h-6 text-yellow-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Sales Chart -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Sales Overview</h3>
                    <div class="relative h-64">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <!-- Orders Chart -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Orders by Category</h3>
                    <div class="relative h-64">
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Orders & Top Products -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Orders -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Recent Orders</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="package" class="w-5 h-5 text-orange-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">#ORD-001</p>
                                        <p class="text-sm text-gray-500">Frozen Chicken Breast</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$24.99</p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Delivered
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="package" class="w-5 h-5 text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">#ORD-002</p>
                                        <p class="text-sm text-gray-500">Frozen Salmon Fillet</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$34.50</p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Processing
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="package" class="w-5 h-5 text-red-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">#ORD-003</p>
                                        <p class="text-sm text-gray-500">Turkey Wings</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$18.75</p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Shipped
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="orders.php" class="text-orange-600 hover:text-orange-700 font-medium text-sm">View all orders →</a>
                        </div>
                    </div>
                </div>

                <!-- Top Products -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Top Products</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Chicken" class="w-12 h-12 rounded-lg object-cover">
                                    <div>
                                        <p class="font-medium text-gray-900">Chicken Breast</p>
                                        <p class="text-sm text-gray-500">124 orders</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$3,098</p>
                                    <div class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-orange-500 h-2 rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.pexels.com/photos/725997/pexels-photo-725997.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Salmon" class="w-12 h-12 rounded-lg object-cover">
                                    <div>
                                        <p class="font-medium text-gray-900">Salmon Fillet</p>
                                        <p class="text-sm text-gray-500">89 orders</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$2,890</p>
                                    <div class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-blue-500 h-2 rounded-full" style="width: 70%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.pexels.com/photos/8447662/pexels-photo-8447662.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Turkey" class="w-12 h-12 rounded-lg object-cover">
                                    <div>
                                        <p class="font-medium text-gray-900">Turkey Wings</p>
                                        <p class="text-sm text-gray-500">67 orders</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">$1,256</p>
                                    <div class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-red-500 h-2 rounded-full" style="width: 45%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="products.php" class="text-orange-600 hover:text-orange-700 font-medium text-sm">View all products →</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <script src="script.js"></script>
</body>

</html>