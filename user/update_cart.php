<?php
session_start();

if (isset($_POST['update_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Update the quantity in the session cart
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['id'] == $product_id) {
            $_SESSION['cart'][$key]['quantity'] = $quantity;
            break;
        }
    }

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
}
