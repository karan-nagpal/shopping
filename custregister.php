<?php
include('dbconnect.php');
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$pwd = md5($_POST['password']);

$selcmd = "select * from Customers where email = '".$email."' or mobile = '".$mobile."'";
$seldata = mysqli_query($conn, $selcmd);
$numrow  = mysqli_num_rows($seldata);




if($numrow > 0){
    header('location:custreg.php?alreadyregistered');
}else{
$cmd = "insert into Customers (custname, email , mobile, password) values ('".$name."','".$email."','".$mobile."','".$pwd."')";
$status = mysqli_query($conn, $cmd);

if($status){
    header('location:index.php');
}else{
    header('location:error.php');
}
}




?>