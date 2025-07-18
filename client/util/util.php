<!-- USERS UTIL FUNCTIONS -->
 <?php
/**
 * User utility functions for Frozen Foods
 */

/**
 * Get user profile by ID
 * @param int $user_id
 * @return array|null
 */
function getUserProfile($user_id) {
    // In a real application, this would fetch from database
    // For demo purposes, return sample data
    return [
        'id' => $user_id,
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'phone' => '08012345678',
        'address' => '123 Lagos Street, Victoria Island, Lagos',
        'joined_date' => '2024-01-15',
        'email_notifications' => true,
        'sms_notifications' => true,
        'marketing_notifications' => false,
        'profile_image' => null
    ];
}

/**
 * Update user profile
 * @param int $user_id
 * @param array $profile_data
 * @return bool
 */
function updateUserProfile($user_id, $profile_data) {
    // Validate required fields
    $required_fields = ['name', 'email', 'phone', 'address'];
    
    foreach ($required_fields as $field) {
        if (!isset($profile_data[$field]) || empty(trim($profile_data[$field]))) {
            return false;
        }
    }
    
    // Validate email format
    if (!filter_var($profile_data['email'], FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    
    // Validate phone number
    if (!validatePhoneNumber($profile_data['phone'])) {
        return false;
    }
    
    // Sanitize data
    $clean_data = [
        'name' => sanitizeInput($profile_data['name']),
        'email' => sanitizeInput($profile_data['email']),
        'phone' => sanitizeInput($profile_data['phone']),
        'address' => sanitizeInput($profile_data['address'])
    ];
    
    // In real app, update database
    // For demo, store in session
    $_SESSION['user_profile'] = array_merge(getUserProfile($user_id), $clean_data);
    
    return true;
}

/**
 * Change user password
 * @param int $user_id
 * @param string $current_password
 * @param string $new_password
 * @return bool
 */
function changeUserPassword($user_id, $current_password, $new_password) {
    // In real app, verify current password against database
    // For demo, assume current password is correct
    
    // Validate new password
    if (strlen($new_password) < 6) {
        return false;
    }
    
    // Hash new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    // In real app, update database
    // For demo, store in session
    $_SESSION['password_changed'] = true;
    
    return true;
}

/**
 * Update notification preferences
 * @param int $user_id
 * @param array $preferences
 * @return bool
 */
function updateNotificationPreferences($user_id, $preferences) {
    $valid_preferences = ['email_notifications', 'sms_notifications', 'marketing_notifications'];
    
    $clean_preferences = [];
    foreach ($valid_preferences as $pref) {
        $clean_preferences[$pref] = isset($preferences[$pref]) ? (bool)$preferences[$pref] : false;
    }
    
    // In real app, update database
    // For demo, store in session
    $_SESSION['notification_preferences'] = $clean_preferences;
    
    return true;
}

/**
 * Get user statistics
 * @param int $user_id
 * @return array
 */
function getUserStatistics($user_id) {
    // In real app, calculate from database
    return [
        'total_orders' => 12,
        'total_spent' => 45600,
        'favorite_count' => 8,
        'last_order_date' => '2025-01-01',
        'member_since' => '2024-01-15'
    ];
}

/**
 * Get user's recent orders
 * @param int $user_id
 * @param int $limit
 * @return array
 */
function getUserRecentOrders($user_id, $limit = 5) {
    // In real app, fetch from database
    return [
        [
            'id' => 'FF20250101001',
            'date' => '2025-01-01',
            'total' => 8500,
            'status' => 'delivered',
            'items_count' => 3,
            'items' => [
                ['name' => 'Fresh Chicken Wings', 'quantity' => 2],
                ['name' => 'Atlantic Salmon', 'quantity' => 1]
            ]
        ],
        [
            'id' => 'FF20241228002',
            'date' => '2024-12-28',
            'total' => 5200,
            'status' => 'delivered',
            'items_count' => 2,
            'items' => [
                ['name' => 'Whole Turkey', 'quantity' => 1]
            ]
        ],
        [
            'id' => 'FF20241225003',
            'date' => '2024-12-25',
            'total' => 12300,
            'status' => 'out_for_delivery',
            'items_count' => 5,
            'items' => [
                ['name' => 'Chicken Breast', 'quantity' => 3],
                ['name' => 'Tuna Steaks', 'quantity' => 2]
            ]
        ]
    ];
}

/**
 * Get user's favorite products
 * @param int $user_id
 * @return array
 */
function getUserFavorites($user_id) {
    // In real app, fetch from database
    $favorites = [1, 2, 5, 8]; // Product IDs
    $favorite_products = [];
    
    foreach ($favorites as $product_id) {
        $product = getProductById($product_id);
        if ($product) {
            $favorite_products[] = $product;
        }
    }
    
    return $favorite_products;
}

/**
 * Add product to user favorites
 * @param int $user_id
 * @param int $product_id
 * @return bool
 */
function addToFavorites($user_id, $product_id) {
    // Validate product exists
    $product = getProductById($product_id);
    if (!$product) {
        return false;
    }
    
    // In real app, insert into database
    // For demo, store in session
    if (!isset($_SESSION['user_favorites'])) {
        $_SESSION['user_favorites'] = [];
    }
    
    if (!in_array($product_id, $_SESSION['user_favorites'])) {
        $_SESSION['user_favorites'][] = $product_id;
    }
    
    return true;
}

/**
 * Remove product from user favorites
 * @param int $user_id
 * @param int $product_id
 * @return bool
 */
function removeFromFavorites($user_id, $product_id) {
    // In real app, delete from database
    // For demo, remove from session
    if (isset($_SESSION['user_favorites'])) {
        $_SESSION['user_favorites'] = array_filter($_SESSION['user_favorites'], function($id) use ($product_id) {
            return $id != $product_id;
        });
    }
    
    return true;
}

/**
 * Check if product is in user favorites
 * @param int $user_id
 * @param int $product_id
 * @return bool
 */
function isProductFavorite($user_id, $product_id) {
    if (!isset($_SESSION['user_favorites'])) {
        return false;
    }
    
    return in_array($product_id, $_SESSION['user_favorites']);
}

/**
 * Upload user profile image
 * @param int $user_id
 * @param array $file
 * @return string|false
 */
function uploadProfileImage($user_id, $file) {
    // Validate file
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $max_size = 2 * 1024 * 1024; // 2MB
    
    if (!in_array($file['type'], $allowed_types)) {
        return false;
    }
    
    if ($file['size'] > $max_size) {
        return false;
    }
    
    // Generate unique filename
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'profile_' . $user_id . '_' . time() . '.' . $extension;
    $upload_path = '../uploads/profiles/' . $filename;
    
    // Create directory if it doesn't exist
    if (!file_exists('../uploads/profiles/')) {
        mkdir('../uploads/profiles/', 0755, true);
    }
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        // In real app, update database with image path
        $_SESSION['profile_image'] = $filename;
        return $filename;
    }
    
    return false;
}

/**
 * Delete user account
 * @param int $user_id
 * @param string $password
 * @return bool
 */
function deleteUserAccount($user_id, $password) {
    // In real app, verify password and delete from database
    // This is a destructive operation, so implement carefully
    
    // For demo, just clear session
    session_destroy();
    
    return true;
}

/**
 * Generate user activity log
 * @param int $user_id
 * @return array
 */
function getUserActivityLog($user_id) {
    // In real app, fetch from database
    return [
        [
            'action' => 'Profile Updated',
            'timestamp' => '2025-01-01 14:30:00',
            'details' => 'Updated delivery address'
        ],
        [
            'action' => 'Order Placed',
            'timestamp' => '2025-01-01 12:15:00',
            'details' => 'Order #FF20250101001'
        ],
        [
            'action' => 'Password Changed',
            'timestamp' => '2024-12-28 09:45:00',
            'details' => 'Password updated successfully'
        ]
    ];
}

/**
 * Export user data (GDPR compliance)
 * @param int $user_id
 * @return array
 */
function exportUserData($user_id) {
    return [
        'profile' => getUserProfile($user_id),
        'orders' => getUserRecentOrders($user_id, 100),
        'favorites' => getUserFavorites($user_id),
        'activity_log' => getUserActivityLog($user_id),
        'statistics' => getUserStatistics($user_id)
    ];
}

/**
 * Cart utility functions for Frozen Foods
 */

/**
 * Add item to cart session
 * @param int $product_id
 * @param int $quantity
 * @return bool
 */
function addToCart($product_id, $quantity = 1)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Validate product exists
    $product = getProductById($product_id);
    if (!$product) {
        return false;
    }

    // Check if item already exists in cart
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = [
            'product' => $product,
            'quantity' => $quantity
        ];
    }

    return true;
}

