<?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');

$userid = $_SESSION['aid'];
$pwd = md5($_POST['password']);

$cmd = "update admsdata set paswd = '".$pwd."' where aid = '".$userid."'";
mysqli_query($conn, $cmd);
header('location:dashboard.php?passwordchanged');
