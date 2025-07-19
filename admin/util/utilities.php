<?php
/**
 * Fetch admin dashboard statistics: total orders, total revenue, active users, total products
 * @param PDO $pdo
 * @return array
 */
function getDashboardStats($pdo)
{
    try {
        // Total orders
        $stmt = $pdo->query("SELECT COUNT(*) AS total_orders FROM orders");
        $orders = $stmt->fetch(PDO::FETCH_ASSOC);

        // Total revenue
        $stmt = $pdo->query("SELECT SUM(total_amount) AS total_revenue FROM orders");
        $revenue = $stmt->fetch(PDO::FETCH_ASSOC);

        // Active users (users who have placed at least 1 order)
        $stmt = $pdo->query("SELECT COUNT(DISTINCT user_id) AS active_users FROM orders");
        $activeUsers = $stmt->fetch(PDO::FETCH_ASSOC);

        // Total products
        $stmt = $pdo->query("SELECT COUNT(*) AS total_products FROM products");
        $products = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'total_orders'   => $orders['total_orders'] ?? 0,
            'total_revenue'  => $revenue['total_revenue'] ?? 0,
            'active_users'   => $activeUsers['active_users'] ?? 0,
            'total_products' => $products['total_products'] ?? 0,
        ];
    } catch (PDOException $e) {
        error_log("Error fetching dashboard stats: " . $e->getMessage());
        return [
            'total_orders'   => 0,
            'total_revenue'  => 0,
            'active_users'   => 0,
            'total_products' => $products['total_products'] ?? 0,
        ];
    } catch (PDOException $e) {
        error_log("Error fetching dashboard stats: " . $e->getMessage());
        return [
            'total_orders'   => 0,
            'total_revenue'  => 0,
            'active_users'   => 0,
            'total_products' => 0,
        ];
    }
}

function getRecentOrders($pdo, $limit = 5){
    try {
        $limit = (int)$limit;
        $stmt = $pdo->prepare("SELECT * FROM orders ORDER BY created_at DESC LIMIT $limit");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching recent orders: " . $e->getMessage());
        return [];
    }
}

function getTopProducts($pdo, $limit = 3)
{
    try {
        // Get all products
        $stmt = $pdo->prepare("SELECT id, name, image FROM products ORDER BY id DESC LIMIT $limit");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // For each product, get orders_count and total_revenue
        foreach ($products as &$product) {
            $orderStmt = $pdo->prepare("SELECT COUNT(*) AS orders_count, SUM(total_amount) AS total_revenue FROM orders WHERE product_id = ?");
            $orderStmt->execute([$product['id']]);
            $orderStats = $orderStmt->fetch(PDO::FETCH_ASSOC);
            $product['orders_count'] = (int)($orderStats['orders_count'] ?? 0);
            $product['total_revenue'] = (float)($orderStats['total_revenue'] ?? 0);
        }
        unset($product);

        return $products;
    } catch (PDOException $e) {
        error_log("Error fetching top products: " . $e->getMessage());
        return [];
    }
}

/**
 * Fetch total orders count
 * @param PDO $pdo
 * @return int
 */
function getTotalOrders($pdo)
{
    try {
        $stmt = $pdo->query("SELECT COUNT(*) AS total_orders FROM orders");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($row['total_orders'] ?? 0);
    } catch (PDOException $e) {
        error_log("Error fetching total orders: " . $e->getMessage());
        return 0;
    }
}

/**
 * Fetch total revenue
 * @param PDO $pdo
 * @return float
 */
function getTotalRevenue($pdo)
{
    try {
        $stmt = $pdo->query("SELECT SUM(total) AS total_revenue FROM orders");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (float)($row['total_revenue'] ?? 0);
    } catch (PDOException $e) {
        error_log("Error fetching total revenue: " . $e->getMessage());
        return 0;
    }
}

/**
 * Fetch active users (users who have placed at least 1 order)
 * @param PDO $pdo
 * @return int
 */
function getActiveUsers($pdo)
{
    try {
        $stmt = $pdo->query("SELECT COUNT(DISTINCT user_id) AS active_users FROM orders");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($row['active_users'] ?? 0);
    } catch (PDOException $e) {
        error_log("Error fetching active users: " . $e->getMessage());
        return 0;
    }
}

/**
 * Fetch total products count
 * @param PDO $pdo
 * @return int
 */
function getTotalProducts($pdo)
{
    try {
        $stmt = $pdo->query("SELECT COUNT(*) AS total_products FROM products");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($row['total_products'] ?? 0);
    } catch (PDOException $e) {
        error_log("Error fetching total products: " . $e->getMessage());
        return 0;
    }
}

// Function that retrieves all orders table columns
function getAllOrders($pdo)
{
    try {
        $stmt = $pdo->query("SELECT * FROM orders");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // <-- fetchAll, not fetch
    } catch (PDOException $e) {
        error_log("Error fetching orders: " . $e->getMessage());
        return [];
    }
}

function getOrderStatusCount($pdo, $status) {
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM orders WHERE status = ?");
        $stmt->execute([$status]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($row['count'] ?? 0);
    } catch (PDOException $e) {
        error_log("Error fetching order status count: " . $e->getMessage());
        return 0;
    }
}

// function for getting user by id
function getUserById($pdo, $userId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching user by ID: " . $e->getMessage());
        return null;
    }
}

function getProductById($pdo, $productId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching product by ID: " . $e->getMessage());
        return null;
    }
}

function getOrderByNumber($pdo, $orderNumber) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_number = ?");
        $stmt->execute([$orderNumber]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching order by ID: " . $e->getMessage());
        return null;
    }
}

function getOrderItems($pdo, $orderId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM order_items WHERE order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching order items: " . $e->getMessage());
        return [];
    }
}
