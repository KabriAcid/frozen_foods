<?php
// Include utility functions
require_once '../util/products.php';

// Get all products for the dashboard
$products = getAllProducts();
$categories = getProductCategories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Frozen Foods</title>
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
                    },
                    animation: {
                        'bounce-gentle': 'bounce-gentle 0.6s ease-in-out',
                        'scale-in': 'scale-in 0.2s ease-out',
                        'slide-up': 'slide-up 0.3s ease-out',
                        'fade-in': 'fade-in 0.4s ease-out'
                    },
                    keyframes: {
                        'bounce-gentle': {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-4px)'
                            }
                        },
                        'scale-in': {
                            '0%': {
                                transform: 'scale(0.95)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: '1'
                            }
                        },
                        'slide-up': {
                            '0%': {
                                transform: 'translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        'fade-in': {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            }
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Premium custom styles */
        .safe-area-bottom {
            padding-bottom: env(safe-area-inset-bottom);
        }

        .nav-item-active {
            color: #F97316;
        }

        .nav-item-active .nav-icon {
            color: #F97316;
            transform: translateY(-2px);
        }

        .nav-item-active .nav-indicator {
            opacity: 1;
            transform: scale(1);
        }

        .product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .product-card:active {
            transform: translateY(-2px) scale(0.98);
        }

        /* Hide scrollbar but keep functionality */
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Premium gradient backgrounds */
        .gradient-bg {
            background: linear-gradient(135deg, #F97316 0%, #ff7272 100%);
        }

        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
        }

        /* Navigation indicator */
        .nav-indicator {
            position: absolute;
            top: -2px;
            left: 50%;
            transform: translateX(-50%) scale(0);
            width: 4px;
            height: 4px;
            background: #F97316;
            border-radius: 50%;
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Tab button premium styling */
        .tab-button {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .tab-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .tab-button:hover::before {
            left: 100%;
        }

        /* Floating action effect */
        .floating-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* Premium search bar */
        .search-container {
            position: relative;
            overflow: hidden;
        }

        .search-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(249, 115, 22, 0.1), rgba(255, 114, 114, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 1rem;
        }

        .search-container:focus-within::before {
            opacity: 1;
        }

        /* Notification badge */
        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 8px;
            height: 8px;
            background: #ff7272;
            border-radius: 50%;
            border: 2px solid white;
        }
    </style>
</head>

<body class="bg-gray font-dm pb-24 overflow-x-hidden">
    <!-- Main Content -->
    <main class="px-4 pt-6 space-y-6 animate-fade-in">
        <!-- Welcome Section -->
        <div class="gradient-bg rounded-3xl p-6 text-white floating-card animate-slide-up">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Welcome back!</h2>
                    <p class="text-orange-100 text-sm">Discover fresh frozen foods for your family</p>
                </div>
                <div class="relative">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl border border-white/30 flex items-center justify-center">
                        <i class="fas fa-snowflake text-white text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-4 text-orange-100 text-sm">
                <div class="flex items-center">
                    <i class="fas fa-clock mr-2"></i>
                    <span>Fresh daily</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-truck mr-2"></i>
                    <span>Fast delivery</span>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="search-container animate-slide-up" style="animation-delay: 0.1s;">
            <div class="relative">
                <input
                    type="text"
                    id="search-input"
                    placeholder="Search for chicken, fish, turkey..."
                    class="w-full pl-14 pr-4 py-4 rounded-2xl border-0 bg-white shadow-lg focus:ring-2 focus:ring-accent focus:outline-none text-base transition-all duration-300 hover:shadow-xl">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                    <i class="fas fa-search text-gray-400 text-lg"></i>
                </div>
                <button class="absolute right-3 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-accent rounded-xl flex items-center justify-center text-white hover:bg-orange-600 transition-colors">
                    <i class="fas fa-sliders-h text-sm"></i>
                </button>
            </div>
        </div>

        <!-- Category Tabs -->
        <div class="overflow-x-auto hide-scrollbar animate-slide-up" style="animation-delay: 0.2s;">
            <div class="flex space-x-3 pb-2">
                <button class="tab-button active px-6 py-3 rounded-2xl text-sm font-semibold whitespace-nowrap bg-accent text-white shadow-lg hover:shadow-xl transform hover:scale-105" data-category="all">
                    All
                </button>
                <?php foreach ($categories as $category): ?>
                    <button class="tab-button px-6 py-3 rounded-2xl text-sm font-semibold whitespace-nowrap bg-white text-gray-600 shadow-md hover:shadow-lg hover:bg-gray-50 transform hover:scale-105" data-category="<?php echo strtolower($category); ?>">
                        <?php echo ucfirst($category); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Products Section -->
        <div class="animate-slide-up" style="animation-delay: 0.3s;">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-dark">Popular Items</h3>
                    <p class="text-gray-500 text-sm">Fresh and quality guaranteed</p>
                </div>
                <button class="text-accent text-sm font-semibold bg-orange-50 px-4 py-2 rounded-xl hover:bg-orange-100 transition-colors">
                    See all
                </button>
            </div>

            <!-- Product Grid -->
            <div id="products-grid" class="grid grid-cols-2 gap-4">
                <?php foreach ($products as $product): ?>
                    <div class="product-card bg-white rounded-3xl shadow-lg overflow-hidden animate-scale-in" data-category="<?php echo strtolower($product['category']); ?>" data-name="<?php echo strtolower($product['name']); ?>" style="animation-delay: <?php echo rand(1, 6) * 0.1; ?>s;">
                        <div class="relative">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-36 object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            <button class="favorite-btn absolute top-3 right-3 w-9 h-9 bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg flex items-center justify-center hover:bg-white hover:scale-110 transition-all duration-300">
                                <i class="far fa-heart text-gray-600 text-sm"></i>
                            </button>
                            <div class="absolute bottom-3 left-3">
                                <span class="bg-accent text-white text-xs font-semibold px-2 py-1 rounded-lg">
                                    Fresh
                                </span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h4 class="font-bold text-dark text-sm mb-1 line-clamp-1"><?php echo $product['name']; ?></h4>
                            <p class="text-gray-500 text-xs mb-3 line-clamp-2"><?php echo $product['description']; ?></p>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-accent">₦<?php echo number_format($product['price']); ?></span>
                                <a href="product.php?id=<?php echo $product['id']; ?>" class="bg-dark text-white px-4 py-2 rounded-xl text-xs font-semibold hover:bg-gray-800 transition-all duration-300 hover:scale-105 active:scale-95">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <!-- Premium Mobile Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 right-0 glass-effect border-t border-gray-200/50 safe-area-bottom z-50 animate-slide-up" style="animation-delay: 0.5s;">
        <div class="grid grid-cols-4 h-20 px-2">
            <!-- Dashboard -->
            <a href="dashboard.php" class="nav-item nav-item-active flex flex-col items-center justify-center space-y-1 relative group">
                <div class="nav-indicator"></div>
                <div class="nav-icon w-12 h-12 rounded-2xl bg-accent/10 flex items-center justify-center transition-all duration-300 group-hover:bg-accent/20">
                    <i class="fas fa-home text-lg transition-all duration-300"></i>
                </div>
                <span class="text-xs font-semibold transition-all duration-300">Dashboard</span>
            </a>

            <!-- Orders -->
            <a href="orders.php" class="nav-item flex flex-col items-center justify-center space-y-1 text-gray-500 hover:text-accent transition-all duration-300 relative group">
                <div class="nav-indicator"></div>
                <div class="nav-icon w-12 h-12 rounded-2xl bg-transparent flex items-center justify-center transition-all duration-300 group-hover:bg-accent/10">
                    <i class="fas fa-shopping-cart text-lg transition-all duration-300"></i>
                </div>
                <span class="text-xs font-semibold transition-all duration-300">Orders</span>
            </a>

            <!-- Notifications -->
            <a href="notifications.php" class="nav-item flex flex-col items-center justify-center space-y-1 text-gray-500 hover:text-accent transition-all duration-300 relative group">
                <div class="nav-indicator"></div>
                <div class="nav-icon w-12 h-12 rounded-2xl bg-transparent flex items-center justify-center transition-all duration-300 group-hover:bg-accent/10 relative">
                    <i class="fas fa-bell text-lg transition-all duration-300"></i>
                    <div class="notification-badge"></div>
                </div>
                <span class="text-xs font-semibold transition-all duration-300">Notifications</span>
            </a>

            <!-- Profile -->
            <a href="profile.php" class="nav-item flex flex-col items-center justify-center space-y-1 text-gray-500 hover:text-accent transition-all duration-300 relative group">
                <div class="nav-indicator"></div>
                <div class="nav-icon w-12 h-12 rounded-2xl bg-transparent flex items-center justify-center transition-all duration-300 group-hover:bg-accent/10">
                    <i class="fas fa-user text-lg transition-all duration-300"></i>
                </div>
                <span class="text-xs font-semibold transition-all duration-300">Profile</span>
            </a>
        </div>
    </nav>

    <script src="../util/dashboard.js"></script>
    <script>
        // Premium mobile interactions with enhanced animations
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced tab functionality with smooth transitions
            const tabButtons = document.querySelectorAll('.tab-button');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons with animation
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active', 'bg-accent', 'text-white');
                        btn.classList.add('bg-white', 'text-gray-600');
                        btn.style.transform = 'scale(1)';
                    });

                    // Add active class to clicked button with bounce animation
                    this.classList.add('active', 'bg-accent', 'text-white');
                    this.classList.remove('bg-white', 'text-gray-600');
                    this.style.transform = 'scale(1.05)';

                    // Add bounce animation
                    this.classList.add('animate-bounce-gentle');
                    setTimeout(() => {
                        this.classList.remove('animate-bounce-gentle');
                        this.style.transform = 'scale(1)';
                    }, 600);
                });
            });

            // Enhanced favorite button functionality
            const favoriteButtons = document.querySelectorAll('.favorite-btn');

            favoriteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const icon = this.querySelector('i');

                    // Add scale animation
                    this.style.transform = 'scale(1.2)';

                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas', 'text-red-500');

                        // Add heart beat animation
                        icon.style.animation = 'bounce-gentle 0.6s ease-in-out';
                    } else {
                        icon.classList.remove('fas', 'text-red-500');
                        icon.classList.add('far');
                        icon.style.animation = '';
                    }

                    // Reset scale
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 200);
                });
            });

            // Enhanced bottom navigation with premium interactions
            const navItems = document.querySelectorAll('.nav-item');

            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    // Don't prevent default to allow navigation

                    // Remove active class from all nav items
                    navItems.forEach(nav => {
                        nav.classList.remove('nav-item-active');
                    });

                    // Add active class to clicked item
                    this.classList.add('nav-item-active');

                    // Add ripple effect
                    const ripple = document.createElement('div');
                    ripple.style.position = 'absolute';
                    ripple.style.borderRadius = '50%';
                    ripple.style.background = 'rgba(249, 115, 22, 0.3)';
                    ripple.style.transform = 'scale(0)';
                    ripple.style.animation = 'ripple 0.6s linear';
                    ripple.style.left = '50%';
                    ripple.style.top = '50%';
                    ripple.style.width = '60px';
                    ripple.style.height = '60px';
                    ripple.style.marginLeft = '-30px';
                    ripple.style.marginTop = '-30px';

                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });

                // Add hover effects for desktop
                item.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('nav-item-active')) {
                        const icon = this.querySelector('.nav-icon');
                        icon.style.transform = 'translateY(-2px) scale(1.05)';
                    }
                });

                item.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('nav-item-active')) {
                        const icon = this.querySelector('.nav-icon');
                        icon.style.transform = 'translateY(0) scale(1)';
                    }
                });
            });

            // Enhanced search functionality with animations
            const searchInput = document.getElementById('search-input');

            searchInput.addEventListener('focus', function() {
                this.parentElement.parentElement.style.transform = 'scale(1.02)';
            });

            searchInput.addEventListener('blur', function() {
                this.parentElement.parentElement.style.transform = 'scale(1)';
            });

            // Stagger animation for product cards
            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Add CSS for ripple animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(2);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>

</html>