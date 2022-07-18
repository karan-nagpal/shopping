<?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
$qty = $_GET['newqty'];
$proid = $_GET['proid'];


$cmd8 = "UPDATE products SET stcavl='".$qty."'  WHERE proid = '".$proid."'";
mysqli_query($conn, $cmd8);
header('location:viewpro.php');



?>