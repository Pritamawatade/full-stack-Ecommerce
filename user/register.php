<?php
    include './config.php';
    include '../includes/header.php';
    use PHPMailer\PHPMailer\PHPMailer;
try {
    require '/xampp/htdocs/E-commerce/config/db.php';
} catch (\Throwable $th) {
    throw $th;
}





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    
    
require 'C:\xampp\htdocs\E-commerce\PHPMailer-master\PHPMailer-master\src/Exception.php';
require 'C:\xampp\htdocs\E-commerce\PHPMailer-master\PHPMailer-master\src/PHPMailer.php';
require 'C:\xampp\htdocs\E-commerce\PHPMailer-master\PHPMailer-master\src/SMTP.php';



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

$mail->Subject = 'Thank you';
$mail->Body = "Hey! ".$_POST['name']." Thank you for joining us ";

if ($mail->send()) {
    echo ' ';
} else {
    echo 'Error: ' . $mail->ErrorInfo;
}

$sql = "SELECT * FROM Users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $sql = "INSERT INTO Users (name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $password, $phone, $address);
    $stmt->execute();
    header("Location: login.php");
     
include '../includes/header.php';
} else {
    echo '<script>alert("Email is already registered! please log in")</script>';
 
}
}


?>
<!DOCTYPE html>
<html lang="en" class="bg-green-600">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp-FARMKART</title>
    <style>
        input{
            border: 1px solid blue !important;
        }
    </style>
</head>
<body class="">
    
    
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="max-w-4xl mx-auto font-[sans-serif] p-6 mt-36">
        <div class="text-center mb-16">
            <a href="javascript:void(0)"><img
            src="https://farmkartgroup.com/wp-content/uploads/2020/07/Farmkart-Logo.svg" alt="logo" class='w-52 inline-block' />
        </a>
        <h4 class="text-black-50 text-base font-semibold mt-6">Sign up into your account</h4>
    </div>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="grid sm:grid-cols-2 gap-8">
            <div>
                <label class="text-black-50 text-sm mb-2 block">First Name</label>
                <input name="name" type="text" class="bg-gray-100 w-full text-black-50 text-sm px-4 py-3.5 rounded-md focus:bg-transparent bg-transparent outline-blue-500 transition-all" placeholder="Enter name" />
            </div>
            
            <div>
                <label class="text-black-50 text-sm mb-2 block">Email Id</label>
                <input name="email" type="email" class="bg-gray-100 w-full text-black-50 text-sm px-4 py-3.5 rounded-md focus:bg-transparent bg-transparent outline-blue-500 transition-all" placeholder="Enter email" />
            </div>
            <div>
                <label class="text-black-50 text-sm mb-2 block">Mobile No.</label>
                <input name="phone" type="number" class="bg-gray-100 w-full text-black-50 text-sm px-4 py-3.5 rounded-md focus:bg-transparent bg-transparent  outline-blue-500 transition-all" placeholder="Enter mobile number" />
            </div>
            <div>
                <label class="text-black-50 text-sm mb-2 block">Password</label>
                <input name="password" type="password" class="bg-gray-100 w-full text-black-50 text-sm px-4 py-3.5 rounded-md focus:bg-transparent bg-transparent outline-blue-500 transition-all" placeholder="Enter password" />
            </div>
            <div>
                <label class="text-black-50 text-sm mb-2 block">Address</label>
                <input name="address" type="text" class=" outline-blue-500 bg-gray-100 w-full text-black-50 text-sm px-4 py-3.5 rounded-md focus:bg-transparent bg-transparent  transition-all" placeholder="Enter Address" />
            </div>
            
        </div>
        
        <div class="!mt-12">
            <button type="submit" class="py-3.5 px-7 text-sm font-semibold tracking-wider rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline bg-transparent-none">
                Sign up
            </button>
        </div>
        <p class="text-sm font-light text-black-500 dark:text-black-50">
            Already have an account ?        <a href="login.php" class="font-medium text-white underline hover:underline dark:text-primary-500">Log in</a>
        </p>
    </form>
</div>
</body>
</html>
<?php 
include '../includes/footer.php';
?>