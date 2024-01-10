<?php
// Include the database configuration
include('../config/config.php');
session_start();
$_SESSION['username']="";
header("Location: /login");
exit(); 
?>