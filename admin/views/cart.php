<?php
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../components/header.php';
?>

<body>
    <main class="dashboard">
        <div id="root">
            <div class="min-h-screen bg-gray-50">
                <div class="transition-all duration-300 ">
                    <header class="flex items-center justify-between p-4 bg-white"><button class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-6 h-6 text-gray-700">
                                <line x1="4" x2="20" y1="12" y2="12"></line>
                                <line x1="4" x2="20" y1="6" y2="6"></line>
                                <line x1="4" x2="20" y1="18" y2="18"></line>
                            </svg></button>
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center overflow-hidden border-2 border-orange-400 hover:border-orange-500 transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-6 h-6 text-white">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg></div>
                    </header>
                    <div class="min-h-screen bg-gray-50">
                        <div class="bg-white px-4 py-6 shadow-sm">
                            <div class="flex items-center space-x-4"><button class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left w-6 h-6 text-gray-700">
                                        <path d="m12 19-7-7 7-7"></path>
                                        <path d="M19 12H5"></path>
                                    </svg></button>
                                <h1 class="text-2xl font-bold text-gray-900">Your Cart</h1>
                            </div>
                        </div>
                        <div class="px-4 py-6">
                            <div class="space-y-4 mb-8">
                                <div class="bg-white rounded-2xl p-4 shadow-sm">
                                    <div class="flex items-center space-x-4"><img src="https://images.pexels.com/photos/1833336/pexels-photo-1833336.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400" alt="Eybisi Salad Mix" class="w-16 h-16 object-cover rounded-xl">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900">Eybisi Salad Mix</h3>
                                            <p class="text-orange-500 font-bold">$14.99</p>
                                        </div>
                                        <div class="flex items-center space-x-3"><button class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus w-4 h-4 text-gray-600">
                                                    <path d="M5 12h14"></path>
                                                </svg></button><span class="font-semibold text-gray-900 w-8 text-center">2</span><button class="w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center hover:bg-orange-600 transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 text-white">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg></button><button class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center hover:bg-red-200 transition-colors duration-200 ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 w-4 h-4 text-red-500">
                                                    <path d="M3 6h18"></path>
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                    <line x1="10" x2="10" y1="11" y2="17"></line>
                                                    <line x1="14" x2="14" y1="11" y2="17"></line>
                                                </svg></button></div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-2xl p-4 shadow-sm">
                                    <div class="flex items-center space-x-4"><img src="https://images.pexels.com/photos/2147491/pexels-photo-2147491.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400" alt="Pepperoni Pizza" class="w-16 h-16 object-cover rounded-xl">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900">Pepperoni Pizza</h3>
                                            <p class="text-orange-500 font-bold">$16.99</p>
                                        </div>
                                        <div class="flex items-center space-x-3"><button class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus w-4 h-4 text-gray-600">
                                                    <path d="M5 12h14"></path>
                                                </svg></button><span class="font-semibold text-gray-900 w-8 text-center">1</span><button class="w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center hover:bg-orange-600 transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 text-white">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg></button><button class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center hover:bg-red-200 transition-colors duration-200 ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 w-4 h-4 text-red-500">
                                                    <path d="M3 6h18"></path>
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                    <line x1="10" x2="10" y1="11" y2="17"></line>
                                                    <line x1="14" x2="14" y1="11" y2="17"></line>
                                                </svg></button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-2xl p-6 shadow-sm mb-6">
                                <h3 class="font-bold text-lg text-gray-900 mb-4">Order Summary</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between"><span class="text-gray-600">Subtotal</span><span class="font-semibold text-gray-900">$46.97</span></div>
                                    <div class="flex justify-between"><span class="text-gray-600">Delivery Fee</span><span class="font-semibold text-gray-900">$2.99</span></div>
                                    <div class="border-t pt-3">
                                        <div class="flex justify-between"><span class="font-bold text-lg text-gray-900">Total</span><span class="font-bold text-lg text-orange-500">$49.96</span></div>
                                    </div>
                                </div>
                            </div><button class="w-full bg-gray-900 text-white py-4 rounded-2xl font-bold text-lg hover:bg-gray-800 transition-colors duration-200 shadow-lg">Proceed to Checkout • $49.96</button>
                        </div>
                    </div>
                </div>
                <nav class="fixed bottom-0 left-0 right-0 bg-gray-900 rounded-t-3xl px-6 py-4 shadow-2xl">
                    <div class="flex justify-around items-center"><button class="flex flex-col items-center space-y-1 p-2 rounded-xl transition-all duration-200 text-gray-400 hover:text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home w-6 h-6">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg><span class="text-xs font-medium">Home</span></button><button class="flex flex-col items-center space-y-1 p-2 rounded-xl transition-all duration-200 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart w-6 h-6">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                            </svg><span class="text-xs font-medium">Cart</span></button><button class="flex flex-col items-center space-y-1 p-2 rounded-xl transition-all duration-200 text-gray-400 hover:text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-6 h-6">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg><span class="text-xs font-medium">Profile</span></button></div>
                </nav>
            </div>
        </div>
    </main>
</body>

</html>