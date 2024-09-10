<?php include './includes/header.php';
include './config/db.php';
$sql = "SELECT * FROM Products where price < 199 Limit 4";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden min-h-screen w-screen">

<head>
  <title>Document</title>

  <meta charset="UTF-8" />
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
  <title>Farmkart-home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />

    <script src="https://unpkg.com/split-type"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Satisfy&family=Sevillana&display=swap"
    rel="stylesheet" />

  <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
    integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

  <style>
    body {
      all: none;
      overflow-x: hidden;

    }

    .anton-regular {
      font-family: "Anton", sans-serif;
      font-weight: 100;
      font-style: normal;
      letter-spacing: 6px;
    }

    #autoHideAlert {
      z-index: 10000;
      top: 20%;
      right: 10px;
    }

    h1 {
      font-family: "Noto Serif", serif;
    }

    .shopnow button {
      transition: all 0.3s ease-in-out;
    }

    .shopnow button:hover {
      transform: scale(1.1);
      /* background-color: transparent; */
      /* color: white; */
    }

    .main {
      position: relative;
    }

    .hero {
      position: absolute !important;
      top: 50%;
    }

    .icon {
      position: absolute;
      bottom: 20px !important;
      right: 10px;
    }

    .shopnow {
      left: 170%;
    }

    .img-1 {
      border: 1px solid white;
      border-top-left-radius: 100px;
      border-bottom-right-radius: 100px;
    }

    .hero2txt {
      font-family: "Playfair Display", serif;
    }

    .font-playfair {
      font-family: "Playfair Display", serif;
    }

    .font-satisfy {
      font-family: "Satisfy", cursive;
    }

    .font-sevillana {
      font-family: "Sevillana", cursive;
    }

    .cards {
      left: 10%;
    }

    .container {
      margin: 0;
      padding: 0;
    }

    header>img {
      width: 100vw !important;
      padding: 0px !important;
      margin: 0px !important;
      width: 100vw !important;
      height: 100%;
      background-repeat: no-repeat;
      background-size: cover;
      /* border: 0.01px solid black; */
      margin-left: -5%;
    }

    .heroimg2 {
      background: url('./assets/wheat1.jpg');
      width: 100vw !important;
      height: 100%;
      background-repeat: no-repeat;
      background-size: cover;
      /* border: 0.01px solid black; */
      margin-left: -5%;

    }

    .banner {
      background: url('https://t3.ftcdn.net/jpg/06/38/44/36/360_F_638443688_P87CCPga0cr5081eyPugBWDCMyPyyZeK.jpg');
      /* width: 100% !important; */
      background-repeat: no-repeat;
      background-size: 100% 100%;
      /* border: 0.01px solid black; */

    }

    .bannertext {
      overflow: visible;
    }
  </style>
</head>

