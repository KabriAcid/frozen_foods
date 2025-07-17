<?php
// Get current page name for dynamic title
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$page_titles = [
    'dashboard' => 'Dashboard',
    'orders' => 'Orders',
    'products' => 'Products',
    'analytics' => 'Analytics',
    'users' => 'Users',
    'notifications' => 'Notifications',
    'settings' => 'Settings'
];
$page_title = isset($page_titles[$current_page]) ? $page_titles[$current_page] : 'Admin';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frozen Foods Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
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
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 bg-orange-50 border-r-4 border-orange-500">
                <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                <span class="font-medium">Dashboard</span>
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
            <a href="notifications.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="bell" class="w-5 h-5 mr-3"></i>
                <span>Notifications</span>
                <span class="ml-auto bg-orange-500 text-white text-xs rounded-full px-2 py-1">3</span>
            </a>
            <a href="settings.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="settings" class="w-5 h-5 mr-3"></i>
                <span>Settings</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Navigation -->
        <!-- Top Navigation -->
<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between h-16 px-6">
        <div class="flex items-center">
            <button id="menuToggle" class="lg:hidden mr-4 text-gray-600 hover:text-gray-900">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800"><?php echo $page_title; ?></h1>
        </div>
        
        <div class="flex items-center space-x-4">
            <div class="relative hidden md:block">
                <input type="text" placeholder="Search <?php echo strtolower($page_title); ?>..." class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                <i data-lucide="search" class="absolute left-3 top-2.5 w-5 h-5 text-gray-400"></i>
            </div>
            
            <button class="relative p-2 text-gray-600 hover:text-gray-900 transition-colors">
                <i data-lucide="bell" class="w-6 h-6"></i>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
            </button>
            
            <!-- User Dropdown -->
            <div class="relative">
                <button id="userDropdown" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50 transition-colors">
                    <img src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&w=400" alt="User" class="w-8 h-8 rounded-full">
                    <span class="hidden md:block text-sm font-medium text-gray-700">John Doe</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-500 transition-transform duration-200" id="dropdownIcon"></i>
                </button>
                
                <!-- Dropdown Menu -->
                <div id="userDropdownMenu" class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50 opacity-0 invisible transform scale-95 transition-all duration-200 origin-top-right">
                    <!-- User Info -->
                    <div class="px-4 py-3 border-b border-gray-100">
                        <div class="flex items-center space-x-3">
                            <img src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&w=400" alt="User" class="w-10 h-10 rounded-full">
                            <div>
                                <p class="text-sm font-medium text-gray-900">John Doe</p>
                                <p class="text-xs text-gray-500">Admin</p>
                                <p class="text-xs text-gray-400">john.doe@frozenfood.com</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Menu Items -->
                    <div class="py-1">
                        <a href="profile.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                            <i data-lucide="user" class="w-4 h-4 mr-3 text-gray-400"></i>
                            My Profile
                        </a>
                        <a href="account-settings.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                            <i data-lucide="settings" class="w-4 h-4 mr-3 text-gray-400"></i>
                            Account Settings
                        </a>
                        <a href="preferences.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                            <i data-lucide="sliders" class="w-4 h-4 mr-3 text-gray-400"></i>
                            Preferences
                        </a>
                    </div>
                    
                    <div class="border-t border-gray-100 py-1">
                        <a href="help.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                            <i data-lucide="help-circle" class="w-4 h-4 mr-3 text-gray-400"></i>
                            Help & Support
                        </a>
                        <a href="activity-log.php" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                            <i data-lucide="activity" class="w-4 h-4 mr-3 text-gray-400"></i>
                            Activity Log
                        </a>
                    </div>
                    
                    <div class="border-t border-gray-100 py-1">
                        <button onclick="handleSignOut()" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                            <i data-lucide="log-out" class="w-4 h-4 mr-3"></i>
                            Sign Out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

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