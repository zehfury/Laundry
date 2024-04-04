<?php
$servername = "172.16.0.214"; //server
$username = "group37"; //username
$password = "123456"; //password
$dbname = "group37";  //database

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
// Check connection
if (!$db) {       //checking connection to DB	
   die("Connection failed: " . mysqli_connect_error());
   exit();
}
?>