<body class="overflow-x-hidden min-h-screen w-screen">
  <div class="container">

    <div class="main">
      <div class="header sm:sm:flex justify-around items-center">
        <img class="w-screen p-0 m-0 img-fluid " src="./assets/DeWatermark.ai_1725966759153.png" alt="" />
      </div>

      <div class="hero sm:absolute sm:flex relative">
        <div class="text">
          <h1 class="sm:text-7xl text sm:mt-1 text-white uppercase font-bold anton-regular">
            On a mission to plant<br /><span class="text-orange-500 bg-sky-400 rounded-xl anton-regular">1000000 +</span>
            seeds <br> Every year
          </h1>
        </div>
        <div
          class="shopnow   border-black-600  absolute">
          <a href="http://localhost/E-commerce/user/products.php">
            <button
              class="text-white hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
              SHOP NOW
            </button>
          </a>
        </div>
      </div>
    </div>

    <div class="leaf">
      <img class="h-32 w-32 img-fluid" src="./assets/wheat.png" alt="" />
    </div>

    <div class="sm:sm:flex justify-around h-screen">
      <div
        class="heor2text sm:flex-1 sm:flex items-center justify-center max-w-lg p-4 bg-yellow-100">
        <div>
          <h2 class="font-satisfy text-2xl">About our story</h2>
          <h2 class="text-black-600 text-5xl font-bold font-playfair">
            Our company and its connection to Farming
          </h2>
          <p>
            Farmkart is a leading online marketplace for farming products. We
            started our journey in 2022 with the mission to connect farmers
            with consumers worldwide. Our mission is to empower farmers and
            help them reach their full potential by providing them with the
            best deals, fresh, and affordable products. We believe in creating
            a sustainable and fair environment for farmers and consumers. Our
            aim is to foster a culture of innovation, empowerment, and
            sustainability in the agricultural sector.
          </p>
        </div>
      </div>
      <div>

      </div>
      <div
        class="heroimg sm:flex-1 relative items-center justify-center p-4 bg-green-100">
        <img
          class="img-1 h-full img-fluid sm:w-full object-cover"
          src="https://ecoassure.onlywebcoding.com.ua/images/aboutus.png"
          alt="" />
      </div>
    </div>
    <div class="sm:flex  m-0 h-screen heroimg2 img-fluid">

      <div
        class="heor2text absolute sm:flex items- justify-around max-w-6xl p-4 bg-transparent">
        <div class="sm:flex justify-around gap-10">
          <h2 class="text-orange-600 text-2xl font-bold font-satisfy">
            We not just sell products
          </h2>
          <p class="text-2xl text-yellow-100 font-sevillana">
            Being able to see the smile on our indian farmer is the real
            motivation for us to kepp working and make the farmkart better
            place for our customers
          </p>
        </div>

        <div
          class="cards sm:w-full relative sm:absolute sm:flex justify-around items-center sm:mt-48 overflow-hidden">
          <div
            class="transform t_div transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl px-10 max-w-sm mx-auto p-10 bg-transparent-500 shadow-lg rounded-lg overflow-hidden">
            <img
              class="pr-4 img-fluid sm:w-full h-48 m-4 object-cover"
              src="https://img.freepik.com/free-photo/so-many-vegetables-this-field_181624-18619.jpg?ga=GA1.1.155483166.1725039365&semt=ais_hybrid"
              alt="Sample Image" />
            <div class="p-4">
              <h2 class="sm:text-xl font-bold mb-2 text-yellow-200 font-playfair">
                Organic product
              </h2>
              <p class="text-white">
                So that everything is nature free
              </p>
            </div>
          </div>
          <div
            class="transform t_div transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl px-10 max-w-sm mx-auto p-10 bg-transparent-100 shadow-lg rounded-lg overflow-hidden">
            <img
              class="pr-4 img-fluid sm:w-full sm:h-48 m-4 object-cover"
              src="https://img.freepik.com/free-photo/smart-agriculture-iot-with-hand-planting-tree-background_53876-124626.jpg?ga=GA1.1.155483166.1725039365&semt=ais_hybrid"
              alt="Sample Image" />
            <div class="p-4">
              <h2 class="sm:text-xl font-bold mb-2 text-yellow-200 font-playfair">
                Everything is with scienece
              </h2>
              <p class="text-white">
                Being able to see the smile on our indian farmer
              </p>
            </div>
          </div>
          <div
            class="transform t_div transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl px-10 max-w-sm mx-auto p-10 bg-black-50 shadow-lg rounded-lg overflow-hidden">
            <img
              class="pr-4 img-fluid sm:w-full h-48 m-4 object-cover"
              src="https://img.freepik.com/free-photo/close-up-male-hands-holding-soil-little-plant_23-2148814127.jpg?ga=GA1.1.155483166.1725039365&semt=ais_hybrid"
              alt="Sample Image" />
            <div class="p-4">
              <h2 class="sm:text-xl font-bold mb-2 text-yellow-200 font-playfair">
                Aggriculuture product
              </h2>
              <p class="text-white">
                Elvate your life by buying the farmkart products
              </p>
            </div>
          </div>
          <div
            class="transform t_div transition duration-500 hover:scale-110 shadow:lg hover:shadow-2xl px-10 max-w-sm mx-auto p-10 bg-transparent-100 shadow-lg rounded-lg overflow-hidden">
            <img
              class="pr-4 sm:w-full h-48 m-4 object-cover"
              src="https://img.freepik.com/premium-photo/morning-sprouts-green-wheat-exploring-agriculture-ecology-gardening-practices_209190-235737.jpg?ga=GA1.1.155483166.1725039365&semt=ais_hybrid"
              alt="Sample Image" />
            <div class="p-4">
              <h2 class="sm:text-xl font-bold mb-2 text-yellow-200 font-playfair">
                Aggriculuture product
              </h2>
              <p class="text-white">
                Elvate your life by buying the farmkart products
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="hero3">
      <div class="hero3img">
        <img class="h-32 w-32" src="https://img.freepik.com/free-photo/large-set-isolated-vegetables-white-background_485709-44.jpg?ga=GA1.1.155483166.1725039365&semt=ais_hybrid" alt="">

        <div class="hero3text">
          <h2 class="text-4xl font-bold text-yellow-600 font-sevillana text-center">
            Often order from us
          </h2>
          <h2 class="sm:text-7xl font-bold text-black-600 font-playfair text-center">
            Popular products
          </h2>

          <div class="container mx-auto mt-10">
            <h1 class="sm:text-3xl font-bold mb-8">Our Products</h1>
            <div id="products-grid" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
              <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                  <div class="product-card border p-4 rounded shadow cursor-pointer product_card">
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="mb-4 sm:w-full h-54 object-cover">
                    <h2 class="product-name sm:text-xl font-semibold"><?php echo $row['name']; ?></h2>
                    <p class="text-gray-600"><?php echo $row['description']; ?></p>
                    <p class="text-lg font-bold mt-2">$<?php echo number_format($row['price'], 2); ?></p>
                    <form action="http://localhost/E-commerce/user/cart.php" method="POST">
                      <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                      <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                      <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                      <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                      <input type="hidden" name="product_quantity" value="1">
                      <button type="submit" name="add_to_cart" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Add to Cart</button>
                    </form>
                  </div>
                <?php endwhile; ?>
              <?php else: ?>
                <p>No products found.</p>
              <?php endif; ?>
            </div>



          </div>
        </div>
      </div>
    </div>

  </div>
  <div class=" banner p-10 m-10">
    <div class=" bannertext items-center justify-center ">
      <a href="http://localhost/E-commerce/user/products.php">
        <h1 class=" font-satisfy text-center items-center justify-center sm:text-3xl font-bold text-magenta-600">visit shop</h1>
      </a>
      <h1 class="font-playfair sm:text-7xl text-center text-white bg-black-500 sm:flex items-center justify-around m-10">Buy Now and be the part of millions of happy customer</h1>
    </div>

    <div>

    </div>
    <div class="sm:flex items-center justify-center ">

      <a href="http://localhost/E-commerce/user/products.php">

        <button class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900 sm:text-xl font-playfair">
          Shop Now
        </button>
      </a>

    </div>
  </div>

  </div>
  </div>
  <section class="py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="mb-16">
        <h2
          class="text-4xl font-manrope text-center font-bold text-gray-900 leading-[3.25rem]">
          Frequently asked questions
        </h2>
      </div>
      <div class="accordion-group" data-accordion="default-accordion">
        <div
          class="accordion border border-solid border-gray-300 p-4 rounded-xl transition duration-500 accordion-active:bg-indigo-50 accordion-active:border-indigo-600 mb-8 lg:p-4 active"
          id="basic-heading-one-with-icon">
          <button
            class="accordion-toggle group inline-sm:flex items-center justify-between text-left text-lg font-normal leading-8 text-gray-900 sm:w-full transition duration-500 hover:text-indigo-600 accordion-active:font-medium accordion-active:text-indigo-600"
            aria-controls="basic-collapse-one-with-icon">
            <h5>How can I reset my password?</h5>

          </button>
          <div
            id="basic-collapse-one-with-icon"
            class="accordion-content sm:w-full overflow-hidden pr-4"
            aria-labelledby="basic-heading-one"
            style="max-height: 250px;">
            <p class="text-base text-gray-900 font-normal leading-6">
              You just have to log in page on this website there you can find the forgot password button there you just have to insert the email id of yours and once when you click on the sent reset link on your email a password reset link will be shared
            </p>
          </div>
        </div>
        <div
          class="accordion border border-solid border-gray-300 p-4 rounded-xl accordion-active:bg-indigo-50 accordion-active:border-indigo-600 mb-8 lg:p-4"
          id="basic-heading-two-with-icon">
          <button
            class="accordion-toggle group inline-sm:flex items-center justify-between text-left text-lg font-normal leading-8 text-gray-900 sm:w-full transition duration-500 hover:text-indigo-600 accordion-active:font-medium accordion-active:text-indigo-600"
            aria-controls="basic-collapse-two-with-icon">
            <h5>Is the all seeds are organic?</h5>

            <svg
              class="w-6 h-6 text-gray-900 transition duration-500 hidden accordion-active:text-indigo-600 accordion-active:block group-hover:text-indigo-600"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M6 12H18"
                stroke="currentColor"
                stroke-width="1.6"
                stroke-linecap="round"
                stroke-linejoin="round"></path>
            </svg>
          </button>
          <div
            id="basic-collapse-two-with-icon"
            class="accordion-content sm:w-full overflow-hidden pr-4"
            aria-labelledby="basic-heading-two">
            <p class="text-base text-gray-900 font-normal leading-6">
              Yes. In todays world where eveything is going after money and all that. We stick to the root to provide to the best quality products with our hearts and soul put to it. Every single piece of seed you get from us has never recieved any of the processed fertilizer or chemical.
            </p>
          </div>
        </div>
        <div
          class="accordion border border-solid border-gray-300 p-4 rounded-xl accordion-active:bg-indigo-50 accordion-active:border-indigo-600 mb-8 lg:p-4"
          id="basic-heading-three-with-icon">
          <button
            class="accordion-toggle group inline-sm:flex items-center justify-between text-left text-lg font-normal leading-8 text-gray-900 sm:w-full transition duration-500 hover:text-indigo-600 accordion-active:font-medium accordion-active:text-indigo-600"
            aria-controls="basic-collapse-three-with-icon">
            <h5>How can I contact customer support?</h5>

            <svg
              class="w-6 h-6 text-gray-900 transition duration-500 hidden accordion-active:text-indigo-600 accordion-active:block group-hover:text-indigo-600"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M6 12H18"
                stroke="currentColor"
                stroke-width="1.6"
                stroke-linecap="round"
                stroke-linejoin="round"></path>
            </svg>
          </button>
          <div
            id="basic-collapse-three-with-icon"
            class="accordion-content sm:w-full overflow-hidden pr-4"
            aria-labelledby="basic-heading-three">
            <p class="text-base text-gray-900 font-normal leading-6">
              In contact us section of this website you can see the calling number of the company customer care and if you want also you can email us at this email address

              And you can also fill up that form and hit submit we will contact you again ASAP.
              <a class="text-base text-gray-900 font-normal leading-6" href="mailto:pritamawatade.work@gmail.com?subject=The project is awesome%20 pritam&body=This%20is%20a%20Farmkart%20email.">Send Email</a>
            </p>
          </div>
        </div>
        <div
          class="accordion border border-solid border-gray-300 p-4 rounded-xl accordion-active:bg-indigo-50 accordion-active:border-indigo-600 mb-8 lg:p-4"
          id="basic-heading-three-with-icon">
          <button
            class="accordion-toggle group inline-sm:flex items-center justify-between text-left text-lg font-normal leading-8 text-gray-900 sm:w-full transition duration-500 hover:text-indigo-600 accordion-active:font-medium accordion-active:text-indigo-600"
            aria-controls="basic-collapse-three-with-icon">
            <h5>How should i create account ?</h5>

            <svg
              class="w-6 h-6 text-gray-900 transition duration-500 hidden accordion-active:text-indigo-600 accordion-active:block group-hover:text-indigo-600"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M6 12H18"
                stroke="currentColor"
                stroke-width="1.6"
                stroke-linecap="round"
                stroke-linejoin="round"></path>
            </svg>
          </button>
          <div
            id="basic-collapse-three-with-icon"
            class="accordion-content sm:w-full overflow-hidden pr-4"
            aria-labelledby="basic-heading-three">
            <p class="text-base text-gray-900 font-normal leading-6">
              To create an account, find the 'Sign up' or 'Create account'
              button, fill out the registration form with your personal
              information, and click 'Create account' or 'Sign up.' Verify
              your email address if needed, and then log in to start using the
              platform.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include './includes/footer.php' ?>
  <script>
    gsap.registerPlugin(ScrollTrigger);

    gsap.from(".product_card", {
      y: 150,
      opacity: 0,
      duration: 1,
      scrollTrigger: {
        trigger: ".product_card",
        start: "top 80%",
        toggleActions: "play none none none"
      }
    });
    gsap.from(".t_div", {
      y: 100,
      opacity: 0,
      duration: 1,
      scrollTrigger: {
        trigger: ".t_div",
        start: "top 30%",
        toggleActions: "play play play none"
      }
    });
    document.addEventListener("DOMContentLoaded", function() {
  const split = new SplitType(".text");

  gsap.set(split.chars, {
    transformOrigin: "center center",
    y: 50,
    opacity: 0
  });

  gsap.to(split.chars, {
    y: 0,
    opacity: 1,
    stagger: 0.04,
    duration: 1,
    ease: "power2.out",
    repeat: 0
  });
});

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>