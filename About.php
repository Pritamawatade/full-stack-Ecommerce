<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .herosection {
            position: relative;
            text-align: center;
            color: rgb(255, 255, 255);
        }

        #heading {
            position: absolute;
            text-transform: uppercase;
            font-family: 'Bebas Neue';
            clip-path: polygon(0, 100% 0, 100% 100%, 0% 100%);
            line-height: 5.9rem;
            font-weight: bolder;

            text-shadow: 7px 5px 3px rgba(0, 0, 0, 0.733);
            /* Dark shadow */
            background-color: rgba(11, 253, 108, 0.875);
            /* Black background with 50% opacity */
            padding: 10px;
            border-radius: 5px;

        }

        .char {

            transform: translateY (115px);
            transition: transform .55;
        }

        .img1 {
            height: 500px;
            width: 607px;
            border: 0.2px solid white;
            border-radius: 80px;
            margin-bottom: 40px;
        }

        .clicked {
            animation: moveLeftRight 3s 1;
        }

        @keyframes moveLeftRight {
            0% {
                transform: translateX(0);
            }

            30% {
                transform: translateX(-50px);
            }

            50% {
                transform: rotateZ(-0.07turn);
                transition-timing-function: ease;

            }

            70% {
                /* transform: rotateZ(-0.05turn) */
            }

            100% {
                transform: translateX(100vw);
            }
        }
    </style>
</head>

<?php
include './includes/header.php';

?>

<body class="bg-white">

    <div class="aboutuspage">

        <div class="herosection flex items-center justify-around  ">
            <img class="object-cover h-screen w-screen" src="./assets/download.png" alt="">
            <h1 id="heading" class=" text md:text-7xl text-xl sm:text-4xl">We help to give farmer freedom</h1>
        </div>

        <div class="hero2 p-20 md:flex items-center  gap-40 justify-around bg-gradient-to-r from-sky-500  to-green-500 ">
            <div class="hero2text mt-3 ">
                <h2 class="bg-green-600 pb-2 rounded text-3xl text-center font-bold capitalize ">Our mission
                </h2>
                <h4 class="font-medium">To design a tech-driven ecosystem that makes farming inputs more affordable and accessible resulting in agriculture excellence for farmers.</h4>
            </div>
            <div class="img2 mt-3">
                <img class="transform transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl"
                    src="https://farmkartgroup.com/wp-content/uploads/2020/12/Vision-1016x1024.png" alt="Tech image">
            </div>
        </div>

        <div class="hero3 p-20 md:flex items-center  gap-40 justify-around bg-white-700">
            <div class="img3 mt-3">
                <img class="transform transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl "
                    src="https://farmkartgroup.com/wp-content/uploads/2020/12/Mission-1024x898.png"
                    alt="Tech image">
            </div>
            <div class="hero3text  mt-3">
                <h2 class="bg-green-600 pb-2 rounded text-3xl text-center font-bold capitalize ">
                    Our vision</h2>
                <h4 class="text-black-700 font-2xl font-medium ">At To achieve sustainable growth within India’s agricultural industry by simplifying the everyday lives of farmers. We aim to improve their quality of life by creating a smarter future of farming.
                </h4>
            </div>
        </div>

        <div class="hero4 p-20 md:flex items-center  gap-40 justify-around bg-white-700">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Designing A smarter future of farming</h1>
                <p class="font-normal text-gray-700 dark:text-gray-400">We’re paving the way for a better farming experience in India by
                    democratizing access to modern agricultural inputs. We want to provide every farmer in the
                    country with leading products and game-changing pioneering technologies.</p>
            </a>

            <div class="img4 mt-3">
                <img class="transform transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl h-60  w-96"
                    src="https://farmkartgroup.com/wp-content/uploads/2020/12/Agrinidan-1024x652.png" alt="Tech image">
            </div>
        </div>

        <div class="hero4 p-20 md:flex items-center  gap-40 justify-around bg-white-700">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h1 class=" text md:text-7xl text-xl sm:text-4xl capitalize">A place where science meets the culture</h1>

            </a>

            <div class="img4 mt-3  ">
                <img class="transform transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl h-96  w-auto"
                    src="https://farmkartgroup.com/wp-content/uploads/2020/07/from-farmer-to-entrepreneur.jpg" alt="Tech image">
            </div>
        </div>

        <div class="about">
            <h1 class="text-center capitalize text-3xl font-bold">What do we offer ?</h1>

            <div class="  md:flex align-center justify-around ">
                <img id="delimg" class="h-96  "
                    src="https://farmkartgroup.com/wp-content/uploads/2020/08/farmkart-delivery.png"
                    alt="Farmkart">
                <div class="  text-center  mt-4 ">
                    <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Farmkart delivery </h1>
                        <p class="font-normal text-gray-700 dark:text-gray-400"> Farmkart’s in-house delivery system is designed to ease accessibility even in the most remote regions of India. Farmers receive agri-inputs at their doorstep within 36-hours.</p>
                    </a>
                </div>


            </div>
        </div>

    </div>
    <?php
    include './includes/footer.php';

    ?>



    <script>
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





        const delimg = document.getElementById('delimg');
        delimg.addEventListener('click', () => {
            delimg.classList.toggle('clicked'); // Toggle the 'clicked' class
        });




        const split = new SplitType(".text");

        gsap.set(split.chars, {
            transformOrigin: "center center",
            y: 100,
            opacity: 0
        });

        gsap.to(split.chars, {
            y: 0,
            opacity: 1,
            stagger: 0.1,
            duration: 1,
            ease: "power2.out",
            repeat: 0
        });
    </script>


</body>
</body>

</html>