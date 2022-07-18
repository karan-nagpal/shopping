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
if($pic1 !=''){
$newpic1 = date('dmyhis').$pic1;
}else{
    $newpic1='';
}

$pic2 =  basename($_FILES['pimage2']['name']);
if($pic2 !=''){
    $newpic2 = date('dmyhis').$pic2;
    }else{
        $newpic2='';
    }

$pic3 =  basename($_FILES['pimage3']['name']);
if($pic3 !=''){
       $newpic3 = date('dmyhis').$pic3;
    }else{
        $newpic3='';
    }

$pic4 =  basename($_FILES['pimage4']['name']);
if($pic4 !=''){
    $newpic4 = date('dmyhis').$pic4;
    }else{
        $newpic4='';
    }

$cmd = "insert into products (proname, descrip, image, price, MRP, catid, stcavl , img1, img2, img3, img4) values('".$pname."','".$pdesc."','".$newpic."','".$dprice."','".$price."','".$pcat."','0','".$newpic1."','".$newpic2."','".$newpic3."','".$newpic4."')";
$status = mysqli_query($conn, $cmd);

if($status){
    move_uploaded_file($_FILES['pimage']['tmp_name'],"../productimages/".$newpic);
    if($pic1 != ''){
       move_uploaded_file($_FILES['pimage1']['tmp_name'],"../productimages/".$newpic1);
    }
    if($pic1 != ''){
        move_uploaded_file($_FILES['pimage2']['tmp_name'],"../productimages/".$newpic2);
     }
     if($pic1 != ''){
        move_uploaded_file($_FILES['pimage3']['tmp_name'],"../productimages/".$newpic3);
     }
     if($pic1 != ''){
        move_uploaded_file($_FILES['pimage4']['tmp_name'],"../productimages/".$newpic4);
     } 
            header('location:addpro.php?padd');
    }else{
            header('location:addpro.php?error');
// echo mysqli_error($conn);
 
}

?>