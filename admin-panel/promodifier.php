<?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include("dbconnect.php");


$pname = $_POST['pname'];
$pdesc = mysqli_real_escape_string($conn, $_POST['pdesc']);
$price = $_POST['price'];
$dprice = $_POST['dprice'];
$pcat = $_POST['category'];
$pic =  basename($_FILES['pimage']['name']);
$newpic = date('dmyhis').$pic;
$pic1 =  basename($_FILES['pimage1']['name']);
$newpic1 = date('dmyhis').$pic1;
$pic2 =  basename($_FILES['pimage2']['name']);
$newpic2 = date('dmyhis').$pic2;
$pic3 =  basename($_FILES['pimage3']['name']);
$newpic3 = date('dmyhis').$pic3;
$pic4 =  basename($_FILES['pimage4']['name']);
$newpic4 = date('dmyhis').$pic4;

$cmd = "insert into products (proname, descrip, image, price, MRP, catid, stcavl, img1, img2, img3, img4) values('".$pname."','".$pdesc."','".$newpic."','".$dprice."','".$price."','".$pcat."','','".$newpic1."','".$newpic2."','".$newpic3."','".$newpic4."')";
$status = mysqli_query($conn, $cmd);
if($status){
    move_uploaded_file($_FILES['pimage']['tmp_name'],"../productimages/".$newpic);
    move_uploaded_file($_FILES['pimage1']['tmp_name'],"../productimages/".$newpic1);
    move_uploaded_file($_FILES['pimage2']['tmp_name'],"../productimages/".$newpic2);
    move_uploaded_file($_FILES['pimage3']['tmp_name'],"../productimages/".$newpic3);
    move_uploaded_file($_FILES['pimage4']['tmp_name'],"../productimages/".$newpic4);