<?php
require_once 'connect.php';
error_reporting(0);
session_start();


mysqli_query($db,"DELETE FROM user_orders_tbl WHERE order_ID = '".$_GET['order_del']."'"); 
header("location:order.php"); 

?>