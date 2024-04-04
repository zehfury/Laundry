<!DOCTYPE html>
<html lang="en">
<?php
require_once 'connect.php';
error_reporting(0);
session_start();




if (isset($_POST['submit']))           //if upload btn is pressed
{



    if (empty($_POST['d_name']) || empty($_POST['about']) || $_POST['price'] == '' || $_POST['cat_name'] == '') {
        $error =     '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
    } else {

        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;

        $store = "../Admin/menu/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {


                $error =     '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Max Image Size is 1024kb!</strong> Try different Image.
															</div>';
            } else {




                $sql = "UPDATE dishes_tbl set menu_cat_ID='$_POST[cat_name]',title='$_POST[d_name]',slogan='$_POST[about]',price='$_POST[price]',img='$fnew' where dish_ID='$_GET[menu_upd]'";
                mysqli_query($db, $sql);
                move_uploaded_file($temp, $store);

                $success =     '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Record Updated!</strong>
															</div>';
            }
        }
    }
}








?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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

    <link rel="icon" href="codecup 1.png">
    <title>Update Service</title>
    <link rel="stylesheet" href="adminnav.css">
    <link rel="stylesheet" href="updatemenu.css">

</head>

<body class="fix-header">

    <header class="header">
        <div class="navbar-container">
            <nav class="navbar">

                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <span><img src="codecup 1.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <div class="home-container">
                            <p class="nav-label">Home</p>
                            <div class="line"></div>
                            <li class="dashboard"><a href="dashboard.php"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a></li>
                        </div>
                        <div class="log-container">
                            <p class="nav-label">Log</p>
                            <div class="line"></div>
                            <li> <a href="users.php"> <span><i class="fa-solid fa-user"></i></span><span>Users</span></a></li>
                            <li class="menu"> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-bars" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                                <ul class="collapse">
                                    <li><a href="menus.php">All Menues</a></li>
                                    <li><a href="add_menu.php">Add Menu</a></li>
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

    <div class="page-wrapper">

        <div class="container-fluid">

            <?php echo $error;
            echo $success; ?>

            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add Menu </h4>
                    </div>
                    <div class="card-body">
                        <form action='' method='post' enctype="multipart/form-data">
                            <div class="form-body">
                                <?php $qml = "SELECT * from dishes_tbl where dish_ID='$_GET[menu_upd]'";
                                $rest = mysqli_query($db, $qml);
                                $roww = mysqli_fetch_array($rest);
                                ?>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Dish Name</label>
                                            <input type="text" name="d_name" value="<?php echo $roww['title']; ?>" class="form-control" placeholder="Morzirella">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">About</label>
                                            <input type="text" name="about" value="<?php echo $roww['slogan']; ?>" class="form-control form-control-danger" placeholder="slogan">
                                        </div>
                                    </div>

                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Price </label>
                                            <input type="text" name="price" value="<?php echo $roww['price']; ?>" class="form-control" placeholder="$">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Image</label>
                                            <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Select Category</label>
                                            <select name="category_name" class="custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                <option>--Select Category--</option>
                                                <?php $ssql = "SELECT * FROM menu_category_tbl";
                                                $res = mysqli_query($db, $ssql);
                                                while ($row = mysqli_fetch_array($res)) {
                                                    echo ' <option value="' . $row['menu_cat_ID'] . '">' . $row['cat_name'] . '</option>';;
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>



                                </div>

                            </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-primary" value="Save">
                        <a href="menus.php" class="btn btn-inverse">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    </div>

    </div>

    </div>

</body>

</html>