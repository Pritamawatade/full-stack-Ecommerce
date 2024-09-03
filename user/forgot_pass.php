<?php

require 'C:\xampp\htdocs\E-commerce\PHPMailer-master\PHPMailer-master\src/Exception.php';
require 'C:\xampp\htdocs\E-commerce\PHPMailer-master\PHPMailer-master\src/PHPMailer.php';
require 'C:\xampp\htdocs\E-commerce\PHPMailer-master\PHPMailer-master\src/SMTP.php';

include '../config/db.php';
include './config.php';

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        // Generate a unique token
        $token = bin2hex(random_bytes(50));

        // Set an expiration time for the token (e.g., 1 hour)
        $expires_at = date("U") + 3600;

        // Store the token and expiration time in the password_resets table
        $sql = "INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $user_id, $token, $expires_at);
        $stmt->execute();

        // Send an email with the reset link
        $reset_link = "http://localhost/E-commerce/user/reset_pass.php?token=" . $token;

        // Use PHPMailer or similar to send the email

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $place_your_email;
        $mail->Password = $email_password;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($place_your_email, 'Farmkart');
        $mail->addAddress($_POST['email'], 'Farmkart');
        $mail->Subject = 'Password Reset Request';
        $mail->Body = "Click the link to reset your password: " . $reset_link;

        if ($mail->send()) {
            echo '<div class="alert alert-success alert-dismissible fade show Z-50 absolute" role="alert" id="autoHideAlert">
          <strong></strong> Password Reset link has been sent
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "No account found with that email address.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url(../assets/form_bg1.jpg);
            background-repeat: no-repeat;
            background-size: 98% 100% ;
            background-position: center;
        }
    </style>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class=" flex items-center justify-center min-h-screen bg-black">

    <!-- <img class="w-10 sm:w-40" src="https://farmkartgroup.com/wp-content/uploads/2020/07/Farmkart-Logo.svg"> -->

    <form class="w-full max-w-sm bg-transparent rounded-lg shadow-md p-8 border-4 border-inherit border-double" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="mb-6">
            <label for="email" class="block text-white text-lg font-semibold mb-2">Enter your email</label>
            <input class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" type="text" name="email">
            <br>
            <input class="w-full py-3 mt-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-200" type="submit" value="Sent reset link">
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>