<?php
session_start();
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $email =  $_SESSION['email'];
    $address = $_POST['address'];
    $total_amount = 0;
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        $total_amount += $_SESSION['cart'][$i]['quantity'] * $_SESSION['cart'][$i]['price'];
    }

    echo '₹' . number_format($total_amount, 2);

    // Check if the image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {



        $imageTmpPath = $_FILES['image']['tmp_name'];


        // Read the image file as binary data

        // Insert order into orders table with image
        $sql = "INSERT INTO orders (user_id, shipping_address, total_amount,  created_at) VALUES (?, ?, ?,  NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isd', $user_id, $address, $total_amount);
        $stmt->execute();
        $order_id = $stmt->insert_id;

        $imgContent = addslashes(file_get_contents($imageTmpPath));
        // Database connection
        $conn = mysqli_connect("localhost", "root", "", "farmer");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert image data into database
        $sql = "UPDATE  orders SET image = '$imgContent' WHERE id = $order_id";
        if (mysqli_query($conn, $sql)) {
            echo "Payment screenshot uploaded successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        $stock_quantity;
        // Insert order items into order_items table
        foreach ($_SESSION['cart'] as $product) {
            $sql1 = "UPDATE products SET stock_quantity = stock_quantity - ? WHERE id = ?";
            $stmt = $conn->prepare($sql1);
            $stmt->bind_param('ii', $product['quantity'], $product['id']);
            $stmt->execute();
            $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('iiid', $order_id, $product['id'], $product['quantity'], $product['price']);
            $stmt->execute();
        }

        $sql = "UPDATE products SET stock_quantity = 123 WHERE id = 7";
        unset($_SESSION['cart']);

        // Redirect to the order confirmation page
        header('Location: order_confirmation.php?order_id=' . $order_id);
        exit();
    } else {
        echo "Error: No image uploaded or there was an error with the upload.<br>";
        echo "Error Code: " . $_FILES['image']['error'];
    }
} else {
    header('Location: checkout.php');
    exit();
}
