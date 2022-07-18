<?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
$id = $_GET['did'];
echo $id;
$cmd = "delete from discounts where DisId = '$id'";
mysqli_query($conn, $cmd);
header("location:addiscounts.php?discdel");
?>