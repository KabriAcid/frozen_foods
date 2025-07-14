<?php
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../components/header.php';
?>

<body>
    <main class="dashboard">
        <div id="root">
            <div class="min-h-screen bg-gray-50">
                <div class="min-h-screen bg-gray-50">
                    <div class="relative bg-white">
                        <div class="flex items-center justify-between p-4"><button class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left w-6 h-6 text-gray-700">
                                    <path d="m12 19-7-7 7-7"></path>
                                    <path d="M19 12H5"></path>
                                </svg></button>
                            <div class="relative">
                                <div class="w-10 h-10 bg-gray-900 rounded-full flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart w-5 h-5 text-white">
                                        <circle cx="8" cy="21" r="1"></circle>
                                        <circle cx="19" cy="21" r="1"></circle>
                                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                                    </svg></div>
                                <div class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full flex items-center justify-center"><span class="text-xs font-bold text-white">1</span></div>
                            </div>
                        </div>
                        <div class="relative px-4 pb-8">
                            <div class="relative"><img src="https://images.pexels.com/photos/2097090/pexels-photo-2097090.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400" alt="Chicken Caesar Salad" class="w-full h-80 object-cover rounded-3xl shadow-lg"><button class="absolute top-4 right-4 p-3 rounded-full transition-all duration-200 bg-white text-gray-400 hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-6 h-6 ">
                                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                                    </svg></button></div>
                        </div>
                    </div>
                    <div class="px-6 py-6">
                        <div class="mb-8">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">Chicken Caesar Salad</h1>
                            <div class="mb-6">
                                <p class="text-gray-500 text-lg mb-2">Price</p>
                                <p class="text-3xl font-bold text-gray-900">$18.99</p>
                            </div>
                            <div class="mb-8">
                                <p class="text-gray-500 text-lg mb-4">Choice quantity</p>
                                <div class="flex items-center space-x-6"><button class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus w-5 h-5 text-gray-600">
                                            <path d="M5 12h14"></path>
                                        </svg></button><span class="text-2xl font-bold text-gray-900 w-8 text-center">1</span><button class="w-12 h-12 rounded-full bg-gray-900 flex items-center justify-center hover:bg-gray-800 transition-colors duration-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-5 h-5 text-white">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg></button></div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-2xl font-bold text-gray-900">Description</h2>
                                <div class="flex items-center space-x-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star w-5 h-5 text-yellow-400 fill-current">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg><span class="text-lg font-bold text-gray-900">4.9</span></div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed">This Italian salad is full of all the right flavors and textures: crisp lettuce, crunchy garlic croutons, and zingy pepperoncini. It's covered in punchy, herby Italian vinaigrette that makes the flavors sing! It can play sidekick to just about anything.</p>
                        </div>
                        <div class="flex space-x-4 mb-8"><button class="flex-1 py-4 rounded-2xl font-bold text-lg transition-all duration-300 bg-gray-900 text-white hover:bg-gray-800">Order Now</button><button class="flex-1 py-4 rounded-2xl font-bold text-lg border-2 border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white transition-all duration-200">Add to Cart</button></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>