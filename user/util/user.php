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
?>