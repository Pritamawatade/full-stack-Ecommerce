

<?php
include '../includes/header.php';

if (isset($_POST['add_to_cart'])) {

    if (!isset($_SESSION['user_id'])) {
        echo '<script>alert("You need to login first to add products to cart!")</script>';
        echo "<script>window.location.href='login.php'</script>";
        exit();
    }
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $total_price = $product_price * $product_quantity;

    // Check if the cart session variable is set, if not, create it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product is already in the cart
    $product_exists = false;
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['id'] == $product_id) {
            $_SESSION['cart'][$key]['quantity'] += $product_quantity;
            $product_exists = true;
            break;
        }
    }

    // If the product is not in the cart, add it
    if (!$product_exists) {
        $_SESSION['cart'][] = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => $product_quantity,
            'total_price' => $product_price * $product_quantity
        );
    }

    // Redirect back to the product page
    
    echo "<script>window.location.href = 'products.php';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en" class="bg-green-300 mt-36">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Include Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css">

</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-8">Your Cart</h1>
        
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Loop through each product in the cart and display it -->
                <?php foreach ($_SESSION['cart'] as $key => $product): ?>
                    <div class="border p-4 rounded shadow-md flex flex-col">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="mb-4 w-full h-48 object-contain rounded">
                        <h2 class="text-xl font-semibold mb-2"><?php echo $product['name']; ?></h2>
                        <!-- <p class="text-gray-600 mb-2"><?php echo $product['description']; ?></p> -->
                        <p class="text-lg font-bold mb-4">$<?php echo number_format($product['price'], 2); ?></p>
                        
                        <!-- Update Quantity and Remove Button Flexbox -->
                        <div class="flex items-center justify-between mt-auto">
                            <!-- Update Quantity Form -->
                            <form action="update_cart.php" method="POST" class="flex items-center">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" min="1" class="w-16 p-1 border rounded mr-2 transition duration-300 ease-in-out hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white">
                                <button type="submit" name="update_cart" class="bg-blue-500 text-white px-2 py-1 rounded transition duration-300 ease-in-out hover:bg-blue-600 focus:outline-none focus:shadow-outline focus:bg-blue-700 transform hover:scale-105">Update</button>
                            </form>

                            <!-- Remove from Cart Form -->
                            <form action="remove_from_cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <button type="submit" name="remove_from_cart" class="bg-red-500 text-white px-2 py-1 rounded transition duration-300 ease-in-out hover:bg-red-600 focus:outline-none focus:shadow-outline focus:bg-red-700 transform hover:scale-105">Remove</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-8 text-right">
                <a href="checkout.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-white transition duration-300 ease-in-out">Proceed to Checkout</a>
            </div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
        
    </div>
</body>
</html>
