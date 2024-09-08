<?php

include './config.php';

use PHPMailer\PHPMailer\PHPMailer;

require 'C:\xampp\htdocs\E-commerce\PHPMailer-master\PHPMailer-master\src/Exception.php';
require 'C:\xampp\htdocs\E-commerce\PHPMailer-master\PHPMailer-master\src/PHPMailer.php';
require 'C:\xampp\htdocs\E-commerce\PHPMailer-master\PHPMailer-master\src/SMTP.php';


session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include('../config/db.php');

// Fetch user details if needed (e.g., pre-fill shipping info)
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($query);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-8">Checkout</h1>

        <!-- Display the items in the cart -->
        <h2 class="text-2xl font-semibold mb-6">Order Summary</h2>
        <div class="bg-white p-6 rounded shadow-md">
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <ul class="mb-4">
                    <?php foreach ($_SESSION['cart'] as $product): ?>
                        <li class="mb-2">
                            <?php echo $product['name']; ?> - <?php echo $product['quantity']; ?> x &#x20B9;<?php echo number_format($product['price'], 2); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <p class="text-xl font-bold">

                    Total: <?php
                            $total = 0;
                            for ($i = 0; $i < count($_SESSION['cart']); $i++)
                                $total += $_SESSION['cart'][$i]['quantity'] * $_SESSION['cart'][$i]['price'];

                            echo '₹' . number_format($total, 2);

                            ?>

                </p>

            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>

        </div>
        <!-- Shipping Information Form -->
        <h2 class="text-2xl font-semibold mb-6 mt-8">Shipping Information</h2>
        
        <form action="payment.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
           

            <input type="submit" value="Place Order" class="bg-green-500 text-white px-4 py-2 rounded">
        </form>
        <?php


        // Assuming you've already captured order details in an array or from the session
        $orderDetails = $_SESSION['cart']; // Example, replace with your actual order details retrieval logic
        $totalPrice = 0;
        $productList = '';

        // Loop through the cart items to generate order details for the email
        foreach ($orderDetails as $item) {
            $productList .= $item['name'] . " - Quantity: " . $item['quantity'] . " - Price: $" . number_format($item['price'], 2) . "\n";
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Create the order confirmation message
        $orderMessage = "Thank you for your order with Farmkart!\n\n";
        $orderMessage .= "Your order details are as follows:\n";
        $orderMessage .= $productList;
        $orderMessage .= "\nTotal Price: $" . number_format($totalPrice, 2) . "\n\n";
        $orderMessage .= "Your products will reach you in 3 working days.\n";
        $orderMessage .= "Thank you for shopping with us!\n\nFarmkart Team";

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $place_your_email;  // Replace with your email
        $mail->Password = $email_password;  // Replace with your email password or app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($place_your_email, 'Farmkart');
        $mail->addAddress($user['email'], 'Farmkart'); // Use the customer's email address
        $mail->Subject = 'Order Confirmation - Farmkart';
        $mail->Body = $orderMessage;

        if ($mail->send()) {
            
        } else {
            header('Location: ./register.php');
        }





        ?>
    </div>
</body>

</html>