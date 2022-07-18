<?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
$proid = $_GET['proid'];
$cmd ="select status from products WHERE proid = '".$proid."'";
$stat = mysqli_query($conn, $cmd);
$row = mysqli_fetch_array($stat);
$status = $row['status'];
if($status == 'Active'){
    $cmd8 = "UPDATE products SET status='Deactivated'  WHERE proid = '".$proid."'";
    mysqli_query($conn, $cmd8);
    header('location:viewpro.php');
}else{

$cmd8 = "UPDATE products SET status='Active'  WHERE proid = '".$proid."'";
mysqli_query($conn, $cmd8);
header('location:viewpro.php');
}



?>