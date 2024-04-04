<?php
session_start();
session_destroy();
$url = 'indexadmin.php';
header('Location: ' . $url);
?>