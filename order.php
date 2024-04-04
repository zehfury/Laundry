<!DOCTYPE html>
<html lang="en">
<?php
require_once 'connect.php';
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
} else {
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
        <link rel="stylesheet" href="orders.css">

        <script src="script.js"></script>
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

        <section class="section-banner">
            <div class="category-img">
                <div class="category-img">
                    <img src="codeycupss.png" alt="">
                </div>
            </div>
        </section>

        <section class="order-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bg-gray">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Remarks</th>
                                            <th>Date</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $query_res = mysqli_query($db, "SELECT * FROM user_orders_tbl WHERE UserID='" . $_SESSION['user_id'] . "'");
                                        if (!mysqli_num_rows($query_res) > 0) {
                                            echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
                                        } else {

                                            while ($row = mysqli_fetch_array($query_res)) {

                                        ?>
                                                <tr>
                                                    <td data-column="Item"> <?php echo $row['title']; ?></td>
                                                    <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
                                                    <td data-column="price">₱<?php echo $row['price']; ?></td>
                                                    <td class="total-price">₱<?php echo $row['price'] * $row['quantity']; ?></td>
                                                    <td data-column="status">
                                                        <?php
                                                        $status = $row['status'];
                                                        if ($status == "" or $status == "NULL") {
                                                        ?>
                                                            <button type="button" class="btn btn-info"><span class="fa-solid fa-bars" aria-hidden="true"></span> Waiting</button>
                                                        <?php
                                                        }
                                                        if ($status == "in process") 
                                                        { 
                                                        ?>
                                                            <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"></span> On The Way!</button>
                                                        <?php
                                                        }
                                                        if ($status == "closed") 
                                                        {
                                                        ?>
                                                            <button type="button" class="btn btn-success"><span class="fa fa-check-circle"></span> Delivered</button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($status == "rejected")                                                       
                                                        {
                                                        ?>
                                                            <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($status == "missing")                                                       
                                                        {
                                                        ?>
                                                            <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Missing</button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($status == "accept")                                                       
                                                        {
                                                        ?>
                                                            <button type="button" class="btn btn-success"> <i class="fa-check-circle"></i> Accepted</button>
                                                        <?php
                                                        }
                                                        ?>
                                                         <?php
                                                        if ($status == "reject")                                                       
                                                        {
                                                        ?>
                                                            <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Rejected</button>
                                                        <?php
                                                        }
                                                        ?>

                                                    </td>
                                                    <td data-column="remarks"><?php echo $row['remark']; ?></td>
                                                    <td data-column="Date"> <?php echo $row['date']; ?></td>
                                                    <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['order_ID']; ?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn-cancel"><i class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include "include/footer.php" ?>

        </div>
    </body>

</html>
<?php
}
?>