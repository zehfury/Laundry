<!DOCTYPE html>
<html lang="en">
<?php

session_start();
error_reporting(0);
require_once 'connect.php';
if (isset($_POST['submit'])) {
    if (
        empty($_POST['firstname']) ||
        empty($_POST['lastname']) ||
        empty($_POST['username']) ||
        empty($_POST['email']) ||
        empty($_POST['position']) ||
        empty($_POST['password']) ||
        empty($_POST['cpassword']) ||
        empty($_POST['cpassword'])
    ) {
        $error_msg = "All fields must required to fill!";
    } else {

        $check_username = mysqli_query($db, "SELECT username FROM admin_tbl where username = '" . $_POST['username'] . "' ");
        $check_email = mysqli_query($db, "SELECT email FROM admin_tbl where email = '" . $_POST['email'] . "' ");

        if ($_POST['password'] != $_POST['cpassword']) {
            $message = "Password not match!";
        } elseif (strlen($_POST['password']) < 6) {
            $min_message = "Password must be greater than or equal 6 characters!";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $invalidEmailAdd = "Invalid email address please type a valid email!";
        } elseif (mysqli_num_rows($check_username) > 0) {
            $userError = "Username Already exists!";
        } elseif (mysqli_num_rows($check_email) > 0) {
            $emailError = "Email Already exists!";
        } else {
            $mql = "INSERT INTO admin_tbl(username,first_name,last_name,email,position,password) 
            VALUES('" . $_POST['username'] . "','" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['email'] . "','" . $_POST['position'] . "','" . sha1($_POST['password']) . "')";
            mysqli_query($db, $mql);
            header("refresh:0.1;url=dashboardadmin.php");
        }
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


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Average+Sans&family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Average+Sans&family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Create Admin</title>

    <link href="login.css" rel="stylesheet">
</head>

<body>
    <section class="signup-section">
        <div class="container">

            <div class="info">
                <h1>Create Admin </h1>
            </div>

            <div class="form">
                <form action="" method="post" class="form-inputs">
                    <div class="fullname">
                        <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Firstname">
                        <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Lastname">
                    </div>
                    <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    <input type="text" class="form-control" name="position" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Position">
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Confirm Password">
                    <div class="message-container">
                        <span class="error"><?php echo $message; ?></span>
                        <span class="error"><?php echo $min_message; ?></span>
                        <span class="error"><?php echo $error_msg; ?></span>
                        <span class="error"><?php echo $invalidEmailAdd; ?></span>
                        <span class="error"><?php echo $invalidPhoneNum; ?></span>
                        <span class="error"><?php echo $userError; ?></span>
                        <span class="error"><?php echo $emailError; ?></span>
                    </div>
                    <input type="submit" value="Register" name="submit" class="btn theme-btn">
                    <div class="cta">Already have an Account?<a href="indexadmin.php" style="color:#5c4ac7; white-space: nowrap;"> Login</a></div>
                </form>
            </div>
        </div>
    </section>
    <?php include "footer.php" ?>
    </div>
</body>

</html>