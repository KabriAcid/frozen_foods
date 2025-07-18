<?php
// Include utility functions
require_once '../util/products.php';

// Get product ID from URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($product_id === 0) {
    header('Location: dashboard.php');
    exit;
}

// Get product details
$product = getProductById($product_id);

if (!$product) {
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Frozen Foods</title>
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
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="flex items-center justify-between px-4 py-4">
            <button onclick="history.back()" class="p-2 rounded-md text-gray-600 hover:bg-gray-100">
                <i class="fas fa-arrow-left text-xl"></i>
            </button>
            <h1 class="text-lg font-semibold text-dark">Product Details</h1>
            <div class="relative">
                <i class="fas fa-bell text-gray-600 text-xl"></i>
                <span class="absolute -top-2 -right-2 bg-secondary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
            </div>
        </div>
    </header>

    <!-- Product Content -->
    <div class="max-w-md mx-auto bg-white min-h-screen">
        <!-- Product Image -->
        <div class="relative">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-80 object-cover">
            <button class="absolute top-4 right-4 w-10 h-10 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                <i class="far fa-heart text-gray-600"></i>
            </button>
        </div>

        <!-- Product Details -->
        <div class="p-6">
            <!-- Product Name and Price -->
            <div class="mb-4">
                <h1 class="text-2xl font-bold text-dark mb-2"><?php echo $product['name']; ?></h1>
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-accent">₦<?php echo number_format($product['price']); ?></span>
                    <div class="flex items-center space-x-1">
                        <i class="fas fa-star text-yellow-400"></i>
                        <span class="text-gray-600 font-medium"><?php echo $product['rating']; ?></span>
                    </div>
                </div>
            </div>

            <!-- Quantity Selector -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                <div class="flex items-center space-x-4">
                    <button id="decrease-qty" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors">
                        <i class="fas fa-minus text-gray-600"></i>
                    </button>
                    <span id="quantity" class="text-xl font-semibold text-dark min-w-[2rem] text-center">1</span>
                    <button id="increase-qty" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors">
                        <i class="fas fa-plus text-gray-600"></i>
                    </button>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-dark mb-3">Description</h2>
                <p class="text-gray-600 leading-relaxed"><?php echo $product['description']; ?></p>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <button id="order-now-btn" class="w-full bg-dark text-white py-4 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                    Order Now
                </button>
                <button id="add-to-cart-btn" class="w-full bg-white text-dark py-4 rounded-lg font-semibold border-2 border-dark hover:bg-gray-50 transition-colors">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>

    <script src="../util/product.js"></script>
    <script>
        // Initialize product page with product data
        initializeProductPage({
            id: <?php echo $product['id']; ?>,
            name: '<?php echo addslashes($product['name']); ?>',
            price: <?php echo $product['price']; ?>,
            image: '<?php echo $product['image']; ?>'
        });
    </script>
</body>
</html>