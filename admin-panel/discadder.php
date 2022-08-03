<?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include("dbconnect.php");
$disname = $_POST["disname"];
$minamt = $_POST["minamt"];

$cmd = "insert into discounts (disperc ,minamnt, status ) values('".$disname."', '".$minamt."', 'Active')";
$status = mysqli_query($conn, $cmd);

if ($status){
    
    header('location:addiscounts.php?added');
}else{
    // echo mysqli_error($conn);
    header('location:addiscounts.php?adderr');
}




?>