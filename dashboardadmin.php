<!DOCTYPE html>
<html lang="en">

<?php
require_once 'connect.php';
error_reporting(0);
session_start();
if (empty($_SESSION["admin_ID"])) {
    header('location:indexadmin.php');
} else {
?>


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

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
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="adminnav.css">

    </head>

    <body>

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
                                <a href="logoutadmin.php"><i class="fa fa-power-off"></i></a></li>
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

        <section>
            <div class="dashboard-container">
                <div class="page-label">
                    <h2>Admin Dashboard</h2>
                </div>
                <div class="running-orders-grid">
                    <div class="running-orders">
                        <div class="count">
                            <h1>
                                <?php $sql = "select * from user_orders_tbl WHERE status = 'in process' ";
                                $result = mysqli_query($db, $sql);
                                $rws = mysqli_num_rows($result);

                                echo $rws; ?>
                            </h1>
                            <p>Running Orders</p>
                        </div>
                        <i class="fa fa-spinner"></i>
                    </div>
                    <div class="running-orders">
                        <div class="count">
                            <h1>
                                <?php $sql = "select * from user_orders_tbl WHERE status = 'closed' ";
                                $result = mysqli_query($db, $sql);
                                $rws = mysqli_num_rows($result);

                                echo $rws; ?>
                            </h1>
                            <p>Completed Orders</p>
                        </div>
                        <i class="fa-solid fa-check-double"></i>
                    </div>
                    <div class="running-orders">
                        <div class="count">
                            <h1 class="auto-load">
                                <?php $sql = "select * from user_orders_tbl WHERE status = 'rejected' ";
                                $result = mysqli_query($db, $sql);
                                $rws = mysqli_num_rows($result);

                                echo $rws; ?>
                            </h1>
                            <p>Cancelled Orders</p>
                        </div>
                        <i class="fa-solid fa-ban"></i>
                    </div>
                    <div class="running-orders">
                        <div class="count">
                            <h1>
                                <?php $sql = "select * from user_orders_tbl";
                                $result = mysqli_query($db, $sql);
                                $rws = mysqli_num_rows($result);

                                echo $rws; ?>
                            </h1>
                            <p>Total Orders</p>
                        </div>
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                </div>
                <section class="second-section-grid">
                    <div class="table-container">
                        <div class="table-title">
                            <h2>Users</h2>
                            <a href="users.php"><i class="fa-regular fa-circle-right"></i></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table auto-load">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sql = "SELECT * FROM user_tbl order by userID  ASC LIMIT 5";
                                    $query = mysqli_query($db, $sql);

                                    if (!mysqli_num_rows($query) > 0) {
                                        echo '<td colspan="7"><center>No Users</center></td>';
                                    } else {
                                        while ($rows = mysqli_fetch_array($query)) {
                                            echo '
                                        <tr>
                                        <td scope="col">' . $rows['UserID'] . '</td>
                                        <td>' . $rows['username'] . '</td>
										<td>' . $rows['first_name'] . '</td>
										<td>' . $rows['last_name'] . '</td>
										<td>' . $rows['email'] . '</td>
										<td>' . $rows['phone'] . '</td>
										<td>' . $rows['address'] . '</td>																								
                                        </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div></div>
                </section>
            </div>
        </section>
    </body>

</html>
<?php
}
?>