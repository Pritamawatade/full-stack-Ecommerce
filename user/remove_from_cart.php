<?php
session_start();

if (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];

    // Remove the product from the session cart
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // Re-index the array to avoid issues
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
}
