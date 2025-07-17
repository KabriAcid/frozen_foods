<?php
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../components/backend-header.php';
?>

<body>
    <main class="dashboard">
        <div id="root">
            <div class="min-h-screen bg-gray-50">
                <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between h-16"><button class="flex items-center text-gray-600 hover:text-gray-900 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left w-6 h-6 mr-2">
                                    <path d="m12 19-7-7 7-7"></path>
                                    <path d="M19 12H5"></path>
                                </svg><span class="font-medium">Back to Menu</span></button>
                            <h1 class="text-xl font-bold text-gray-900">Checkout</h1>
                            <div class="w-24"></div>
                        </div>
                    </div>
                </header>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-8">
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                                <h2 class="text-xl font-bold text-gray-900 mb-6">Contact Information</h2>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div><label class="block text-sm font-medium text-gray-700 mb-2">First Name</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="John" value=""></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Doe" value=""></div>
                                </div>
                                <div class="mt-4"><label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label><input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="john.doe@example.com" value=""></div>
                                <div class="mt-4"><label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label><input type="tel" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="(555) 123-4567" value=""></div>
                            </div>
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                                <div class="flex items-center mb-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck w-6 h-6 text-blue-600 mr-3">
                                        <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                                        <path d="M15 18H9"></path>
                                        <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                                        <circle cx="17" cy="18" r="2"></circle>
                                        <circle cx="7" cy="18" r="2"></circle>
                                    </svg>
                                    <h2 class="text-xl font-bold text-gray-900">Delivery Address</h2>
                                </div>
                                <div class="space-y-4">
                                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Street Address</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="123 Main Street, Apt 4B" value=""></div>
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                        <div><label class="block text-sm font-medium text-gray-700 mb-2">City</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="New York" value=""></div>
                                        <div><label class="block text-sm font-medium text-gray-700 mb-2">State</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="NY" value=""></div>
                                        <div><label class="block text-sm font-medium text-gray-700 mb-2">ZIP Code</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="10001" value=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                                <div class="flex items-center mb-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card w-6 h-6 text-blue-600 mr-3">
                                        <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                                        <line x1="2" x2="22" y1="10" y2="10"></line>
                                    </svg>
                                    <h2 class="text-xl font-bold text-gray-900">Payment Information</h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-5 h-5 text-green-600 ml-auto">
                                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                    </svg>
                                </div>
                                <div class="space-y-4">
                                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="John Doe" value=""></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Card Number</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="1234 5678 9012 3456" value=""></div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div><label class="block text-sm font-medium text-gray-700 mb-2">Expiry Date</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="MM/YY" value=""></div>
                                        <div><label class="block text-sm font-medium text-gray-700 mb-2">CVV</label><input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="123" value=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:sticky lg:top-24 lg:self-start">
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                                <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
                                <div class="space-y-4 mb-6">
                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl"><img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400" alt="Easy Greek Salad" class="w-16 h-16 object-cover rounded-lg">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900">Easy Greek Salad</h3>
                                            <p class="text-sm text-gray-600">$21.99 each</p>
                                        </div>
                                        <div class="flex items-center space-x-2"><button class="w-8 h-8 rounded-full bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus w-4 h-4">
                                                    <path d="M5 12h14"></path>
                                                </svg></button><span class="w-8 text-center font-medium">2</span><button class="w-8 h-8 rounded-full bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg></button></div><button class="text-gray-400 hover:text-red-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-5 h-5">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg></button>
                                    </div>
                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl"><img src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400" alt="Mediterranean Pasta" class="w-16 h-16 object-cover rounded-lg">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900">Mediterranean Pasta</h3>
                                            <p class="text-sm text-gray-600">$18.50 each</p>
                                        </div>
                                        <div class="flex items-center space-x-2"><button class="w-8 h-8 rounded-full bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus w-4 h-4">
                                                    <path d="M5 12h14"></path>
                                                </svg></button><span class="w-8 text-center font-medium">1</span><button class="w-8 h-8 rounded-full bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg></button></div><button class="text-gray-400 hover:text-red-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-5 h-5">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg></button>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 pt-6 space-y-3">
                                    <div class="flex justify-between text-gray-600"><span>Subtotal</span><span>$62.48</span></div>
                                    <div class="flex justify-between text-gray-600"><span>Delivery Fee</span><span>Free</span></div>
                                    <div class="flex justify-between text-gray-600"><span>Tax</span><span>$5.00</span></div>
                                    <div class="border-t border-gray-200 pt-3">
                                        <div class="flex justify-between text-xl font-bold text-gray-900"><span>Total</span><span>$67.48</span></div>
                                    </div>
                                </div>
                                <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                                    <div class="flex items-center text-green-800"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck w-5 h-5 mr-2">
                                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                                            <path d="M15 18H9"></path>
                                            <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                                            <circle cx="17" cy="18" r="2"></circle>
                                            <circle cx="7" cy="18" r="2"></circle>
                                        </svg><span class="text-sm font-medium">Estimated delivery: 25-35 minutes</span></div>
                                </div><button class="w-full mt-6 bg-gray-900 text-white py-4 px-6 rounded-xl font-semibold text-lg hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">Place Order • $67.48</button>
                                <div class="mt-4 flex items-center justify-center text-sm text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-4 h-4 mr-2">
                                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                    </svg>Secure SSL encrypted checkout</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>