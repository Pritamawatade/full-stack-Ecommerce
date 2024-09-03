 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 </head>

 <body>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

 </body>

 </html>

 <?php


    try {
        require '/xampp/htdocs/E-commerce/config/db.php';
    } catch (\Throwable $th) {
        throw $th;
    }
    
    session_start();
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])) {
        header("location: login.php");
        exit;
    } else {

        // echo "Thanks you for logging in ";
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>'.$_SESSION['user_name'].'</strong> You have successfully logged in
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    }


    ?>