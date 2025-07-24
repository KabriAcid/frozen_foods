<?php
require_once 'util/util.php';
require_once 'initialize.php';
require_once 'partials/headers.php';

// Get cart items from session (dynamic)
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
// var_dump($cart_items);
// Calculate totals
$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$delivery_fee = $subtotal >= 10000 ? 0 : 500;
$total = $subtotal + $delivery_fee;
$cartCount = array_sum(array_column($cart_items, 'quantity'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Premium Experience</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'dm': ['DM Sans', 'sans-serif'],
                    },
                    colors: {
                        accent: '#F97316',
                        dark: '#201f20',
                        secondary: '#ff7272',
                        'custom-gray': '#f6f7fc',
                        'custom-dark': '#201f20',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px rgba(0, 0, 0, 0.08)',
                        'medium': '0 4px 25px rgba(0, 0, 0, 0.1)',
                        'large': '0 8px 35px rgba(0, 0, 0, 0.12)',
                        'accent': '0 4px 20px rgba(249, 115, 22, 0.15)',
                        'glow': '0 0 30px rgba(249, 115, 22, 0.3)',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.4s ease-out',
                        'slide-down': 'slideDown 0.4s ease-out',
                        'slide-right': 'slideRight 0.4s ease-out',
                        'slide-left': 'slideLeft 0.4s ease-out',
                        'scale-in': 'scaleIn 0.3s ease-out',
                        'bounce-gentle': 'bounceGentle 0.6s ease-out',
                        'pulse-ring': 'pulseRing 2s cubic-bezier(0.455, 0.03, 0.515, 0.955) infinite',
                        'float': 'float 3s ease-in-out infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'shimmer': 'shimmer 2s linear infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        slideDown: {
                            '0%': {
                                transform: 'translateY(-20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        slideRight: {
                            '0%': {
                                transform: 'translateX(-100%)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            },
                        },
                        slideLeft: {
                            '0%': {
                                transform: 'translateX(100%)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            },
                        },
                        scaleIn: {
                            '0%': {
                                transform: 'scale(0.9)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: '1'
                            },
                        },
                        bounceGentle: {
                            '0%, 20%, 50%, 80%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '40%': {
                                transform: 'translateY(-10px)'
                            },
                            '60%': {
                                transform: 'translateY(-5px)'
                            },
                        },
                        pulseRing: {
                            '0%': {
                                transform: 'scale(.33)'
                            },
                            '80%, 100%': {
                                transform: 'scale(2.33)',
                                opacity: '0'
                            },
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        },
                        wiggle: {
                            '0%, 100%': {
                                transform: 'rotate(-3deg)'
                            },
                            '50%': {
                                transform: 'rotate(3deg)'
                            },
                        },
                        shimmer: {
                            '0%': {
                                backgroundPosition: '-200% 0'
                            },
                            '100%': {
                                backgroundPosition: '200% 0'
                            },
                        },
                    },
                    backdropBlur: {
                        xs: '2px',
                    },
                }
            }
        }
    </script>
    <style>
        .frosted-glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .frosted-glass-accent {
            background: rgba(249, 115, 22, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(249, 115, 22, 0.15);
        }

        .blob-bg {
            background: radial-gradient(circle at 20% 50%, rgba(249, 115, 22, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(249, 115, 22, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(249, 115, 22, 0.08) 0%, transparent 50%);
        }

        .cart-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .cart-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .quantity-btn {
            transition: all 0.2s ease;
        }

        .quantity-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.2);
        }

        .shimmer-effect {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        .toast-container {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1000;
        }

        .btn-primary {
            background: linear-gradient(135deg, #F97316 0%, #ea580c 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #ea580c 0%, #dc2626 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(249, 115, 22, 0.3);
        }

        .input-focus {
            transition: all 0.3s ease;
        }

        .input-focus:focus {
            transform: translateY(-1px);
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1), 0 4px 20px rgba(249, 115, 22, 0.08);
        }
    </style>
</head>

<body class="font-dm bg-custom-gray min-h-screen blob-bg">
    <!-- Background Blobs -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-accent opacity-10 rounded-full filter blur-3xl animate-float"></div>
        <div class="absolute top-1/2 -left-32 w-64 h-64 bg-secondary opacity-8 rounded-full filter blur-3xl animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 right-1/4 w-48 h-48 bg-accent opacity-6 rounded-full filter blur-2xl animate-float" style="animation-delay: 2s;"></div>
    </div>

    <!-- Toast Container -->
    <div id="toast-container" class="toast-container space-y-2"></div>

    <!-- Custom Confirm Modal -->
    <div id="confirm-modal" class="fixed inset-0 z-50 hidden">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-300"></div>

        <!-- Modal -->
        <div class="relative flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-large max-w-md w-full transform transition-all duration-300 scale-95 opacity-0" id="confirm-modal-content">
                <div class="p-6">
                    <!-- Icon -->
                    <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-red-100 to-red-200 rounded-full flex items-center justify-center">
                        <i id="confirm-icon" class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
                    </div>

                    <!-- Title -->
                    <h3 id="confirm-title" class="text-xl font-bold text-custom-dark text-center mb-2">
                        Confirm Action
                    </h3>

                    <!-- Message -->
                    <p id="confirm-message" class="text-gray-600 text-center mb-6">
                        Are you sure you want to proceed?
                    </p>

                    <!-- Buttons -->
                    <div class="flex space-x-3">
                        <button id="confirm-cancel" class="flex-1 px-4 py-3 border border-slate-200 text-gray-700 rounded-xl font-semibold hover:bg-slate-50 transition-all duration-300 transform hover:scale-105">
                            Cancel
                        </button>
                        <button id="confirm-ok" class="flex-1 px-4 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl font-semibold hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 shadow-accent">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10">
        <div class="container mx-auto p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8 animate-slide-down">
                <button id="backBtn" class="p-3 hover:bg-white/80 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-soft backdrop-blur-sm">
                    <svg class="w-6 h-6 text-custom-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <div class="text-center">
                    <h1 class="text-2xl font-bold text-custom-dark">Shopping Cart</h1>
                    <p class="text-gray-600 text-sm">Review your items</p>
                </div>

                <a href="cart.php" class="transform hover:scale-105 transition-all duration-300">
                    <div class="relative">
                        <div class="w-12 h-12 frosted-glass rounded-xl flex items-center justify-center shadow-soft hover:shadow-medium transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-custom-dark">
                                <circle cx="8" cy="21" r="1" />
                                <circle cx="19" cy="21" r="1" />
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-medium animate-bounce-gentle">
                            <span id="cartCount" class="text-white text-xs font-bold"><?php echo $cartCount; ?></span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Cart Content -->
            <div class="max-w-7xl mx-auto animate-fade-in">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2">
                        <div class="frosted-glass rounded-2xl p-6 shadow-medium border border-white/20">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-semibold text-custom-dark flex items-center">
                                    <i class="fas fa-shopping-bag mr-3 text-accent"></i>
                                    Cart Items
                                </h2>
                                <button id="clear-cart-btn" class="text-red-500 hover:text-red-700 text-sm font-medium px-4 py-2 rounded-lg hover:bg-red-50 transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-trash mr-2"></i>
                                    Clear Cart
                                </button>
                            </div>

                            <!-- Cart Items List -->
                            <div id="cart-items" class="space-y-4">
                                <?php foreach ($cart_items as $item): ?>
                                    <div class="cart-item flex items-center space-x-4 p-4 bg-white/60 backdrop-blur-sm border border-white/30 rounded-xl shadow-soft hover:shadow-medium" data-item-id="<?php echo $item['product_id']; ?>" data-price="<?php echo $item['price']; ?>">
                                        <div class="relative overflow-hidden rounded-xl">
                                            <img src="../assets/uploads/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="w-20 h-20 object-cover transition-transform duration-300 hover:scale-110">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-custom-dark text-lg"><?php echo $item['name']; ?></h3>
                                            <p class="text-accent font-bold text-lg">₦<?php echo number_format($item['price']); ?></p>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <button class="quantity-btn decrease-btn w-10 h-10 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full flex items-center justify-center hover:from-accent hover:to-orange-600 hover:text-white transition-all duration-300 shadow-soft" data-action="decrease">
                                                <i class="fas fa-minus text-sm"></i>
                                            </button>
                                            <span class="quantity-display font-bold text-custom-dark min-w-[3rem] text-center text-lg bg-white/80 px-3 py-1 rounded-lg shadow-soft"><?php echo $item['quantity']; ?></span>
                                            <button class="quantity-btn increase-btn w-10 h-10 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full flex items-center justify-center hover:from-accent hover:to-orange-600 hover:text-white transition-all duration-300 shadow-soft" data-action="increase">
                                                <i class="fas fa-plus text-sm"></i>
                                            </button>
                                        </div>
                                        <div class="text-right">
                                            <p class="item-total font-bold text-custom-dark text-xl">₦<?php echo number_format($item['price'] * $item['quantity']); ?></p>
                                            <button class="remove-item-btn text-red-500 hover:text-red-700 text-sm mt-2 px-3 py-1 rounded-lg hover:bg-red-50 transition-all duration-300 transform hover:scale-105" data-item-id="<?php echo $item['product_id']; ?>">
                                                <i class="fas fa-times mr-1"></i>
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Empty Cart State -->
                            <div id="empty-cart" class="hidden text-center py-16">
                                <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                                    <i class="fas fa-shopping-cart text-gray-400 text-4xl"></i>
                                </div>
                                <h3 class="text-2xl font-semibold text-gray-600 mb-3">Your cart is empty</h3>
                                <p class="text-gray-500 mb-8 max-w-md mx-auto">Add some delicious frozen foods to get started on your culinary journey!</p>
                                <a href="dashboard.php" class="btn-primary text-white px-8 py-4 rounded-xl font-semibold inline-flex items-center space-x-2 shadow-accent">
                                    <i class="fas fa-utensils"></i>
                                    <span>Continue Shopping</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="frosted-glass-accent rounded-2xl p-6 sticky top-6 shadow-large border border-accent/20">
                            <h2 class="text-xl font-semibold text-custom-dark mb-6 flex items-center">
                                <i class="fas fa-receipt mr-3 text-accent"></i>
                                Order Summary
                            </h2>

                            <div class="space-y-4 mb-6">
                                <div class="flex justify-between items-center p-3 bg-white/50 rounded-lg">
                                    <span class="text-gray-700 font-medium">Subtotal</span>
                                    <span id="subtotal" class="font-bold text-custom-dark text-lg">₦<?php echo number_format($subtotal); ?></span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-white/50 rounded-lg">
                                    <span class="text-gray-700 font-medium">Delivery Fee</span>
                                    <span id="delivery-fee" class="font-bold text-custom-dark text-lg">₦<?php echo number_format($delivery_fee); ?></span>
                                </div>
                                <?php if ($subtotal >= 10000): ?>
                                    <div class="text-green-600 text-sm font-medium p-3 bg-green-50 rounded-lg flex items-center">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        Free delivery on orders ₦10,000+
                                    </div>
                                <?php else: ?>
                                    <div class="text-amber-600 text-sm font-medium p-3 bg-amber-50 rounded-lg flex items-center">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Add ₦<?php echo number_format(10000 - $subtotal); ?> more for free delivery
                                    </div>
                                <?php endif; ?>
                                <hr class="border-white/30">
                                <div class="flex justify-between text-xl font-bold p-4 bg-white/70 rounded-xl shadow-soft">
                                    <span class="text-custom-dark">Total</span>
                                    <span id="total" class="text-accent">₦<?php echo number_format($total); ?></span>
                                </div>
                            </div>

                            <!-- Promo Code -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Promo Code</label>
                                <div class="flex space-x-2">
                                    <input type="text" id="promo-code" placeholder="Enter promo code" class="input-focus flex-1 px-4 py-3 border border-white/30 rounded-xl focus:ring-2 focus:ring-accent focus:border-transparent bg-white/80 backdrop-blur-sm">
                                    <button id="apply-promo-btn" class="bg-white/80 text-custom-dark px-6 py-3 rounded-xl font-semibold hover:bg-accent hover:text-white transition-all duration-300 transform hover:scale-105 shadow-soft">
                                        Apply
                                    </button>
                                </div>
                            </div>

                            <!-- Checkout Button -->
                            <button id="checkout-btn" class="w-full btn-primary text-white py-4 rounded-xl font-semibold mb-4 flex items-center justify-center space-x-2 shadow-accent">
                                <i class="fas fa-credit-card"></i>
                                <span>Proceed to Checkout</span>
                            </button>

                            <a href="dashboard.php" class="block w-full text-center bg-white/80 text-custom-dark py-4 rounded-xl font-semibold hover:bg-white transition-all duration-300 transform hover:scale-105 shadow-soft backdrop-blur-sm">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom navigation include -->
    <?php include 'partials/bottom-nav.php'; ?>

    <script src="../assets/js/toast.js"></script>
    <script>

        // Custom confirm modal functionality
        function showCustomConfirm(title, message, iconClass = 'fa-exclamation-triangle', iconColor = 'text-red-500') {
            return new Promise((resolve) => {
                const modal = document.getElementById('confirm-modal');
                const modalContent = document.getElementById('confirm-modal-content');
                const titleEl = document.getElementById('confirm-title');
                const messageEl = document.getElementById('confirm-message');
                const iconEl = document.getElementById('confirm-icon');
                const cancelBtn = document.getElementById('confirm-cancel');
                const okBtn = document.getElementById('confirm-ok');

                // Set content
                titleEl.textContent = title;
                messageEl.textContent = message;
                iconEl.className = `fas ${iconClass} ${iconColor} text-2xl`;

                // Show modal with animation
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);

                // Handle buttons
                const handleCancel = () => {
                    hideModal();
                    resolve(false);
                };

                const handleConfirm = () => {
                    hideModal();
                    resolve(true);
                };

                const hideModal = () => {
                    modalContent.classList.remove('scale-100', 'opacity-100');
                    modalContent.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                        cancelBtn.removeEventListener('click', handleCancel);
                        okBtn.removeEventListener('click', handleConfirm);
                    }, 300);
                };

                // Add event listeners
                cancelBtn.addEventListener('click', handleCancel);
                okBtn.addEventListener('click', handleConfirm);

                // Close on backdrop click
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        handleCancel();
                    }
                });

                // Close on escape key
                const handleEscape = (e) => {
                    if (e.key === 'Escape') {
                        handleCancel();
                        document.removeEventListener('keydown', handleEscape);
                    }
                };
                document.addEventListener('keydown', handleEscape);
            });
        }

        // Initialize cart page
        document.addEventListener('DOMContentLoaded', function() {
            initializeSidebar();
            initializeCartActions();
            checkEmptyCart();

            // Add loading animation to page elements
            const elements = document.querySelectorAll('.cart-item');
            elements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
                el.classList.add('animate-slide-up');
            });
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
            // Quantity buttons with enhanced animations
            document.querySelectorAll('.quantity-btn').forEach(btn => {
                btn.addEventListener('click', async function() {
                    const action = this.getAttribute('data-action');
                    const cartItem = this.closest('.cart-item');
                    const itemId = cartItem.getAttribute('data-item-id');
                    const price = parseInt(cartItem.getAttribute('data-price'));
                    const quantityDisplay = cartItem.querySelector('.quantity-display');
                    const itemTotal = cartItem.querySelector('.item-total');

                    // Add loading state
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    this.disabled = true;

                    let quantity = parseInt(quantityDisplay.textContent);
                    quantity = action === 'increase' ? quantity + 1 : Math.max(1, quantity - 1);

                    try {
                        const res = await fetch('api/update-cart.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: itemId,
                                quantity
                            })
                        });
                        const result = await res.json();

                        if (result.success) {
                            // Animate quantity change
                            quantityDisplay.style.transform = 'scale(1.2)';
                            quantityDisplay.textContent = quantity;
                            setTimeout(() => {
                                quantityDisplay.style.transform = 'scale(1)';
                            }, 200);

                            // Animate total change
                            itemTotal.style.transform = 'scale(1.1)';
                            itemTotal.textContent = '₦' + (price * quantity).toLocaleString();
                            setTimeout(() => {
                                itemTotal.style.transform = 'scale(1)';
                            }, 200);

                            updateTotals();
                            showToasted('Cart updated successfully', 'success');
                        } else {
                            showToasted(result.message || 'Failed to update cart', 'error');
                        }
                    } catch (error) {
                        showToasted('Network error occurred', 'error');
                    } finally {
                        // Restore button
                        this.innerHTML = action === 'increase' ? '<i class="fas fa-plus text-sm"></i>' : '<i class="fas fa-minus text-sm"></i>';
                        this.disabled = false;
                    }
                });
            });

            // Remove item with animation
            document.querySelectorAll('.remove-item-btn').forEach(btn => {
                btn.addEventListener('click', async function() {
                    const itemId = this.getAttribute('data-item-id');
                    const cartItem = this.closest('.cart-item');
                    const itemName = cartItem.querySelector('h3').textContent;

                    const confirmed = await showCustomConfirm(
                        'Remove Item',
                        `Are you sure you want to remove "${itemName}" from your cart?`,
                        'fa-trash-alt',
                        'text-red-500'
                    );

                    if (!confirmed) return;

                    // Add removing animation
                    cartItem.style.transform = 'translateX(-100%)';
                    cartItem.style.opacity = '0';

                    try {
                        const res = await fetch('api/remove-cart-item.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: itemId
                            })
                        });

                        const result = await res.json();
                        if (result.success) {
                            setTimeout(() => {
                                cartItem.remove();
                                updateTotals();
                                checkEmptyCart();
                            }, 300);
                            showToasted('Item removed from cart', 'info');
                        } else {
                            // Restore item if failed
                            cartItem.style.transform = 'translateX(0)';
                            cartItem.style.opacity = '1';
                            showToasted('Failed to remove item', 'error');
                        }
                    } catch (error) {
                        cartItem.style.transform = 'translateX(0)';
                        cartItem.style.opacity = '1';
                        showToasted('Network error occurred', 'error');
                    }
                });
            });

            // Clear cart button with confirmation
            document.getElementById('clear-cart-btn').addEventListener('click', async function() {
                const itemCount = document.querySelectorAll('.cart-item').length;
                const confirmed = await showCustomConfirm(
                    'Clear Cart',
                    `Are you sure you want to remove all ${itemCount} items from your cart? This action cannot be undone.`,
                    'fa-trash-alt',
                    'text-red-500'
                );

                if (!confirmed) return;

                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Clearing...';
                this.disabled = true;

                try {
                    const res = await fetch('api/clear-cart.php', {
                        method: 'POST'
                    });
                    const result = await res.json();

                    if (result.success) {
                        // Animate all items out
                        const items = document.querySelectorAll('.cart-item');
                        items.forEach((item, index) => {
                            setTimeout(() => {
                                item.style.transform = 'translateX(-100%)';
                                item.style.opacity = '0';
                                setTimeout(() => item.remove(), 300);
                            }, index * 100);
                        });

                        setTimeout(() => {
                            updateTotals();
                            checkEmptyCart();
                        }, items.length * 100 + 300);

                        showToasted('Cart cleared successfully', 'info');
                    } else {
                        showToasted('Failed to clear cart', 'error');
                    }
                } catch (error) {
                    showToasted('Network error occurred', 'error');
                } finally {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }
            });

            // Promo code with enhanced feedback
            document.getElementById('apply-promo-btn').addEventListener('click', function() {
                const promoCode = document.getElementById('promo-code').value.trim();
                const button = this;
                const originalText = button.textContent;

                if (!promoCode) {
                    showToasted('Please enter a promo code', 'error');
                    return;
                }

                // Add loading state
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                button.disabled = true;

                // Simulate API call
                setTimeout(() => {
                    const validCodes = ['SAVE10', 'WELCOME20', 'FROZEN15'];

                    if (validCodes.includes(promoCode.toUpperCase())) {
                        showToasted('Promo code applied successfully! 🎉', 'success');
                        document.getElementById('promo-code').value = '';
                        // Add visual feedback
                        document.getElementById('promo-code').style.borderColor = '#22c55e';
                        setTimeout(() => {
                            document.getElementById('promo-code').style.borderColor = '';
                        }, 2000);
                    } else {
                        showToasted('Invalid promo code', 'error');
                        document.getElementById('promo-code').style.borderColor = '#ef4444';
                        setTimeout(() => {
                            document.getElementById('promo-code').style.borderColor = '';
                        }, 2000);
                    }

                    button.textContent = originalText;
                    button.disabled = false;
                }, 1500);
            });

            // Enhanced checkout button
            document.getElementById('checkout-btn').addEventListener('click', function() {
                const cartItems = document.querySelectorAll('.cart-item');

                if (cartItems.length === 0) {
                    showToasted('Your cart is empty', 'error');
                    return;
                }

                // Enhanced loading state
                const originalContent = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                this.disabled = true;
                this.style.transform = 'scale(0.98)';

                // Simulate checkout process
                setTimeout(() => {
                    showToasted('Redirecting to checkout...', 'info');

                    setTimeout(() => {
                        window.location.href = 'checkout.php';
                    }, 1000);

                    // Reset button after delay
                    setTimeout(() => {
                        this.innerHTML = originalContent;
                        this.disabled = false;
                        this.style.transform = 'scale(1)';
                    }, 2000);
                }, 2000);
            });

            // Back button functionality
            document.getElementById('backBtn').addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    window.history.back();
                }, 150);
            });
        }

        // Enhanced update totals with animations
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

            // Animate total changes
            const subtotalEl = document.getElementById('subtotal');
            const deliveryEl = document.getElementById('delivery-fee');
            const totalEl = document.getElementById('total');

            [subtotalEl, deliveryEl, totalEl].forEach(el => {
                el.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    el.style.transform = 'scale(1)';
                }, 200);
            });

            subtotalEl.textContent = '₦' + subtotal.toLocaleString();
            deliveryEl.textContent = '₦' + deliveryFee.toLocaleString();
            totalEl.textContent = '₦' + total.toLocaleString();

            // Update cart count
            const cartCount = Array.from(cartItems).reduce((sum, item) => {
                return sum + parseInt(item.querySelector('.quantity-display').textContent);
            }, 0);
            document.getElementById('cartCount').textContent = cartCount;
        }

        // Enhanced empty cart check
        function checkEmptyCart() {
            const cartItems = document.getElementById('cart-items');
            const emptyCart = document.getElementById('empty-cart');
            const items = document.querySelectorAll('.cart-item');

            if (items.length === 0) {
                cartItems.classList.add('hidden');
                emptyCart.classList.remove('hidden');
                emptyCart.classList.add('animate-scale-in');
            } else {
                cartItems.classList.remove('hidden');
                emptyCart.classList.add('hidden');
            }
        }

        // Add smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';

        // Add intersection observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-slide-up');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.addEventListener('DOMContentLoaded', () => {
            const animateElements = document.querySelectorAll('.cart-item, .frosted-glass');
            animateElements.forEach(el => observer.observe(el));
        });
    </script>
</body>

</html>