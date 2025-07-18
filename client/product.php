<?php
// Include utility functions
require_once 'util/util.php';

// Get product ID from URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Mock product data - replace with your actual database query
$product = [
    'id' => $product_id,
    'name' => 'Premium Frozen Chicken Wings',
    'price' => 8500,
    'rating' => 4.8,
    'reviews_count' => 124,
    'image' => 'https://images.pexels.com/photos/60616/fried-chicken-chicken-fried-crunchy-60616.jpeg?auto=compress&cs=tinysrgb&w=800',
    'description' => 'Premium quality frozen chicken wings, perfectly seasoned and ready to cook. These wings are sourced from free-range chickens and flash-frozen to preserve freshness and flavor. Perfect for grilling, baking, or frying. Each pack contains approximately 1kg of wings.',
    'category' => 'Chicken',
    'in_stock' => true,
    'nutritional_info' => [
        'calories' => '250 per 100g',
        'protein' => '18g',
        'fat' => '20g',
        'carbs' => '0g'
    ],
    'features' => [
        'Free-range chicken',
        'Flash frozen for freshness',
        'No artificial preservatives',
        'Ready to cook'
    ]
];
require_once 'partials/headers.php';
?>

<body class="bg-gray font-dm overflow-x-hidden">
    <!-- Header with Back Button -->
    <header class="fixed top-0 left-0 right-0 glass-effect border-b border-gray-200/50 z-50 safe-area-top animate-slide-down">
        <div class="flex items-center justify-between px-4 py-4">
            <button onclick="goBack()" class="w-12 h-12 bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg flex items-center justify-center hover:bg-white hover:scale-105 transition-all duration-300 active:scale-95">
                <i class="fas fa-arrow-left text-dark text-lg"></i>
            </button>
            <div class="flex items-center space-x-3">
                <button id="share-btn" class="w-12 h-12 bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg flex items-center justify-center hover:bg-white hover:scale-105 transition-all duration-300 active:scale-95">
                    <i class="fas fa-share-alt text-dark text-lg"></i>
                </button>
                <button id="favorite-btn" class="w-12 h-12 bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg flex items-center justify-center hover:bg-white hover:scale-105 transition-all duration-300 active:scale-95">
                    <i class="far fa-heart text-dark text-lg"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-24 pb-32">
        <!-- Product Image Section -->
        <div class="px-4 mb-8 animate-fade-in">
            <div class="relative bg-white rounded-3xl overflow-hidden floating-card">
                <img src="<?php echo $product['image']; ?>"
                    alt="<?php echo $product['name']; ?>"
                    class="product-image w-full h-80 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                <?php if ($product['in_stock']): ?>
                    <div class="absolute top-4 left-4">
                        <span class="bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                            <i class="fas fa-check mr-1"></i>
                            In Stock
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="px-4 space-y-6">
            <!-- Title and Price -->
            <div class="animate-slide-up" style="animation-delay: 0.1s;">
                <h1 class="text-3xl font-bold text-dark mb-2"><?php echo $product['name']; ?></h1>
                <div class="flex items-center justify-between mb-4">
                    <div class="text-3xl font-bold text-accent">₦<?php echo number_format($product['price']); ?></div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center">
                            <i class="fas fa-star star-rating text-lg"></i>
                            <span class="ml-1 font-semibold text-dark"><?php echo $product['rating']; ?></span>
                        </div>
                        <span class="text-gray-500 text-sm">(<?php echo $product['reviews_count']; ?> reviews)</span>
                    </div>
                </div>
            </div>

            <!-- Quantity Selector -->
            <div class="animate-slide-up" style="animation-delay: 0.2s;">
                <h3 class="text-lg font-semibold text-dark mb-4">Choose quantity</h3>
                <div class="flex items-center space-x-4">
                    <button id="decrease-btn" class="quantity-btn w-14 h-14 bg-white rounded-2xl shadow-lg flex items-center justify-center hover:shadow-xl transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-minus text-dark text-lg"></i>
                    </button>
                    <div class="flex-1 text-center">
                        <span id="quantity-display" class="text-4xl font-bold text-dark">1</span>
                    </div>
                    <button id="increase-btn" class="quantity-btn w-14 h-14 bg-white rounded-2xl shadow-lg flex items-center justify-center hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-plus text-dark text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Description Section -->
            <div class="animate-slide-up" style="animation-delay: 0.3s;">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-dark">Description</h3>
                    <div class="flex items-center">
                        <i class="fas fa-star star-rating text-lg"></i>
                        <span class="ml-1 text-lg font-bold text-dark"><?php echo $product['rating']; ?></span>
                    </div>
                </div>
                <p class="text-gray-600 leading-relaxed mb-6"><?php echo $product['description']; ?></p>

                <!-- Features -->
                <div class="space-y-3">
                    <?php foreach ($product['features'] as $feature): ?>
                        <div class="feature-item flex items-center">
                            <div class="w-2 h-2 bg-accent rounded-full mr-3"></div>
                            <span class="text-gray-700"><?php echo $feature; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Nutritional Info -->
            <div class="animate-slide-up" style="animation-delay: 0.4s;">
                <h3 class="text-lg font-semibold text-dark mb-4">Nutritional Information</h3>
                <div class="bg-white rounded-2xl p-4 floating-card">
                    <div class="grid grid-cols-2 gap-4">
                        <?php foreach ($product['nutritional_info'] as $key => $value): ?>
                            <div class="text-center">
                                <p class="text-gray-500 text-sm capitalize"><?php echo str_replace('_', ' ', $key); ?></p>
                                <p class="font-semibold text-dark"><?php echo $value; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Fixed Bottom Action Bar -->
    <div class="fixed bottom-0 left-0 right-0 glass-effect border-t border-gray-200/50 safe-area-bottom z-50 animate-slide-up" style="animation-delay: 0.5s;">
        <div class="px-4 py-4">
            <div class="flex space-x-4">
                <button id="add-to-cart-btn" class="action-btn ripple flex-1 bg-white border-2 border-accent text-accent py-4 rounded-2xl font-bold text-lg hover:bg-accent hover:text-white transition-all duration-300">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    Add to Cart
                </button>
                <button id="order-now-btn" class="action-btn ripple flex-1 gradient-bg text-white py-4 rounded-2xl font-bold text-lg hover:shadow-xl transition-all duration-300">
                    <i class="fas fa-bolt mr-2"></i>
                    Order Now
                </button>
            </div>
            <div class="mt-3 text-center">
                <p class="text-gray-500 text-sm">
                    Total: <span id="total-price" class="font-semibold text-accent">₦<?php echo number_format($product['price']); ?></span>
                </p>
            </div>
        </div>
    </div>

    <!-- Success Toast (Hidden by default) -->
    <div id="success-toast" class="fixed top-20 left-4 right-4 bg-green-500 text-white px-6 py-4 rounded-2xl shadow-lg transform -translate-y-full opacity-0 transition-all duration-300 z-50">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-xl mr-3"></i>
            <span class="font-semibold">Added to cart successfully!</span>
        </div>
    </div>

    <script>
        // Product data for JavaScript
        const product = {
            id: <?php echo $product['id']; ?>,
            name: '<?php echo addslashes($product['name']); ?>',
            price: <?php echo $product['price']; ?>,
            image: '<?php echo $product['image']; ?>'
        };

        let quantity = 1;
        const maxQuantity = 10;

        // DOM elements
        const quantityDisplay = document.getElementById('quantity-display');
        const decreaseBtn = document.getElementById('decrease-btn');
        const increaseBtn = document.getElementById('increase-btn');
        const totalPriceElement = document.getElementById('total-price');
        const addToCartBtn = document.getElementById('add-to-cart-btn');
        const orderNowBtn = document.getElementById('order-now-btn');
        const favoriteBtn = document.getElementById('favorite-btn');
        const shareBtn = document.getElementById('share-btn');
        const successToast = document.getElementById('success-toast');

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateQuantityDisplay();
            updateTotalPrice();

            // Stagger animations for elements
            const animatedElements = document.querySelectorAll('.animate-slide-up');
            animatedElements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Quantity controls
        decreaseBtn.addEventListener('click', function() {
            if (quantity > 1) {
                quantity--;
                updateQuantityDisplay();
                updateTotalPrice();

                // Add bounce animation
                this.classList.add('animate-bounce-gentle');
                setTimeout(() => {
                    this.classList.remove('animate-bounce-gentle');
                }, 600);
            }
        });

        increaseBtn.addEventListener('click', function() {
            if (quantity < maxQuantity) {
                quantity++;
                updateQuantityDisplay();
                updateTotalPrice();

                // Add bounce animation
                this.classList.add('animate-bounce-gentle');
                setTimeout(() => {
                    this.classList.remove('animate-bounce-gentle');
                }, 600);
            }
        });

        // Update quantity display
        function updateQuantityDisplay() {
            quantityDisplay.textContent = quantity;
            decreaseBtn.disabled = quantity <= 1;
            increaseBtn.disabled = quantity >= maxQuantity;

            // Add scale animation
            quantityDisplay.style.transform = 'scale(1.1)';
            setTimeout(() => {
                quantityDisplay.style.transform = 'scale(1)';
            }, 200);
        }

        // Update total price
        function updateTotalPrice() {
            const total = product.price * quantity;
            totalPriceElement.textContent = `₦${total.toLocaleString()}`;
        }

        // Add to cart functionality
        addToCartBtn.addEventListener('click', function() {
            // Add loading state
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Adding...';
            this.disabled = true;

            // Simulate API call
            setTimeout(() => {
                // Reset button
                this.innerHTML = originalText;
                this.disabled = false;

                // Show success toast
                showSuccessToast();

                // Add to cart logic here
                console.log('Added to cart:', {
                    product: product,
                    quantity: quantity,
                    total: product.price * quantity
                });
            }, 1500);
        });

        // Order now functionality
        orderNowBtn.addEventListener('click', function() {
            // Add loading state
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
            this.disabled = true;

            // Simulate order processing
            setTimeout(() => {
                // Reset button
                this.innerHTML = originalText;
                this.disabled = false;

                // Redirect to checkout or show order confirmation
                console.log('Order now:', {
                    product: product,
                    quantity: quantity,
                    total: product.price * quantity
                });

                // You can redirect to checkout page here
                // window.location.href = 'checkout.php';
            }, 2000);
        });

        // Favorite functionality
        favoriteBtn.addEventListener('click', function() {
            const icon = this.querySelector('i');

            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas', 'text-red-500');

                // Add heart beat animation
                icon.style.animation = 'bounce-gentle 0.6s ease-in-out';

                // Change button background
                this.classList.add('bg-red-50');
            } else {
                icon.classList.remove('fas', 'text-red-500');
                icon.classList.add('far');
                icon.style.animation = '';
                this.classList.remove('bg-red-50');
            }

            // Add scale animation to button
            this.style.transform = 'scale(1.1)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 200);
        });

        // Share functionality
        shareBtn.addEventListener('click', function() {
            if (navigator.share) {
                navigator.share({
                    title: product.name,
                    text: `Check out this amazing product: ${product.name}`,
                    url: window.location.href
                });
            } else {
                // Fallback for browsers that don't support Web Share API
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    showSuccessToast('Link copied to clipboard!');
                });
            }

            // Add animation
            this.classList.add('animate-bounce-gentle');
            setTimeout(() => {
                this.classList.remove('animate-bounce-gentle');
            }, 600);
        });

        // Back button functionality
        function goBack() {
            if (document.referrer && document.referrer.includes(window.location.host)) {
                window.history.back();
            } else {
                window.location.href = 'dashboard.php';
            }
        }

        // Show success toast
        function showSuccessToast(message = 'Added to cart successfully!') {
            const toast = successToast;
            const messageElement = toast.querySelector('span');
            messageElement.textContent = message;

            // Show toast
            toast.style.transform = 'translateY(0)';
            toast.style.opacity = '1';

            // Hide after 3 seconds
            setTimeout(() => {
                toast.style.transform = 'translateY(-100%)';
                toast.style.opacity = '0';
            }, 3000);
        }

        // Add ripple effect to buttons
        document.querySelectorAll('.ripple').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple-effect');

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            .ripple-effect {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }
            
            @keyframes ripple-animation {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';

        // Add intersection observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.animate-slide-up').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>

</html>