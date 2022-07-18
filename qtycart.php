<?php
session_start();
include('dbconnect.php');

$pid   =  $_GET['pid'];
$qty   =  $_GET['qty'];

	$cmsstock = "select * from products where proid = '".$pid."'";
	$stockdata= mysqli_query($conn, $cmsstock);
	$rowstock = mysqli_fetch_array($stockdata);

if(isset($_SESSION['userid'])){
$userid = $_SESSION['userid'];
if($qty <= $rowstock['stcavl']){
$cmd = "update cart set qty = '".$qty."' where proid = '".$pid."' and custid = '".$userid."'";
$status= mysqli_query($conn, $cmd);

if($status){
	header('location:cart.php');
}else{
	header('location:error.php?error');
	
}
}else{
	header('location:cart.php?qtyend');
}
}else{
	if($qty <= $rowstock['stcavl']){
	$index = 0;
	foreach ($_SESSION['products'] as $key => $value) {
	
	if($pid== $value)
	{
		$_SESSION['qty'][$index]= $qty ;
	}


	$index++;
}

		header('location:cart.php');
}else{
		header('location:cart.php?qtyend');

}
}

?>