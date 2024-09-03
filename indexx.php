<?php
include './includes/header.php';



?>

<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmkart-home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        #autoHideAlert{
            z-index: 10000;
            top: 20%;
            right:10px;
        }
        h1 {
            font-family: "Noto Serif", serif;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="min-h-full overflow-x-hidden w-screen bg-white">



    <div class="herosection  sm:flex items-center justify-around  ">
        <div class="herocontent text-center align-center">
            <h1 class="md:text-7xl sm:text-2xl text-2xl">NO <span class="text-green-700 underline">#1</span> CHOICE OF <br> INDIAN FARMERS </h1>
        </div>
        <div class="heroimg "> 
        <?php
// Your PHP code that triggers the alert
$showAlert = isset($_SESSION['user_id']);
?>

<?php if ($showAlert): ?>
<div class="alert alert-success alert-dismissible fade show Z-50 absolute" role="alert" id="autoHideAlert">
  <strong><?php echo $_SESSION['user_name'] ?></strong> you have been logged in
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
            <img class="h-96 mb-5 rounded transform transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl object-contain img1  hover:ease-in-out  " src="https://farmkartgroup.com/wp-content/uploads/2024/02/Cultivating-innovation-acre-by-acre-01-1536x1024.jpg" alt="Hero image">
        </div>
    </div>

    <div class="hero2 p-20  sm:flex items-center  gap-40 justify-around bg-gradient-to-r from-sky-500  to-green-500 ">
        <div class="hero2text">
            <h2 class="bg-green-600 pb-2 rounded text-3xl text-center font-bold capitalize ">Transforming farming with
                <br> technological innovation
            </h2>
            <h4 class="font-medium">We design innovative solutions to transform traditional <br> agricultural methods.
                We’re advancing one of the world’s <br> oldest professions, bringing it into <br> the 21st century and
                taking it beyond.</h4>
        </div>
        <div class="img2">
            <img class=" h-96 w-auto transform transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl" src="https://farmkartgroup.com/wp-content/uploads/2020/11/digital-farmkart.png" alt="Tech image">
        </div>
    </div>

    <div class="hero3 p-20  sm:flex items-center  gap-40 justify-around bg-white-700">
        <div class="img3">
            <img class="h-96 transform transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl" src="https://farmkartgroup.com/wp-content/uploads/2021/03/reinventing-agriculture-2.jpg" alt="Tech image">
        </div>
        <div class="hero3text  ">
            <h2 class="bg-green-600 pb-2 rounded text-3xl text-center font-bold capitalize ">
                Reinventing agriculture <br>
                for A better tomorrow</h2>
            <h4 class="text-black-700 sm:text-3xl font-medium ">At Farmkart, we want to drive innovation, make <br> an
                impact and become an inspiration. We are improving the <br> daily lives of farmers in India, allowing
                <br> them to be more productive, efficient, and progressive.
            </h4>
        </div>
    </div>
    <div class="hero4 p-20  sm:flex items-center  gap-40 justify-around bg-white-700">
        <div class="hero4text h4text">
            <h1 class="font-bold text-2xl bg-sky-600 p-4" >Designing A smarter future of farming</h1>
            <h4 class="text-black-100 sm:text-3xl font-medium sm:p-5 ">We’re paving the way for a better farming experience <br> in India by
                democratizing access to modern <br> agricultural inputs. We want to provide <br> every farmer in the
                country <br>with leading products and <br>game-changing pioneering technologies.</h4>
        </div>
        <div class="img4">
            <img class="transform transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl h-60  w-96" src="https://farmkartgroup.com/wp-content/uploads/2020/12/Agrinidan-1024x652.png" alt="Tech image">
        </div>
    </div>

    <div class="about">

        <div class="sm:flex align-center justify-center md:p-20">
            <img class="h-96 w-auto" src="https://farmkartgroup.com/wp-content/uploads/2020/08/farmkart-superstore-1024x514.png" alt="Farmkart">

            <div class=" text text-center  mt-4 ">
                <a href="./user/products.php" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">E-commerce store</h1>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Find the biggest variaty of products at only Farmkart official site. We are the only one who thinks about the customer before anything else. Buy now and be amoung the very few who wants to do something big</p>
                </a>

            </div>

        </div>
    </div>



    <?php
    include './includes/footer.php';


    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        gsap.from('.heroimg', {
            x: 150,
            duration: 1
        });
        gsap.from('.herocontent', {
            x: -150,
            duration: 1
        });

        gsap.registerPlugin(ScrollTrigger);

        gsap.from(".img2", {
            x: 150,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: ".img2",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });

        gsap.from(".hero2text", {
            x: -150,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: ".hero2text",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
        gsap.from(".img3", {
            x: 150,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: ".img3",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });

        gsap.from(".hero3text", {
            x: -150,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: ".hero3text",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
        gsap.from(".img4", {
            x: 150,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: ".img4",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });

        gsap.from(".hero4text", {
            x: -150,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: ".hero4text",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });

    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Set a timeout to hide the alert after 2 seconds (2000 milliseconds)
        setTimeout(function() {
            var alertElement = document.getElementById('autoHideAlert');
            if (alertElement) {
                // Use Bootstrap's alert 'close' method to hide the alert
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                setTimeout(() => {
                    alertElement.remove();
                }, 2000); // Delay to allow fade effect to complete before removal
            }
        }, 2000);
    });

    </script>
</body>

</html>