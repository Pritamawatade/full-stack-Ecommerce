<?php session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmkart</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #navbar {
            overflow: hidden;
            z-index: 10000;
            /* transition: background-color 0.3s ease; */
            /* Smooth transition for background color */
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .sticky+.content {
            padding-top: 60px;
        }

        .bg-transparent {
            background-color: transparent !important;
        }

        .bg-white {
            background-color: white !important;
        }

        body {
        
            all: revert;
        }
    </style>
</head>

<body class="">
    <div align='right'>
        <!-- <div class="h-2 p-11 overflow-hidden" id="google_translate_element"></div> -->
    </div>

    <div id="navbar" class="p-2 flex items-center justify-around w-full">
        <a href="http://localhost/E-commerce/index.php">
            <img class="w-10 sm:w-40" src="https://farmkartgroup.com/wp-content/uploads/2020/07/Farmkart-Logo.svg">
        </a>

        <ul id="menu" class="hidden md:flex md:gap-10 items-center w-fit md:w-auto">
            <li><a class="text-black-600 text-xl hover:text-zinc-950 font-bold" href="http://localhost/E-commerce/index.php">Home</a></li>
            <li><a class="text-black-600 text-xl hover:text-zinc-950 font-bold" href="http://localhost/E-commerce/About.php">About Us</a></li>
            <li><a class="text-black-600 text-xl hover:text-zinc-950 font-bold" href="http://localhost/E-commerce/user/products.php">Products</a></li>
            <li><a class="text-black-600 text-xl hover:text-zinc-950 font-bold" href="http://localhost/E-commerce/ContactUs.php">Contact Us</a></li>

            <?php if (!isset($_SESSION['user_id'])): ?>
                <li class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"><a class="" href="http://localhost/E-commerce/user/login.php">Log In</a></li>


                <li class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900"><a class="" href="http://localhost/E-commerce/user/register.php">Sign Up</a></li>
            <?php else: ?>
                <li class="relative">
                    <a href="http://localhost/E-commerce/user/cart.php">
                        <img class="h-10" src="http://localhost/E-commerce/assets/noun-bullock-cart-5814334.png" alt="">
                        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                            <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full h-5 w-5 flex items-center justify-center text-xs">
                                <?php echo count($_SESSION['cart']); ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"><a class="" href="http://localhost/E-commerce/user/logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
        <button id="menuToggle" class="md:hidden border-2 border-black px-4 py-2 rounded-md text-sm font-medium text-white bg-black">
            Menu
        </button>
    </div>

    <script>
        document.getElementById("menuToggle").addEventListener("click", function() {
            const menu = document.getElementById("menu");
            menu.classList.toggle("hidden");
        });

        var navbar = document.getElementById("navbar");

        window.onscroll = function() {
            if (window.pageYOffset >= 100) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
            if (window.pageYOffset >= 500) {
                navbar.classList.add("bg-white");
                navbar.classList.remove("bg-transparent");

            } else {
                navbar.classList.remove("bg-white");
                navbar.classList.add("bg-transparent");
            }
        };
    </script>

</body>

</html>