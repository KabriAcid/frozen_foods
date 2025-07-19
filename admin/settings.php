<?php require __DIR__ . '/partials/headers.php'; ?>

<body class="bg-gray-50 font-sans">
    <?php require __DIR__ . '/partials/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content lg:ml-64">
        <!-- Top Navigation -->
        <?php require __DIR__ . '/partials/top-navbar.php'; ?>
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

    <script src="js/script.js"></script>
</body>

</html>