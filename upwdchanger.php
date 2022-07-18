<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}
include('dbconnect.php');

$userid = $_SESSION['userid'];
$pwd = md5($_POST['password']);

$cmd = "update Customers set password = '".$pwd."' where cid = '".$userid."'";
mysqli_query($conn, $cmd);
header('location:index.php?passwordchanged');
