<!DOCTYPE html>
<html lang="en">

<?php
require_once 'connect.php';

error_reporting(0);
session_start();

include_once 'product-action.php';

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <link rel="icon" href="Group 1.png">
    <title>Services | Wash Ever</title>


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
    <link rel="stylesheet" href="services.css">

    <script src="script.js"></script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>

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

    <section class="section-header">
        <ul class="row-links">

            <li class="rowlinks active"><span>1</span><a href="categories.php">Your Order</a></li>
            <li class="rowlinks "><span>2</span><a href="menu.php?res_id=<?php echo $_GET['res_id']; ?>">Pickup Details</a></li>
            <li class="rowlinks"><span>3</span><a href="#">Finish</a></li>

        </ul>
    </section>

    <section class="menu-section">
        <div class="menu-wrapper">
            <div class="widget-heading">
                <h3 class="widget-title">
                    SERVICES
                </h3>
            </div>
            <div class="menu-container">
                <div class="menu-widget" id="2">
                    <div class="product-container" id="popular2">
                        <?php
                        $stmt = $db->prepare("SELECT * FROM services_tbl WHERE services_ID");
                        $stmt->execute();
                        $services = $stmt->get_result();
                        if (!empty($services)) {
                            foreach ($services as $service) {
                        ?>
                                <div class="form-container">
                                    <form method="post" action='services.php?ser_id=<?php echo $_GET['ser_id']; ?>&action=add&id=<?php echo $service['services_ID']; ?>'>
                                        <div class="product-desc">
                                            <div class="prod-descr">
                                                <h6 class="service-title"><?php echo $service['title']; ?></h6>
                                                <p class="desc"> <?php echo $service['info']; ?></p>
                                            </div>
                                            <div class="item-cart-info">
                                                <span class="price ">₱<?php echo $service['price']; ?></span>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <input class="count" type="text" name="quantity" value="1" />
                                            <input type="submit" class="theme-btn" value="Add" />
                                        </div>
                                    </form>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="order-container">
                    <h3 class="order-title">
                        Your Order
                    </h3>
                    <div class="order-row">
                        <div class="order-wrapper">
                            <?php

                            $item_total = 0;

                            foreach ($_SESSION["cart_item"] as $item) {
                            ?>
                                <div class="cart-item-container">

                                    <div class="title-row">
                                        <?php echo $item["title"]; ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "₱" . $item["price"]; ?> readonly id="exampleSelect1">
                                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>
                                        <div class="remove-link">
                                            <a href="services.php?ser_id=<?php echo $_GET['ser_id']; ?>&action=remove&id=<?php echo $item["services_ID"]; ?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $item_total += ($item["price"] * $item["quantity"]);
                            }
                            ?>
                        </div>
                    </div>

                    <div class="Total-body">
                        <div class="price-wrap">
                            <h1 class="total">TOTAL</h1>
                            <h3 class="value"><?php echo "₱" . $item_total; ?></h3>
                            <p>Free Delivery!</p>

                            <div class="btns-container">
                                <?php
                                if ($item_total == 0) {
                                ?>
                                    <a href="#" class="btn btn-danger btn-lg disabledbtn">Continue</a>

                                <?php
                                } else {
                                ?>
                                    <a href="details.php?ser_id=<?php echo $_GET['ser_id']; ?>&action=details" class="btn btn-success btn-lg activebtn">Continue</a>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "include/footer.php" ?>
</body>

</html>