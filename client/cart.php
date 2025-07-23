<?php
require_once 'util/util.php';
require_once 'initialize.php';
require_once 'partials/headers.php';
// Sample cart data (in real app, this would come from session/database)
$cart_items = [
    [
        'id' => 1,
        'name' => 'Fresh Chicken Wings',
        'price' => 2500,
        'quantity' => 2,
        'image' => 'https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=400'
    ],
    [
        'id' => 2,
        'name' => 'Atlantic Salmon',
        'price' => 4500,
        'quantity' => 1,
        'image' => 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=400'
    ],
    [
        'id' => 5,
        'name' => 'Tuna Steaks',
        'price' => 5200,
        'quantity' => 1,
        'image' => 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=400'
    ]
];

// Calculate totals
$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$delivery_fee = $subtotal >= 10000 ? 0 : 500;
$total = $subtotal + $delivery_fee;
?>

<body class="bg-custom-gray min-h-screen">
    <!-- Main Content -->
    <div class="">
        <div class="container mx-auto p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <button id="backBtn" class="p-2 hover:bg-white rounded-lg transition-colors duration-200">
                    <svg class="w-6 h-6 text-custom-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <a href="cart.php">
                    <div class="relative">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                                <circle cx="8" cy="21" r="1" />
                                <circle cx="19" cy="21" r="1" />
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full flex items-center justify-center">
                            <span id="cartCount" class="text-white text-xs font-bold"><?php echo $cartCount; ?></span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Cart Content -->
            <div class="p-6 max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-semibold text-dark">Cart Items</h2>
                                <button id="clear-cart-btn" class="text-red-600 hover:text-red-800 text-sm">
                                    <i class="fas fa-trash mr-1"></i>
                                    Clear Cart
                                </button>
                            </div>

                            <!-- Cart Items List -->
                            <div id="cart-items" class="space-y-4">
                                <?php foreach ($cart_items as $item): ?>
                                    <div class="cart-item flex items-center space-x-4 p-4 border border-gray-200 rounded-lg" data-item-id="<?php echo $item['id']; ?>" data-price="<?php echo $item['price']; ?>">
                                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="w-16 h-16 object-cover rounded-lg">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-dark"><?php echo $item['name']; ?></h3>
                                            <p class="text-accent font-bold">₦<?php echo number_format($item['price']); ?></p>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <button class="quantity-btn decrease-btn w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors" data-action="decrease">
                                                <i class="fas fa-minus text-sm"></i>
                                            </button>
                                            <span class="quantity-display font-semibold text-dark min-w-[2rem] text-center"><?php echo $item['quantity']; ?></span>
                                            <button class="quantity-btn increase-btn w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors" data-action="increase">
                                                <i class="fas fa-plus text-sm"></i>
                                            </button>
                                        </div>
                                        <div class="text-right">
                                            <p class="item-total font-bold text-dark">₦<?php echo number_format($item['price'] * $item['quantity']); ?></p>
                                            <button class="remove-item-btn text-red-600 hover:text-red-800 text-sm mt-1" data-item-id="<?php echo $item['id']; ?>">
                                                <i class="fas fa-times mr-1"></i>
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Empty Cart State -->
                            <div id="empty-cart" class="hidden text-center py-12">
                                <i class="fas fa-shopping-cart text-gray-400 text-6xl mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-600 mb-2">Your cart is empty</h3>
                                <p class="text-gray-500 mb-6">Add some delicious frozen foods to get started!</p>
                                <a href="dashboard.php" class="bg-accent text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-colors">
                                    Continue Shopping
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-lg shadow-md p-6 sticky top-6">
                            <h2 class="text-xl font-semibold text-dark mb-6">Order Summary</h2>

                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span id="subtotal" class="font-semibold text-dark">₦<?php echo number_format($subtotal); ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Delivery Fee</span>
                                    <span id="delivery-fee" class="font-semibold text-dark">₦<?php echo number_format($delivery_fee); ?></span>
                                </div>
                                <?php if ($subtotal >= 10000): ?>
                                    <div class="text-green-600 text-sm">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Free delivery on orders ₦10,000+
                                    </div>
                                <?php else: ?>
                                    <div class="text-gray-500 text-sm">
                                        Add ₦<?php echo number_format(10000 - $subtotal); ?> more for free delivery
                                    </div>
                                <?php endif; ?>
                                <hr class="border-gray-200">
                                <div class="flex justify-between text-lg font-bold">
                                    <span class="text-dark">Total</span>
                                    <span id="total" class="text-accent">₦<?php echo number_format($total); ?></span>
                                </div>
                            </div>

                            <!-- Promo Code -->
                            <div class="mb-6">
                                <div class="flex space-x-2">
                                    <input type="text" id="promo-code" placeholder="Promo code" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent">
                                    <button id="apply-promo-btn" class="bg-gray-200 text-dark px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                                        Apply
                                    </button>
                                </div>
                            </div>

                            <!-- Checkout Button -->
                            <button id="checkout-btn" class="w-full bg-dark text-white py-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors mb-3">
                                Proceed to Checkout
                            </button>

                            <a href="dashboard.php" class="block w-full text-center bg-gray-100 text-dark py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/toast.js"></script>
    <script>
        // Initialize cart page
        document.addEventListener('DOMContentLoaded', function() {
            initializeSidebar();
            initializeCartActions();
            checkEmptyCart();
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

        // Cart actions functionality
        function initializeCartActions() {
            // Quantity buttons
            document.querySelectorAll('.quantity-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const action = this.getAttribute('data-action');
                    const cartItem = this.closest('.cart-item');
                    const quantityDisplay = cartItem.querySelector('.quantity-display');
                    const itemTotal = cartItem.querySelector('.item-total');
                    const price = parseInt(cartItem.getAttribute('data-price'));

                    let quantity = parseInt(quantityDisplay.textContent);

                    if (action === 'increase') {
                        quantity++;
                    } else if (action === 'decrease' && quantity > 1) {
                        quantity--;
                    }

                    quantityDisplay.textContent = quantity;
                    itemTotal.textContent = '₦' + (price * quantity).toLocaleString();

                    updateTotals();
                });
            });

            // Remove item buttons
            document.querySelectorAll('.remove-item-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-item-id');
                    const cartItem = this.closest('.cart-item');

                    if (confirm('Remove this item from cart?')) {
                        cartItem.style.transform = 'scale(0.8)';
                        cartItem.style.opacity = '0';

                        setTimeout(() => {
                            cartItem.remove();
                            updateTotals();
                            checkEmptyCart();
                            showToasted('Item removed from cart', 'info');
                        }, 300);
                    }
                });
            });

            // Clear cart button
            document.getElementById('clear-cart-btn').addEventListener('click', function() {
                if (confirm('Are you sure you want to clear your cart?')) {
                    const cartItems = document.querySelectorAll('.cart-item');
                    cartItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.style.transform = 'scale(0.8)';
                            item.style.opacity = '0';
                            setTimeout(() => {
                                item.remove();
                                if (index === cartItems.length - 1) {
                                    updateTotals();
                                    checkEmptyCart();
                                }
                            }, 300);
                        }, index * 100);
                    });
                    showToasted('Cart cleared', 'info');
                }
            });

            // Promo code
            document.getElementById('apply-promo-btn').addEventListener('click', function() {
                const promoCode = document.getElementById('promo-code').value.trim();

                if (!promoCode) {
                    showToasted('Please enter a promo code', 'error');
                    return;
                }

                // Simulate promo code validation
                const validCodes = ['SAVE10', 'WELCOME20', 'FROZEN15'];

                if (validCodes.includes(promoCode.toUpperCase())) {
                    showToasted('Promo code applied successfully!', 'success');
                    // In real app, apply discount
                } else {
                    showToasted('Invalid promo code', 'error');
                }

                document.getElementById('promo-code').value = '';
            });

            // Checkout button
            document.getElementById('checkout-btn').addEventListener('click', function() {
                const cartItems = document.querySelectorAll('.cart-item');

                if (cartItems.length === 0) {
                    showToasted('Your cart is empty', 'error');
                    return;
                }

                // Show loading state
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                this.disabled = true;

                // Simulate checkout process
                setTimeout(() => {
                    showToasted('Redirecting to checkout...', 'info');
                    // In real app, redirect to checkout page
                    // window.location.href = 'checkout.php';

                    // Reset button
                    this.innerHTML = 'Proceed to Checkout';
                    this.disabled = false;
                }, 2000);
            });
        }

        // Update totals
        function updateTotals() {
            const cartItems = document.querySelectorAll('.cart-item');
            let subtotal = 0;

            cartItems.forEach(item => {
                const price = parseInt(item.getAttribute('data-price'));
                const quantity = parseInt(item.querySelector('.quantity-display').textContent);
                subtotal += price * quantity;
            });

            const deliveryFee = subtotal >= 10000 ? 0 : 500;
            const total = subtotal + deliveryFee;

            document.getElementById('subtotal').textContent = '₦' + subtotal.toLocaleString();
            document.getElementById('delivery-fee').textContent = '₦' + deliveryFee.toLocaleString();
            document.getElementById('total').textContent = '₦' + total.toLocaleString();
        }

        // Check empty cart
        function checkEmptyCart() {
            const cartItems = document.getElementById('cart-items');
            const emptyCart = document.getElementById('empty-cart');
            const items = document.querySelectorAll('.cart-item');

            if (items.length === 0) {
                cartItems.classList.add('hidden');
                emptyCart.classList.remove('hidden');
            } else {
                cartItems.classList.remove('hidden');
                emptyCart.classList.add('hidden');
            }
        }

        function getNotificationColor(type) {
            switch (type) {
                case 'success':
                    return 'bg-green-500';
                case 'error':
                    return 'bg-red-500';
                case 'warning':
                    return 'bg-yellow-500';
                default:
                    return 'bg-blue-500';
            }
        }
    </script>
</body>

</html>