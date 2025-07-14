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
                    <div class="pb-20">
                        <div class="relative px-4 mb-6">
                            <div class="relative"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg><input type="text" placeholder="Search..." class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all duration-200" value=""></div>
                        </div>
                        <div class="px-4 mb-6">
                            <div class="flex space-x-2 overflow-x-auto scrollbar-hide"><button class="px-6 py-3 rounded-full whitespace-nowrap font-medium transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200">All</button><button class="px-6 py-3 rounded-full whitespace-nowrap font-medium transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200">Healthy food</button><button class="px-6 py-3 rounded-full whitespace-nowrap font-medium transition-all duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200">Junk food</button><button class="px-6 py-3 rounded-full whitespace-nowrap font-medium transition-all duration-200 bg-gray-900 text-white shadow-lg">Dessert</button></div>
                        </div>
                        <div class="px-4 grid grid-cols-2 gap-4">
                            <div class="cursor-pointer">
                                <div class="bg-white rounded-3xl p-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                                    <div class="relative mb-4"><img src="https://images.pexels.com/photos/291528/pexels-photo-291528.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400" alt="Chocolate Cake" class="w-full h-40 object-cover rounded-2xl"><button class="absolute top-3 right-3 p-2 rounded-full transition-all duration-200 bg-white text-gray-400 hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-5 h-5 ">
                                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                                            </svg></button></div>
                                    <div class="space-y-2">
                                        <h3 class="font-bold text-lg text-gray-900">Chocolate Cake</h3>
                                        <p class="text-gray-500 text-sm">Rich chocolate layer cake</p>
                                        <p class="font-bold text-xl text-gray-900">$8.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer">
                                <div class="bg-white rounded-3xl p-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                                    <div class="relative mb-4"><img src="https://images.pexels.com/photos/1352278/pexels-photo-1352278.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400" alt="Ice Cream Sundae" class="w-full h-40 object-cover rounded-2xl"><button class="absolute top-3 right-3 p-2 rounded-full transition-all duration-200 bg-white text-gray-400 hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-5 h-5 ">
                                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                                            </svg></button></div>
                                    <div class="space-y-2">
                                        <h3 class="font-bold text-lg text-gray-900">Ice Cream Sundae</h3>
                                        <p class="text-gray-500 text-sm">Vanilla ice cream with toppings</p>
                                        <p class="font-bold text-xl text-gray-900">$6.99</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="fixed bottom-0 left-0 right-0 bg-gray-900 rounded-t-3xl px-6 py-4 shadow-2xl">
                    <div class="flex justify-around items-center"><button class="flex flex-col items-center space-y-1 p-2 rounded-xl transition-all duration-200 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home w-6 h-6">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg><span class="text-xs font-medium">Home</span></button><button class="flex flex-col items-center space-y-1 p-2 rounded-xl transition-all duration-200 text-gray-400 hover:text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart w-6 h-6">
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
</body>
</html>