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
        $stmt = $pdo->prepare("SELECT * FROM orders ORDER BY created_at DESC LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching recent orders: " . $e->getMessage());
        return [];
    }
}