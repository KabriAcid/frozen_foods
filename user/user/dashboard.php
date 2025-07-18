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
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray font-dm">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0">
        <div class="p-6">
            <h2 class="text-xl font-bold text-dark">Frozen Foods</h2>
        </div>
        <nav class="mt-6">
            <a href="#" class="flex items-center px-6 py-3 text-accent bg-orange-50 border-r-4 border-accent">
                <i class="fas fa-home mr-3"></i>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i class="fas fa-shopping-cart mr-3"></i>
                Orders
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i class="fas fa-heart mr-3"></i>
                Favorites
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i class="fas fa-user mr-3"></i>
                Profile
            </a>
        </nav>
    </div>

    <!-- Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between px-4 py-4">
                <div class="flex items-center">
                    <button id="menu-toggle" class="lg:hidden p-2 rounded-md text-gray-600 hover:bg-gray-100">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="ml-4 text-xl font-semibold text-dark">Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-bell text-gray-600 text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-secondary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-r from-accent to-secondary rounded-full border-2 border-white shadow-md flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Search Bar -->
        <div class="p-6">
            <div class="relative max-w-md">
                <input 
                    type="text" 
                    id="search-input"
                    placeholder="Search for chicken, fish, turkey..."
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                >
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>

        <!-- Tabs -->
        <div class="px-6">
            <div class="flex space-x-2 overflow-x-auto">
                <button class="tab-button active px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap" data-category="all">
                    All
                </button>
                <?php foreach ($categories as $category): ?>
                <button class="tab-button px-6 py-2 rounded-full text-sm font-medium whitespace-nowrap" data-category="<?php echo strtolower($category); ?>">
                    <?php echo ucfirst($category); ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="p-6">
            <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($products as $product): ?>
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300" data-category="<?php echo strtolower($product['category']); ?>" data-name="<?php echo strtolower($product['name']); ?>">
                    <div class="relative">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-48 object-cover">
                        <button class="favorite-btn absolute top-3 right-3 w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-dark mb-1"><?php echo $product['name']; ?></h3>
                        <p class="text-gray-600 text-sm mb-2"><?php echo $product['description']; ?></p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-accent">₦<?php echo number_format($product['price']); ?></span>
                            <a href="product.php?id=<?php echo $product['id']; ?>" class="bg-dark text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-800 transition-colors">
                                View
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="../util/dashboard.js"></script>
</body>
</html>