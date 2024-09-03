<?php
include '../config/db.php';
session_start();
if ($_SESSION['isadmin'] != 1) {
    header('location: ../index.php');
} else {
    echo "";
}

?>
<!-- admin_panel.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/ui"></script>
    <style>
        /* Custom styles for animations */
        .slide-in-left {
            animation: slide-in-left 0.5s ease-out forwards;
        }

        @keyframes slide-in-left {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .fade-in {
            animation: fade-in 0.5s ease-in-out forwards;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .scale-up {
            animation: scale-up 0.3s ease-out forwards;
        }

        @keyframes scale-up {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        i {
            margin-right: 10px;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Container for the Admin Panel -->
    <div class="flex min-h-screen">

        <!-- Sidebar Menu -->
        <div class="w-1/4 bg-green-700 text-white flex flex-col justify-between slide-in-left">
            <div>
                <h2 class="text-2xl font-bold p-6 transition duration-500 ease-in-out transform hover:scale-105">Admin Panel</h2>
                <ul>
                    <li class="p-4 hover:bg-green-800 cursor-pointer transition duration-300 ease-in-out transform hover:translate-x-2" onclick="showSection('users')">
                        <i class="fa-solid fa-user"></i>
                        Show users

                    </li>
                    <li class="p-4 hover:bg-green-800 cursor-pointer transition duration-300 ease-in-out transform hover:translate-x-2" onclick="showSection('products')">
                        <i class="fa-solid fa-layer-group"></i>
                        Show All Products
                    </li>

                    <li class="p-4 hover:bg-green-800 cursor-pointer transition duration-300 ease-in-out transform hover:translate-x-2" onclick="showSection('add-product')">
                        <i class="fa-solid fa-plus"></i>
                        Add New Product
                    </li>

                    <li class="p-4 hover:bg-green-800 cursor-pointer transition duration-300 ease-in-out transform hover:translate-x-2">
                        <p class="flex items-center space-x-2" onclick="showSection('deleteProduct')">
                            <i class="fa-regular fa-trash-can"></i>
                            Delete products
                        </p>
                    </li>

                    <!-- Add this snippet to the menu bar section in your admin panel -->
                    <li class="p-4 hover:bg-green-800 cursor-pointer transition duration-300 ease-in-out transform hover:translate-x-2">
                        <p class="flex items-center space-x-2" onclick="showSection('Update')">
                            <i class="fa-regular fa-pen-to-square"></i>
                            Update product
                        </p>
                    </li>

                    <!-- Add this snippet to the menu bar section in your admin panel -->
                    <li class="p-4 hover:bg-green-800 cursor-pointer transition duration-300 ease-in-out transform hover:translate-x-2">
                        <p class="flex items-center space-x-2" onclick="order('All-orders')">
                            <i class="fa-solid fa-wallet"></i>
                            All orders
                        </p>
                    </li>

                    <li class="p-4 hover:bg-green-800 cursor-pointer transition duration-300 ease-in-out transform hover:translate-x-2">
                        <p class="flex items-center space-x-2" onclick="showSection('completeOrder')">
                            <i class="fa-solid fa-clipboard-check"></i>
                            Order complete
                        </p>
                    </li>



                    <!-- Add more menu items as needed -->
                </ul>
            </div>
            <div class="p-6">
                <a href="admin_logout.php" class="text-white hover:text-red-500 transition duration-300 ease-in-out transform hover:translate-y-1">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout</a>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="w-3/4 bg-white p-6" id="main-content">
            <!-- Dynamic Content goes here -->
            <div id="users" class="hidden fade-in">
                <h2 class="text-xl font-bold mb-4">User List</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="w-1/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">ID</th>
                                <th class="w-2/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Name</th>
                                <th class="w-2/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Email</th>
                                <th class="w-2/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Phone</th>
                                <th class="w-3/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Address</th>
                                <th class="w-1/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Role</th>
                                <th class="w-1/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php


                            // Fetch users from the database
                            $sql = "SELECT * FROM users where role='user'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr class="hover:bg-green-100 transition duration-300 ease-in-out transform hover:scale-105">';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['id'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['name'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['email'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['phone'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['address'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['role'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['created_at'] . '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="7" class="text-center px-6 py-4">No users found.</td></tr>';
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Show All Products Section -->
            <div id="products" class="hidden fade-in">
                <h2 class="text-xl font-bold mb-4">Products List</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="w-1/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">ID</th>
                                <th class="w-2/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Name</th>
                                <th class="w-3/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Description</th>
                                <th class="w-1/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Category</th>
                                <th class="w-1/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Price</th>
                                <th class="w-2/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Image</th>
                                <th class="w-1/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Stock Quantity</th>
                                <th class="w-1/12 px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium uppercase tracking-wider">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php
                            // Fetch products from the database
                            $sql = "SELECT * FROM products";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr class="hover:bg-green-100 transition duration-300 ease-in-out transform hover:scale-105">';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['id'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['name'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . substr($row['description'], 0, 50) . '...</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['category_id'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">$' . number_format($row['price'], 2) . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200"><img src="' . $row['image'] . '" alt="' . $row['name'] . '" class="h-20 w-20 object-cover rounded-md shadow-md transition duration-500 ease-in-out transform hover:scale-110"></td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['stock_quantity'] . '</td>';
                                    echo '<td class="px-6 py-4 border-b border-gray-200">' . $row['created_at'] . '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="8" class="text-center px-6 py-4">No products found.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Add New Product Section -->
            <div id="add-product" class="hidden fade-in">
                <h2 class="text-xl font-bold mb-4">Add New Product</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="space-y-6 bg-white p-8 shadow-md rounded-md transition duration-500 ease-in-out transform hover:scale-105">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <input type="text" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required></textarea>
                    </div>
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category ID</label>
                        <input type="number" name="category_id" id="category_id" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" id="price" step="0.01" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Image URL</label>
                        <input type="url" name="image" id="image" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    </div>
                    <div>
                        <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                        <input type="number" name="stock_quantity" id="stock_quantity" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" name="add_product" class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300 ease-in-out">Add Product</button>
                    </div>
                </form>
            </div>

            <?php
            // Handle form submission for adding a new product
            if (isset($_POST['add_product'])) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $category_id = $_POST['category_id'];
                $price = $_POST['price'];
                $image = $_POST['image']; // URL of the image
                $stock_quantity = $_POST['stock_quantity'];

                // Insert new product into the database
                $sql = "INSERT INTO products (name, description, category_id, price, image, stock_quantity, created_at, updated_at)
            VALUES ('$name', '$description', '$category_id', '$price', '$image', '$stock_quantity', NOW(), NOW())";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='text-green-500'>New product added successfully!</p>";
                } else {
                    echo "<p class='text-red-500'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            }
            ?>

            <div id="All-orders" class="hidden fade-in">

            </div>

            <div id="deleteProduct" class="hidden fade-in">

                <h2 class="text-2xl font-bold mb-6 animate-pulse text-green-700">Delete Product</h2>

                <!-- Form to enter Product ID -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="deleteProductForm" method="POST" class="flex flex-col items-center w-full max-w-sm p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <label for="productId" class="block text-gray-700 text-sm font-bold mb-2">Enter Product ID:</label>
                    <input type="number" id="productId" name="productId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent mb-4" placeholder="Product ID" required>

                    <!-- Delete Button with Animation -->
                    <button type="submit" name="deleteProduct" class="bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-red-600 transform hover:scale-105 transition-transform duration-200 ease-out">
                        Delete Product
                    </button>
                </form>
            </div>

            <!-- Display message to the admin after deletion -->
            <?php if (isset($_POST['deleteProduct'])): ?>
                <div class="mt-6 text-center">
                    <?php
                    if (isset($_POST['productId']) && !empty($_POST['productId'])) {
                        $productId = intval($_POST['productId']);

                        $conn = mysqli_connect("localhost", "root", "", "farmer");
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $deleteQuery = "DELETE FROM products WHERE id = $productId";
                        $result = mysqli_query($conn, $deleteQuery); // Execute the query

                        if ($result !== FALSE) {
                            if (mysqli_affected_rows($conn) > 0) {
                                echo '<p class="text-green-600 font-semibold animate-bounce">Product with ID ' . htmlspecialchars($productId) . ' has been successfully deleted.</p>';
                            } else {
                                echo '<p class="text-red-600 font-semibold animate-bounce">No product found with ID ' . htmlspecialchars($productId) . '.</p>';
                            }
                        } else {
                            // Query failed
                            echo '<p class="text-red-600 font-semibold animate-bounce">Error deleting product: ' . mysqli_error($conn) . '</p>';
                        }
                    }
                    ?>
                </div>
            <?php endif; ?>


            <div id="completeOrder" class="hidden fade-in">
                <h2 class="text-2xl font-bold mb-6 animate-pulse text-green-700">Order Complete</h2>

                <!-- Form to enter Order ID -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="CompletedOrder" method="POST" class="flex flex-col items-center w-full max-w-sm p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <label for="productId" class="block text-gray-700 text-sm font-bold mb-2">Enter Order ID:</label>
                    <input type="number" id="orderid" name="orderid" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent mb-4" placeholder="Order ID" required>

                    <!-- Order Button with Animation -->
                    <button type="submit" name="order_id" class="bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-green-600 transform hover:scale-105 transition-transform duration-200 ease-out">
                        Mark complete
                    </button>
                </form>


                <?php


                require '../config/db.php'; // Ensure the correct path to your DB config


                $query = "SELECT * FROM orders where payment_status = 'completed'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">'; // Responsive grid layout for the images

                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="flex flex-col items-center justify-center border p-4 rounded-lg shadow-lg transition-transform duration-500 transform hover:scale-105">'; // Styling each card
                        echo '<p class="text-lg font-bold mb-4">Order ID: ' . htmlspecialchars($row['id']) . '</p>'; // Display the order ID
                        echo '<p class="text-lg font-bold mb-4">Total amount: ' . htmlspecialchars($row['total_amount']) . '</p>'; // Display the order ID
                        echo '<p class="text-lg font-bold mb-4">Payment Status: ' . htmlspecialchars($row['payment_status']) . '</p>'; // Display the order ID
                        echo '<img src="data: image/jpeg;base64, '
                            . base64_encode($row['image']) . '" height="100" width="100"/>';


                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-gray-500 text-center mt-6">No payment screenshots found.</p>'; // Message when no images are found
                }
                ?>

            </div>
    </div>



    <div id="Update" class="hidden fade-in">

<h2 class="text-xl font-bold mb-4">Update Product</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="space-y-6 bg-white p-8 shadow-md rounded-md transition duration-500 ease-in-out transform hover:scale-105">
    <div>
        <label for="id" class="block text-sm font-medium text-gray-700">Product id</label>
        <input type="number" name="id" id="id" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
    </div>
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
        <input type="text" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
    </div>
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required></textarea>
    </div>
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">Category ID</label>
        <input type="number" name="category_id" id="category_id" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
    </div>
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
        <input type="number" name="price" id="price" step="0.01" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
    </div>
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Image URL</label>
        <input type="url" name="image" id="image" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
    </div>
    <div>
        <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
        <input type="number" name="stock_quantity" id="stock_quantity" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
    </div>
    <div class="flex justify-end">
        <button type="submit" name="update_product" class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300 ease-in-out">Update Product</button>
    </div>
</form>
</div>

    <?php if (isset($_POST['order_id'])): ?>
        <div class="mt-6 text-center">
            <?php
            if (isset($_POST['orderid']) && !empty($_POST['orderid'])) {
                $orderid = intval($_POST['orderid']);

                // Database connection
                $conn = mysqli_connect("localhost", "root", "", "farmer");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }


                $deleteQuery = "UPDATE orders SET payment_status = 'completed' WHERE id = $orderid";
                $result = mysqli_query($conn, $deleteQuery); // Execute the query

                if ($result !== FALSE) {
                    if (mysqli_affected_rows($conn) > 0) {
                        echo '<p class="text-green-600 font-semibold animate-bounce">Order with ID ' . htmlspecialchars($orderid) . ' has been successfully Completed.</p>';
                    } else {
                        echo '<p class="text-red-600 font-semibold animate-bounce">No Order found with ID ' . htmlspecialchars($orderid) . '.</p>';
                    }
                } else {
                    // Query failed
                    echo '<p class="text-red-600 font-semibold animate-bounce">Error Completing product: ' . mysqli_error($conn) . '</p>';
                }


                // Close connection
                mysqli_close($conn);
            }
            ?>
        </div>
    <?php endif; ?>





    <?php
    if (isset($_POST['update_product'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $image = $_POST['image']; // URL of the image
        $stock_quantity = $_POST['stock_quantity'];

        $sql = "UPDATE products
                SET name = '$name',
                    description = '$description',
                    category_id = '$category_id',
                    price = '$price',
                    image = '$image',
                    stock_quantity = '$stock_quantity'
                WHERE id = $id";




        if ($conn->query($sql) === TRUE) {
            echo "<p class='text-green-500'> product updated successfully!</p>";
        } else {
            echo "<p class='text-red-500'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    ?>

    </div>

    </div>



    <!-- JavaScript to handle menu click and content display -->
    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('#main-content > div').forEach(div => {
                div.classList.add('hidden');

            });

            // Show the selected section with animation
            const section = document.getElementById(sectionId);
            section.classList.remove('hidden');
            section.classList.add('fade-in');
        }

        function order(sectionId) {
            document.querySelectorAll('#main-content > div').forEach(div => {
                div.classList.add('hidden');
            });
            const section = document.getElementById(sectionId);
            section.classList.remove('hidden');
            section.classList.add('fade-in');
            fetch('fetch_payments.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('All-orders').innerHTML = data;
                })
                .catch(error => console.error('Error fetching payment details:', error));
        }
    </script>



</body>

</html>