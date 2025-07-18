<?php
/**
 * Product utility functions for Frozen Foods
 */

/**
 * Get all products
 * @return array
 */
function getAllProducts() {
    // In a real application, this would fetch from a database
    return [
        [
            'id' => 1,
            'name' => 'Fresh Chicken Wings',
            'description' => 'Premium quality chicken wings, perfect for grilling',
            'price' => 2500,
            'category' => 'chicken',
            'image' => 'https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=400',
            'rating' => 4.8
        ],
        [
            'id' => 2,
            'name' => 'Atlantic Salmon',
            'description' => 'Fresh Atlantic salmon fillets, rich in omega-3',
            'price' => 4500,
            'category' => 'fish',
            'image' => 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=400',
            'rating' => 4.9
        ],
        [
            'id' => 3,
            'name' => 'Whole Turkey',
            'description' => 'Farm-fresh whole turkey, perfect for special occasions',
            'price' => 8500,
            'category' => 'turkey',
            'image' => 'https://images.pexels.com/photos/7245474/pexels-photo-7245474.jpeg?auto=compress&cs=tinysrgb&w=400',
            'rating' => 4.7
        ],
        [
            'id' => 4,
            'name' => 'Chicken Breast',
            'description' => 'Boneless chicken breast, lean and protein-rich',
            'price' => 3200,
            'category' => 'chicken',
            'image' => 'https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=400',
            'rating' => 4.6
        ],
        [
            'id' => 5,
            'name' => 'Tuna Steaks',
            'description' => 'Premium tuna steaks, perfect for searing',
            'price' => 5200,
            'category' => 'fish',
            'image' => 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=400',
            'rating' => 4.8
        ],
        [
            'id' => 6,
            'name' => 'Turkey Slices',
            'description' => 'Sliced turkey breast, ready for sandwiches',
            'price' => 3800,
            'category' => 'turkey',
            'image' => 'https://images.pexels.com/photos/7245474/pexels-photo-7245474.jpeg?auto=compress&cs=tinysrgb&w=400',
            'rating' => 4.5
        ],
        [
            'id' => 7,
            'name' => 'Chicken Thighs',
            'description' => 'Juicy chicken thighs with skin, full of flavor',
            'price' => 2800,
            'category' => 'chicken',
            'image' => 'https://images.pexels.com/photos/2338407/pexels-photo-2338407.jpeg?auto=compress&cs=tinysrgb&w=400',
            'rating' => 4.7
        ],
        [
            'id' => 8,
            'name' => 'Sea Bass',
            'description' => 'Fresh sea bass, delicate and flaky',
            'price' => 4800,
            'category' => 'fish',
            'image' => 'https://images.pexels.com/photos/725991/pexels-photo-725991.jpeg?auto=compress&cs=tinysrgb&w=400',
            'rating' => 4.9
        ]
    ];
}

/**
 * Get product by ID
 * @param int $id
 * @return array|null
 */
function getProductById($id) {
    $products = getAllProducts();
    
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    
    return null;
}

/**
 * Get all product categories
 * @return array
 */
function getProductCategories() {
    $products = getAllProducts();
    $categories = [];
    
    foreach ($products as $product) {
        if (!in_array($product['category'], $categories)) {
            $categories[] = $product['category'];
        }
    }
    
    return $categories;
}

/**
 * Search products by name
 * @param string $query
 * @return array
 */
function searchProducts($query) {
    $products = getAllProducts();
    $results = [];
    
    $query = strtolower(trim($query));
    
    if (empty($query)) {
        return $products;
    }
    
    foreach ($products as $product) {
        if (strpos(strtolower($product['name']), $query) !== false || 
            strpos(strtolower($product['description']), $query) !== false) {
            $results[] = $product;
        }
    }
    
    return $results;
}

/**
 * Filter products by category
 * @param string $category
 * @return array
 */
function filterProductsByCategory($category) {
    if ($category === 'all') {
        return getAllProducts();
    }
    
    $products = getAllProducts();
    $results = [];
    
    foreach ($products as $product) {
        if (strtolower($product['category']) === strtolower($category)) {
            $results[] = $product;
        }
    }
    
    return $results;
}
?>