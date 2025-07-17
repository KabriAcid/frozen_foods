<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Frozen Foods Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js"></script>
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
            <a href="notifications.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="bell" class="w-5 h-5 mr-3"></i>
                <span>Notifications</span>
                <span class="ml-auto bg-orange-500 text-white text-xs rounded-full px-2 py-1">3</span>
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 bg-orange-50 border-r-4 border-orange-500">
                <i data-lucide="settings" class="w-5 h-5 mr-3"></i>
                <span class="font-medium">Settings</span>
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
                    <h1 class="text-xl font-semibold text-gray-800">Settings</h1>
                </div>
                
                <div class="flex items-center space-x-4">
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

        <!-- Settings Content -->
        <main class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Settings Navigation -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 sticky top-6">
                        <div class="p-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Settings</h2>
                            <nav class="space-y-2">
                                <a href="#general" class="flex items-center px-3 py-2 text-orange-600 bg-orange-50 rounded-lg">
                                    <i data-lucide="settings" class="w-4 h-4 mr-3"></i>
                                    General
                                </a>
                                <a href="#notifications" class="flex items-center px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                                    <i data-lucide="bell" class="w-4 h-4 mr-3"></i>
                                    Notifications
                                </a>
                                <a href="#security" class="flex items-center px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                                    <i data-lucide="shield" class="w-4 h-4 mr-3"></i>
                                    Security
                                </a>
                                <a href="#billing" class="flex items-center px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                                    <i data-lucide="credit-card" class="w-4 h-4 mr-3"></i>
                                    Billing
                                </a>
                                <a href="#integrations" class="flex items-center px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">
                                    <i data-lucide="zap" class="w-4 h-4 mr-3"></i>
                                    Integrations
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Settings Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- General Settings -->
                    <div id="general" class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">General Settings</h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Business Name</label>
                                <input type="text" value="Frozen Foods Inc." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Business Email</label>
                                <input type="email" value="admin@frozenfoods.com" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" value="+1 (555) 123-4567" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">123 Main Street
New York, NY 10001</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Time Zone</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    <option>Eastern Time (ET)</option>
                                    <option>Central Time (CT)</option>
                                    <option>Mountain Time (MT)</option>
                                    <option>Pacific Time (PT)</option>
                                </select>
                            </div>
                            <div class="flex justify-end">
                                <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div id="notifications" class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Notification Settings</h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-medium text-gray-900">Email Notifications</h4>
                                        <p class="text-sm text-gray-500">Receive notifications via email</p>
                                    </div>
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only" id="email-notifications" checked>
                                        <label for="email-notifications" class="flex items-center h-6 w-11 cursor-pointer rounded-full bg-orange-500 transition-colors">
                                            <span class="sr-only">Enable email notifications</span>
                                            <span class="h-5 w-5 bg-white rounded-full translate-x-6 transition-transform"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-medium text-gray-900">Order Notifications</h4>
                                        <p class="text-sm text-gray-500">Get notified when new orders are placed</p>
                                    </div>
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only" id="order-notifications" checked>
                                        <label for="order-notifications" class="flex items-center h-6 w-11 cursor-pointer rounded-full bg-orange-500 transition-colors">
                                            <span class="sr-only">Enable order notifications</span>
                                            <span class="h-5 w-5 bg-white rounded-full translate-x-6 transition-transform"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-medium text-gray-900">Low Stock Alerts</h4>
                                        <p class="text-sm text-gray-500">Get alerted when products are running low</p>
                                    </div>
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only" id="stock-alerts" checked>
                                        <label for="stock-alerts" class="flex items-center h-6 w-11 cursor-pointer rounded-full bg-orange-500 transition-colors">
                                            <span class="sr-only">Enable stock alerts</span>
                                            <span class="h-5 w-5 bg-white rounded-full translate-x-6 transition-transform"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-medium text-gray-900">Marketing Updates</h4>
                                        <p class="text-sm text-gray-500">Receive updates about new features and promotions</p>
                                    </div>
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only" id="marketing-updates">
                                        <label for="marketing-updates" class="flex items-center h-6 w-11 cursor-pointer rounded-full bg-gray-300 transition-colors">
                                            <span class="sr-only">Enable marketing updates</span>
                                            <span class="h-5 w-5 bg-white rounded-full translate-x-1 transition-transform"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Settings -->
                    <div id="security" class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Security Settings</h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-medium text-gray-900">Two-Factor Authentication</h4>
                                    <p class="text-sm text-gray-500">Add an extra layer of security to your account</p>
                                </div>
                                <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                                    Enable 2FA
                                </button>
                            </div>
                            <div class="flex justify-end">
                                <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Billing Settings -->
                    <div id="billing" class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Billing Settings</h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-medium text-gray-900">Current Plan</h4>
                                    <p class="text-sm text-gray-500">Premium Plan - $99/month</p>
                                </div>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                    Upgrade Plan
                                </button>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900 mb-4">Payment Methods</h4>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-blue-100 rounded flex items-center justify-center mr-3">
                                                <i data-lucide="credit-card" class="w-4 h-4 text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">•••• •••• •••• 4242</p>
                                                <p class="text-sm text-gray-500">Expires 12/25</p>
                                            </div>
                                        </div>
                                        <button class="text-red-600 hover:text-red-700">Remove</button>
                                    </div>
                                </div>
                                <button class="mt-4 text-orange-600 hover:text-orange-700 font-medium">
                                    + Add Payment Method
                                </button>
                            </div>
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