<?php
include '../includes/header.php';
include '../config/db.php';

$sql = "SELECT * FROM Products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" class="bg-gradient-to-r from-green-600  to-green-500">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css">
</head>

<body style="overflow-x: hidden;" class="min-h-screen" >
<div class="container min-w-96 mx-auto mt-10 flex items-center justify-center">
    <!-- Search Bar -->
    <div class="mb-8 w-full max-w-md relative mt-20">
        <input
            type="text"
            id="search-input"
            placeholder="Search for products..."
            class="w-full p-4 pl-12 border-2 border-green-600 rounded-full bg-green-700 text-white placeholder-white placeholder:text-lg focus:outline-none focus:border-green-500 focus:bg-green-600 focus:ring-2 focus:ring-green-300"
            onkeyup="searchProducts()">
        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
    </div>
</div>


    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-8">Our Products</h1>
        <div id="products-grid" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="product-card border p-4 rounded shadow cursor-pointer">
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="mb-4 w-full h-54 object-cover">
                <h2 class="product-name text-xl font-semibold"><?php echo $row['name']; ?></h2>
                <p class="text-gray-600"><?php echo $row['description']; ?></p>
                <p class="text-lg font-bold mt-2">$<?php echo number_format($row['price'], 2); ?></p>
                <form action="cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                    <input type="hidden" name="product_quantity" value="1">
                    <button type="submit" name="add_to_cart" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Add to Cart</button>
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>


        <!-- Product Details Section
        <div id="product-details" class="w-auto mt-10 hidden flex item-center justify-center ">
            <div class="border p-4 rounded shadow">
                <img id="details-image" src="" alt="" class="mb-4 w-full h-48 object-cover">
                <h2 id="details-name" class="text-xl font-semibold  "></h2>
                <p id="details-description" class="text-gray-600 max-w-xs"></p>
                <p id="details-price" class="text-lg font-bold mt-2  "></p>
                <button class="bg-blue-500 text-white px-4 py-2 mt-4 rounded ">Add to Cart</button>
        </div> -->
    </div>
</div>

<script>
// function showDetails(productId) {
//     // Use AJAX or Fetch API to get the product details by productId
//     fetch('get_product_details.php?id=' + productId)
//         .then(response => response.json())
//         .then(data => {
//             // Populate the details section with the fetched data
//             document.getElementById('details-image').src = data.image;
//             document.getElementById('details-name').textContent = data.name;
//             document.getElementById('details-description').textContent = data.description;
//             document.getElementById('details-price').textContent = '₹' + parseFloat(data.price).toFixed(2);

//             // Show the details section
//             document.getElementById('product-details').classList.remove('hidden');
//         });
// }

function searchProducts() {
    let input = document.getElementById('search-input').value.toLowerCase();
    let productCards = document.querySelectorAll('#products-grid .product-card');

    productCards.forEach(function(card) {
        let productName = card.querySelector('.product-name').textContent.toLowerCase();
        if (productName.includes(input)) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}


</script>

</body>
</html>
<?php 
include '../includes/footer.php';
?>