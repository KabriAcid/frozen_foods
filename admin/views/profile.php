<?php
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../components/backend-header.php';
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
                                <h1 class="text-2xl font-bold text-gray-900">Profile</h1>
                            </div>
                        </div>
                        <div class="px-4 py-6">
                            <div class="bg-white rounded-2xl p-6 shadow-sm mb-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center border-4 border-orange-400"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-10 h-10 text-white">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg></div>
                                    <div class="flex-1">
                                        <h2 class="text-xl font-bold text-gray-900">John Doe</h2>
                                        <p class="text-gray-500">john.doe@email.com</p>
                                        <div class="flex items-center space-x-4 mt-2">
                                            <div class="flex items-center space-x-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star w-4 h-4 text-yellow-400 fill-current">
                                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                </svg><span class="text-sm font-medium text-gray-700">4.8</span></div>
                                            <div class="flex items-center space-x-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-4 h-4 text-gray-400">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <polyline points="12 6 12 12 16 14"></polyline>
                                                </svg><span class="text-sm text-gray-500">Member since 2023</span></div>
                                        </div>
                                    </div><button class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen-line w-5 h-5 text-gray-600">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                                        </svg></button>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mb-6">
                                <div class="bg-white rounded-2xl p-4 text-center shadow-sm">
                                    <div class="text-2xl font-bold text-gray-900">47</div>
                                    <div class="text-sm text-gray-500">Orders</div>
                                </div>
                                <div class="bg-white rounded-2xl p-4 text-center shadow-sm">
                                    <div class="text-2xl font-bold text-orange-500">$342</div>
                                    <div class="text-sm text-gray-500">Spent</div>
                                </div>
                                <div class="bg-white rounded-2xl p-4 text-center shadow-sm">
                                    <div class="text-2xl font-bold text-green-500">12</div>
                                    <div class="text-sm text-gray-500">Reviews</div>
                                </div>
                            </div>
                            <div class="bg-white rounded-2xl p-6 shadow-sm mb-6">
                                <h3 class="font-bold text-lg text-gray-900 mb-4">Recent Orders</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900">Green Garden</h4>
                                            <p class="text-sm text-gray-500">Eybisi Salad Mix + 1 more</p>
                                            <p class="text-xs text-gray-400">2 days ago</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">$31.98</p><button class="text-sm text-orange-500 hover:text-orange-600 transition-colors duration-200">Reorder</button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900">Pizza Palace</h4>
                                            <p class="text-sm text-gray-500">Pepperoni Pizza</p>
                                            <p class="text-xs text-gray-400">1 week ago</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">$16.99</p><button class="text-sm text-orange-500 hover:text-orange-600 transition-colors duration-200">Reorder</button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900">Sweet Treats</h4>
                                            <p class="text-sm text-gray-500">Chocolate Cake</p>
                                            <p class="text-xs text-gray-400">2 weeks ago</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">$8.99</p><button class="text-sm text-orange-500 hover:text-orange-600 transition-colors duration-200">Reorder</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-2xl shadow-sm mb-6"><button class="w-full flex items-center space-x-4 p-6 hover:bg-gray-50 transition-colors duration-200 border-b border-gray-100 last:border-b-0 first:rounded-t-2xl last:rounded-b-2xl">
                                    <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-5 h-5 text-gray-600">
                                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg></div>
                                    <div class="flex-1 text-left">
                                        <h3 class="font-semibold text-gray-900">Delivery Address</h3>
                                        <p class="text-sm text-gray-500">123 Main St, City</p>
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center"><svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg></div>
                                </button><button class="w-full flex items-center space-x-4 p-6 hover:bg-gray-50 transition-colors duration-200 border-b border-gray-100 last:border-b-0 first:rounded-t-2xl last:rounded-b-2xl">
                                    <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card w-5 h-5 text-gray-600">
                                            <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                                            <line x1="2" x2="22" y1="10" y2="10"></line>
                                        </svg></div>
                                    <div class="flex-1 text-left">
                                        <h3 class="font-semibold text-gray-900">Payment Methods</h3>
                                        <p class="text-sm text-gray-500">Visa ending in 1234</p>
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center"><svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg></div>
                                </button><button class="w-full flex items-center space-x-4 p-6 hover:bg-gray-50 transition-colors duration-200 border-b border-gray-100 last:border-b-0 first:rounded-t-2xl last:rounded-b-2xl">
                                    <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-5 h-5 text-gray-600">
                                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                                        </svg></div>
                                    <div class="flex-1 text-left">
                                        <h3 class="font-semibold text-gray-900">Notifications</h3>
                                        <p class="text-sm text-gray-500">Push, Email, SMS</p>
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center"><svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg></div>
                                </button><button class="w-full flex items-center space-x-4 p-6 hover:bg-gray-50 transition-colors duration-200 border-b border-gray-100 last:border-b-0 first:rounded-t-2xl last:rounded-b-2xl">
                                    <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-help-circle w-5 h-5 text-gray-600">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                            <path d="M12 17h.01"></path>
                                        </svg></div>
                                    <div class="flex-1 text-left">
                                        <h3 class="font-semibold text-gray-900">Help &amp; Support</h3>
                                        <p class="text-sm text-gray-500">FAQ, Contact us</p>
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center"><svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg></div>
                                </button></div><button class="w-full flex items-center justify-center space-x-3 bg-red-50 text-red-600 py-4 rounded-2xl font-semibold hover:bg-red-100 transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out w-5 h-5">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" x2="9" y1="12" y2="12"></line>
                                </svg><span>Sign Out</span></button>
                        </div>
                    </div>
                </div>
                <?php include __DIR__ . '/../../components/backend-nav.php' ?>
            </div>
        </div>
    </main>
</body>

</html>