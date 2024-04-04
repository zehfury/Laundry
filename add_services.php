<!DOCTYPE html>
<html lang="en">
<?php
require_once 'connect.php';
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {

    if (
        empty($_POST['service_name']) ||
        empty($_POST['about']) ||
        $_POST['price'] == ''
    ) {
        $error =     '<div class="alert alert-danger alert-dismissible fade show">
																<strong>All fields Must be Fillup!</strong>
															</div>';
    } else {


        $sql = "INSERT INTO services_tbl(title,info,price) VALUE('" . $_POST['service_name'] . "','" . $_POST['about'] . "','" . $_POST['price'] . "')";
        mysqli_query($db, $sql);
        move_uploaded_file($temp, $store);

        $success =     '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																 New Service Added Successfully.
															</div>';
    }
}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Average+Sans&family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" href="Resources/Group 1.png">



    <title>Menu</title>
    <link rel="stylesheet" href="adminnav.css">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="add_service.css">

</head>

<body class="fix-header fix-sidebar">
    <header class="header">
        <div class="navbar-container">
            <nav class="navbar">

                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <span><img src="Logo.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <div class="home-container">
                            <p class="nav-label">Home</p>
                            <div class="line"></div>
                            <li class="dashboard"><a href="../dashboard.php"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a></li>
                        </div>
                        <div class="log-container">
                            <p class="nav-label">Log</p>
                            <div class="line"></div>
                            <li> <a href="users.php"> <span><i class="fa-solid fa-user"></i></span><span>Users</span></a></li>
                            <li class="menu"> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                                <ul class="collapse">
                                    <li><a href="Services.php">All Services</a></li>
                                    <li><a href="#">Add Service</a></li>
                                </ul>
                            </li>
                            <li> <a href="all_orders.php"><i class="fa-solid fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                        </div>
                    </ul>
                </div>

                <div class="profile-container">
                    <div class="profile-wrapper">
                        <div class="profile-info">
                            <div class="profile-pic">
                                <a><img src="6769264_60111.jpg" alt="user" class="profile-pic" /></a>
                            </div>
                            <div class="profile-name">
                                <p>Admin</p>
                                <p>
                                    <?php
                                    $sql = "SELECT `first_name` FROM `admin_tbl` WHERE `admin_ID` = {$_SESSION['admin_ID']}";
                                    $result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['first_name'];
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="admin-logout">
                            <a href="logout.php"><i class="fa fa-power-off"></i></a></li>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="admin-container">
            <div class="admin-wrapper">
                <div class="user-welcome">
                    <div>
                        <h1>Welcome Back ,
                            <span>
                                <?php
                                $sql = "SELECT `first_name` FROM `admin_tbl` WHERE `admin_ID` = {$_SESSION['admin_ID']}";
                                $result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_assoc($result);
                                echo $row['first_name'];
                                ?>
                            </span>
                        </h1>
                        <p>
                            <?php
                            $sql = "SELECT `position` FROM `admin_tbl` WHERE `admin_ID` = {$_SESSION['admin_ID']}";
                            $result = mysqli_query($db, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['position'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <div class="container-fluid">
        <?php echo $error;
        echo $success; ?>
        <div class="col-lg-12">
            <div class="page-label">
                <h2>Add Service</h2>
            </div>
            <div class="card card-outline-primary">
                <div class="card-body">
                    <form action='' method='post' enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Services name</label>
                                    <input type="text" name="service_name" class="form-control" placeholder="Enter service name...">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label class="control-label">Description</label>
                                    <input type="text" name="about" class="form-control form-control-danger" placeholder="Enter description...">
                                </div>
                            </div>

                            <div class="">
                                <div class="c">
                                    <div class="form-group">
                                        <label class="control-label">Price </label>
                                        <input type="text" name="price" class="form-control" placeholder="Enter price...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                <a href="services.php" class="btn btn-inverse">Cancel</a>
                            </div>
                        </div>

                </div>

                </form>
            </div>

        </div>
    </div>
    </div>
    </div>
</body>

</html>