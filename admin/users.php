<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Frozen Foods Admin</title>
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
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 bg-orange-50 border-r-4 border-orange-500">
                <i data-lucide="users" class="w-5 h-5 mr-3"></i>
                <span class="font-medium">Users</span>
            </a>
            
            <div class="px-6 mt-8 mb-6">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">System</h3>
            </div>
            <a href="notifications.html" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                <i data-lucide="bell" class="w-5 h-5 mr-3"></i>
                <span>Notifications</span>
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
                    <h1 class="text-xl font-semibold text-gray-800">Users</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search users..." class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        <i data-lucide="search" class="absolute left-3 top-2.5 w-5 h-5 text-gray-400"></i>
                    </div>
                    
                    <button class="relative p-2 text-gray-600 hover:text-gray-900">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
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

        <!-- Users Content -->
        <main class="p-6">
            <!-- Users Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-2xl font-bold text-gray-900">2,847</p>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <i data-lucide="users" class="w-6 h-6 text-blue-600"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Active Users</p>
                            <p class="text-2xl font-bold text-green-600">1,892</p>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <i data-lucide="user-check" class="w-6 h-6 text-green-600"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">New This Month</p>
                            <p class="text-2xl font-bold text-orange-600">234</p>
                        </div>
                        <div class="bg-orange-50 p-3 rounded-lg">
                            <i data-lucide="user-plus" class="w-6 h-6 text-orange-600"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Premium Users</p>
                            <p class="text-2xl font-bold text-purple-600">567</p>
                        </div>
                        <div class="bg-purple-50 p-3 rounded-lg">
                            <i data-lucide="crown" class="w-6 h-6 text-purple-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800">User Management</h3>
                        <div class="flex items-center space-x-4">
                            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <option>All Users</option>
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Premium</option>
                            </select>
                            <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                                <i data-lucide="user-plus" class="w-4 h-4 mr-2 inline"></i>
                                Add User
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Spent</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&w=400" alt="User" class="w-10 h-10 rounded-full mr-4">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">John Smith</div>
                                            <div class="text-sm text-gray-500">Premium Customer</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">john.smith@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">23</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,234.56</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jan 15, 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-red-600 hover:text-red-900">Suspend</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&w=400" alt="User" class="w-10 h-10 rounded-full mr-4">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Jane Doe</div>
                                            <div class="text-sm text-gray-500">Regular Customer</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">jane.doe@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$567.89</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dec 08, 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-red-600 hover:text-red-900">Suspend</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&w=400" alt="User" class="w-10 h-10 rounded-full mr-4">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Mike Johnson</div>
                                            <div class="text-sm text-gray-500">New Customer</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">mike.j@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$89.50</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Inactive
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jan 20, 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button class="text-green-600 hover:text-green-900">Activate</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            Showing 1 to 10 of 2,847 users
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-3 py-1 text-sm text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-50">Previous</button>
                            <button class="px-3 py-1 text-sm text-white bg-orange-500 border border-orange-500 rounded">1</button>
                            <button class="px-3 py-1 text-sm text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 text-sm text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-50">3</button>
                            <button class="px-3 py-1 text-sm text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-50">Next</button>
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