<?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include("dbconnect.php");
$catname = strtoupper($_POST["catname"]);
$pic =  basename($_FILES["catimage"]['name']);
$d= date('dmyhis');
$newpic = $d.$pic;

$cmd = "insert into categories (name , image) values('".$catname."', '".$newpic."')";
$status = mysqli_query($conn, $cmd);

if ($status){
    move_uploaded_file($_FILES['catimage']['tmp_name'], "../categoryimages/".$newpic);
  
    header('location:addcat.php?added');
}ELSE{
    header('location:addcat.php?adderr');
}




?>