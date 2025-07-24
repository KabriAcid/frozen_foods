<?php
session_start();
header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);
    $itemId = $data['id'];

    if (isset($_SESSION['cart'][$itemId])) {
        unset($_SESSION['cart'][$itemId]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Item not found']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    error_log('Remove cart item error: ' . $e->getMessage());
}
