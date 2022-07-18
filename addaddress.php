<?php
session_start();
include("dbconnect.php");
    $userid = $_SESSION['userid'];       
    $mobile = $_POST['mobile'];
    $recpname = $_POST['recpname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $cmd = "insert into address(recpname, mobile, cid, address, city, state, pincode) values('".$recpname."','".$mobile."','".$userid."','".$address."','".$city."','".$state."','".$pincode."')";
    $status = mysqli_query($conn, $cmd);
    header('location:checkout.php');
    // echo mysqli_error($conn);
    
    
    

?>