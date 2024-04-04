<!DOCTYPE html>
<html lang="en">
<?php
include("connect.php");
error_reporting(0);
session_start();

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

    <link rel="icon" href="Group 1.png">



    <title>Update Order</title>

    <link rel="stylesheet" href="adminnav.css">
    <link rel="stylesheet" href="menu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 1000 + ',height=' + 1000 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>

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
                            <li class="dashboard"><a href="dashboard.php"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a></li>
                        </div>
                        <div class="log-container">
                            <p class="nav-label">Log</p>
                            <div class="line"></div>
                            <li> <a href="users.php"> <span><i class="fa-solid fa-user"></i></span><span>Users</span></a></li>
                            <li class="menu"> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Services</span></a>
                                <ul class="collapse">
                                    <li><a href="services.php">All Services</a></li>
                                    <li><a href="add_services.php">Add Service</a></li>
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
                                <h2>View Order</h2>
                            </div>

                            <div class="table-responsive m-t-20">
                                <table id="myTable" class="table table-bordered table-striped">

                                    <tbody>
                                        <?php
                                        $sql = "SELECT user_tbl.*, user_orders_tbl.* FROM user_tbl INNER JOIN user_orders_tbl ON user_tbl.UserID=user_orders_tbl.UserID where order_ID='" . $_GET['user_upd'] . "'";
                                        $query = mysqli_query($db, $sql);
                                        $rows = mysqli_fetch_array($query);



                                        ?>


                                        <tr>
                                            <td><strong>Username:</strong></td>
                                            <td>
                                                <center><?php echo $rows['username']; ?></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Title:</strong></td>
                                            <td>
                                                <center><?php echo $rows['title']; ?></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Quantity:</strong></td>
                                            <td>
                                                <center><?php echo $rows['quantity']; ?></center>
                                            </td>


                                        </tr>
                                        <tr>
                                            <td><strong>Price:</strong></td>
                                            <td>
                                                <center>₱<?php echo $rows['price']* $rows['quantity']; ?></center>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><strong>Address:</strong></td>
                                            <td>
                                                <center><?php echo $rows['address']; ?></center>
                                            </td>


                                        </tr>
                                        <tr>
                                            <td><strong>Date:</strong></td>
                                            <td>
                                                <center><?php echo $rows['date']; ?></center>
                                            </td>


                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong></td>
                                            <?php
                                            $status = $rows['status'];
                                            if ($status == "" or $status == "NULL") {
                                            ?>
                                                <td>
                                                    <center><button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Ready to Pick-up</button></center>
                                                </td>
                                            <?php
                                            }
                                            if ($status == "in process") { ?>
                                                <td>
                                                    <center><button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>On a Way!</button></center>
                                                </td>
                                            <?php
                                            }
                                            if ($status == "closed") {
                                            ?>
                                                <td>
                                                    <center><button type="button" class="btn btn-primary"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button></center>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($status == "rejected") {
                                            ?>
                                                <td>
                                                    <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button> </center>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($status == "missing") {
                                            ?>
                                                <td>
                                                    <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Missing</button> </center>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['order_ID']); ?>');" title="Update order">
                                            <button type="button" class="btn btn-primary">Update Order Status</button>
                                        </a>
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


    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>