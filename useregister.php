<?php
session_start();
include('dbconnect.php');
$name = strtoupper($_POST['name']);
$mobile = $_POST['mobile'];
$email = $_POST['cemail'];
$password = md5($_POST['password']);

$cmd = "select email from Customers where email = '".$email."'";
$data = mysqli_query($conn, $cmd);
$numrow = mysqli_num_rows($data);
if($numrow > 0){
    header('location:usereg.php?emailexist');
}else{
$cmd= "insert into Customers(custname, mobile, email, password) values('".$name."','".$mobile."','".$email."','".$password."')";
$status = mysqli_query($conn, $cmd);
if($status){
    $logcmd = "select * from Customers where email = '".$email."'";
    $logdata = mysqli_query($conn, $logcmd);
    $logrow = mysqli_fetch_array($logdata);

            $_SESSION['userid']= $logrow['cid'];
			$_SESSION['uname']= $logrow['custname'];
			$_SESSION['umail']= $logrow['email'];
            header('location:index.php');
}else{
    header('location:error.php');    
}
}
?>