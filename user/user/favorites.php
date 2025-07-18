<?php
// Include utility functions
require_once '../util/products.php';

// Sample favorite products (in real app, this would come from database/session)
$favorite_products = [
    [
        'id' => 1,
        'name' => 'Fresh Chicken Wings',
        'description' => 'Premium quality chicken wings, perfect for grilling',
        'price' => 2500,
        'category' => 'chicken',
        'image' => 'https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=400',
        'rating' => 4.8,
        'added_date' => '2024-12-20'
    ],
    [
        'id' => 2,
        'name' => 'Atlantic Salmon',
        'description' => 'Fresh Atlantic salmon fillets, rich in omega-3',
        'price' => 4500,
        'category' => 'fish',
        'image' => 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=400',
        'rating' => 4.9,
        'added_date' => '2024-12-18'
    ],
    [
        'id' => 5,
        'name' => 'Tuna Steaks',
        'description' => 'Premium tuna steaks, perfect for searing',
        'price' => 5200,
        'category' => 'fish',
        'image' => 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=400',
        'rating' => 4.8,
        'added_date' => '2024-12-15'
    ],
    [
        'id' => 8,
        'name' => 'Sea Bass',
        'description' => 'Fresh sea bass, delicate and flaky',
        'price' => 4800,
        'category' => 'fish',
        'image' => 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=400',
        'rating' => 4.9,
        'added_date' => '2024-12-10'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites - Frozen Foods</title>
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
            <a href="#" class="flex items-center px-6 py-3 text-accent bg-orange-50 border-r-4 border-accent">
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
                    <h1 class="ml-4 text-xl font-semibold text-dark">My Favorites</h1>
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

        <!-- Favorites Content -->
        <div class="p-6 max-w-6xl mx-auto">
            <!-- Page Header -->
            <div class="mb-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-dark mb-2">My Favorite Products</h2>
                        <p class="text-gray-600">You have <?php echo count($favorite_products); ?> favorite items</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <button id="clear-all-btn" class="bg-red-100 text-red-600 px-4 py-2 rounded-lg hover:bg-red-200 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Clear All
                        </button>
                        <button id="add-all-to-cart-btn" class="bg-accent text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            Add All to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Favorites Grid -->
            <div id="favorites-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($favorite_products as $product): ?>
                <div class="favorite-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300" data-product-id="<?php echo $product['id']; ?>">
                    <div class="relative">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-48 object-cover">
                        <button class="remove-favorite-btn absolute top-3 right-3 w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-red-50 transition-colors" data-product-id="<?php echo $product['id']; ?>">
                            <i class="fas fa-heart text-red-500"></i>
                        </button>
                        <div class="absolute top-3 left-3 bg-white px-2 py-1 rounded-full text-xs font-medium text-gray-600">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <?php echo $product['rating']; ?>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-dark mb-1"><?php echo $product['name']; ?></h3>
                        <p class="text-gray-600 text-sm mb-2"><?php echo $product['description']; ?></p>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-lg font-bold text-accent">₦<?php echo number_format($product['price']); ?></span>
                            <span class="text-xs text-gray-500">Added <?php echo date('M d', strtotime($product['added_date'])); ?></span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="add-to-cart-btn flex-1 bg-dark text-white py-2 rounded-lg text-sm hover:bg-gray-800 transition-colors" data-product-id="<?php echo $product['id']; ?>" data-product-name="<?php echo $product['name']; ?>" data-product-price="<?php echo $product['price']; ?>">
                                <i class="fas fa-shopping-cart mr-1"></i>
                                Add to Cart
                            </button>
                            <a href="product.php?id=<?php echo $product['id']; ?>" class="bg-gray-100 text-dark px-3 py-2 rounded-lg text-sm hover:bg-gray-200 transition-colors">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Empty State -->
            <div id="empty-favorites" class="hidden text-center py-12">
                <i class="fas fa-heart text-gray-400 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No favorites yet</h3>
                <p class="text-gray-500 mb-6">Start adding products to your favorites to see them here.</p>
                <a href="dashboard.php" class="bg-accent text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-colors">
                    Browse Products
                </a>
            </div>
        </div>
    </div>

    <script>
        // Initialize favorites page
        document.addEventListener('DOMContentLoaded', function() {
            initializeSidebar();
            initializeFavoriteActions();
            checkEmptyState();
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

        // Favorite actions functionality
        function initializeFavoriteActions() {
            // Remove from favorites
            document.querySelectorAll('.remove-favorite-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const card = this.closest('.favorite-card');
                    
                    if (confirm('Remove this item from favorites?')) {
                        // Animate removal
                        card.style.transform = 'scale(0.8)';
                        card.style.opacity = '0';
                        
                        setTimeout(() => {
                            card.remove();
                            updateFavoritesCount();
                            checkEmptyState();
                            showNotification('Item removed from favorites', 'info');
                        }, 300);
                    }
                });
            });

            // Add to cart
            document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const productName = this.getAttribute('data-product-name');
                    const productPrice = this.getAttribute('data-product-price');
                    
                    // Show loading state
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Adding...';
                    this.disabled = true;
                    
                    // Simulate adding to cart
                    setTimeout(() => {
                        // Add to cart (localStorage for demo)
                        addToCart(productId, productName, productPrice);
                        
                        // Reset button
                        this.innerHTML = originalText;
                        this.disabled = false;
                        
                        showNotification(`${productName} added to cart!`, 'success');
                    }, 1000);
                });
            });

            // Clear all favorites
            document.getElementById('clear-all-btn').addEventListener('click', function() {
                if (confirm('Are you sure you want to remove all items from favorites?')) {
                    const cards = document.querySelectorAll('.favorite-card');
                    cards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.transform = 'scale(0.8)';
                            card.style.opacity = '0';
                            setTimeout(() => {
                                card.remove();
                                if (index === cards.length - 1) {
                                    updateFavoritesCount();
                                    checkEmptyState();
                                }
                            }, 300);
                        }, index * 100);
                    });
                    showNotification('All favorites cleared', 'info');
                }
            });

            // Add all to cart
            document.getElementById('add-all-to-cart-btn').addEventListener('click', function() {
                const addButtons = document.querySelectorAll('.add-to-cart-btn');
                let addedCount = 0;
                
                addButtons.forEach((btn, index) => {
                    setTimeout(() => {
                        btn.click();
                        addedCount++;
                        if (addedCount === addButtons.length) {
                            setTimeout(() => {
                                showNotification(`All ${addedCount} items added to cart!`, 'success');
                            }, 1000);
                        }
                    }, index * 500);
                });
            });
        }

        // Add to cart function
        function addToCart(productId, productName, productPrice) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            
            const existingItem = cart.find(item => item.id === productId);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    price: parseInt(productPrice),
                    quantity: 1
                });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        // Update favorites count
        function updateFavoritesCount() {
            const count = document.querySelectorAll('.favorite-card').length;
            const countText = document.querySelector('p.text-gray-600');
            if (countText) {
                countText.textContent = `You have ${count} favorite items`;
            }
        }

        // Check empty state
        function checkEmptyState() {
            const favoritesGrid = document.getElementById('favorites-grid');
            const emptyState = document.getElementById('empty-favorites');
            const cards = document.querySelectorAll('.favorite-card');
            
            if (cards.length === 0) {
                favoritesGrid.classList.add('hidden');
                emptyState.classList.remove('hidden');
            } else {
                favoritesGrid.classList.remove('hidden');
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