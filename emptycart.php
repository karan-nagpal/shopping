<?php
session_start();
include('dbconnect.php');

if (isset($_SESSION['userid'])){
	$userid = $_SESSION['userid'];
	 $cmd = "delete from cart where custid = '".$userid."'";
	 mysqli_query($conn, $cmd);
	 header('location:cart.php');
}else{
		unset($_SESSION['products']);
  		unset($_SESSION['qty']);
		
		header('location:index.php');
}
?>
