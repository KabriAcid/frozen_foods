<?php

/**
 * Get all products or filter by category
 */
function getAllProducts(PDO $pdo, $categoryId = null)
{
    try {
        if ($categoryId) {
            $stmt = $pdo->prepare("SELECT p.*, c.name AS category_name FROM products p 
                                   LEFT JOIN categories c ON p.category_id = c.id 
                                   WHERE p.category_id = ? ORDER BY p.created_at DESC");
            $stmt->execute([$categoryId]);
        } else {
            $stmt = $pdo->query("SELECT p.*, c.name AS category_name FROM products p 
                                 LEFT JOIN categories c ON p.category_id = c.id 
                                 ORDER BY p.created_at DESC");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching products: " . $e->getMessage());
        return [];
    }
}

/**
 * Count total number of products
 */
function getTotalProductCount(PDO $pdo)
{
    try {
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM products");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$row['total'];
    } catch (PDOException $e) {
        error_log("Error fetching total product count: " . $e->getMessage());
        return 0;
    }
}

/**
 * Count products with stock < threshold
 */
function getLowStockCount(PDO $pdo, $threshold = 10)
{
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) AS in_stock FROM products WHERE stock_quantity < ?");
        $stmt->execute([$threshold]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$row['in_stock'];
    } catch (PDOException $e) {
        error_log("Error fetching low stock count: " . $e->getMessage());
        return 0;
    }
}

/**
 * Count products with 0 stock
 */
function getOutOfStockCount(PDO $pdo)
{
    try {
        $stmt = $pdo->query("SELECT COUNT(*) AS out_of_stock FROM products WHERE stock_quantity = 0");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$row['out_of_stock'];
    } catch (PDOException $e) {
        error_log("Error fetching out-of-stock count: " . $e->getMessage());
        return 0;
    }
}

/**
 * Count total number of categories
 */
function getCategoryCount(PDO $pdo)
{
    try {
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM categories");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$row['total'];
    } catch (PDOException $e) {
        error_log("Error fetching category count: " . $e->getMessage());
        return 0;
    }
}

/**
 * Combine product stats for dashboard
 */
function getProductStats(PDO $pdo)
{
    return [
        'total'       => getTotalProductCount($pdo),
        'in_stock'   => getLowStockCount($pdo),
        'out_of_stock' => getOutOfStockCount($pdo),
        'categories'  => getCategoryCount($pdo),
    ];
}

/**
 * Delete product by ID
 */
function deleteProduct(PDO $pdo, $productId)
{
    try {
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$productId]);
    } catch (PDOException $e) {
        error_log("Error deleting product: " . $e->getMessage());
        return false;
    }
}

/**
 * Fetch all categories (used in dropdowns)
 */
function getAllCategories(PDO $pdo)
{
    try {
        $stmt = $pdo->query("SELECT * FROM categories ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching categories: " . $e->getMessage());
        return [];
    }
}

/**
 * Get a single product by ID (for editing)
 */
function getProductById(PDO $pdo, $productId)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching product by ID: " . $e->getMessage());
        return null;
    }
}
/**
 * Product Utility Functions
 * Contains all database operations and helper functions for product management from Bolt AI
 */

/**
 * Get product images (additional images beyond main image)
 */
