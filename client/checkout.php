<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Checkout - Wrap & Roll</title>
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
                        gray: '#f6f7fc',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px rgba(0, 0, 0, 0.08)',
                        'medium': '0 4px 25px rgba(0, 0, 0, 0.1)',
                        'large': '0 8px 35px rgba(0, 0, 0, 0.12)',
                        'accent': '0 4px 20px rgba(249, 115, 22, 0.15)',
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
            background: rgba(249, 115, 22, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(249, 115, 22, 0.15);
        }

        .blob-bg {
            background: radial-gradient(circle at 20% 50%, rgba(249, 115, 22, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(249, 115, 22, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(249, 115, 22, 0.1) 0%, transparent 50%);
        }

        .step-active {
            background: #22c55e;
            color: white;
        }

        .step-completed {
            background: #22c55e;
            color: white;
        }

        .step-inactive {
            background: #f8fafc;
            color: #cbd5e1;
            border: 2px solid #f1f5f9;
        }

        .form-input {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .form-input:focus {
            transform: translateY(-1px);
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1), 0 4px 20px rgba(249, 115, 22, 0.08);
            border-color: #F97316;
        }

        .payment-method {
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid #f1f5f9;
        }

        .payment-method:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border-color: #e2e8f0;
        }

        .payment-method.selected {
            border-color: #F97316;
            background: rgba(249, 115, 22, 0.05);
            box-shadow: 0 4px 20px rgba(249, 115, 22, 0.15);
        }

        .loading-spinner {
            border: 2px solid #f3f4f6;
            border-top: 2px solid #F97316;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="font-dm bg-gray min-h-screen blob-bg">
    <!-- Background Blobs -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-accent opacity-20 rounded-full filter blur-3xl"></div>
        <div class="absolute top-1/2 -left-32 w-64 h-64 bg-secondary opacity-15 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-20 right-1/4 w-48 h-48 bg-accent opacity-10 rounded-full filter blur-2xl"></div>
    </div>

    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <div class="relative z-10 container mx-auto px-4 py-8 max-w-7xl">
        <!-- Header -->
        <header class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">W</span>
                    </div>
                    <h1 class="text-xl font-bold text-dark">wrap & roll</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <i class="far fa-heart text-gray-600 text-xl"></i>
                    <div class="relative">
                        <i class="fas fa-shopping-bag text-gray-600 text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">2</span>
                    </div>
                    <i class="far fa-user text-gray-600 text-xl"></i>
                </div>
            </div>

            <!-- Progress Steps -->
            <div class="flex items-center justify-center space-x-4 mb-8">
                <div class="flex items-center space-x-4">
                    <div id="step-1" class="step-active w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-300">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="w-16 h-1 bg-gray-300 rounded-full">
                        <div id="progress-1" class="h-1 bg-green-500 rounded-full transition-all duration-500" style="width: 100%;"></div>
                    </div>
                    <div id="step-2" class="step-inactive w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-300">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="w-16 h-1 bg-gray-300 rounded-full">
                        <div id="progress-2" class="h-1 bg-green-500 rounded-full transition-all duration-500" style="width: 0%;"></div>
                    </div>
                    <div id="step-3" class="step-inactive w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-300">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Step 1: Checkout -->
                <div id="checkout-step" class="animate-fade-in">
                    <h2 class="text-2xl font-bold text-dark mb-6">Checkout</h2>
                    <form id="checkout-form" class="space-y-6">
                        <!-- Personal Information -->
                        <div class="bg-white rounded-2xl p-6 shadow-soft border border-slate-200">
                            <h3 class="text-lg font-semibold text-dark mb-4">Personal information:</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                    <input type="text" id="firstName" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" placeholder="e.g Ademu" required>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter your first name</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text" id="lastName" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" placeholder="e.g Rabiu" required>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter your last name</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <div class="relative">
                                        <input type="tel" id="phone" class="form-input w-full px-4 py-3 pl-16 rounded-xl focus:outline-none" placeholder="70-3949-5494" required>
                                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 flex items-center">
                                            <span class="text-red-500 text-lg mr-1">
                                                <!-- nigerian flag image -->
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Flag_of_Nigeria.svg/32px-Flag_of_Nigeria.svg.png" alt="Nigeria Flag" class="w-6 h-6 rounded-full">
                                            </span>
                                        </div>
                                    </div>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter a valid phone number</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" id="email" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" placeholder="e.g adamurabiu@gmail.com" required>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter a valid email address</span>
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Details -->
                        <div class="bg-white rounded-2xl p-6 shadow-soft border border-slate-200">
                            <h3 class="text-lg font-semibold text-dark mb-4">Delivery details:</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                    <select id="city" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                                        <option value="">Select City</option>
                                        <option value="abuja" selected>Abuja</option>
                                        <option value="kaduna">Kaduna</option>
                                        <option value="lagos">Lagos</option>
                                    </select>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please select a city</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                    <input type="text" id="address" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" placeholder="e.g 34 Main St" required>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter your address</span>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Postal Code</label>
                                    <input type="text" id="postalCode" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" placeholder="e.g 223466" required>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter a valid postal code</span>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="flex justify-end mt-6">
                        <button id="continue-btn" class="bg-accent hover:bg-orange-600 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-accent hover:shadow-large flex items-center space-x-2">
                            <span id="continue-text">Continue</span>
                            <div id="continue-spinner" class="loading-spinner hidden"></div>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Payment -->
                <div id="payment-step" class="hidden">
                    <h2 class="text-2xl font-bold text-dark mb-6">Payment</h2>

                    <!-- Payment Methods -->
                    <div class="bg-white rounded-2xl p-6 shadow-soft border border-slate-200 mb-6">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                            <div class="payment-method rounded-xl p-4 text-center selected" data-method="mastercard">
                                <div class="w-12 h-8 mx-auto mb-2 bg-gradient-to-r from-red-500 to-yellow-500 rounded flex items-center justify-center">
                                    <span class="text-white font-bold text-xs">MC</span>
                                </div>
                                <span class="text-sm text-gray-600">Mastercard</span>
                            </div>
                            <div class="payment-method rounded-xl p-4 text-center" data-method="visa">
                                <div class="w-12 h-8 mx-auto mb-2 bg-blue-600 rounded flex items-center justify-center">
                                    <span class="text-white font-bold text-xs">VISA</span>
                                </div>
                                <span class="text-sm text-gray-600">Visa</span>
                            </div>
                            <div class="payment-method rounded-xl p-4 text-center" data-method="paypal">
                                <div class="w-12 h-8 mx-auto mb-2 bg-blue-500 rounded flex items-center justify-center">
                                    <span class="text-white font-bold text-xs">PP</span>
                                </div>
                                <span class="text-sm text-gray-600">PayPal</span>
                            </div>
                            <div class="payment-method rounded-xl p-4 text-center" data-method="applepay">
                                <div class="w-12 h-8 mx-auto mb-2 bg-black rounded flex items-center justify-center">
                                    <i class="fab fa-apple text-white"></i>
                                </div>
                                <span class="text-sm text-gray-600">Apple Pay</span>
                            </div>
                        </div>

                        <form id="payment-form" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Name on Card</label>
                                    <input type="text" id="cardName" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" placeholder="Anna Montgomery" required>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter the name on card</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Card Number</label>
                                    <input type="text" id="cardNumber" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" placeholder="1234 - 5678 - 9012 - 3456" maxlength="19" required>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter a valid card number</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Expiration Date</label>
                                    <input type="text" id="cardExpiry" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" placeholder="06/25" maxlength="5" required>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter expiration date</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">CVC Code</label>
                                    <input type="text" id="cardCVC" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" placeholder="123" maxlength="4" required>
                                    <span class="error-message text-red-500 text-sm mt-1 hidden">Please enter CVC code</span>
                                    <p class="text-xs text-gray-500 mt-1">
                                        <i class="fas fa-info-circle mr-1"></i>3 digit code on the back of your card 3
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center mt-4">
                                <input type="checkbox" id="billingAddress" class="w-5 h-5 text-accent border-slate-300 rounded focus:ring-accent" checked>
                                <label for="billingAddress" class="ml-3 text-sm text-gray-700">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    Billing address is the same as shipping address.
                                </label>
                            </div>
                        </form>
                    </div>

                    <div class="flex justify-between mt-6">
                        <button id="back-btn" class="border border-slate-300 text-gray-700 font-semibold px-8 py-3 rounded-xl transition-all duration-300 hover:bg-slate-50 shadow-soft hover:shadow-medium">
                            Back
                        </button>
                        <button id="purchase-btn" class="bg-accent hover:bg-orange-600 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-accent hover:shadow-large flex items-center space-x-2">
                            <span id="purchase-text">Purchase</span>
                            <div id="purchase-spinner" class="loading-spinner hidden"></div>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Success -->
                <div id="success-step" class="hidden text-center">
                    <div class="animate-scale-in">
                        <!-- Success Vector Illustration -->
                        <div class="w-80 h-80 mx-auto mb-8 relative">
                            <svg viewBox="0 0 400 400" class="w-full h-full animate-float">
                                <!-- Background Circle -->
                                <circle cx="200" cy="200" r="180" fill="#f0fdf4" stroke="#bbf7d0" stroke-width="2" />

                                <!-- Delivery Person -->
                                <g transform="translate(150, 120)">
                                    <!-- Head -->
                                    <circle cx="50" cy="40" r="25" fill="#fbbf24" />
                                    <!-- Hair -->
                                    <path d="M25 35 Q50 15 75 35 Q70 25 50 25 Q30 25 25 35" fill="#92400e" />
                                    <!-- Face -->
                                    <circle cx="45" cy="38" r="2" fill="#1f2937" />
                                    <circle cx="55" cy="38" r="2" fill="#1f2937" />
                                    <path d="M45 45 Q50 50 55 45" stroke="#1f2937" stroke-width="2" fill="none" />

                                    <!-- Body -->
                                    <rect x="35" y="65" width="30" height="40" rx="15" fill="#F97316" />
                                    <!-- Arms -->
                                    <rect x="20" y="75" width="15" height="25" rx="7" fill="#fbbf24" />
                                    <rect x="65" y="75" width="15" height="25" rx="7" fill="#fbbf24" />

                                    <!-- Legs -->
                                    <rect x="40" y="105" width="8" height="30" rx="4" fill="#1e40af" />
                                    <rect x="52" y="105" width="8" height="30" rx="4" fill="#1e40af" />

                                    <!-- Delivery Bag -->
                                    <rect x="10" y="85" width="20" height="15" rx="3" fill="#22c55e" />
                                    <rect x="12" y="87" width="16" height="11" rx="2" fill="#16a34a" />
                                    <text x="20" y="95" text-anchor="middle" fill="white" font-size="8" font-weight="bold">W&R</text>
                                </g>

                                <!-- Floating Elements -->
                                <g class="animate-wiggle">
                                    <circle cx="100" cy="100" r="8" fill="#fbbf24" opacity="0.6" />
                                    <circle cx="320" cy="120" r="6" fill="#F97316" opacity="0.5" />
                                    <circle cx="80" cy="300" r="10" fill="#22c55e" opacity="0.4" />
                                    <circle cx="330" cy="280" r="7" fill="#fbbf24" opacity="0.6" />
                                </g>

                                <!-- Success Checkmark -->
                                <g transform="translate(280, 80)">
                                    <circle cx="30" cy="30" r="25" fill="#22c55e" />
                                    <path d="M20 30 L27 37 L40 23" stroke="white" stroke-width="3" fill="none" stroke-linecap="round" />
                                </g>

                                <!-- Motion Lines -->
                                <g opacity="0.3">
                                    <path d="M50 200 Q100 190 150 200" stroke="#F97316" stroke-width="2" fill="none" />
                                    <path d="M60 220 Q110 210 160 220" stroke="#22c55e" stroke-width="2" fill="none" />
                                    <path d="M70 240 Q120 230 170 240" stroke="#fbbf24" stroke-width="2" fill="none" />
                                </g>
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-3xl font-bold text-dark mb-4">Thank! Your order is on the way.</h2>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        We've received your order and will send you updates via email and SMS as it's prepared and shipped.
                    </p>

                    <button id="track-btn" class="bg-accent hover:bg-orange-600 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-accent hover:shadow-large">
                        Track Your Order
                    </button>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="frosted-glass rounded-2xl p-6 sticky top-8 shadow-medium">
                    <h3 class="text-lg font-semibold text-dark mb-6">Order Summary</h3>

                    <div class="space-y-4 mb-6">
                        <div class="flex items-center space-x-4 p-3 bg-white bg-opacity-50 rounded-xl shadow-soft">
                            <img src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=80&h=80&dpr=2" alt="Buffalo Chicken Wrap" class="w-16 h-16 rounded-lg object-cover">
                            <div class="flex-1">
                                <h4 class="font-semibold text-dark">Buffalo Chicken Wrap</h4>
                                <div class="flex items-center justify-between mt-2">
                                    <div class="flex items-center space-x-2">
                                        <button class="w-6 h-6 rounded-full border border-slate-300 flex items-center justify-center text-gray-500 hover:bg-slate-100 transition-colors">-</button>
                                        <span class="font-medium">1</span>
                                        <button class="w-6 h-6 rounded-full border border-slate-300 flex items-center justify-center text-gray-500 hover:bg-slate-100 transition-colors">+</button>
                                    </div>
                                    <span class="font-semibold text-dark">$36.99</span>
                                </div>
                            </div>
                            <button class="text-secondary hover:text-red-600 transition-colors">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>

                        <div class="flex items-center space-x-4 p-3 bg-white bg-opacity-50 rounded-xl shadow-soft">
                            <img src="https://images.pexels.com/photos/1030945/pexels-photo-1030945.jpeg?auto=compress&cs=tinysrgb&w=80&h=80&dpr=2" alt="Green Smoothie" class="w-16 h-16 rounded-lg object-cover">
                            <div class="flex-1">
                                <h4 class="font-semibold text-dark">Green Smoothie</h4>
                                <div class="flex items-center justify-between mt-2">
                                    <div class="flex items-center space-x-2">
                                        <button class="w-6 h-6 rounded-full border border-slate-300 flex items-center justify-center text-gray-500 hover:bg-slate-100 transition-colors">-</button>
                                        <span class="font-medium">1</span>
                                        <button class="w-6 h-6 rounded-full border border-slate-300 flex items-center justify-center text-gray-500 hover:bg-slate-100 transition-colors">+</button>
                                    </div>
                                    <span class="font-semibold text-dark">$18.99</span>
                                </div>
                            </div>
                            <button class="text-secondary hover:text-red-600 transition-colors">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>

                    <div class="border-t border-slate-200 pt-4 space-y-2">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal:</span>
                            <span>$55.98</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Delivery:</span>
                            <span>$8.20</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Tax:</span>
                            <span>$10.0</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold text-dark pt-2 border-t border-slate-200">
                            <span>Total:</span>
                            <span>$74.18</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mock API endpoints for demonstration
        const API_BASE = 'https://jsonplaceholder.typicode.com'; // Using JSONPlaceholder for demo

        // Store checkout data
        let checkoutData = {};
        let paymentData = {};

        // AJAX helper function
        async function makeRequest(url, method = 'GET', data = null) {
            try {
                const options = {
                    method,
                    headers: {
                        'Content-Type': 'application/json',
                    },
                };

                if (data) {
                    options.body = JSON.stringify(data);
                }

                const response = await fetch(url, options);

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                return await response.json();
            } catch (error) {
                console.error('API request failed:', error);
                throw error;
            }
        }

        // Save checkout data to database
        async function saveCheckoutData(data) {
            try {
                // Simulate API call to save checkout data
                const response = await makeRequest(`${API_BASE}/posts`, 'POST', {
                    title: 'Checkout Data',
                    body: JSON.stringify(data),
                    userId: 1
                });

                checkoutData = {
                    ...data,
                    id: response.id
                };
                return response;
            } catch (error) {
                throw new Error('Failed to save checkout data');
            }
        }

        // Process payment
        async function processPayment(data) {
            try {
                // Simulate payment processing
                const response = await makeRequest(`${API_BASE}/posts`, 'POST', {
                    title: 'Payment Data',
                    body: JSON.stringify(data),
                    userId: 1
                });

                paymentData = {
                    ...data,
                    id: response.id
                };
                return response;
            } catch (error) {
                throw new Error('Payment processing failed');
            }
        }


        // Step management
        let currentStep = 1;
        const totalSteps = 3;

        function updateStepIndicators(step) {
            for (let i = 1; i <= totalSteps; i++) {
                const stepEl = document.getElementById(`step-${i}`);
                const progressEl = document.getElementById(`progress-${i}`);

                if (i < step) {
                    stepEl.className = 'step-completed w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-300';
                    if (progressEl) progressEl.style.width = '100%';
                } else if (i === step) {
                    stepEl.className = 'step-active w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-300';
                    if (progressEl) progressEl.style.width = '0%';
                } else {
                    stepEl.className = 'step-inactive w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-300';
                    if (progressEl) progressEl.style.width = '0%';
                }
            }
        }

        function showStep(step) {
            // Hide all steps
            document.getElementById('checkout-step').classList.add('hidden');
            document.getElementById('payment-step').classList.add('hidden');
            document.getElementById('success-step').classList.add('hidden');

            // Show current step with animation
            setTimeout(() => {
                if (step === 1) {
                    document.getElementById('checkout-step').classList.remove('hidden');
                    document.getElementById('checkout-step').classList.add('animate-slide-right');
                } else if (step === 2) {
                    document.getElementById('payment-step').classList.remove('hidden');
                    document.getElementById('payment-step').classList.add('animate-slide-left');
                } else if (step === 3) {
                    document.getElementById('success-step').classList.remove('hidden');
                    document.getElementById('success-step').classList.add('animate-scale-in');
                }
            }, 100);

            updateStepIndicators(step);
            currentStep = step;
        }

        // Form validation
        function validateCheckoutForm() {
            const fields = ['firstName', 'lastName', 'phone', 'email', 'city', 'address', 'postalCode'];
            let isValid = true;

            fields.forEach(field => {
                const input = document.getElementById(field);
                
                if (!input) {
                    console.warn(`Input with id "${field}" not found.`);
                    isValid = false;
                    return;
                }

                const errorMsg = input.parentElement.querySelector('.error-message');

                if (!input.value.trim()) {
                    input.classList.add('border-red-500');
                    errorMsg.classList.remove('hidden');
                    isValid = false;
                } else {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-green-500');
                    errorMsg.classList.add('hidden');
                }
            });

            // Email validation
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.value && !emailRegex.test(email.value)) {
                email.classList.add('border-red-500');
                email.parentElement.querySelector('.error-message').classList.remove('hidden');
                isValid = false;
            }

            return isValid;
        }

        function validatePaymentForm() {
            const fields = ['cardName', 'cardNumber', 'cardExpiry', 'cardCVC'];
            let isValid = true;

            fields.forEach(field => {
                const input = document.getElementById(field);
                const errorMsg = input.parentElement.querySelector('.error-message');

                if (!input.value.trim()) {
                    input.classList.add('border-red-500');
                    errorMsg.classList.remove('hidden');
                    isValid = false;
                } else {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-green-500');
                    errorMsg.classList.add('hidden');
                }
            });

            return isValid;
        }

        // Card formatting
        function formatCardNumber(input) {
            let value = input.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            input.value = formattedValue;
        }

        function formatExpiry(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            input.value = value;
        }

        // Loading state management
        function setButtonLoading(buttonId, textId, spinnerId, isLoading) {
            const button = document.getElementById(buttonId);
            const text = document.getElementById(textId);
            const spinner = document.getElementById(spinnerId);

            if (isLoading) {
                button.disabled = true;
                button.classList.add('opacity-75', 'cursor-not-allowed');
                text.textContent = 'Processing...';
                spinner.classList.remove('hidden');
            } else {
                button.disabled = false;
                button.classList.remove('opacity-75', 'cursor-not-allowed');
                spinner.classList.add('hidden');
            }
        }

        // Event listeners
        document.getElementById('continue-btn').addEventListener('click', async () => {
            if (validateCheckoutForm()) {
                setButtonLoading('continue-btn', 'continue-text', 'continue-spinner', true);

                try {
                    // Collect form data
                    const formData = {
                        firstName: document.getElementById('firstName').value,
                        lastName: document.getElementById('lastName').value,
                        phone: document.getElementById('phone').value,
                        email: document.getElementById('email').value,
                        city: document.getElementById('city').value,
                        address: document.getElementById('address').value,
                        postalCode: document.getElementById('postalCode').value,
                        timestamp: new Date().toISOString()
                    };

                    // Save to database
                    await saveCheckoutData(formData);

                    // Success - move to next step
                    showStep(2);
                    showToasted('Personal information saved successfully!', 'success');

                } catch (error) {
                    showToasted('Failed to save information. Please try again.', 'error');
                } finally {
                    setButtonLoading('continue-btn', 'continue-text', 'continue-spinner', false);
                    document.getElementById('continue-text').textContent = 'Continue';
                }
            } else {
                showToasted('Please fill in all required fields correctly.', 'error');
            }
        });

        document.getElementById('back-btn').addEventListener('click', () => {
            showStep(1);
        });

        document.getElementById('purchase-btn').addEventListener('click', async () => {
            if (validatePaymentForm()) {
                setButtonLoading('purchase-btn', 'purchase-text', 'purchase-spinner', true);

                try {
                    // Collect payment data
                    const paymentFormData = {
                        cardName: document.getElementById('cardName').value,
                        cardNumber: document.getElementById('cardNumber').value.replace(/\s/g, ''), // Remove spaces
                        cardExpiry: document.getElementById('cardExpiry').value,
                        cardCVC: document.getElementById('cardCVC').value,
                        billingAddressSame: document.getElementById('billingAddress').checked,
                        paymentMethod: document.querySelector('.payment-method.selected').dataset.method,
                        amount: 74.18,
                        currency: 'CAD',
                        timestamp: new Date().toISOString()
                    };

                    // Process payment
                    await processPayment(paymentFormData);

                    // Success - move to confirmation
                    showStep(3);
                    showToasted('Payment processed successfully!', 'success');

                    // Send confirmation email simulation
                    setTimeout(() => {
                        showToasted('Order confirmation sent to your email.', 'info');
                    }, 2000);

                } catch (error) {
                    showToasted('Payment processing failed. Please check your details and try again.', 'error');
                } finally {
                    setButtonLoading('purchase-btn', 'purchase-text', 'purchase-spinner', false);
                    document.getElementById('purchase-text').textContent = 'Purchase';
                }
            } else {
                showToasted('Please fill in all payment details correctly.', 'error');
            }
        });

        document.getElementById('track-btn').addEventListener('click', () => {
            showToasted('Redirecting to order tracking...', 'info');
            // Simulate redirect
            setTimeout(() => {
                showToasted('Order tracking page loaded!', 'success');
            }, 1500);
        });

        // Payment method selection
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', () => {
                document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('selected'));
                method.classList.add('selected');
                showToasted(`${method.dataset.method} selected as payment method.`, 'info');
            });
        });

        // Card number formatting
        document.getElementById('cardNumber').addEventListener('input', (e) => formatCardNumber(e.target));
        document.getElementById('cardExpiry').addEventListener('input', (e) => formatExpiry(e.target));

        // CVC validation
        document.getElementById('cardCVC').addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        // Real-time validation
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('blur', () => {
                if (input.value.trim()) {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-green-500');
                    input.parentElement.querySelector('.error-message')?.classList.add('hidden');
                }
            });
        });

        // Initialize
        updateStepIndicators(1);
        showToasted('info', 'Welcome! Please fill in your checkout details.');
    </script>
</body>

</html>