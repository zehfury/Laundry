<?php
require_once 'connect.php';
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM user_tbl WHERE UserID = '".$_GET['user_del']."'");
header("location:users.php");  

?>