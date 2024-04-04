<!DOCTYPE html>.
<html lang="en">
<?php
require_once 'connect.php';
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="Group 1.png">
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
    <title>All Orders</title>
    <link rel="stylesheet" href="adminnav.css">
    <link rel="stylesheet" href="updatemenu.css">
    <link rel="stylesheet" href="order.css">

</head>

<body class="fix-header fix-sidebar">


    <div id="main-wrapper">

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
                                <li class="dashboard"><a href="dashboardadmin.php"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a></li>
                            </div>
                            <div class="log-container">
                                <p class="nav-label">Log</p>
                                <div class="line"></div>
                                <li> <a href="users.php"> <span><i class="fa-solid fa-user"></i></span><span>Users</span></a></li>
                                <li class="menu"> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-bars" aria-hidden="true"></i><span class="hide-menu">Services</span></a>
                                    <ul class="collapse">
                                        <li><a href="servicesadmin.php">All Services</a></li>
                                        <li><a href="add_services.php">Add Services</a></li>
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

                <div class="row">
                    <div class="col-12">

                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="page-label">
                                    <h2>All Services</h2>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>User</th>
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Reg-Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $sql = "SELECT user_tbl.*, user_orders_tbl.* FROM user_tbl INNER JOIN user_orders_tbl ON user_tbl.UserID=user_orders_tbl.UserID ";
                                            $query = mysqli_query($db, $sql);

                                            if (!mysqli_num_rows($query) > 0) {
                                                echo '<td colspan="9"><center>No Orders</center></td>';
                                            } else {
                                                while ($rows = mysqli_fetch_array($query)) {

                                            ?>
                                                    <tr>
                                                        <td><?php echo $rows['username']; ?></td>
                                                        <td><?php echo $rows['title']; ?></td>
                                                        <td><?php echo $rows['quantity']; ?></td>
                                                        <td>₱<?php echo $rows['price']* $rows['quantity']; ?></td>
                                                        <td><?php echo $rows['address']; ?></td>
                                                        <?php
                                                        $status = $rows['status'];
                                                        if ($status == "" or $status == "NULL") {
                                                        ?>
                                                            <td> <button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Waiting</button></td>
                                                        <?php
                                                        }
                                                        if ($status == "in process") { ?>
                                                            <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</button></td>
                                                        <?php
                                                        }
                                                        if ($status == "closed") {
                                                        ?>
                                                            <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($status == "rejected") 
                                                        {
                                                        ?>
                                                            <td> <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($status == "missing") 
                                                        {
                                                        ?>
                                                            <td> <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Missing</button></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($status == "accept") 
                                                        {
                                                        ?>
                                                            <td> <button type="button" class="btn btn-success"> <i class="fa-check-circle"></i> Accepted</button></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($status == "reject") 
                                                        {
                                                        ?>
                                                            <td> <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Rejected</button></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td><?php echo $rows['date']; ?></td>
                                                        <td class="action-btn">
                                                            <a href="delete_orders.php?order_del=<?php echo $rows['order_ID']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                            <a href="view_order.php?user_upd=<?php echo $rows['order_ID']; ?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


    <?php include "include/footer.php" ?>

    </div>

    </div>

</body>

</html>
