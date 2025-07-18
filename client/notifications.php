<?php
// Sample notifications data (in real app, this would come from database)
$notifications = [
    [
        'id' => 1,
        'type' => 'order',
        'title' => 'Order Delivered',
        'message' => 'Your order #FF20250101001 has been delivered successfully.',
        'time' => '2025-01-01 14:30:00',
        'read' => false,
        'icon' => 'fas fa-check-circle',
        'color' => 'text-green-600 bg-green-100'
    ],
    [
        'id' => 2,
        'type' => 'order',
        'title' => 'Order Out for Delivery',
        'message' => 'Your order #FF20241228002 is out for delivery and will arrive soon.',
        'time' => '2024-12-28 10:15:00',
        'read' => false,
        'icon' => 'fas fa-truck',
        'color' => 'text-blue-600 bg-blue-100'
    ],
    [
        'id' => 3,
        'type' => 'promotion',
        'title' => 'New Year Special Offer',
        'message' => 'Get 20% off on all chicken products. Use code NEWYEAR20.',
        'time' => '2024-12-31 09:00:00',
        'read' => false,
        'icon' => 'fas fa-gift',
        'color' => 'text-accent bg-orange-100'
    ],
    [
        'id' => 4,
        'type' => 'order',
        'title' => 'Order Confirmed',
        'message' => 'Your order #FF20241225003 has been confirmed and is being prepared.',
        'time' => '2024-12-25 16:45:00',
        'read' => true,
        'icon' => 'fas fa-shopping-cart',
        'color' => 'text-blue-600 bg-blue-100'
    ],
    [
        'id' => 5,
        'type' => 'system',
        'title' => 'Profile Updated',
        'message' => 'Your profile information has been updated successfully.',
        'time' => '2024-12-20 11:20:00',
        'read' => true,
        'icon' => 'fas fa-user',
        'color' => 'text-gray-600 bg-gray-100'
    ],
    [
        'id' => 6,
        'type' => 'promotion',
        'title' => 'Free Delivery Weekend',
        'message' => 'Enjoy free delivery on all orders this weekend. No minimum order required!',
        'time' => '2024-12-15 08:30:00',
        'read' => true,
        'icon' => 'fas fa-truck',
        'color' => 'text-green-600 bg-green-100'
    ]
];

// Count unread notifications
$unread_count = count(array_filter($notifications, function ($n) {
    return !$n['read'];
}));

require_once 'partials/headers.php';
?>


