<?php 

include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = $_POST['password'];

    // Look up the token in the password_resets table
    $sql = "SELECT * FROM password_resets WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $reset = $result->fetch_assoc();

        // Check if the token has expired
        if (date("U") <= $reset['expires_at']) {
            // Update the user's password
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
            $sql = "UPDATE Users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $hashed_password, $reset['user_id']);
            $stmt->execute();

            // Delete the token from the password_resets table
            $sql = "DELETE FROM password_resets WHERE token = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $token);
            $stmt->execute();

            echo '<div class="alert alert-success alert-dismissible fade show Z-50 absolute" role="alert" id="autoHideAlert">
            <strong></strong> Password changed successfully
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            header("Location: login.php");
        } else {
            echo "This token has expired.";
        }
    } else {
        echo "Invalid token.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-sky-700 ">
    <div  class="flex justify-center item-center">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <label for="password" class="text-xl text-white">Enter your new password:</label>
            <input class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" type="password" name="password" id="password">
            <input class="w-full py-3 mt-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-200" type="submit" value="reset password">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
    </div>
    
</body>
</html>