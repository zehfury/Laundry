<!DOCTYPE html>
<html lang="en">
<?php
require_once 'connect.php';
error_reporting(1);
session_start();
var_dump($_POST); 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($_POST["submit"])) 
    {
        $loginquery = "SELECT * FROM admin_tbl WHERE username='$username' && password='" . sha1($password) . "'";
        var_dump($loginquery);
        $result = mysqli_query($db, $loginquery);
        var_dump($result);
        $row = mysqli_fetch_array($result); 
        if (is_array($row)) 
        {
            $_SESSION["admin_ID"] = $row['admin_ID'];
            header("location:dashboardadmin.php");
        } 
        else 
        {
            $message = "Invalid Username or Password!";
        }       
    }
}

?>

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="icon" href="codecup 1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Average+Sans&family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="loginadmin.css">


</head>

<body>
    <section class="login-container">
        <div class="container">
            <div class="info">
                <h1>Admin Panel </h1>
            </div>
            <div class="form">
                <div class="thumbnail">
                    <img src="6769264_60111.jpg" />
                </div>
                <form class="login-form" action="indexadmin.php" method="post">
                    <input type="text" placeholder="Username" name="username" />
                    <input type="password" placeholder="Password" name="password" />
                    <div class="message-container">
                        <span style="color:red;"><?php echo $message; ?></span>
                        <span style="color:green;"><?php echo $success; ?></span>
                    </div>
                    <input type="submit" name="submit" value="Login" />
                    <p class="signup-btn">Don't have an account? <a href="adminsignup.php">Click Here</a></p>
                </form>
            </div>
        </div>

    </section>

</body>

</html>