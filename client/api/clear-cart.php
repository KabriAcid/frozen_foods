<?php
session_start();
header('Content-Type: application/json');

try {
    $_SESSION['cart'] = [];
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    error_log('Clear cart error: ' . $e->getMessage());
}
