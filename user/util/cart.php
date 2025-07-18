<?php
/**
 * Cart utility functions for Frozen Foods
 */

/**
 * Add item to cart session
 * @param int $product_id
 * @param int $quantity
 * @return bool
 */
function addToCart($product_id, $quantity = 1) {
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
function removeFromCart($product_id) {
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
function updateCartQuantity($product_id, $quantity) {
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
function getCart() {
    return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

/**
 * Get cart total
 * @return float
 */
function getCartTotal() {
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
function getCartItemCount() {
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
function clearCart() {
    unset($_SESSION['cart']);
    return true;
}

/**
 * Validate cart before checkout
 * @return array
 */
function validateCart() {
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
function getCartSubtotal() {
    return getCartTotal();
}

/**
 * Calculate delivery fee
 * @param float $subtotal
 * @return float
 */
function calculateDeliveryFee($subtotal) {
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
function getCartTotals() {
    $subtotal = getCartSubtotal();
    $delivery = calculateDeliveryFee($subtotal);
    $total = $subtotal + $delivery;
    
    return [
        'subtotal' => $subtotal,
        'delivery' => $delivery,
        'total' => $total
    ];
}
?>