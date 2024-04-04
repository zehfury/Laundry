<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(E_ALL);
// Display errors
ini_set('display_errors', 1);

require_once 'connect.php';
error_reporting(0);
session_start();

function function_alert()
{
    echo "<script>alert('Thank you. Your Order has been placed!');</script>";
    echo "<script>window.location.replace('checkout.php');</script>";
}
// var_dump('sda');

include_once 'product-action.php';
// var_dump('here');
// exit();

if (empty($_SESSION["user_id"])) 
{
    header('location:login.php');
} 
else
{

    if (isset($_POST['submit'])) 
    {

        if (
            empty($_POST['payment']) ||
            empty($_POST['add']) ||
            $_POST['location_d'] == ''
        )
        {
            $error =     '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
        } 
        else 
        {
            $sql = "INSERT INTO details_tbl(userID,mop,address,location_details) VALUE('" . $_SESSION['user_id'] . "','" . $_POST['payment'] . "','" . $_POST['add'] . "','" . $_POST['location_d'] . "')";
            $result = mysqli_query($db, $sql);
            //var_dump($result);
            try
            {
                move_uploaded_file($temp, $store);
                //var_dump('ok');
            }
            catch(Exeption $ex)
            {
               //var_dump('error');
            }
        }
    }
    //var_dump($_SESSION);
    foreach ($_SESSION["cart_item"] as $item) 
    {

        $item_total += ($item["price"] * $item["quantity"]);
        //var_dump($_POST);
        if ($_POST['submit']) 
        {

            $SQL = "INSERT INTO user_orders_tbl(userID,title,quantity,price) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";
            //var_dump($SQL);
            $result = mysqli_query($db, $SQL);
             //var_dump($result);

            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "Thank you. Your order has been placed!";

            function_alert();
        }
    }
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
        <link rel="stylesheet" href="details.css">

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

                                    echo  '<li class="nav-item book-laundry-btn"><a onclick="toggleMenu()" href="services.php class="nav-link active login">Book Now</a></li>';
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

                            echo  '<li class="nav-item book-laundry-btn"><a onclick="toggleMenu()" href="services.php class="nav-link active book">Book Now</a></li>';
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

                <li class="rowlinks "><span>1</span><a href="services.php">Your Order</a></li>
                <li class="rowlinks active"><span>2</span><a href="menu.php?res_id=<?php echo $_GET['res_id']; ?>">Pickup Details</a></li>
                <li class="rowlinks"><span>3</span><a href="#">Finish</a></li>

            </ul>
        </section>

        <div class="container-fluid">
            <?php echo $error;
            echo $success; ?>
            <div class="order-details-container">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Pick up details</h4>
                </div>
                <?php
                $query_res = mysqli_query($db, "SELECT * FROM user_tbl WHERE UserID='" . $_SESSION['user_id'] . "'");

                while ($row = mysqli_fetch_array($query_res)) {

                ?>
                    <form action='' method='post' enctype="multipart/form-data">
                        <div class="form-body">

                            <div class="name-lastname">
                                <div class="form-group">
                                    <label class="control-label">Firstname</label>
                                    <input type="text" name="f_name" class="form-control" placeholder="" value="<?php echo $row['first_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Lastname</label>
                                    <input type="text" name="l_name" class="form-control" placeholder="" value="<?php echo $row['last_name']; ?>">
                                </div>
                            </div>

                            <div class="contacts">
                                <div class="form-group">
                                    <label class="control-label">Mobile number</label>
                                    <input type="text" name="mobilenum" class="form-control" placeholder="" value="<?php echo $row['phone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email address</label>
                                    <input type="text" name="email" class="form-control" placeholder="" value="<?php echo $row['email']; ?>">
                                </div>
                            </div>

                            <div class="payment">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Pay Using</label>
                                        <select type="text" name="payment" class="form-control form-control-danger">
                                            <option>Gcash</option>
                                            <option>COD</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="address">Address</label>
                                    <input type="text" name="add" class="address-input">
                                </div>
                            </div>

                            <div class="">
                                <div class="form-group">
                                    <label class="control-label">Location Details </label>
                                    <input type="text" name="location_d" class="form-control" placeholder="">
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                        <!-- <a href="checkout.php" class="btn btn-success order-btn" onclick="return confirm('Do you want to confirm the Booking?');">Book Now</a> -->
                        <input type="submit" onclick="return confirm('Do you want to confirm the Booking?');" name="submit" class="btn btn-success order-btn" value="Book Now">
                        </div>
                    </form>
                <?php
                } ?>
            </div>
        </div>

        <?php include "include/footer.php" ?>
    </body>
                
</html>
<?php
}
?>