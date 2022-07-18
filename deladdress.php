<?php
session_start();
include('dbconnect.php');
$aid = $_GET['aid'];
if(!isset($_SESSION['userid'])){
    header('location:userlogin.php');
}else{
    $cmd = "delete from address where aid = '".$aid."'";
    mysqli_query($conn, $cmd);
    header('location:checkout.php');    
}
?>