<?php
// Include utility functions
require_once '../util/products.php';
require_once '../util/orders.php';

// Get user data (in real app, this would come from database/session)
$user = [
    'id' => 1,
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'phone' => '08012345678',
    'address' => '123 Lagos Street, Victoria Island, Lagos',
    'joined_date' => '2024-01-15',
    'total_orders' => 12,
    'favorite_count' => 8
];

// Get recent orders
$recent_orders = [
    [
        'id' => 'FF20250101001',
        'date' => '2025-01-01',
        'total' => 8500,
        'status' => 'delivered',
        'items_count' => 3
    ],
    [
        'id' => 'FF20241228002',
        'date' => '2024-12-28',
        'total' => 5200,
        'status' => 'delivered',
        'items_count' => 2
    ],
    [
        'id' => 'FF20241225003',
        'date' => '2024-12-25',
        'total' => 12300,
        'status' => 'out_for_delivery',
        'items_count' => 5
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Frozen Foods</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: '#F97316',
                        gray: '#f6f7fc',
                        dark: '#201f20',
                        secondary: '#ff7272'
                    },
                    fontFamily: {
                        'dm': ['DM Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray font-dm">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0">
        <div class="p-6">
            <h2 class="text-xl font-bold text-dark">Frozen Foods</h2>
        </div>
        <nav class="mt-6">
            <a href="dashboard.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i class="fas fa-home mr-3"></i>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i class="fas fa-shopping-cart mr-3"></i>
                Orders
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i class="fas fa-heart mr-3"></i>
                Favorites
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-accent bg-orange-50 border-r-4 border-accent">
                <i class="fas fa-user mr-3"></i>
                Profile
            </a>
        </nav>
    </div>

    <!-- Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between px-4 py-4">
                <div class="flex items-center">
                    <button id="menu-toggle" class="lg:hidden p-2 rounded-md text-gray-600 hover:bg-gray-100">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="ml-4 text-xl font-semibold text-dark">Profile</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-bell text-gray-600 text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-secondary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-r from-accent to-secondary rounded-full border-2 border-white shadow-md flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Profile Content -->
        <div class="p-6 max-w-4xl mx-auto">
            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-6">
                    <div class="w-24 h-24 bg-gradient-to-r from-accent to-secondary rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <div class="flex-1 text-center md:text-left">
                        <h2 class="text-2xl font-bold text-dark mb-2"><?php echo $user['name']; ?></h2>
                        <p class="text-gray-600 mb-1"><?php echo $user['email']; ?></p>
                        <p class="text-gray-600 mb-3"><?php echo formatPhoneNumber($user['phone']); ?></p>
                        <div class="flex flex-wrap justify-center md:justify-start gap-4 text-sm">
                            <span class="bg-accent bg-opacity-10 text-accent px-3 py-1 rounded-full">
                                <i class="fas fa-calendar mr-1"></i>
                                Joined <?php echo date('M Y', strtotime($user['joined_date'])); ?>
                            </span>
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full">
                                <i class="fas fa-shopping-bag mr-1"></i>
                                <?php echo $user['total_orders']; ?> Orders
                            </span>
                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full">
                                <i class="fas fa-heart mr-1"></i>
                                <?php echo $user['favorite_count']; ?> Favorites
                            </span>
                        </div>
                    </div>
                    <button id="edit-profile-btn" class="bg-dark text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition-colors">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Profile
                    </button>
                </div>
            </div>

            <!-- Profile Sections -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Personal Information -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
                        <i class="fas fa-user-circle mr-2 text-accent"></i>
                        Personal Information
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="user-name" value="<?php echo $user['name']; ?>" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="user-email" value="<?php echo $user['email']; ?>" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" id="user-phone" value="<?php echo $user['phone']; ?>" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Delivery Address</label>
                            <textarea id="user-address" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent" readonly><?php echo $user['address']; ?></textarea>
                        </div>
                    </div>
                    <div id="edit-actions" class="mt-6 space-x-3 hidden">
                        <button id="save-profile-btn" class="bg-accent text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                            <i class="fas fa-save mr-2"></i>
                            Save Changes
                        </button>
                        <button id="cancel-edit-btn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                            Cancel
                        </button>
                    </div>
                </div>

                <!-- Account Settings -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
                        <i class="fas fa-cog mr-2 text-accent"></i>
                        Account Settings
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <h4 class="font-medium text-dark">Email Notifications</h4>
                                <p class="text-sm text-gray-600">Receive order updates via email</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-accent peer-focus:ring-opacity-25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-accent"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <h4 class="font-medium text-dark">SMS Notifications</h4>
                                <p class="text-sm text-gray-600">Receive delivery updates via SMS</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-accent peer-focus:ring-opacity-25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-accent"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <h4 class="font-medium text-dark">Marketing Updates</h4>
                                <p class="text-sm text-gray-600">Receive promotional offers</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-accent peer-focus:ring-opacity-25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-accent"></div>
                            </label>
                        </div>
                        <button id="change-password-btn" class="w-full bg-gray-100 text-dark py-3 rounded-lg hover:bg-gray-200 transition-colors">
                            <i class="fas fa-lock mr-2"></i>
                            Change Password
                        </button>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded-lg shadow-md p-6 mt-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-dark flex items-center">
                        <i class="fas fa-shopping-bag mr-2 text-accent"></i>
                        Recent Orders
                    </h3>
                    <a href="#" class="text-accent hover:text-orange-600 text-sm font-medium">View All</a>
                </div>
                <div class="space-y-4">
                    <?php foreach ($recent_orders as $order): ?>
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <h4 class="font-semibold text-dark">Order #<?php echo $order['id']; ?></h4>
                                <p class="text-sm text-gray-600"><?php echo date('M d, Y', strtotime($order['date'])); ?></p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-dark">₦<?php echo number_format($order['total']); ?></p>
                                <span class="inline-block px-2 py-1 text-xs rounded-full <?php echo getOrderStatusColor($order['status']); ?>">
                                    <?php echo getOrderStatusText($order['status']); ?>
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600"><?php echo $order['items_count']; ?> items</span>
                            <div class="space-x-2">
                                <button class="text-accent hover:text-orange-600 text-sm">View Details</button>
                                <?php if ($order['status'] === 'delivered'): ?>
                                <button class="text-gray-600 hover:text-gray-800 text-sm">Reorder</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <button class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                    <i class="fas fa-heart text-secondary text-2xl mb-3"></i>
                    <h4 class="font-semibold text-dark mb-1">My Favorites</h4>
                    <p class="text-sm text-gray-600">View saved products</p>
                </button>
                <button class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                    <i class="fas fa-map-marker-alt text-accent text-2xl mb-3"></i>
                    <h4 class="font-semibold text-dark mb-1">Addresses</h4>
                    <p class="text-sm text-gray-600">Manage delivery locations</p>
                </button>
                <button class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                    <i class="fas fa-headset text-green-600 text-2xl mb-3"></i>
                    <h4 class="font-semibold text-dark mb-1">Support</h4>
                    <p class="text-sm text-gray-600">Get help & support</p>
                </button>
            </div>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div id="password-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-dark">Change Password</h3>
                <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="password-form" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                    <input type="password" id="current-password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input type="password" id="new-password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                    <input type="password" id="confirm-password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent" required>
                </div>
                <div class="flex space-x-3 pt-4">
                    <button type="submit" class="flex-1 bg-accent text-white py-2 rounded-lg hover:bg-orange-600 transition-colors">
                        Update Password
                    </button>
                    <button type="button" id="cancel-password" class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="../util/dashboard.js"></script>
    <script src="../util/profile.js"></script>
</body>
</html>