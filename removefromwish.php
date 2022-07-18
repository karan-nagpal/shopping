<?php
session_start();
include('dbconnect.php');
$wid = $_GET['wid'];
$user = $_SESSION['userid'];
$cmd = "delete from wishlist where userid = '".$user."' and wid = '".$wid."'";
mysqli_query($conn, $cmd);
header('location:wishlist.php');



?>