/**
 * Remove item from cart
 * @param int $product_id
 * @return bool
 */
function removeFromCart($product_id)
{
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
        return true;
    }

    return false;
}

/**
 * Update cart item quantity
 * @param int $product_id
 * @param int $quantity
 * @return bool
 */
function updateCartQuantity($product_id, $quantity)
{
    if (isset($_SESSION['cart'][$product_id])) {
        if ($quantity <= 0) {
            return removeFromCart($product_id);
        }

        $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        return true;
    }

    return false;
}

/**
 * Get cart contents
 * @return array
 */
function getCart()
{
    return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

/**
 * Get cart total
 * @return float
 */
function getCartTotal()
{
    $cart = getCart();
    $total = 0;

    foreach ($cart as $item) {
        $total += $item['product']['price'] * $item['quantity'];
    }

    return $total;
}

/**
 * Get cart item count
 * @return int
 */
function getCartItemCount()
{
    $cart = getCart();
    $count = 0;

    foreach ($cart as $item) {
        $count += $item['quantity'];
    }

    return $count;
}

/**
 * Clear cart
 * @return bool
 */
function clearCart()
{
    unset($_SESSION['cart']);
    return true;
}

/**
 * Validate cart before checkout
 * @return array
 */
function validateCart()
{
    $cart = getCart();
    $errors = [];

    if (empty($cart)) {
        $errors[] = 'Cart is empty';
        return $errors;
    }

    foreach ($cart as $product_id => $item) {
        // Check if product still exists
        $product = getProductById($product_id);
        if (!$product) {
            $errors[] = "Product '{$item['product']['name']}' is no longer available";
            continue;
        }

        // Validate quantity
        if ($item['quantity'] <= 0) {
            $errors[] = "Invalid quantity for '{$item['product']['name']}'";
        }

        if ($item['quantity'] > 99) {
            $errors[] = "Maximum quantity exceeded for '{$item['product']['name']}'";
        }
    }

    return $errors;
}

/**
 * Calculate cart subtotal
 * @return float
 */
function getCartSubtotal()
{
    return getCartTotal();
}

/**
 * Calculate delivery fee
 * @param float $subtotal
 * @return float
 */
function calculateDeliveryFee($subtotal)
{
    // Free delivery for orders above ₦10,000
    if ($subtotal >= 10000) {
        return 0;
    }

    // Standard delivery fee
    return 500;
}

/**
 * Calculate total with delivery
 * @return array
 */
function getCartTotals()
{
    $subtotal = getCartSubtotal();
    $delivery = calculateDeliveryFee($subtotal);
    $total = $subtotal + $delivery;

    return [
        'subtotal' => $subtotal,
        'delivery' => $delivery,
        'total' => $total
    ];
}

/**
 * Create a new order
 * @param array $order_data
 * @return array|false
 */
function createOrder($order_data) {
    // Validate required fields
    $required_fields = ['customer_name', 'customer_phone', 'delivery_address', 'items'];
    
    foreach ($required_fields as $field) {
        if (!isset($order_data[$field]) || empty($order_data[$field])) {
            return false;
        }
    }
    
    // Generate order ID
    $order_id = generateOrderId();
    
    // Calculate totals
    $totals = calculateOrderTotals($order_data['items']);
    
    // Create order array
    $order = [
        'id' => $order_id,
        'customer_name' => sanitizeInput($order_data['customer_name']),
        'customer_phone' => sanitizeInput($order_data['customer_phone']),
        'customer_email' => isset($order_data['customer_email']) ? sanitizeInput($order_data['customer_email']) : '',
        'delivery_address' => sanitizeInput($order_data['delivery_address']),
        'items' => $order_data['items'],
        'subtotal' => $totals['subtotal'],
        'delivery_fee' => $totals['delivery_fee'],
        'total' => $totals['total'],
        'status' => 'pending',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
    
    // In a real application, save to database
    // For now, we'll save to a JSON file or session
    saveOrder($order);
    
    return $order;
}

/**
 * Generate unique order ID
 * @return string
 */
function generateOrderId() {
    return 'FF' . date('Ymd') . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
}

/**
 * Calculate order totals
 * @param array $items
 * @return array
 */
function calculateOrderTotals($items) {
    $subtotal = 0;
    
    foreach ($items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    
    $delivery_fee = calculateDeliveryFee($subtotal);
    $total = $subtotal + $delivery_fee;
    
    return [
        'subtotal' => $subtotal,
        'delivery_fee' => $delivery_fee,
        'total' => $total
    ];
}

/**
 * Save order (in real app, this would save to database)
 * @param array $order
 * @return bool
 */
function saveOrder($order) {
    // For demonstration, we'll save to session
    if (!isset($_SESSION['orders'])) {
        $_SESSION['orders'] = [];
    }
    
    $_SESSION['orders'][$order['id']] = $order;
    
    return true;
}

/**
 * Get order by ID
 * @param string $order_id
 * @return array|null
 */
function getOrderById($order_id) {
    if (isset($_SESSION['orders'][$order_id])) {
        return $_SESSION['orders'][$order_id];
    }
    
    return null;
}

/**
 * Get all orders for current session
 * @return array
 */
function getAllOrders() {
    return isset($_SESSION['orders']) ? $_SESSION['orders'] : [];
}

/**
 * Update order status
 * @param string $order_id
 * @param string $status
 * @return bool
 */
function updateOrderStatus($order_id, $status) {
    $valid_statuses = ['pending', 'confirmed', 'preparing', 'out_for_delivery', 'delivered', 'cancelled'];
    
    if (!in_array($status, $valid_statuses)) {
        return false;
    }
    
    if (isset($_SESSION['orders'][$order_id])) {
        $_SESSION['orders'][$order_id]['status'] = $status;
        $_SESSION['orders'][$order_id]['updated_at'] = date('Y-m-d H:i:s');
        return true;
    }
    
    return false;
}

/**
 * Get order status display text
 * @param string $status
 * @return string
 */
function getOrderStatusText($status) {
    $status_texts = [
        'pending' => 'Order Pending',
        'confirmed' => 'Order Confirmed',
        'preparing' => 'Preparing Order',
        'out_for_delivery' => 'Out for Delivery',
        'delivered' => 'Delivered',
        'cancelled' => 'Cancelled'
    ];
    
    return isset($status_texts[$status]) ? $status_texts[$status] : 'Unknown Status';
}

/**
 * Get order status color class
 * @param string $status
 * @return string
 */
function getOrderStatusColor($status) {
    $status_colors = [
        'pending' => 'text-yellow-600 bg-yellow-100',
        'confirmed' => 'text-blue-600 bg-blue-100',
        'preparing' => 'text-orange-600 bg-orange-100',
        'out_for_delivery' => 'text-purple-600 bg-purple-100',
        'delivered' => 'text-green-600 bg-green-100',
        'cancelled' => 'text-red-600 bg-red-100'
    ];
    
    return isset($status_colors[$status]) ? $status_colors[$status] : 'text-gray-600 bg-gray-100';
}

/**
 * Sanitize input data
 * @param string $input
 * @return string
 */
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Validate phone number (Nigerian format)
 * @param string $phone
 * @return bool
 */
function validatePhoneNumber($phone) {
    // Remove all non-numeric characters
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    // Check if it's a valid Nigerian phone number
    if (strlen($phone) === 11 && substr($phone, 0, 1) === '0') {
        return true;
    }
    
    if (strlen($phone) === 13 && substr($phone, 0, 3) === '234') {
        return true;
    }
    
    return false;
}

/**
 * Format phone number for display
 * @param string $phone
 * @return string
 */
function formatPhoneNumber($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    if (strlen($phone) === 11) {
        return substr($phone, 0, 4) . ' ' . substr($phone, 4, 3) . ' ' . substr($phone, 7);
    }
    
    return $phone;
}

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