<body class="bg-custom-gray min-h-screen">
    <div class="container mx-auto px-4 py-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <button id="backBtn" class="p-3 hover:bg-white rounded-xl transition-all duration-300 floating-card">
                <svg class="w-6 h-6 text-custom-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <h1 class="text-2xl font-bold text-custom-dark">Notifications</h1>

            <button id="markAllReadBtn" class="text-custom-accent font-semibold hover:opacity-80 transition-opacity duration-200">
                Mark all read
            </button>
        </div>

        <!-- Notification Categories -->
        <div class="flex space-x-4 mb-8 overflow-x-auto pb-2">
            <button class="notification-filter active bg-custom-accent text-white px-6 py-3 rounded-2xl font-semibold whitespace-nowrap transition-all duration-300" data-filter="all">
                All
            </button>
            <button class="notification-filter bg-white text-custom-dark px-6 py-3 rounded-2xl font-semibold whitespace-nowrap hover:bg-custom-accent hover:text-white transition-all duration-300" data-filter="orders">
                Orders
            </button>
            <button class="notification-filter bg-white text-custom-dark px-6 py-3 rounded-2xl font-semibold whitespace-nowrap hover:bg-custom-accent hover:text-white transition-all duration-300" data-filter="promotions">
                Promotions
            </button>
            <button class="notification-filter bg-white text-custom-dark px-6 py-3 rounded-2xl font-semibold whitespace-nowrap hover:bg-custom-accent hover:text-white transition-all duration-300" data-filter="updates">
                Updates
            </button>
        </div>

        <!-- Notifications List -->
        <div class="space-y-4" id="notificationsList">
            <!-- Order Notification -->
            <div class="notification-item bg-white rounded-2xl p-6 floating-card animate-fade-in" data-category="orders" data-read="false">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-bold text-custom-dark">Order Delivered Successfully</h3>
                            <div class="w-3 h-3 bg-custom-accent rounded-full flex-shrink-0"></div>
                        </div>
                        <p class="text-gray-600 mb-3">Your Easy Greek Salad order has been delivered to your location. Enjoy your meal!</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">2 minutes ago</span>
                            <span class="text-sm font-semibold text-custom-accent">Order #12345</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promotion Notification -->
            <div class="notification-item bg-white rounded-2xl p-6 floating-card animate-fade-in" data-category="promotions" data-read="false">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-custom-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-bold text-custom-dark">Special Offer: 25% Off</h3>
                            <div class="w-3 h-3 bg-custom-accent rounded-full flex-shrink-0"></div>
                        </div>
                        <p class="text-gray-600 mb-3">Get 25% off on all salads this weekend! Use code FRESH25 at checkout.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">1 hour ago</span>
                            <button class="text-sm font-semibold text-custom-accent hover:opacity-80 transition-opacity">
                                View Offer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Notification -->
            <div class="notification-item bg-white rounded-2xl p-6 floating-card animate-fade-in" data-category="updates" data-read="true">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold text-gray-600">App Update Available</h3>
                        </div>
                        <p class="text-gray-500 mb-3">Version 2.1.0 is now available with improved performance and new features.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">3 hours ago</span>
                            <button class="text-sm font-semibold text-blue-600 hover:opacity-80 transition-opacity">
                                Update Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Notification -->
            <div class="notification-item bg-white rounded-2xl p-6 floating-card animate-fade-in" data-category="orders" data-read="true">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold text-gray-600">Order Being Prepared</h3>
                        </div>
                        <p class="text-gray-500 mb-3">Your Mediterranean Bowl is being prepared by our chef. Estimated time: 15 minutes.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">5 hours ago</span>
                            <span class="text-sm font-semibold text-gray-500">Order #12344</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promotion Notification -->
            <div class="notification-item bg-white rounded-2xl p-6 floating-card animate-fade-in" data-category="promotions" data-read="true">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold text-gray-600">New Restaurant Added</h3>
                        </div>
                        <p class="text-gray-500 mb-3">Discover "Healthy Bites" - a new restaurant specializing in organic salads and bowls.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">1 day ago</span>
                            <button class="text-sm font-semibold text-purple-600 hover:opacity-80 transition-opacity">
                                Explore
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Notification -->
            <div class="notification-item bg-white rounded-2xl p-6 floating-card animate-fade-in" data-category="orders" data-read="true">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-red-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold text-gray-600">Order Cancelled</h3>
                        </div>
                        <p class="text-gray-500 mb-3">Your Caesar Salad order was cancelled due to unavailability. Refund processed.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">2 days ago</span>
                            <span class="text-sm font-semibold text-gray-500">Order #12343</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State (hidden by default) -->
        <div id="emptyState" class="hidden text-center py-16">
            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5v-5a7.5 7.5 0 01-7.5-7.5H12a7.5 7.5 0 017.5 7.5v5z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-custom-dark mb-2">No Notifications</h3>
            <p class="text-gray-500">You're all caught up! Check back later for new updates.</p>
        </div>
    </div>
    <!-- Bottom navigation include -->
    <?php include 'partials/bottom-nav.php'; ?>
    <script>
        // Notification management
        let notifications = [];
        let currentFilter = 'all';

        // DOM elements
        const notificationsList = document.getElementById('notificationsList');
        const emptyState = document.getElementById('emptyState');
        const markAllReadBtn = document.getElementById('markAllReadBtn');
        const backBtn = document.getElementById('backBtn');
        const filterButtons = document.querySelectorAll('.notification-filter');

        // Initialize notifications from DOM
        function initializeNotifications() {
            const notificationItems = document.querySelectorAll('.notification-item');
            notifications = Array.from(notificationItems).map((item, index) => ({
                id: index,
                element: item,
                category: item.dataset.category,
                isRead: item.dataset.read === 'true'
            }));

            updateNotificationDisplay();
        }

        // Filter notifications
        function filterNotifications(category) {
            currentFilter = category;

            // Update filter buttons
            filterButtons.forEach(btn => {
                if (btn.dataset.filter === category) {
                    btn.classList.add('active', 'bg-custom-accent', 'text-white');
                    btn.classList.remove('bg-white', 'text-custom-dark');
                } else {
                    btn.classList.remove('active', 'bg-custom-accent', 'text-white');
                    btn.classList.add('bg-white', 'text-custom-dark');
                }
            });

            // Show/hide notifications
            notifications.forEach(notification => {
                if (category === 'all' || notification.category === category) {
                    notification.element.style.display = 'block';
                    // Add stagger animation
                    setTimeout(() => {
                        notification.element.classList.add('animate-fade-in');
                    }, notifications.indexOf(notification) * 50);
                } else {
                    notification.element.style.display = 'none';
                    notification.element.classList.remove('animate-fade-in');
                }
            });

            updateEmptyState();
        }

        // Mark notification as read
        function markAsRead(notificationElement) {
            const unreadIndicator = notificationElement.querySelector('.w-3.h-3.bg-custom-accent');
            const title = notificationElement.querySelector('h3');

            if (unreadIndicator) {
                unreadIndicator.remove();
                title.classList.remove('text-custom-dark', 'font-bold');
                title.classList.add('text-gray-600', 'font-semibold');

                // Update data attribute
                notificationElement.dataset.read = 'true';

                // Update notifications array
                const notification = notifications.find(n => n.element === notificationElement);
                if (notification) {
                    notification.isRead = true;
                }
            }
        }

        // Mark all notifications as read
        function markAllAsRead() {
            notifications.forEach(notification => {
                if (!notification.isRead) {
                    markAsRead(notification.element);
                }
            });

            // Add feedback animation
            markAllReadBtn.style.transform = 'scale(0.95)';
            setTimeout(() => {
                markAllReadBtn.style.transform = 'scale(1)';
            }, 150);
        }

        // Update empty state visibility
        function updateEmptyState() {
            const visibleNotifications = notifications.filter(n =>
                (currentFilter === 'all' || n.category === currentFilter) &&
                n.element.style.display !== 'none'
            );

            if (visibleNotifications.length === 0) {
                notificationsList.style.display = 'none';
                emptyState.classList.remove('hidden');
            } else {
                notificationsList.style.display = 'block';
                emptyState.classList.add('hidden');
            }
        }

        // Update notification display
        function updateNotificationDisplay() {
            const unreadCount = notifications.filter(n => !n.isRead).length;

            if (unreadCount === 0) {
                markAllReadBtn.style.opacity = '0.5';
                markAllReadBtn.style.pointerEvents = 'none';
            } else {
                markAllReadBtn.style.opacity = '1';
                markAllReadBtn.style.pointerEvents = 'auto';
            }
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', () => {
            initializeNotifications();

            // Filter button listeners
            filterButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterNotifications(btn.dataset.filter);
                });
            });

            // Mark all read button
            markAllReadBtn.addEventListener('click', markAllAsRead);

            // Back button
            backBtn.addEventListener('click', () => {
                // In a real app, this would navigate back
                window.history.back();
            });

            // Click on notification to mark as read
            notifications.forEach(notification => {
                notification.element.addEventListener('click', () => {
                    markAsRead(notification.element);
                    updateNotificationDisplay();
                });
            });

            // Add hover effects to notification items
            notifications.forEach(notification => {
                notification.element.addEventListener('mouseenter', () => {
                    notification.element.style.transform = 'translateY(-2px)';
                });

                notification.element.addEventListener('mouseleave', () => {
                    notification.element.style.transform = 'translateY(0)';
                });
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                window.history.back();
            }

            // Number keys for quick filter
            const filterMap = {
                '1': 'all',
                '2': 'orders',
                '3': 'promotions',
                '4': 'updates'
            };

            if (filterMap[e.key]) {
                filterNotifications(filterMap[e.key]);
            }
        });

        // Auto-refresh notifications (simulate real-time updates)
        setInterval(() => {
            // In a real app, this would fetch new notifications from the server
            console.log('Checking for new notifications...');
        }, 30000);

        // Add notification interaction animations
        function addNotificationInteractions() {
            const actionButtons = document.querySelectorAll('.notification-item button');

            actionButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.stopPropagation(); // Prevent marking as read when clicking action buttons

                    // Add click animation
                    button.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        button.style.transform = 'scale(1)';
                    }, 150);
                });
            });
        }

        // Initialize interactions
        document.addEventListener('DOMContentLoaded', addNotificationInteractions);
    </script>
</body>

</html>