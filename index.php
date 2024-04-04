<!DOCTYPE html>
<html lang="en">
<?php
require_once 'connect.php';
error_reporting(0);
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <link rel="icon" href="Group 1.png">
    <title>Home | Wash Ever</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Average+Sans&family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="hero.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="homepage.css">

    <script src="script.js"></script>
</head>

<body class="home">
    <header id="header" class="nav-section">
        <div class="top-header">
            <div class="top-header-container">
                <i class="fa-solid fa-location-dot"></i>
                <p class="location">No. 24, 18th Lacson Street, Capitol Subdivision</p>
            </div>
            <div class="app-logo">
                <a href="">
                    <img src="Logo.png" alt="">
                </a>
            </div>
            <div class="contacts">
                <div class="contacts-container">
                    <i class="fa-solid fa-phone"></i>
                    <p>+63905 370 7536</p>
                </div>
                <div class="insta">
                    <a href="#">
                        <img src="instagram-logo-fill-svgrepo-com.svg" alt="">
                        <p>washeverbcd</p>
                    </a>
                </div>
            </div>
        </div>
        <nav class="navbar">

            <div class="nav-links">
                <div class="app-logo hide">
                    <a href="">
                        <img src="Logo.png" alt="">
                    </a>
                </div>
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item"> <a class="nav-link " href="index.php">Home <span class="sr-only"></span></a> </li>
                        <li class="nav-item"> <a class="nav-link " href="#passion-commitment">About <span class="sr-only"></span></a> </li>
                        <li class="nav-item"> <a class="nav-link " href="services.php">Services <span class="sr-only"></span></a> </li>
                        <li class="nav-item"> <a class="nav-link " href="order.php">Orders <span class="sr-only"></span></a> </li>
                        <div class="nav-btns nav-btns-hide">
                            <?php
                            if (empty($_SESSION["user_id"])) // if user is not login
                            {
                                echo '<li class="nav-item login-btn"><a href="login.php" class="nav-link active login">Login</a> </li>
							  <li class="nav-item register-btn"><a href="registration.php" class="nav-link active">Signup</a> </li>';
                            } else {

                                echo  '<li class="nav-item book-laundry-btn"><a onclick="toggleMenu()" href="services.php" class="nav-link active login">Book Now</a></li>';
                                echo  '<li class="nav-item logout-btn"><a href="logout.php" class="nav-link active"><i class="fa-solid fa-arrow-right-to-bracket"></i></a> </li>';
                            }
                            ?>
                        </div>
                    </ul>
                </div>

                <div class="nav-btns">
                    <?php
                    if (empty($_SESSION["user_id"])) // if user is not login
                    {
                        echo '<li class="nav-item login-btn"><a href="login.php" class="nav-link active login">Login</a> </li>
							  <li class="nav-item register-btn"><a href="registration.php" class="nav-link active">Signup</a> </li>';
                    } else {

                        echo  '<li class="nav-item book-laundry-btn"><a onclick="toggleMenu()" href="services.php" class="nav-link active book">Book Now</a></li>';
                        echo  '<li class="nav-item logout-btn"><a href="logout.php" class="nav-link active"><i class="fa-solid fa-arrow-right-to-bracket"></i></a> </li>';
                    }
                    ?>
                </div>
            </div>
            <div class="ham-nav-sep">
                <div class="app-logo mobile-logo">
                    <a href="">
                        <img src="Logo.png" alt="">
                    </a>
                </div>
                <div class="ham-nav">
                    <a onclick="toggleMenu()" href="cart.php"><i class=" fa-solid fa-cart-shopping"></i></a>
                    <i onclick="toggleMenu()" class="fa-solid fa-bars"></i>
                    <i onclick="toggleMenu()" class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </nav>
    </header>

    <section class="header">
        <div class="hero">
            <div class="hero-content">
                <h1>UNLEASH THE MAGIC OF CLEAN </h1>
                <p>
                    Where Every Wash Tells a Story of Brilliance, Infusing Each Garment with a Touch of Sparkle and a Hint of Freshness,
                    Creating a Symphony of Cleanliness that Speaks Volumes about Our Commitment to Excellence.
                </p>
                <a href="services.php">
                    <button>Book now!</button>
                </a>
            </div>
        </div>
        <div class="hero-background-container">
            <div class="cover"></div>
            <img class="hero-background" src="image 26.png" alt="">
        </div>
    </section>

    <section class="passion-commitment" id="passion-commitment">
        <div class="pass-commit">
            <h1>OUR PASSION AND COMMITMENT</h1>
            <p>
                At Washever Laundry Hub, we're here to make laundry easy and enjoyable for you. Our mission is simple: to revolutionize your laundry experience.
                With top-notch service, premium amenities, and eco-friendly practices, we're committed to excellence.
                Our dedicated team is here to ensure your garments receive the care they deserve, every step of the way.
            </p>
        </div>
    </section>
    <section class="choose">
        <div class="choosing-us">
            <h1 class="choose-title">WHY CHOOSE US</h1>
            <div class="why-choose-us-content">
                <div class="why-choose-us quality">
                    <div class="choosing-us-title">
                        <img src="quili-removebg-preview 1.svg" alt="">
                        <h1>Quality</h1>
                    </div>
                    <p>We adhere to the highest standards of cleanliness and garment care.</p>
                </div>
                <div class="why-choose-us fast-turnaround">
                    <div class="choosing-us-title">
                        <img src="cc 1.svg" alt="">
                        <h1>Fast Turnaround</h1>
                    </div>
                    <p>Next-day and two-day delivery options so your clothes are delivered when you need them.</p>
                </div>
                <div class="why-choose-us pricing">
                    <div class="choosing-us-title">
                        <img src="pp 1.svg" alt="">
                        <h1>Pricing</h1>
                    </div>
                    <p> Quality service at reasonable prices, ensuring you get the best value.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="services-contents">
            <h1 class="title">SERVICES</h1>
            <div class="services-wrapper">

                <div class="sub-content">
                    <h1 class="wash">Wash</h1>
                    <p>Your garments are cleaned, stains are eliminated, and colors are brightened.</p>
                </div>
                <div class="sub-content">
                    <h1 class="dry">Dry</h1>
                    <p>Our state-of-the-art dryers will leave your garments soft and wrinkle-free.</p>
                </div>
                <div class="sub-content">
                    <h1 class="Wash-Dry-Fold">Wash-Dry-Fold</h1>
                    <p>Simply drop off your laundry, and we take care of the rest. Your garments ready to wear.</p>
                </div>
            </div>
        </div>
        <div class="cover-background " style="background-image: url('image 26 (1).png');">
            <div class="cover"></div>
        </div>
    </section>

    <section class="price-list">
        <div class="price-list-container">
            <h1 class="price-list-title">
                PRICE LIST
            </h1>
            <div class="price-list-image-grid">
                <div class="price-list-image">
                    <img src="Capture-removebg-preview 6.svg" alt="">
                </div>
                <div class="price-list-image">
                    <img src="Capture-removebg-preview 4.svg" alt="">
                </div>
                <div class="price-list-image">
                    <img src="Capture-removebg-preview 5.svg" alt="">
                </div>
            </div>
            <div class="prices">
                <div class="prices-cont">
                    <p>HAND WASH</p>
                    <p>Php 180</p>
                </div>
                <div class="prices-cont">
                    <p>PRESS / IRON</p>
                    <p>Php 200</p>
                </div>
                <div class="prices-cont">
                    <p>Wash-Dry-Fold</p>
                    <p>Php 160</p>
                </div>
            </div>
        </div>
    </section>

    <section class="promo">
        <div class="promo-container">
            <div class="promo-wrapper">
                <h1 class="promo-title">
                    FREE WASHEVER ECO BAG for all first time customer!
                </h1>
                <p>
                    First-time customers, claim your FREE Washever Eco Bag today! Join the sustainable laundry revolution and embrace eco-friendly living.
                    Say goodbye to single-use plastics and hello to a greener future.
                    Limited time offer. #SustainableLiving #EcoFriendlyLaundry
                </p>
            </div>
            <div class="bags">
                <img src="Group 1.svg" alt="">
            </div>
        </div>
    </section>

    <?php include "include/footer.php" ?>

</body>

</html>