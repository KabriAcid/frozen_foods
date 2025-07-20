<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require __DIR__ . '/../config/database.php';

$user_id = $_SESSION['user_id'];

// Update last login timestamp for the user
$stmt = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
$stmt->execute([$user_id]);

// Destroy session
session_unset();
session_destroy();

// Redirect to homepage/login
header("Location: index.php");
exit();
