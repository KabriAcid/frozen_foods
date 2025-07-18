<?php
// Mock user data - replace with your actual user data source
$user = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'phone' => '+234 801 234 5678',
    'avatar' => 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=150',
    'member_since' => '2023-01-15',
    'total_orders' => 24,
    'total_spent' => 125000,
    'loyalty_points' => 1250
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
                    },
                    animation: {
                        'bounce-gentle': 'bounce-gentle 0.6s ease-in-out',
                        'scale-in': 'scale-in 0.2s ease-out',
                        'slide-up': 'slide-up 0.3s ease-out',
                        'fade-in': 'fade-in 0.4s ease-out',
                        'slide-down': 'slide-down 0.3s ease-out',
                        'modal-in': 'modal-in 0.3s ease-out',
                        'modal-out': 'modal-out 0.3s ease-in'
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
                        'slide-down': {
                            '0%': {
                                transform: 'translateY(-20px)',
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
                        },
                        'modal-in': {
                            '0%': {
                                transform: 'scale(0.9) translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1) translateY(0)',
                                opacity: '1'
                            }
                        },
                        'modal-out': {
                            '0%': {
                                transform: 'scale(1) translateY(0)',
                                opacity: '1'
                            },
                            '100%': {
                                transform: 'scale(0.9) translateY(20px)',
                                opacity: '0'
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

        .profile-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .profile-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .profile-card:active {
            transform: translateY(0) scale(0.98);
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

        /* Floating action effect */
        .floating-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
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

        /* Modal styles */
        .modal-overlay {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
        }

        /* Profile avatar */
        .profile-avatar {
            background: linear-gradient(135deg, #F97316, #ff7272);
            padding: 4px;
        }

        /* Menu item hover effects */
        .menu-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(249, 115, 22, 0.1), transparent);
            transition: left 0.5s;
        }

        .menu-item:hover::before {
            left: 100%;
        }

        .menu-item:hover {
            transform: translateX(4px);
            background: rgba(249, 115, 22, 0.05);
        }

        /* Stats card animations */
        .stats-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stats-card:hover {
            transform: translateY(-4px) scale(1.02);
        }

        /* Switch toggle */
        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #F97316;
        }

        input:checked+.slider:before {
            transform: translateX(24px);
        }
    </style>
</head>

<body class="bg-gray font-dm pb-24 overflow-x-hidden">
    <!-- Main Content -->
    <main class="px-4 pt-6 space-y-6 animate-fade-in">
        <!-- Profile Header -->
        <div class="gradient-bg rounded-3xl p-6 text-white floating-card animate-slide-up">
            <div class="flex items-center space-x-4">
                <div class="profile-avatar rounded-full">
                    <img src="<?php echo $user['avatar']; ?>" alt="Profile" class="w-20 h-20 rounded-full object-cover">
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold mb-1"><?php echo $user['name']; ?></h2>
                    <p class="text-orange-100 text-sm mb-2"><?php echo $user['email']; ?></p>
                    <div class="flex items-center text-orange-100 text-xs">
                        <i class="fas fa-calendar mr-1"></i>
                        <span>Member since <?php echo date('M Y', strtotime($user['member_since'])); ?></span>
                    </div>
                </div>
                <button onclick="openEditProfileModal()" class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-2xl border border-white/30 flex items-center justify-center hover:bg-white/30 transition-colors">
                    <i class="fas fa-edit text-white text-sm"></i>
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-3 gap-3 animate-slide-up" style="animation-delay: 0.1s;">
            <div class="stats-card bg-white rounded-2xl p-4 floating-card text-center">
                <div class="w-10 h-10 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-shopping-bag text-blue-600 text-lg"></i>
                </div>
                <p class="text-2xl font-bold text-dark"><?php echo $user['total_orders']; ?></p>
                <p class="text-gray-500 text-xs">Orders</p>
            </div>
            <div class="stats-card bg-white rounded-2xl p-4 floating-card text-center">
                <div class="w-10 h-10 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-naira-sign text-green-600 text-lg"></i>
                </div>
                <p class="text-2xl font-bold text-dark">₦<?php echo number_format($user['total_spent'] / 1000); ?>k</p>
                <p class="text-gray-500 text-xs">Spent</p>
            </div>
            <div class="stats-card bg-white rounded-2xl p-4 floating-card text-center">
                <div class="w-10 h-10 bg-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-star text-accent text-lg"></i>
                </div>
                <p class="text-2xl font-bold text-dark"><?php echo number_format($user['loyalty_points']); ?></p>
                <p class="text-gray-500 text-xs">Points</p>
            </div>
        </div>

        <!-- Account Section -->
        <div class="animate-slide-up" style="animation-delay: 0.2s;">
            <h3 class="text-lg font-bold text-dark mb-4 px-2">Account</h3>
            <div class="bg-white rounded-3xl overflow-hidden floating-card">
                <button onclick="openEditProfileModal()" class="menu-item w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-user text-blue-600 text-lg"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-dark">Edit Profile</p>
                            <p class="text-gray-500 text-sm">Update your personal information</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </button>

                <div class="border-t border-gray-100"></div>

                <button onclick="openAddressModal()" class="menu-item w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-green-600 text-lg"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-dark">Delivery Address</p>
                            <p class="text-gray-500 text-sm">Manage your delivery locations</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </button>

                <div class="border-t border-gray-100"></div>

                <button onclick="openPaymentModal()" class="menu-item w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-credit-card text-purple-600 text-lg"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-dark">Payment Methods</p>
                            <p class="text-gray-500 text-sm">Manage your payment options</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </button>
            </div>
        </div>

        <!-- Preferences Section -->
        <div class="animate-slide-up" style="animation-delay: 0.3s;">
            <h3 class="text-lg font-bold text-dark mb-4 px-2">Preferences</h3>
            <div class="bg-white rounded-3xl overflow-hidden floating-card">
                <div class="menu-item flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-yellow-100 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-bell text-yellow-600 text-lg"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-dark">Push Notifications</p>
                            <p class="text-gray-500 text-sm">Get notified about orders</p>
                        </div>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="border-t border-gray-100"></div>

                <div class="menu-item flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-indigo-100 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-indigo-600 text-lg"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-dark">Email Updates</p>
                            <p class="text-gray-500 text-sm">Receive promotional emails</p>
                        </div>
                    </div>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="border-t border-gray-100"></div>

                <button onclick="openLanguageModal()" class="menu-item w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-teal-100 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-globe text-teal-600 text-lg"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-dark">Language</p>
                            <p class="text-gray-500 text-sm">English (US)</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </button>
            </div>
        </div>

        <!-- Support Section -->
        <div class="animate-slide-up" style="animation-delay: 0.4s;">
            <h3 class="text-lg font-bold text-dark mb-4 px-2">Support</h3>
            <div class="bg-white rounded-3xl overflow-hidden floating-card">
                <button onclick="openHelpModal()" class="menu-item w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-question-circle text-orange-600 text-lg"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-dark">Help Center</p>
                            <p class="text-gray-500 text-sm">Get help and support</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </button>

                <div class="border-t border-gray-100"></div>

                <button onclick="openContactModal()" class="menu-item w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-pink-100 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-headset text-pink-600 text-lg"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-dark">Contact Us</p>
                            <p class="text-gray-500 text-sm">Reach out to our team</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </button>

                <div class="border-t border-gray-100"></div>

                <button onclick="openAboutModal()" class="menu-item w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-100 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-info-circle text-gray-600 text-lg"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-dark">About</p>
                            <p class="text-gray-500 text-sm">App version 1.0.0</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </button>
            </div>
        </div>

        <!-- Sign Out Button -->
        <div class="animate-slide-up" style="animation-delay: 0.5s;">
            <button onclick="openSignOutModal()" class="w-full bg-red-50 border border-red-200 text-red-600 py-4 rounded-2xl font-semibold hover:bg-red-100 transition-colors">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Sign Out
            </button>
        </div>
    </main>

    <!-- Premium Mobile Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 right-0 glass-effect border-t border-gray-200/50 safe-area-bottom z-50 animate-slide-up" style="animation-delay: 0.6s;">
        <div class="grid grid-cols-4 h-20 px-2">
            <!-- Dashboard -->
            <a href="index.php" class="nav-item flex flex-col items-center justify-center space-y-1 text-gray-500 hover:text-accent transition-all duration-300 relative group">
                <div class="nav-indicator"></div>
                <div class="nav-icon w-12 h-12 rounded-2xl bg-transparent flex items-center justify-center transition-all duration-300 group-hover:bg-accent/10">
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
            <a href="profile.php" class="nav-item nav-item-active flex flex-col items-center justify-center space-y-1 relative group">
                <div class="nav-indicator"></div>
                <div class="nav-icon w-12 h-12 rounded-2xl bg-accent/10 flex items-center justify-center transition-all duration-300 group-hover:bg-accent/20">
                    <i class="fas fa-user text-lg transition-all duration-300"></i>
                </div>
                <span class="text-xs font-semibold transition-all duration-300">Profile</span>
            </a>
        </div>
    </nav>

    <!-- Modals -->

    <!-- Sign Out Modal -->
    <div id="signOutModal" class="fixed inset-0 modal-overlay z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content bg-white rounded-3xl p-6 w-full max-w-sm animate-modal-in">
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-sign-out-alt text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-2">Sign Out</h3>
                    <p class="text-gray-600 mb-6">Are you sure you want to sign out of your account?</p>
                    <div class="flex space-x-3">
                        <button onclick="closeModal('signOutModal')" class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-2xl font-semibold hover:bg-gray-200 transition-colors">
                            Cancel
                        </button>
                        <button onclick="signOut()" class="flex-1 bg-red-500 text-white py-3 rounded-2xl font-semibold hover:bg-red-600 transition-colors">
                            Sign Out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="editProfileModal" class="fixed inset-0 modal-overlay z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content bg-white rounded-3xl p-6 w-full max-w-md animate-modal-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-dark">Edit Profile</h3>
                    <button onclick="closeModal('editProfileModal')" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
                        <i class="fas fa-times text-gray-600 text-sm"></i>
                    </button>
                </div>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-dark mb-2">Full Name</label>
                        <input type="text" value="<?php echo $user['name']; ?>" class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:ring-2 focus:ring-accent focus:border-accent transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-dark mb-2">Email</label>
                        <input type="email" value="<?php echo $user['email']; ?>" class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:ring-2 focus:ring-accent focus:border-accent transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-dark mb-2">Phone</label>
                        <input type="tel" value="<?php echo $user['phone']; ?>" class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:ring-2 focus:ring-accent focus:border-accent transition-colors">
                    </div>
                    <div class="flex space-x-3 pt-4">
                        <button type="button" onclick="closeModal('editProfileModal')" class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-2xl font-semibold hover:bg-gray-200 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="flex-1 bg-accent text-white py-3 rounded-2xl font-semibold hover:bg-orange-600 transition-colors">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Address Modal -->
    <div id="addressModal" class="fixed inset-0 modal-overlay z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content bg-white rounded-3xl p-6 w-full max-w-md animate-modal-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-dark">Delivery Address</h3>
                    <button onclick="closeModal('addressModal')" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
                        <i class="fas fa-times text-gray-600 text-sm"></i>
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-semibold text-dark">Home</h4>
                            <span class="bg-accent text-white text-xs px-2 py-1 rounded-full">Default</span>
                        </div>
                        <p class="text-gray-600 text-sm">123 Main Street, Lagos, Nigeria</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-semibold text-dark">Office</h4>
                            <button class="text-accent text-sm font-semibold">Edit</button>
                        </div>
                        <p class="text-gray-600 text-sm">456 Business Ave, Victoria Island, Lagos</p>
                    </div>
                    <button class="w-full bg-accent text-white py-3 rounded-2xl font-semibold hover:bg-orange-600 transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Add New Address
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" class="fixed inset-0 modal-overlay z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content bg-white rounded-3xl p-6 w-full max-w-md animate-modal-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-dark">Payment Methods</h3>
                    <button onclick="closeModal('paymentModal')" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
                        <i class="fas fa-times text-gray-600 text-sm"></i>
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <i class="fab fa-cc-visa text-blue-600 text-2xl mr-3"></i>
                                <div>
                                    <h4 class="font-semibold text-dark">**** 1234</h4>
                                    <p class="text-gray-600 text-sm">Expires 12/25</p>
                                </div>
                            </div>
                            <span class="bg-accent text-white text-xs px-2 py-1 rounded-full">Default</span>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <i class="fab fa-cc-mastercard text-red-600 text-2xl mr-3"></i>
                                <div>
                                    <h4 class="font-semibold text-dark">**** 5678</h4>
                                    <p class="text-gray-600 text-sm">Expires 08/26</p>
                                </div>
                            </div>
                            <button class="text-accent text-sm font-semibold">Edit</button>
                        </div>
                    </div>
                    <button class="w-full bg-accent text-white py-3 rounded-2xl font-semibold hover:bg-orange-600 transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Add New Card
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Language Modal -->
    <div id="languageModal" class="fixed inset-0 modal-overlay z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content bg-white rounded-3xl p-6 w-full max-w-sm animate-modal-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-dark">Select Language</h3>
                    <button onclick="closeModal('languageModal')" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
                        <i class="fas fa-times text-gray-600 text-sm"></i>
                    </button>
                </div>
                <div class="space-y-2">
                    <button class="w-full flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors">
                        <span class="font-semibold text-dark">English (US)</span>
                        <i class="fas fa-check text-accent"></i>
                    </button>
                    <button class="w-full flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors">
                        <span class="text-gray-600">Yoruba</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors">
                        <span class="text-gray-600">Hausa</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors">
                        <span class="text-gray-600">Igbo</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Help Modal -->
    <div id="helpModal" class="fixed inset-0 modal-overlay z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content bg-white rounded-3xl p-6 w-full max-w-md animate-modal-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-dark">Help Center</h3>
                    <button onclick="closeModal('helpModal')" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
                        <i class="fas fa-times text-gray-600 text-sm"></i>
                    </button>
                </div>
                <div class="space-y-3">
                    <button class="w-full flex items-center p-3 rounded-2xl hover:bg-gray-50 transition-colors text-left">
                        <i class="fas fa-question-circle text-blue-600 text-lg mr-3"></i>
                        <span class="text-dark">Frequently Asked Questions</span>
                    </button>
                    <button class="w-full flex items-center p-3 rounded-2xl hover:bg-gray-50 transition-colors text-left">
                        <i class="fas fa-book text-green-600 text-lg mr-3"></i>
                        <span class="text-dark">User Guide</span>
                    </button>
                    <button class="w-full flex items-center p-3 rounded-2xl hover:bg-gray-50 transition-colors text-left">
                        <i class="fas fa-video text-purple-600 text-lg mr-3"></i>
                        <span class="text-dark">Video Tutorials</span>
                    </button>
                    <button class="w-full flex items-center p-3 rounded-2xl hover:bg-gray-50 transition-colors text-left">
                        <i class="fas fa-bug text-red-600 text-lg mr-3"></i>
                        <span class="text-dark">Report a Problem</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Modal -->
    <div id="contactModal" class="fixed inset-0 modal-overlay z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content bg-white rounded-3xl p-6 w-full max-w-md animate-modal-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-dark">Contact Us</h3>
                    <button onclick="closeModal('contactModal')" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
                        <i class="fas fa-times text-gray-600 text-sm"></i>
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-phone text-green-600 text-lg mr-3"></i>
                            <span class="font-semibold text-dark">Phone</span>
                        </div>
                        <p class="text-gray-600">+234 800 123 4567</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-envelope text-blue-600 text-lg mr-3"></i>
                            <span class="font-semibold text-dark">Email</span>
                        </div>
                        <p class="text-gray-600">support@frozenfoods.com</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-4">
                        <div class="flex items-center mb-2">
                            <i class="fab fa-whatsapp text-green-600 text-lg mr-3"></i>
                            <span class="font-semibold text-dark">WhatsApp</span>
                        </div>
                        <p class="text-gray-600">+234 800 123 4567</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Modal -->
    <div id="aboutModal" class="fixed inset-0 modal-overlay z-50 hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="modal-content bg-white rounded-3xl p-6 w-full max-w-md animate-modal-in">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-dark">About</h3>
                    <button onclick="closeModal('aboutModal')" class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
                        <i class="fas fa-times text-gray-600 text-sm"></i>
                    </button>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-accent to-secondary rounded-3xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-snowflake text-white text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-dark mb-2">Frozen Foods</h4>
                    <p class="text-gray-600 mb-4">Version 1.0.0</p>
                    <p class="text-gray-600 text-sm mb-6">Your trusted partner for fresh frozen foods delivered right to your doorstep.</p>
                    <div class="space-y-2 text-sm text-gray-500">
                        <p>© 2024 Frozen Foods Ltd.</p>
                        <p>All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Add animation
            setTimeout(() => {
                const content = modal.querySelector('.modal-content');
                content.classList.add('animate-modal-in');
            }, 10);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            const content = modal.querySelector('.modal-content');

            content.classList.remove('animate-modal-in');
            content.classList.add('animate-modal-out');

            setTimeout(() => {
                modal.classList.add('hidden');
                content.classList.remove('animate-modal-out');
                document.body.style.overflow = '';
            }, 300);
        }

        // Specific modal functions
        function openSignOutModal() {
            openModal('signOutModal');
        }

        function openEditProfileModal() {
            openModal('editProfileModal');
        }

        function openAddressModal() {
            openModal('addressModal');
        }

        function openPaymentModal() {
            openModal('paymentModal');
        }

        function openLanguageModal() {
            openModal('languageModal');
        }

        function openHelpModal() {
            openModal('helpModal');
        }

        function openContactModal() {
            openModal('contactModal');
        }

        function openAboutModal() {
            openModal('aboutModal');
        }

        // Sign out functionality
        function signOut() {
            // Add loading state
            const signOutBtn = document.querySelector('#signOutModal button:last-child');
            const originalText = signOutBtn.innerHTML;
            signOutBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Signing out...';
            signOutBtn.disabled = true;

            // Simulate sign out process
            setTimeout(() => {
                // Redirect to login page or handle sign out
                window.location.href = 'logout.php';
            }, 2000);
        }

        // Close modals when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal-overlay')) {
                const modalId = e.target.id;
                closeModal(modalId);
            }
        });

        // Enhanced bottom navigation with premium interactions
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');

            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
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

            // Stagger animation for menu items
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach((item, index) => {
                item.style.animationDelay = `${index * 0.05}s`;
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

        // Form submission handling
        document.querySelector('#editProfileModal form').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
            submitBtn.disabled = true;

            // Simulate form submission
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                closeModal('editProfileModal');

                // Show success message
                showToast('Profile updated successfully!', 'success');
            }, 2000);
        });

        // Toast notification function
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `fixed top-20 left-4 right-4 ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-white px-6 py-4 rounded-2xl shadow-lg transform -translate-y-full opacity-0 transition-all duration-300 z-50`;
            toast.innerHTML = `
                <div class="flex items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} text-xl mr-3"></i>
                    <span class="font-semibold">${message}</span>
                </div>
            `;

            document.body.appendChild(toast);

            // Show toast
            setTimeout(() => {
                toast.style.transform = 'translateY(0)';
                toast.style.opacity = '1';
            }, 100);

            // Hide after 3 seconds
            setTimeout(() => {
                toast.style.transform = 'translateY(-100%)';
                toast.style.opacity = '0';
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
    </script>
</body>

</html>