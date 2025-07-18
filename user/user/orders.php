<?php
// Include utility functions
require_once '../util/products.php';
require_once '../util/orders.php';

// Sample orders data (in real app, this would come from database)
$orders = [
    [
        'id' => 'FF20250101001',
        'date' => '2025-01-01',
        'status' => 'delivered',
        'total' => 8500,
        'delivery_date' => '2025-01-01',
        'items' => [
            ['name' => 'Fresh Chicken Wings', 'quantity' => 2, 'price' => 2500],
            ['name' => 'Atlantic Salmon', 'quantity' => 1, 'price' => 4500]
        ],
        'delivery_address' => '123 Lagos Street, Victoria Island, Lagos'
    ],
    [
        'id' => 'FF20241228002',
        'date' => '2024-12-28',
        'status' => 'out_for_delivery',
        'total' => 5200,
        'delivery_date' => '2024-12-29',
        'items' => [
            ['name' => 'Whole Turkey', 'quantity' => 1, 'price' => 8500]
        ],
        'delivery_address' => '456 Abuja Road, Garki, Abuja'
    ],
    [
        'id' => 'FF20241225003',
        'date' => '2024-12-25',
        'status' => 'preparing',
        'total' => 12300,
        'delivery_date' => '2024-12-26',
        'items' => [
            ['name' => 'Chicken Breast', 'quantity' => 3, 'price' => 3200],
            ['name' => 'Tuna Steaks', 'quantity' => 2, 'price' => 5200]
        ],
        'delivery_address' => '789 Port Harcourt Street, GRA, Port Harcourt'
    ],
    [
        'id' => 'FF20241220004',
        'date' => '2024-12-20',
        'status' => 'cancelled',
        'total' => 6800,
        'delivery_date' => null,
        'items' => [
            ['name' => 'Turkey Slices', 'quantity' => 2, 'price' => 3800]
        ],
        'delivery_address' => '321 Kano Street, Sabon Gari, Kano'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Frozen Foods</title>
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
            <a href="#" class="flex items-center px-6 py-3 text-accent bg-orange-50 border-r-4 border-accent">
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
                    <h1 class="ml-4 text-xl font-semibold text-dark">My Orders</h1>
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

        <!-- Orders Content -->
        <div class="p-6 max-w-6xl mx-auto">
            <!-- Filter Tabs -->
            <div class="mb-6">
                <div class="flex space-x-2 overflow-x-auto">
                    <button class="order-filter-btn active px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-dark text-white" data-status="all">
                        All Orders
                    </button>
                    <button class="order-filter-btn px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-gray-200 text-gray-700 hover:bg-gray-300" data-status="delivered">
                        Delivered
                    </button>
                    <button class="order-filter-btn px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-gray-200 text-gray-700 hover:bg-gray-300" data-status="out_for_delivery">
                        In Transit
                    </button>
                    <button class="order-filter-btn px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-gray-200 text-gray-700 hover:bg-gray-300" data-status="preparing">
                        Preparing
                    </button>
                    <button class="order-filter-btn px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-gray-200 text-gray-700 hover:bg-gray-300" data-status="cancelled">
                        Cancelled
                    </button>
                </div>
            </div>

            <!-- Orders List -->
            <div class="space-y-6">
                <?php foreach ($orders as $order): ?>
                <div class="order-card bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow" data-status="<?php echo $order['status']; ?>">
                    <!-- Order Header -->
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-dark mb-1">Order #<?php echo $order['id']; ?></h3>
                            <p class="text-gray-600 text-sm">Placed on <?php echo date('M d, Y', strtotime($order['date'])); ?></p>
                        </div>
                        <div class="mt-2 md:mt-0 text-right">
                            <p class="text-xl font-bold text-dark">₦<?php echo number_format($order['total']); ?></p>
                            <span class="inline-block px-3 py-1 text-sm rounded-full <?php echo getOrderStatusColor($order['status']); ?>">
                                <?php echo getOrderStatusText($order['status']); ?>
                            </span>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="mb-4">
                        <h4 class="font-medium text-dark mb-2">Items Ordered:</h4>
                        <div class="space-y-2">
                            <?php foreach ($order['items'] as $item): ?>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100 last:border-b-0">
                                <div>
                                    <span class="font-medium text-dark"><?php echo $item['name']; ?></span>
                                    <span class="text-gray-600 ml-2">x<?php echo $item['quantity']; ?></span>
                                </div>
                                <span class="font-medium text-dark">₦<?php echo number_format($item['price'] * $item['quantity']); ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Delivery Info -->
                    <div class="mb-4 p-3 bg-gray-50 rounded-lg">
                        <h4 class="font-medium text-dark mb-1">Delivery Address:</h4>
                        <p class="text-gray-600 text-sm"><?php echo $order['delivery_address']; ?></p>
                        <?php if ($order['delivery_date']): ?>
                        <p class="text-gray-600 text-sm mt-1">
                            <i class="fas fa-calendar mr-1"></i>
                            Expected: <?php echo date('M d, Y', strtotime($order['delivery_date'])); ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- Order Actions -->
                    <div class="flex flex-wrap gap-3">
                        <?php if ($order['status'] === 'delivered'): ?>
                        <button class="reorder-btn bg-accent text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors" data-order-id="<?php echo $order['id']; ?>">
                            <i class="fas fa-redo mr-2"></i>
                            Reorder
                        </button>
                        <button class="review-btn bg-gray-200 text-dark px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                            <i class="fas fa-star mr-2"></i>
                            Write Review
                        </button>
                        <?php elseif ($order['status'] === 'out_for_delivery'): ?>
                        <button class="track-btn bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors" data-order-id="<?php echo $order['id']; ?>">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Track Order
                        </button>
                        <?php elseif ($order['status'] === 'preparing'): ?>
                        <button class="cancel-btn bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors" data-order-id="<?php echo $order['id']; ?>">
                            <i class="fas fa-times mr-2"></i>
                            Cancel Order
                        </button>
                        <?php endif; ?>
                        <button class="details-btn bg-gray-100 text-dark px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors" data-order-id="<?php echo $order['id']; ?>">
                            <i class="fas fa-eye mr-2"></i>
                            View Details
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Empty State -->
            <div id="empty-orders" class="hidden text-center py-12">
                <i class="fas fa-shopping-cart text-gray-400 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No orders found</h3>
                <p class="text-gray-500 mb-6">You haven't placed any orders yet.</p>
                <a href="dashboard.php" class="bg-accent text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-colors">
                    Start Shopping
                </a>
            </div>
        </div>
    </div>

    <script>
        // Initialize orders page
        document.addEventListener('DOMContentLoaded', function() {
            initializeSidebar();
            initializeOrderFilters();
            initializeOrderActions();
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

        // Order filter functionality
        function initializeOrderFilters() {
            const filterBtns = document.querySelectorAll('.order-filter-btn');
            const orderCards = document.querySelectorAll('.order-card');
            const emptyState = document.getElementById('empty-orders');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const status = this.getAttribute('data-status');
                    
                    // Update active filter
                    filterBtns.forEach(b => {
                        b.classList.remove('active', 'bg-dark', 'text-white');
                        b.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                    });
                    
                    this.classList.add('active', 'bg-dark', 'text-white');
                    this.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                    
                    // Filter orders
                    let visibleCount = 0;
                    orderCards.forEach(card => {
                        const cardStatus = card.getAttribute('data-status');
                        if (status === 'all' || cardStatus === status) {
                            card.style.display = 'block';
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
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

        // Order actions functionality
        function initializeOrderActions() {
            // Reorder functionality
            document.querySelectorAll('.reorder-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-order-id');
                    showNotification(`Reordering items from order #${orderId}...`, 'info');
                    // In real app, add items to cart
                });
            });

            // Track order functionality
            document.querySelectorAll('.track-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-order-id');
                    showNotification(`Opening tracking for order #${orderId}...`, 'info');
                    // In real app, open tracking modal or page
                });
            });

            // Cancel order functionality
            document.querySelectorAll('.cancel-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-order-id');
                    if (confirm('Are you sure you want to cancel this order?')) {
                        showNotification(`Order #${orderId} has been cancelled.`, 'warning');
                        // In real app, make API call to cancel order
                    }
                });
            });

            // View details functionality
            document.querySelectorAll('.details-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-order-id');
                    showNotification(`Loading details for order #${orderId}...`, 'info');
                    // In real app, open order details modal or page
                });
            });

            // Review functionality
            document.querySelectorAll('.review-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    showNotification('Opening review form...', 'info');
                    // In real app, open review modal
                });
            });
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