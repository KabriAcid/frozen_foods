<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Frozen Foods Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-50 font-sans">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0">
        <div class="flex items-center justify-between h-16 px-6 bg-gradient-to-r from-orange-500 to-orange-600">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                    <i data-lucide="snowflake" class="w-5 h-5 text-orange-500"></i>
                </div>
                <span class="ml-3 text-white font-bold text-lg">Frozen Foods</span>
            </div>
            <button id="closeSidebar" class="lg:hidden text-white hover:text-orange-200">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        
        <nav class="mt-8">
            <div class="px-6 mb-6">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Main</h3>
            </div>
            <a href="dashboard.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a href="orders.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="shopping-cart" class="w-5 h-5 mr-3"></i>
                <span>Orders</span>
            </a>
            <a href="products.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="package" class="w-5 h-5 mr-3"></i>
                <span>Products</span>
            </a>
            <a href="analytics.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="bar-chart-3" class="w-5 h-5 mr-3"></i>
                <span>Analytics</span>
            </a>
            <a href="users.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="users" class="w-5 h-5 mr-3"></i>
                <span>Users</span>
            </a>
            
            <div class="px-6 mt-8 mb-6">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">System</h3>
            </div>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 bg-orange-50 border-r-4 border-orange-500">
                <i data-lucide="bell" class="w-5 h-5 mr-3"></i>
                <span class="font-medium">Notifications</span>
                <span class="ml-auto bg-orange-500 text-white text-xs rounded-full px-2 py-1">3</span>
            </a>
            <a href="settings.html" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="settings" class="w-5 h-5 mr-3"></i>
                <span>Settings</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between h-16 px-6">
                <div class="flex items-center">
                    <button id="menuToggle" class="lg:hidden mr-4 text-gray-600 hover:text-gray-900">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-800">Notifications</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                        <i data-lucide="check-circle" class="w-4 h-4 mr-2 inline"></i>
                        Mark All Read
                    </button>
                    
                    <div class="relative">
                        <button class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50">
                            <img src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&w=400" alt="User" class="w-8 h-8 rounded-full">
                            <span class="hidden md:block text-sm font-medium text-gray-700">John Doe</span>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-500"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Notifications Content -->
        <main class="p-6">
            <!-- Notification Filters -->
            <div class="mb-6">
                <div class="flex items-center space-x-4">
                    <button class="bg-orange-500 text-white px-4 py-2 rounded-lg">All</button>
                    <button class="bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">Orders</button>
                    <button class="bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">System</button>
                    <button class="bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">Users</button>
                </div>
            </div>

            <!-- Notifications List -->
            <div class="space-y-4">
                <!-- New Order Notification -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200 border-l-4 border-l-orange-500">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="bg-orange-100 p-2 rounded-lg">
                                <i data-lucide="shopping-cart" class="w-5 h-5 text-orange-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">New Order Received</h3>
                                <p class="text-gray-600 mt-1">Order #ORD-1234 from John Smith for $45.99</p>
                                <p class="text-sm text-gray-500 mt-2">2 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Low Stock Alert -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200 border-l-4 border-l-red-500">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="bg-red-100 p-2 rounded-lg">
                                <i data-lucide="alert-triangle" class="w-5 h-5 text-red-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">Low Stock Alert</h3>
                                <p class="text-gray-600 mt-1">Turkey Wings is running low (only 5 items left)</p>
                                <p class="text-sm text-gray-500 mt-2">15 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- New User Registration -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200 border-l-4 border-l-blue-500">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="bg-blue-100 p-2 rounded-lg">
                                <i data-lucide="user-plus" class="w-5 h-5 text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">New User Registration</h3>
                                <p class="text-gray-600 mt-1">Sarah Johnson just signed up for an account</p>
                                <p class="text-sm text-gray-500 mt-2">1 hour ago</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- System Update -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="bg-gray-100 p-2 rounded-lg">
                                <i data-lucide="settings" class="w-5 h-5 text-gray-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">System Update Complete</h3>
                                <p class="text-gray-600 mt-1">Dashboard has been updated to version 2.1.0</p>
                                <p class="text-sm text-gray-500 mt-2">3 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-400 hover:text-gray-600">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Daily Sales Report -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="bg-green-100 p-2 rounded-lg">
                                <i data-lucide="bar-chart-3" class="w-5 h-5 text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">Daily Sales Report</h3>
                                <p class="text-gray-600 mt-1">Today's sales: $1,250.75 (23 orders)</p>
                                <p class="text-sm text-gray-500 mt-2">Yesterday, 6:00 PM</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-400 hover:text-gray-600">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Processed -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="bg-green-100 p-2 rounded-lg">
                                <i data-lucide="credit-card" class="w-5 h-5 text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">Payment Processed</h3>
                                <p class="text-gray-600 mt-1">Payment of $89.50 received from Mike Johnson</p>
                                <p class="text-sm text-gray-500 mt-2">2 days ago</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-400 hover:text-gray-600">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="mt-8 text-center">
                <button class="bg-white text-gray-700 px-6 py-3 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                    Load More Notifications
                </button>
            </div>
        </main>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <script src="script.js"></script>
</body>
</html>