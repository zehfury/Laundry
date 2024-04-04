<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

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

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="nav.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php
    require_once 'connect.php';
    error_reporting(0);
    session_start();
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty($_POST["submit"])) {
            $loginquery = "SELECT * FROM user_tbl WHERE username='$username' && password='" . sha1($password) . "'"; //selecting matching records
            $result = mysqli_query($db, $loginquery); //executing
            $row = mysqli_fetch_array($result);

            if (is_array($row)) {
                $_SESSION["user_id"] = $row['UserID'];
                header("refresh:1;url=index.php");
            } else {
                $message = "Invalid Username or Password!";
            }
        }
    }
    ?>
    <section class="log-in-section" style="background-image: url('tilt.svg');">
        <div class="login-form-container">

            <div class="form-img">
                <img src="Logo.png" alt="">
            </div>

            <div class="form">
                <a href="index.php" class="close"><i class="fa-solid fa-xmark"></i></a>
                <div class="welcome-qoute">
                    <h2>Welcome Back!</h2>
                    <p>enter your account credentials to view your orders</p>
                </div>
                <form class="form-inputs" action="" method="post">
                    <div class="user-container">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required />
                    </div>
                    <div class="pass-container">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required />
                    </div>
                    <div class="messages">
                        <span style="color:red;"><?php echo $message; ?></span>
                        <span style="color:green;"><?php echo $success; ?></span>
                    </div>
                    <input type="submit" id="buttn" name="submit" value="Login" />
                </form>
                <div class="cta">Don't have an Account?<a href="registration.php" style="color:#5c4ac7;"> Create an account</a></div>
            </div>

        </div>
    </section>
</body>

</html>