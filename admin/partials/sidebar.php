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
        <a href="dashboard.php" class="flex items-center px-6 py-3 text-gray-700 bg-orange-50 border-r-4 border-orange-500">
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
<!-- Logout Confirmation Modal -->
<div id="signOutModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Sign Out</h2>
        <p class="text-sm text-gray-600 mb-6">Are you sure you want to sign out?</p>
        <div class="flex justify-end space-x-4">
            <button id="cancelSignOut" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Cancel</button>
            <button id="confirmSignOut" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Sign Out</button>
        </div>
    </div>
</div>