<?php
session_start();
include('../config/db.php');

if (!isset($_GET['order_id'])) {
    header('Location: index.php');
    exit();
}

$order_id = $_GET['order_id'];

// Fetch order details
$sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

// Fetch order items
$sql = "SELECT * FROM order_items INNER JOIN products ON order_items.product_id = products.id WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $order_id);
$stmt->execute();
$order_items = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Include Tailwind CSS -->
    <link rel="stylesheet" href="path-to-tailwind.css">
</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-8">Thank you for your order!</h1>
        
        <h2 class="text-2xl font-semibold mb-4">Order Details</h2>
        <p><strong>Order ID:</strong> <?php echo $order['id']; ?></p>
        <p><strong>Order Date:</strong> <?php echo $order['created_at']; ?></p>
        <p><strong>Total Amount:</strong> ₹<?php echo $order['total_amount'] ?></p>
        
        <h2 class="text-2xl font-semibold mt-8 mb-4">Items</h2>
        <ul>
            <?php while ($item = $order_items->fetch_assoc()): ?>
                <li><?php echo $item['name']; ?> - <?php echo $item['quantity']; ?> x $<?php echo number_format($item['price'], 2); ?></li>
            <?php endwhile; ?>
        </ul>
        
        <a href="./products.php" class="bg-blue-500 text-white px-4 py-2 mt-6 inline-block rounded">Continue Shopping</a>
    </div>
</body>
</html>
