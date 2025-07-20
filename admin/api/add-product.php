<?php
header('Content-Type: application/json');
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../util/util_products.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors in JSON response

function sanitizeInput($input)
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function validateRequired($value, $fieldName)
{
    if (empty(trim($value))) {
        return "$fieldName is required";
    }
    return null;
}

function validatePrice($price)
{
    if (!is_numeric($price) || $price < 0) {
        return "Price must be a valid positive number";
    }
    return null;
}

function validateStock($stock)
{
    if (!is_numeric($stock) || $stock < 0 || !filter_var($stock, FILTER_VALIDATE_INT)) {
        return "Stock must be a valid positive integer";
    }
    return null;
}

function validateImage($file)
{
    if (!isset($file) || $file['error'] === UPLOAD_ERR_NO_FILE) {
        return null; // Image is optional
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return "File upload error occurred";
    }

    // Check file size (10MB max)
    if ($file['size'] > 10 * 1024 * 1024) {
        return "File size too large. Maximum size is 10MB";
    }

    // Check file type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mimeType, $allowedTypes)) {
        return "Invalid file type. Only JPG, PNG, GIF, and WebP are allowed";
    }

    return null;
}

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    // Validate and sanitize inputs
    $errors = [];

    // Required fields validation
    $name = $_POST['name'] ?? '';
    $category_id = $_POST['category_id'] ?? '';
    $price = $_POST['price'] ?? '';
    $in_stock = $_POST['in_stock'] ?? '';

    if ($error = validateRequired($name, 'Product name')) $errors[] = $error;
    if ($error = validateRequired($category_id, 'Category')) $errors[] = $error;
    if ($error = validateRequired($price, 'Price')) $errors[] = $error;
    if ($error = validateRequired($in_stock, 'Stock quantity')) $errors[] = $error;

    // Validate price and stock
    if ($error = validatePrice($price)) $errors[] = $error;
    if ($error = validateStock($in_stock)) $errors[] = $error;

    // Validate image if provided
    if (isset($_FILES['image'])) {
        if ($error = validateImage($_FILES['image'])) $errors[] = $error;
    }

    // Check if category exists
    if (!empty($category_id)) {
        $stmt = $pdo->prepare("SELECT id FROM categories WHERE id = ?");
        $stmt->execute([$category_id]);
        if (!$stmt->fetch()) {
            $errors[] = "Invalid category selected";
        }
    }

    if (!empty($errors)) {
        echo json_encode([
            'success' => false,
            'message' => implode(', ', $errors)
        ]);
        exit;
    }

    // Sanitize inputs
    $name = sanitizeInput($name);
    $sku = sanitizeInput($_POST['sku'] ?? '');
    $description = sanitizeInput($_POST['description'] ?? '');
    $weight = sanitizeInput($_POST['weight'] ?? '');
    $dimensions = sanitizeInput($_POST['dimensions'] ?? '');
    $meta_title = sanitizeInput($_POST['meta_title'] ?? '');
    $meta_description = sanitizeInput($_POST['meta_description'] ?? '');

    // Convert checkboxes to boolean
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    // Handle image upload
    $imageName = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../../assets/uploads/';

        // Create upload directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generate unique filename
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageName = uniqid('product_') . '.' . $extension;
        $uploadPath = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            throw new Exception('Failed to upload image');
        }
    }

    // Insert product into database
    $sql = "INSERT INTO products (name, sku, description, category_id, price, in_stock, weight, dimensions, image, is_active, is_featured, meta_title, meta_description, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        $name,
        $sku,
        $description,
        $category_id,
        $price,
        $in_stock,
        $weight,
        $dimensions,
        $imageName,
        $is_active,
        $is_featured,
        $meta_title,
        $meta_description
    ]);

    if ($result) {
        echo json_encode([
            'success' => true,
            'message' => 'Product added successfully',
            'product_id' => $pdo->lastInsertId()
        ]);
    } else {
        throw new Exception('Failed to save product to database');
    }
} catch (Exception $e) {
    // Log error for debugging
    error_log("Add Product Error: " . $e->getMessage());

    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while adding the product: ' . $e->getMessage()
    ]);
}
