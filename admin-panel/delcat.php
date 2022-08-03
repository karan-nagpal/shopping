<?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
$id = $_GET['did'];
$cmd = "delete from categories where catid = '$id'";
mysqli_query($conn, $cmd);
header("location:addcat.php?del");
echo mysqli_error($conn);
?>