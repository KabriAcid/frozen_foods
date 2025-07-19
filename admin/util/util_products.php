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
        $stmt = $pdo->prepare("SELECT COUNT(*) AS low_stock FROM products WHERE stock_quantity < ?");
        $stmt->execute([$threshold]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$row['low_stock'];
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
        'low_stock'   => getLowStockCount($pdo),
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
