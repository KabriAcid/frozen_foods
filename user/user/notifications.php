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
$unread_count = count(array_filter($notifications, function($n) { return !$n['read']; }));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Frozen Foods</title>
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
            <a href="orders.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i class="fas fa-shopping-cart mr-3"></i>
                Orders
            </a>
            <a href="favorites.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i class="fas fa-heart mr-3"></i>
                Favorites
            </a>
            <a href="profile.php" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
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
                    <h1 class="ml-4 text-xl font-semibold text-dark">Notifications</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-bell text-accent text-xl"></i>
                        <span id="notification-badge" class="absolute -top-2 -right-2 bg-secondary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center"><?php echo $unread_count; ?></span>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-r from-accent to-secondary rounded-full border-2 border-white shadow-md flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Notifications Content -->
        <div class="p-6 max-w-4xl mx-auto">
            <!-- Page Header -->
            <div class="mb-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-dark mb-2">Notifications</h2>
                        <p class="text-gray-600">You have <?php echo $unread_count; ?> unread notifications</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <button id="mark-all-read-btn" class="bg-accent text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                            <i class="fas fa-check-double mr-2"></i>
                            Mark All Read
                        </button>
                        <button id="clear-all-btn" class="bg-red-100 text-red-600 px-4 py-2 rounded-lg hover:bg-red-200 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Clear All
                        </button>
                    </div>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="mb-6">
                <div class="flex space-x-2 overflow-x-auto">
                    <button class="notification-filter-btn active px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-dark text-white" data-type="all">
                        All
                    </button>
                    <button class="notification-filter-btn px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-gray-200 text-gray-700 hover:bg-gray-300" data-type="unread">
                        Unread
                    </button>
                    <button class="notification-filter-btn px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-gray-200 text-gray-700 hover:bg-gray-300" data-type="order">
                        Orders
                    </button>
                    <button class="notification-filter-btn px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-gray-200 text-gray-700 hover:bg-gray-300" data-type="promotion">
                        Promotions
                    </button>
                    <button class="notification-filter-btn px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-gray-200 text-gray-700 hover:bg-gray-300" data-type="system">
                        System
                    </button>
                </div>
            </div>

            <!-- Notifications List -->
            <div class="space-y-4">
                <?php foreach ($notifications as $notification): ?>
                <div class="notification-item bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow cursor-pointer <?php echo !$notification['read'] ? 'border-l-4 border-accent' : ''; ?>" 
                     data-id="<?php echo $notification['id']; ?>" 
                     data-type="<?php echo $notification['type']; ?>" 
                     data-read="<?php echo $notification['read'] ? 'true' : 'false'; ?>">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full <?php echo $notification['color']; ?> flex items-center justify-center">
                                <i class="<?php echo $notification['icon']; ?>"></i>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold text-dark <?php echo !$notification['read'] ? 'font-bold' : ''; ?>">
                                    <?php echo $notification['title']; ?>
                                    <?php if (!$notification['read']): ?>
                                    <span class="inline-block w-2 h-2 bg-accent rounded-full ml-2"></span>
                                    <?php endif; ?>
                                </h3>
                                <div class="flex items-center space-x-2">
                                    <span class="text-xs text-gray-500"><?php echo date('M d, H:i', strtotime($notification['time'])); ?></span>
                                    <button class="delete-notification-btn text-gray-400 hover:text-red-600 transition-colors" data-id="<?php echo $notification['id']; ?>">
                                        <i class="fas fa-times text-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <p class="text-gray-600 mt-1"><?php echo $notification['message']; ?></p>
                            <?php if ($notification['type'] === 'promotion'): ?>
                            <div class="mt-2">
                                <button class="text-accent hover:text-orange-600 text-sm font-medium">
                                    View Offer <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Empty State -->
            <div id="empty-notifications" class="hidden text-center py-12">
                <i class="fas fa-bell-slash text-gray-400 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No notifications</h3>
                <p class="text-gray-500">You're all caught up! Check back later for updates.</p>
            </div>
        </div>
    </div>

    <script>
        // Initialize notifications page
        document.addEventListener('DOMContentLoaded', function() {
            initializeSidebar();
            initializeNotificationFilters();
            initializeNotificationActions();
        });

        // Sidebar functionality
        function initializeSidebar() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if (!menuToggle || !sidebar || !overlay) return;

            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });

            overlay.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        }

        // Notification filter functionality
        function initializeNotificationFilters() {
            const filterBtns = document.querySelectorAll('.notification-filter-btn');
            const notificationItems = document.querySelectorAll('.notification-item');
            const emptyState = document.getElementById('empty-notifications');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const type = this.getAttribute('data-type');
                    
                    // Update active filter
                    filterBtns.forEach(b => {
                        b.classList.remove('active', 'bg-dark', 'text-white');
                        b.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                    });
                    
                    this.classList.add('active', 'bg-dark', 'text-white');
                    this.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                    
                    // Filter notifications
                    let visibleCount = 0;
                    notificationItems.forEach(item => {
                        const itemType = item.getAttribute('data-type');
                        const itemRead = item.getAttribute('data-read') === 'true';
                        let shouldShow = false;
                        
                        switch (type) {
                            case 'all':
                                shouldShow = true;
                                break;
                            case 'unread':
                                shouldShow = !itemRead;
                                break;
                            default:
                                shouldShow = itemType === type;
                        }
                        
                        if (shouldShow) {
                            item.style.display = 'block';
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });
                    
                    // Show/hide empty state
                    if (visibleCount === 0) {
                        emptyState.classList.remove('hidden');
                    } else {
                        emptyState.classList.add('hidden');
                    }
                });
            });
        }

        // Notification actions functionality
        function initializeNotificationActions() {
            // Mark notification as read when clicked
            document.querySelectorAll('.notification-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    if (e.target.closest('.delete-notification-btn')) return;
                    
                    const isRead = this.getAttribute('data-read') === 'true';
                    if (!isRead) {
                        markAsRead(this);
                    }
                });
            });

            // Delete notification
            document.querySelectorAll('.delete-notification-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const notificationId = this.getAttribute('data-id');
                    const notificationItem = this.closest('.notification-item');
                    
                    notificationItem.style.transform = 'scale(0.8)';
                    notificationItem.style.opacity = '0';
                    
                    setTimeout(() => {
                        notificationItem.remove();
                        updateUnreadCount();
                        checkEmptyState();
                    }, 300);
                });
            });

            // Mark all as read
            document.getElementById('mark-all-read-btn').addEventListener('click', function() {
                const unreadItems = document.querySelectorAll('.notification-item[data-read="false"]');
                
                unreadItems.forEach((item, index) => {
                    setTimeout(() => {
                        markAsRead(item);
                    }, index * 100);
                });
                
                showNotification('All notifications marked as read', 'success');
            });

            // Clear all notifications
            document.getElementById('clear-all-btn').addEventListener('click', function() {
                if (confirm('Are you sure you want to clear all notifications?')) {
                    const items = document.querySelectorAll('.notification-item');
                    
                    items.forEach((item, index) => {
                        setTimeout(() => {
                            item.style.transform = 'scale(0.8)';
                            item.style.opacity = '0';
                            setTimeout(() => {
                                item.remove();
                                if (index === items.length - 1) {
                                    updateUnreadCount();
                                    checkEmptyState();
                                }
                            }, 300);
                        }, index * 50);
                    });
                    
                    showNotification('All notifications cleared', 'info');
                }
            });
        }

        // Mark notification as read
        function markAsRead(notificationItem) {
            notificationItem.setAttribute('data-read', 'true');
            notificationItem.classList.remove('border-l-4', 'border-accent');
            
            const title = notificationItem.querySelector('h3');
            title.classList.remove('font-bold');
            
            const unreadDot = title.querySelector('.bg-accent');
            if (unreadDot) {
                unreadDot.remove();
            }
            
            updateUnreadCount();
        }

        // Update unread count
        function updateUnreadCount() {
            const unreadItems = document.querySelectorAll('.notification-item[data-read="false"]');
            const badge = document.getElementById('notification-badge');
            const countText = document.querySelector('p.text-gray-600');
            
            const count = unreadItems.length;
            badge.textContent = count;
            
            if (count === 0) {
                badge.style.display = 'none';
            } else {
                badge.style.display = 'flex';
            }
            
            if (countText) {
                countText.textContent = `You have ${count} unread notifications`;
            }
        }

        // Check empty state
        function checkEmptyState() {
            const items = document.querySelectorAll('.notification-item');
            const emptyState = document.getElementById('empty-notifications');
            
            if (items.length === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }

        // Show notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white transform translate-x-full transition-transform duration-300 ${getNotificationColor(type)}`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }

        function getNotificationColor(type) {
            switch (type) {
                case 'success': return 'bg-green-500';
                case 'error': return 'bg-red-500';
                case 'warning': return 'bg-yellow-500';
                default: return 'bg-blue-500';
            }
        }
    </script>
</body>
</html>