function getProductImages($pdo, $productId) {
    try {
        $stmt = $pdo->prepare("
            SELECT * FROM product_images 
            WHERE product_id = ? 
            ORDER BY sort_order ASC, created_at ASC
        ");
        $stmt->execute([$productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching product images: " . $e->getMessage());
        return [];
    }
}

/**
 * Get recent orders for a specific product
 */
function getRecentOrdersForProduct($pdo, $productId, $limit = 5) {
    try {
        $stmt = $pdo->prepare("
            SELECT o.*, u.first_name, u.last_name,
                   CONCAT(u.first_name, ' ', u.last_name) as customer_name
            FROM orders o
            LEFT JOIN users u ON o.user_id = u.id
            WHERE o.product_id = ?
            ORDER BY o.created_at DESC
            LIMIT ?
        ");
        $stmt->execute([$productId, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching recent orders: " . $e->getMessage());
        return [];
    }
}

/**
 * Get product statistics
 */

/**
 * Update product information
 */
function updateProduct($pdo, $productId, $data) {
    try {
        $sql = "UPDATE products SET ";
        $fields = [];
        $values = [];
        
        // Build dynamic update query based on provided data
        $allowedFields = [
            'name', 'description', 'price', 'in_stock', 'category_id', 
            'sku', 'weight', 'dimensions', 'is_active', 'is_featured',
            'meta_title', 'meta_description', 'image'
        ];
        
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $fields[] = "$field = ?";
                $values[] = $data[$field];
            }
        }
        
        if (empty($fields)) {
            return false;
        }
        
        $sql .= implode(', ', $fields);
        $sql .= ", updated_at = NOW() WHERE id = ?";
        $values[] = $productId;
            
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($values);
    } catch (PDOException $e) {
        error_log("Error updating product: " . $e->getMessage());
        return false;
    }
}

/**
 * Create new product
 */
function createProduct($pdo, $data) {
    try {
        $sql = "INSERT INTO products (
            name, description, price, in_stock, category_id, 
            sku, weight, dimensions, is_active, is_featured,
            meta_title, meta_description, image, created_at, updated_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            $data['name'],
            $data['description'] ?? null,
            $data['price'],
            $data['in_stock'] ?? 0,
            $data['category_id'] ?? null,
            $data['sku'] ?? null,
            $data['weight'] ?? null,
            $data['dimensions'] ?? null,
            $data['is_active'] ?? 1,
            $data['is_featured'] ?? 0,
            $data['meta_title'] ?? null,
            $data['meta_description'] ?? null,
            $data['image'] ?? null
        ]);
        
        if ($result) {
            return $pdo->lastInsertId();
        }
        return false;
    } catch (PDOException $e) {
        error_log("Error creating product: " . $e->getMessage());
        return false;
    }
}


/**
 * Search products
 */
function searchProducts($pdo, $searchTerm, $categoryId = null, $limit = 20, $offset = 0) {
    try {
        $sql = "
            SELECT p.*, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE (p.name LIKE ? OR p.description LIKE ? OR p.sku LIKE ?)
        ";
        
        $params = ["%$searchTerm%", "%$searchTerm%", "%$searchTerm%"];
        
        if ($categoryId) {
            $sql .= " AND p.category_id = ?";
            $params[] = $categoryId;
        }
        
        $sql .= " ORDER BY p.created_at DESC LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error searching products: " . $e->getMessage());
        return [];
    }
}

/**
 * Get products by category
 */
function getProductsByCategory($pdo, $categoryId, $limit = 20, $offset = 0) {
    try {
        $stmt = $pdo->prepare("
            SELECT p.*, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE p.category_id = ?
            ORDER BY p.created_at DESC
            LIMIT ? OFFSET ?
        ");
        $stmt->execute([$categoryId, $limit, $offset]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching products by category: " . $e->getMessage());
        return [];
    }
}

/**
 * Get low stock products
 */
function getLowStockProducts($pdo, $threshold = 10) {
    try {
        $stmt = $pdo->prepare("
            SELECT p.*, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE p.in_stock < ? AND p.in_stock > 0
            ORDER BY p.in_stock ASC
        ");
        $stmt->execute([$threshold]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching low stock products: " . $e->getMessage());
        return [];
    }
}

/**
 * Get out of stock products
 */
function getOutOfStockProducts($pdo) {
    try {
        $stmt = $pdo->prepare("
            SELECT p.*, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE p.in_stock <= 0
            ORDER BY p.updated_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching out of stock products: " . $e->getMessage());
        return [];
    }
}

/**
 * Update product stock
 */
function updateProductStock($pdo, $productId, $newStock) {
    try {
        $stmt = $pdo->prepare("
            UPDATE products 
            SET in_stock = ?, updated_at = NOW() 
            WHERE id = ?
        ");
        return $stmt->execute([$newStock, $productId]);
    } catch (PDOException $e) {
        error_log("Error updating product stock: " . $e->getMessage());
        return false;
    }
}

/**
 * Add product image
 */
function addProductImage($pdo, $productId, $imagePath, $sortOrder = 0) {
    try {
        $stmt = $pdo->prepare("
            INSERT INTO product_images (product_id, image_path, sort_order, created_at) 
            VALUES (?, ?, ?, NOW())
        ");
        return $stmt->execute([$productId, $imagePath, $sortOrder]);
    } catch (PDOException $e) {
        error_log("Error adding product image: " . $e->getMessage());
        return false;
    }
}

/**
 * Delete product image
 */
function deleteProductImage($pdo, $imageId) {
    try {
        $stmt = $pdo->prepare("DELETE FROM product_images WHERE id = ?");
        return $stmt->execute([$imageId]);
    } catch (PDOException $e) {
        error_log("Error deleting product image: " . $e->getMessage());
        return false;
    }
}

/**
 * Get featured products
 */
function getFeaturedProducts($pdo, $limit = 10) {
    try {
        $stmt = $pdo->prepare("
            SELECT p.*, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE p.is_featured = 1 AND p.is_active = 1
            ORDER BY p.created_at DESC
            LIMIT ?
        ");
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching featured products: " . $e->getMessage());
        return [];
    }
}

/**
 * Toggle product status (active/inactive)
 */
function toggleProductStatus($pdo, $productId) {
    try {
        $stmt = $pdo->prepare("
            UPDATE products 
            SET is_active = CASE WHEN is_active = 1 THEN 0 ELSE 1 END,
                updated_at = NOW()
            WHERE id = ?
        ");
        return $stmt->execute([$productId]);
    } catch (PDOException $e) {
        error_log("Error toggling product status: " . $e->getMessage());
        return false;
    }
}

/**
 * Toggle product featured status
 */
function toggleProductFeatured($pdo, $productId) {
    try {
        $stmt = $pdo->prepare("
            UPDATE products 
            SET is_featured = CASE WHEN is_featured = 1 THEN 0 ELSE 1 END,
                updated_at = NOW()
            WHERE id = ?
        ");
        return $stmt->execute([$productId]);
    } catch (PDOException $e) {
        error_log("Error toggling product featured status: " . $e->getMessage());
        return false;
    }
}

/**
 * Get product count by status
 */
function getProductCountByStatus($pdo, $status = 'active') {
    try {
        $sql = "SELECT COUNT(*) as count FROM products WHERE ";
        
        switch ($status) {
            case 'active':
                $sql .= "is_active = 1";
                break;
            case 'inactive':
                $sql .= "is_active = 0";
                break;
            case 'featured':
                $sql .= "is_featured = 1";
                break;
            case 'low_stock':
                $sql .= "in_stock < 10 AND in_stock > 0";
                break;
            case 'out_of_stock':
                $sql .= "in_stock <= 0";
                break;
            default:
                $sql .= "1 = 1"; // All products
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    } catch (PDOException $e) {
        error_log("Error getting product count by status: " . $e->getMessage());
        return 0;
    }
}

/**
 * Duplicate product
 */
function duplicateProduct($pdo, $productId) {
    try {
        // Get original product
        $original = getProductById($pdo, $productId);
        if (!$original) {
            return false;
        }
        
        // Create new product data
        $newData = $original;
        unset($newData['id'], $newData['created_at'], $newData['updated_at'], $newData['category_name']);
        $newData['name'] = $original['name'] . ' (Copy)';
        $newData['sku'] = $original['sku'] ? $original['sku'] . '_copy' : null;
        
        return createProduct($pdo, $newData);
    } catch (PDOException $e) {
        error_log("Error duplicating product: " . $e->getMessage());
        return false;
    }
}

/**
 * Handle file upload for product images
 */
function handleProductImageUpload($file, $uploadDir = '../assets/uploads/') {
    try {
        // Validate file
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return ['success' => false, 'message' => 'No file uploaded'];
        }
        
        // Check file size (max 10MB)
        if ($file['size'] > 10 * 1024 * 1024) {
            return ['success' => false, 'message' => 'File size too large (max 10MB)'];
        }
        
        // Check file type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        
        if (!in_array($mimeType, $allowedTypes)) {
            return ['success' => false, 'message' => 'Invalid file type. Only JPG, PNG, GIF, and WebP are allowed'];
        }
        
        // Generate unique filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid('product_') . '.' . $extension;
        $filepath = $uploadDir . $filename;
        
        // Create upload directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Move uploaded file
        if (move_uploaded_file($file['tmp_name'], $filepath)) {
            return ['success' => true, 'filename' => $filename, 'filepath' => $filepath];
        } else {
            return ['success' => false, 'message' => 'Failed to move uploaded file'];
        }
    } catch (Exception $e) {
        error_log("Error handling product image upload: " . $e->getMessage());
        return ['success' => false, 'message' => 'Upload failed: ' . $e->getMessage()];
    }
}

?>