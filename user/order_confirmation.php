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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-gray-800 animate-bounce">Thank you for your order!</h1>
        
        <h2 class="text-2xl font-semibold text-gray-700 mb-4 animate-pulse">Order Details</h2>
        <p class="text-gray-600"><strong class="font-bold">Order ID:</strong> <?php echo $order['id']; ?></p>
        <p class="text-gray-600"><strong class="font-bold">Order Date:</strong> <?php echo $order['created_at']; ?></p>
        <p class="text-gray-600"><strong class="font-bold">Total Amount:</strong> ₹<?php echo $order['total_amount'] ?></p>
        
        <h2 class="text-2xl font-semibold text-gray-700 mb-4 animate-pulse">Items</h2>
        <ul class="list-none grid grid-cols-1 gap-4">
            <?php while ($item = $order_items->fetch_assoc()): ?>
                <li class="bg-gray-100 p-4 rounded-lg shadow-md animate-fadeIn"><?php echo $item['name']; ?> - <?php echo $item['quantity']; ?> x $<?php echo number_format($item['price'], 2); ?></li>
            <?php endwhile; ?>
        </ul>
        
        <a href="./products.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6 transition-all duration-300 ease-in-out animate-spin">Continue Shopping</a>
    </div>
</body>
</html>