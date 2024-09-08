<?php
// This PHP code is used to fetch a specific product details based on the product ID passed in the URL parameter 'id'.
// It first checks if the 'id' parameter is set in the URL. If it is, it converts the value to an integer and stores it in the $id variable.

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Then it prepares a SQL query to select all columns (*) from the 'products' table where the 'id' column matches the value of $id.
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // It binds the $id variable to the parameter in the SQL query, so that the value of $id is used in the query when it is executed.
    $stmt->bind_param("i", $id);

    // The query is then executed and the result is stored in the $result variable.
    $stmt->execute();
    $result = $stmt->get_result();

    // If the query returns at least one row, the code inside the if statement is executed.
    if ($result->num_rows > 0) {
        // It fetches the first row of the result set as an associative array and stores it in the $product variable.
        $product = $result->fetch_assoc();

        // It then encodes the $product array in JSON format and outputs it.
        echo json_encode($product);
    } else {
        // If the query returns no rows, it outputs an empty array in JSON format.
        echo json_encode([]);
    }
}
?>





