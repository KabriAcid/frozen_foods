<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Include required files
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../util/util_products.php';

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed. Only POST requests are accepted.'
    ]);
    exit;
}

try {
    // Validate required fields
    $requiredFields = ['name', 'price', 'in_stock', 'category_id'];
    $missingFields = [];

    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
            $missingFields[] = $field;
        }
    }

    if (!empty($missingFields)) {
        echo json_encode([
            'success' => false,
            'message' => 'Missing required fields: ' . implode(', ', $missingFields)
        ]);
        exit;
    }

    // Validate and sanitize input data
    $productData = [
        'name' => trim($_POST['name']),
        'description' => trim($_POST['description'] ?? ''),
        'price' => floatval($_POST['price']),
        'in_stock' => intval($_POST['in_stock']),
        'category_id' => intval($_POST['category_id']),
        'sku' => trim($_POST['sku'] ?? ''),
        'weight' => trim($_POST['weight'] ?? ''),
        'dimensions' => trim($_POST['dimensions'] ?? ''),
        'is_active' => isset($_POST['is_active']) ? 1 : 0,
        'is_featured' => isset($_POST['is_featured']) ? 1 : 0,
        'meta_title' => trim($_POST['meta_title'] ?? ''),
        'meta_description' => trim($_POST['meta_description'] ?? '')
    ];

    // Validate price and stock
    if ($productData['price'] < 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Price cannot be negative'
        ]);
        exit;
    }

    if ($productData['in_stock'] < 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Stock quantity cannot be negative'
        ]);
        exit;
    }

    // Validate product name length
    if (strlen($productData['name']) < 2) {
        echo json_encode([
            'success' => false,
            'message' => 'Product name must be at least 2 characters long'
        ]);
        exit;
    }

    if (strlen($productData['name']) > 255) {
        echo json_encode([
            'success' => false,
            'message' => 'Product name cannot exceed 255 characters'
        ]);
        exit;
    }

    // Check if category exists
    $categories = getAllCategories($pdo);
    $categoryExists = false;
    foreach ($categories as $category) {
        if ($category['id'] == $productData['category_id']) {
            $categoryExists = true;
            break;
        }
    }

    if (!$categoryExists) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid category selected'
        ]);
        exit;
    }

    // Handle image upload if provided
    $imageName = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadResult = handleProductImageUpload($_FILES['image']);

        if (!$uploadResult['success']) {
            echo json_encode([
                'success' => false,
                'message' => 'Image upload failed: ' . $uploadResult['message']
            ]);
            exit;
        }

        $imageName = $uploadResult['filename'];
    }

    // Add image to product data if uploaded
    if ($imageName) {
        $productData['image'] = $imageName;
    }

    // Check for duplicate SKU if provided
    if (!empty($productData['sku'])) {
        $stmt = $pdo->prepare("SELECT id FROM products WHERE sku = ? AND sku != ''");
        $stmt->execute([$productData['sku']]);
        if ($stmt->fetch()) {
            echo json_encode([
                'success' => false,
                'message' => 'SKU already exists. Please use a unique SKU.'
            ]);
            exit;
        }
    }

    // Check for duplicate product name
    $stmt = $pdo->prepare("SELECT id FROM products WHERE LOWER(name) = LOWER(?)");
    $stmt->execute([$productData['name']]);
    if ($stmt->fetch()) {
        echo json_encode([
            'success' => false,
            'message' => 'A product with this name already exists'
        ]);
        exit;
    }

    // Create the product
    $productId = createProduct($pdo, $productData);

    if ($productId) {
        // Get the created product details
        $newProduct = getProductById($pdo, $productId);

        echo json_encode([
            'success' => true,
            'message' => 'Product added successfully!',
            'data' => [
                'product_id' => $productId,
                'product' => $newProduct
            ]
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to create product. Please try again.'
        ]);
    }
} catch (PDOException $e) {
    error_log("Database error in add-product.php: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error occurred. Please try again later.'
    ]);
} catch (Exception $e) {
    error_log("General error in add-product.php: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'An unexpected error occurred. Please try again.'
    ]);
}
