<?php
// fetch_payments.php

require '../config/db.php'; // Ensure the correct path to your DB config


// Fetch payment details from the orders table
$query = "SELECT * FROM orders ";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">'; // Responsive grid layout for the images

    while ($row = $result->fetch_assoc()) {
        echo '<div class="flex flex-col items-center justify-center border p-4 rounded-lg shadow-lg transition-transform duration-500 transform hover:scale-105">'; // Styling each card
        echo '<p class="text-lg font-bold mb-4">Order ID: ' . htmlspecialchars($row['id']) . '</p>'; // Display the order ID
        echo '<p class="text-lg font-bold mb-4">Total amount: ' . htmlspecialchars($row['total_amount']) . '</p>'; // Display the order ID
        echo '<p class="text-lg font-bold mb-4">Payment Status: ' . htmlspecialchars($row['payment_status']) . '</p>'; // Display the order ID
        echo '<img src="data: image/jpeg;base64, '
        .base64_encode ($row['image'] ).'" height="100" width="100"/>';


        echo '</div>';
    }
} 
else {
    echo '<p class="text-gray-500 text-center mt-6">No payment screenshots found.</p>'; // Message when no images are found
}
?>