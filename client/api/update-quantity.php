<?php
session_start();
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['product_id'], $data['action'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid parameters.']);
        exit;
    }

    $product_id = $data['product_id'];
    $action = $data['action'];
    $cart = $_SESSION['cart'] ?? [];

    if (!isset($cart[$product_id])) {
        echo json_encode(['success' => false, 'message' => 'Product not found in cart.']);
        exit;
    }

    if ($action === 'increase') {
        $cart[$product_id]['quantity'] += 1;
    } elseif ($action === 'decrease') {
        if ($cart[$product_id]['quantity'] > 1) {
            $cart[$product_id]['quantity'] -= 1;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        exit;
    }

    $_SESSION['cart'] = $cart;

    // Return new totals
    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    $delivery_fee = $subtotal >= 10000 ? 0 : 500;
    $total = $subtotal + $delivery_fee;

    echo json_encode([
        'success' => true,
        'message' => 'Cart updated.',
        'cart' => $cart,
        'subtotal' => $subtotal,
        'delivery_fee' => $delivery_fee,
        'total' => $total
    ]);
} catch (Throwable $e) {
    error_log('Update quantity error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'An unexpected error occurred. Please try again.'
    ]);
}
