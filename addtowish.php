<?php
session_start();
include('dbconnect.php');
if(isset($_SESSION['userid'])){
$user = $_SESSION['userid'];
unset($_SESSION['wish']);}
else{
    header('location:userlogin.php');
    $_SESSION['wish'] = "yes";
}
$proid = $_GET['pid'];
$cmd2 = "select * from wishlist where userid = '".$user."' and proid = '".$proid."'";
$data = mysqli_query($conn, $cmd2);
$numrow = mysqli_num_rows($data);
if($numrow > 0){
    header('location:viewproduct.php?pid='.$proid.'&aiw');
}else{
$cmd = "insert into wishlist (proid, userid) values ('".$proid."','".$user."')";
$status = mysqli_query($conn, $cmd);

if($status){
    header('location:viewproduct.php?pid='.$proid.'&success');
}else{
    header('location:viewproduct.php?pid='.$proid.'&error');
}
}   


?>