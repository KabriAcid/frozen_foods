<?php
/**
 * Order utility functions for Frozen Foods
 */

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
?>