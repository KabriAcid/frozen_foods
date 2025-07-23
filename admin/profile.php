<?php
require __DIR__ . '/initialize.php';
require __DIR__ . '/util/utilities.php';
require __DIR__ . '/partials/headers.php';

$getadmin = getAdminProfile($pdo, $_SESSION['admin_id']);
$recentActivities = getAdminActivityLog($pdo, $_SESSION['admin_id']);

// system overview variables
$overview = getSystemOverview($pdo);
$totalUsers = $overview['total_users'];
$ordersToday = $overview['orders_today'];
$productsLive = $overview['products_live'];
$revenueToday = $overview['revenue_today'];
$systemUptime = $overview['system_uptime'];
$pendingTasks = $overview['pending_tasks'];
?>

<body class="bg-gray-50 font-sans">
    <?php require __DIR__ . '/partials/sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content lg:ml-64">
        <!-- Top Navigation -->
        <?php require __DIR__ . '/partials/top-navbar.php'; ?>
        <!-- Profile Content -->
        <main class="py-6 max-w-7xl mx-auto">
            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
                <div class="relative">
                    <!-- Cover Photo -->
                    <div class="h-48 bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 rounded-t-lg relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        <button class="absolute top-4 right-4 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-2 rounded-lg transition-all duration-200 backdrop-blur-sm">
                            <i data-lucide="camera" class="w-5 h-5"></i>
                        </button>
                    </div>

                    <!-- Profile Info -->
                    <div class="relative px-6 py-4 pb-6">
                        <div class="flex flex-col sm:flex-row sm:items-end sm:space-x-6">
                            <!-- Avatar -->
                            <div class="relative -mt-16 mb-4 sm:mb-0">
                                <img src="../assets/uploads/<?= htmlspecialchars($getadmin['avatar'] ?? 'avatar.jpg') ?>"
                                    alt="<?= htmlspecialchars(($getadmin['first_name'] ?? '') . ' ' . ($getadmin['last_name'] ?? '')) ?>"
                                    class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover">
                                <button class="absolute bottom-2 right-2 bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-full shadow-lg transition-colors">
                                    <i data-lucide="camera" class="w-4 h-4"></i>
                                </button>
                            </div>

                            <!-- User Info -->
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <h1 class="text-2xl font-bold text-gray-900" id="fullName">
                                        <?= htmlspecialchars(($getadmin['first_name'] ?? '') . ' ' . ($getadmin['last_name'] ?? '')) ?>
                                    </h1>
                                    <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">
                                        <?= htmlspecialchars(ucwords($getadmin['role'] ?? 'Admin')) ?>
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-2 capitalize" id="roleTitle">
                                    <?= htmlspecialchars(($getadmin['position'] ?? 'Regular Admin')) ?>
                                </p>
                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <i data-lucide="mail" class="w-4 h-4 mr-1"></i>
                                        <span id="emailDisplay"><?= htmlspecialchars($getadmin['email'] ?? '') ?></span>
                                    </div>
                                    <div class="flex items-center">
                                        <i data-lucide="phone" class="w-4 h-4 mr-1"></i>
                                        <span id="phoneDisplay"><?= htmlspecialchars($getadmin['phone'] ?? '') ?></span>
                                    </div>
                                    <div class="flex items-center">
                                        <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
                                        <?= htmlspecialchars($getadmin['address'] ?? 'N/A') ?>
                                    </div>
                                    <div class="flex items-center">
                                        <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                                        Admin since <?= isset($getadmin['created_at']) ? date('F Y', strtotime($getadmin['created_at'])) : '' ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center space-x-3 mt-4 sm:mt-0">
                                <button id="editProfileBtn" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center shadow-sm">
                                    <i data-lucide="edit" class="w-4 h-4 mr-2"></i>
                                    Edit Profile
                                </button>
                                <button id="adminSettingsBtn" class="border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg transition-colors flex items-center">
                                    <i data-lucide="settings" class="w-4 h-4 mr-2"></i>
                                    Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Personal Information -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">Personal Information</h3>
                                <button id="editPersonalBtn" class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Edit
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                    <input type="text" id="firstNameDisplay" value="" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text" id="lastNameDisplay" value="" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" id="emailFieldDisplay" value="" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" id="phoneFieldDisplay" value="" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Administrative Information -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">Administrative Information</h3>
                                <?php if ($getadmin['role'] == 'super'): ?>
                                    <button id="editAdminBtn" class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                        Edit
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                    <input type="text" id="roleDisplay"
                                        value="<?= htmlspecialchars($getadmin['role'] ?? 'Admin') ?>"
                                        class="w-full border border-gray-200 bg-gray-50 text-gray-500 rounded-lg px-3 py-2 focus:outline-none cursor-not-allowed"
                                        readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Admin ID</label>
                                    <input type="text"
                                        value="<?= 'ADM-' . str_pad($getadmin['id'] ?? 0, 3, '0', STR_PAD_LEFT) ?>"
                                        class="w-full border border-gray-200 bg-gray-50 text-gray-500 rounded-lg px-3 py-2 focus:outline-none cursor-not-allowed"
                                        readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Access Level</label>
                                    <input type="text"
                                        value="<?= htmlspecialchars($getadmin['position'] ?? 'Level 1 - Admin') ?>"
                                        class="w-full border border-gray-200 bg-gray-50 text-gray-500 rounded-lg px-3 py-2 focus:outline-none cursor-not-allowed"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Administrative Activity -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">Recent Administrative Activity</h3>
                                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium flex items-center">
                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                    View All
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <?php if (empty($recentActivities)): ?>
                                    <div class="text-gray-500 text-sm">No recent activity.</div>
                                <?php else: ?>
                                    <?php foreach ($recentActivities as $activity): ?>
                                        <div class="flex items-start space-x-3">
                                            <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0">
                                                <i data-lucide="activity" class="w-4 h-4 text-gray-600"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm text-gray-900"><?= htmlspecialchars($activity['details'] ?: $activity['action']) ?></p>
                                                <p class="text-xs text-gray-500"><?= date('M d, H:i', strtotime($activity['created_at'])) ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- System Overview -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">System Overview</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="users" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Total Users</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900"><?= number_format($totalUsers ?? 0) ?></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="shopping-cart" class="w-4 h-4 text-green-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Orders Today</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900"><?= number_format($ordersToday ?? 0) ?></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="package" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Products Live</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900"><?= number_format($productsLive ?? 0) ?></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="trending-up" class="w-4 h-4 text-orange-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Revenue Today</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">₦<?= number_format($revenueToday ?? 0, 2) ?></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="activity" class="w-4 h-4 text-red-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">System Uptime</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($systemUptime ?? '99.9%') ?></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="bell" class="w-4 h-4 text-yellow-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-600">Pending Tasks</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900"><?= number_format($pendingTasks ?? 0) ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Admin Permissions (JS-rendered) -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Admin Permissions</h3>
                        </div>
                        <div class="p-6 space-y-3" id="permissionsList">
                            <!-- Permissions will be rendered here by JS -->
                        </div>
                    </div>

                    <!-- Security & Access -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Security & Access</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Multi-Factor Authentication</p>
                                    <p class="text-xs text-gray-500">Enhanced security enabled</p>
                                </div>
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">
                                    Active
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Admin Password</p>
                                    <p class="text-xs text-gray-500">Last changed 15 days ago</p>
                                </div>
                                <button id="changePasswordBtn" class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Change
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Active Sessions</p>
                                    <p class="text-xs text-gray-500">2 devices logged in</p>
                                </div>
                                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Review
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <button class="w-full flex items-center justify-center space-x-2 bg-orange-50 hover:bg-orange-100 text-orange-700 py-2 px-4 rounded-lg transition-colors">
                                <i data-lucide="database" class="w-4 h-4"></i>
                                <span class="text-sm font-medium">System Backup</span>
                            </button>
                            <button class="w-full flex items-center justify-center space-x-2 bg-green-50 hover:bg-green-100 text-green-700 py-2 px-4 rounded-lg transition-colors">
                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                <span class="text-sm font-medium">Generate Report</span>
                            </button>
                            <button class="w-full flex items-center justify-center space-x-2 bg-blue-50 hover:bg-blue-100 text-blue-700 py-2 px-4 rounded-lg transition-colors">
                                <i data-lucide="zap" class="w-4 h-4"></i>
                                <span class="text-sm font-medium">Clear Cache</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Edit Profile Modal -->
        <div id="editProfileModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-40 hidden">
            <div class="bg-white rounded-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-900">Edit Profile</h2>
                        <button id="closeEditProfile" class="text-gray-400 hover:text-gray-600">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <form id="editProfileForm">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" id="lastName" name="lastName" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                <input type="text" id="role" name="role" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <input type="text" id="location" name="location" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" id="cancelEditProfile" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors flex items-center">
                                <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Admin Settings Modal -->
        <div id="adminSettingsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-40 hidden">
            <div class="bg-white rounded-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-900">Admin Settings</h2>
                        <button id="closeAdminSettings" class="text-gray-400 hover:text-gray-600">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <form id="adminSettingsForm">
                        <!-- Password Change Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <i data-lucide="lock" class="w-5 h-5 mr-2"></i>
                                Change Password
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                    <input type="password" id="oldPassword" name="oldPassword" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Enter current password">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                    <input type="password" id="newPassword" name="newPassword" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Enter new password">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                    <input type="password" id="confirmPassword" name="confirmPassword" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Confirm new password">
                                </div>
                            </div>
                        </div>

                        <!-- Security Settings -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <i data-lucide="shield" class="w-5 h-5 mr-2"></i>
                                Security Settings
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Two-Factor Authentication</p>
                                        <p class="text-xs text-gray-500">Add an extra layer of security to your account</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="twoFactor" name="twoFactor" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Login Notifications</p>
                                        <p class="text-xs text-gray-500">Get notified when someone logs into your account</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="loginNotifications" name="loginNotifications" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Session Timeout</p>
                                        <p class="text-xs text-gray-500">Automatically log out after inactivity</p>
                                    </div>
                                    <select id="sessionTimeout" name="sessionTimeout" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                        <option value="30">30 minutes</option>
                                        <option value="60">1 hour</option>
                                        <option value="120">2 hours</option>
                                        <option value="240">4 hours</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Preferences -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <i data-lucide="bell" class="w-5 h-5 mr-2"></i>
                                Notification Preferences
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">System Alerts</p>
                                        <p class="text-xs text-gray-500">Critical system notifications</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="systemAlerts" name="systemAlerts" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">User Activity</p>
                                        <p class="text-xs text-gray-500">New user registrations and activities</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="userActivity" name="userActivity" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" id="cancelAdminSettings" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors flex items-center">
                                <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                                Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Confirmation Dialog -->
        <div id="confirmDialog" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Confirm Changes</h3>
                <p class="text-gray-600 mb-6">
                    Are you sure you want to save these changes? This action cannot be undone.
                </p>
                <div class="flex justify-end space-x-3">
                    <button id="cancelConfirm" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button id="confirmSubmit" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <script src="js/script.js"></script>
    <script src="../assets/js/toast.js"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Get admin data from PHP
        const profileData = {
            firstName: <?= json_encode($getadmin['first_name'] ?? '') ?>,
            lastName: <?= json_encode($getadmin['last_name'] ?? '') ?>,
            email: <?= json_encode($getadmin['email'] ?? '') ?>,
            phone: <?= json_encode($getadmin['phone'] ?? '') ?>,
            role: <?= json_encode($getadmin['role'] ?? '') ?>,
            location: <?= json_encode($getadmin['location'] ?? '') ?>,
            position: <?= json_encode($getadmin['position'] ?? '') ?>,
            createdAt: <?= json_encode($getadmin['created_at'] ?? '') ?>,
            lastLogin: <?= json_encode($getadmin['last_login'] ?? '') ?>,
            adminId: <?= json_encode($getadmin['id'] ?? '') ?>
        };

        // Password data object
        const passwordData = {
            oldPassword: '',
            newPassword: '',
            confirmPassword: ''
        };

        // Modal elements
        const editProfileModal = document.getElementById('editProfileModal');
        const adminSettingsModal = document.getElementById('adminSettingsModal');
        const confirmDialog = document.getElementById('confirmDialog');

        // Button elements
        const editProfileBtn = document.getElementById('editProfileBtn');
        const adminSettingsBtn = document.getElementById('adminSettingsBtn');
        const editPersonalBtn = document.getElementById('editPersonalBtn');
        const editAdminBtn = document.getElementById('editAdminBtn');
        const changePasswordBtn = document.getElementById('changePasswordBtn');

        // Close button elements
        const closeEditProfile = document.getElementById('closeEditProfile');
        const closeAdminSettings = document.getElementById('closeAdminSettings');
        const cancelEditProfile = document.getElementById('cancelEditProfile');
        const cancelAdminSettings = document.getElementById('cancelAdminSettings');

        // Form elements
        const editProfileForm = document.getElementById('editProfileForm');
        const adminSettingsForm = document.getElementById('adminSettingsForm');

        // Confirmation dialog elements
        const cancelConfirm = document.getElementById('cancelConfirm');
        const confirmSubmit = document.getElementById('confirmSubmit');

        // Permissions
        const adminPermissions = <?= json_encode($getadmin['permissions'] ? json_decode($getadmin['permissions'], true) : []) ?>;

        // Current form being submitted
        let currentForm = null;

        // Function to populate edit profile form
        function populateEditProfileForm() {
            document.getElementById('firstName').value = profileData.firstName;
            document.getElementById('lastName').value = profileData.lastName;
            document.getElementById('email').value = profileData.email;
            document.getElementById('phone').value = profileData.phone || '';
            document.getElementById('role').value = profileData.role;
            document.getElementById('location').value = profileData.location || '';
        }

        // Function to update profile display
        function updateProfileDisplay() {
            const fullNameEl = document.getElementById('fullName');
            if (fullNameEl) fullNameEl.textContent = `${profileData.firstName} ${profileData.lastName}`;

            const emailDisplay = document.getElementById('emailDisplay');
            if (emailDisplay) emailDisplay.textContent = profileData.email;

            const phoneDisplay = document.getElementById('phoneDisplay');
            if (phoneDisplay) phoneDisplay.textContent = profileData.phone || '';

            const firstNameDisplay = document.getElementById('firstNameDisplay');
            if (firstNameDisplay) firstNameDisplay.value = profileData.firstName;

            const lastNameDisplay = document.getElementById('lastNameDisplay');
            if (lastNameDisplay) lastNameDisplay.value = profileData.lastName;

            const emailFieldDisplay = document.getElementById('emailFieldDisplay');
            if (emailFieldDisplay) emailFieldDisplay.value = profileData.email;

            const phoneFieldDisplay = document.getElementById('phoneFieldDisplay');
            if (phoneFieldDisplay) phoneFieldDisplay.value = profileData.phone || '';

            const roleDisplay = document.getElementById('roleDisplay');
            if (roleDisplay) roleDisplay.value = profileData.role;

            const locationDisplay = document.getElementById('locationDisplay');
            if (locationDisplay) locationDisplay.value = profileData.location || '';
        }

        // Function for rendering admin permissions
        function renderAdminPermissions() {
            const permissionsMap = {
                can_manage_users: 'User Management',
                can_view_reports: 'Financial Reports',
                can_configure_system: 'System Configuration',
                can_manage_db: 'Database Administration',
                can_manage_security: 'Security Settings',
                can_manage_api: 'API Management',
                can_backup: 'Backup & Recovery',
                can_view_audit: 'Audit Logs',
                is_super_admin: 'Super Admin Access'
            };

            const container = document.getElementById('permissionsList');
            if (!container) return;
            container.innerHTML = '';

            Object.entries(permissionsMap).forEach(([key, label]) => {
                const hasPerm = adminPermissions[key] == 1;
                container.innerHTML += `
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">${label}</span>
                <div class="w-4 h-4 ${hasPerm ? 'bg-green-500' : 'bg-red-500'} rounded-full flex items-center justify-center">
                    <i data-lucide="${hasPerm ? 'check' : 'x'}" class="w-3 h-3 text-white"></i>
                </div>
            </div>
        `;
            });
            lucide.createIcons();
        }

        // Function to show modal
        function showModal(modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Function to hide modal
        function hideModal(modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Function to show confirmation dialog
        function showConfirmDialog() {
            confirmDialog.classList.remove('hidden');
        }

        // Function to hide confirmation dialog
        function hideConfirmDialog() {
            confirmDialog.classList.add('hidden');
        }

        // Event listeners for opening modals
        editProfileBtn.addEventListener('click', () => {
            populateEditProfileForm();
            showModal(editProfileModal);
        });

        editPersonalBtn.addEventListener('click', () => {
            populateEditProfileForm();
            showModal(editProfileModal);
        });

        editAdminBtn.addEventListener('click', () => {
            populateEditProfileForm();
            showModal(editProfileModal);
        });

        adminSettingsBtn.addEventListener('click', () => {
            showModal(adminSettingsModal);
        });

        changePasswordBtn.addEventListener('click', () => {
            showModal(adminSettingsModal);
        });

        // Event listeners for closing modals
        closeEditProfile.addEventListener('click', () => {
            hideModal(editProfileModal);
        });

        closeAdminSettings.addEventListener('click', () => {
            hideModal(adminSettingsModal);
        });

        cancelEditProfile.addEventListener('click', () => {
            hideModal(editProfileModal);
        });

        cancelAdminSettings.addEventListener('click', () => {
            hideModal(adminSettingsModal);
        });

        // Event listeners for form submissions
        editProfileForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            currentForm = 'profile';
            showConfirmDialog();
        });

        // Confirm dialog submit for profile update (AJAX)
        confirmSubmit.addEventListener('click', async () => {
            if (currentForm === 'profile') {
                // Gather form data
                const formData = {
                    first_name: document.getElementById('firstName').value,
                    last_name: document.getElementById('lastName').value,
                    email: document.getElementById('email').value,
                    phone: document.getElementById('phone').value,
                    role: document.getElementById('role').value,
                    location: document.getElementById('location').value,
                    admin_id: profileData.adminId
                };

                try {
                    // AJAX request to update profile
                    const response = await fetch('api/update-profile.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(formData)
                    });
                    const result = await response.json();

                    if (result.success) {
                        // Update local profileData and UI
                        profileData.firstName = formData.first_name;
                        profileData.lastName = formData.last_name;
                        profileData.email = formData.email;
                        profileData.phone = formData.phone;
                        profileData.role = formData.role;
                        profileData.location = formData.location;
                        updateProfileDisplay();
                        showToasted('Profile updated successfully!', 'success');
                        hideModal(editProfileModal);
                        hideConfirmDialog();
                    } else {
                        showToasted(result.message || 'Failed to update profile', 'error');
                    }
                } catch (err) {
                    showToasted('An error occurred while updating profile', 'error');
                    console.log(err)
                }
            } else if (currentForm === 'settings') {
                // ...existing password update logic...
            }
            currentForm = null;
        });

        adminSettingsForm.addEventListener('submit', (e) => {
            e.preventDefault();
            currentForm = 'settings';
            showConfirmDialog();
        });

        // Event listeners for confirmation dialog
        cancelConfirm.addEventListener('click', () => {
            hideConfirmDialog();
            currentForm = null;
        });



        // Close modals when clicking outside
        editProfileModal.addEventListener('click', (e) => {
            if (e.target === editProfileModal) {
                hideModal(editProfileModal);
            }
        });

        adminSettingsModal.addEventListener('click', (e) => {
            if (e.target === adminSettingsModal) {
                hideModal(adminSettingsModal);
            }
        });

        confirmDialog.addEventListener('click', (e) => {
            if (e.target === confirmDialog) {
                hideConfirmDialog();
            }
        });

        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            updateProfileDisplay();
            renderAdminPermissions();
            lucide.createIcons();
        });
    </script>
</body>

</html>