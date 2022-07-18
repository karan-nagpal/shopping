<?php
session_start();
include('dbconnect.php');
$pid  =  $_GET['proid'];
	
	if(isset($_SESSION['userid'])){
	
	$userid = $_SESSION['userid'];
	$cmd2 = "select * from cart where custid = '".$userid."' and proid = '".$pid."'";
	$data2  = mysqli_query($conn, $cmd2);
	$numrow4 = mysqli_num_rows($data2);
	echo $numrow4;
	if($numrow4 == 0){
	$cmd = "insert into cart (custid, proid,qty) values('".$userid."','".$pid."','1')";
	$status= mysqli_query($conn, $cmd);

	if($status){
		header('location:viewproduct.php?pid='.$pid);
	}else{
		header('location:viewproduct.php?error=1&pid='.$pid);
	
	}}else{
		header('location:viewproduct.php?pid='.$pid.'&carted');
		
	}

}else{
if(!isset($_SESSION['products']))
{
	
   $_SESSION['products'] = array();
   $_SESSION['qty']  = array();
   $_SESSION['unsign'] = "yes";
}

$check=0;
foreach ($_SESSION['products'] as $key => $value) {
	if($pid== $value)
	{
		$check++;
	}
}

	if($check==0)
	{
	    array_push( $_SESSION['products'], $pid);
	    array_push( $_SESSION['qty'], 1);


		header('location:viewproduct.php?pid='.$pid);
	}
	else
	{
		header('location:viewproduct.php?pid='.$pid.'&carted');
	}

}

?>