<?php
session_start();
include('dbconnect.php');

$pid   =  $_GET['pid'];
			if (isset($_SESSION['userid'])){
				$userid = $_SESSION['userid'];
                $cmd = "delete from cart where custid = '".$userid."' and proid = '".$pid."'";
                mysqli_query($conn, $cmd);
				header('location:cart.php');
			}else{

				foreach ($_SESSION['products'] as $key => $value) {
	
				if($pid == $value)
				{
					array_splice($_SESSION['products'],$key,1);
  					array_splice($_SESSION['qty'],$key, 1);
				}
    			}
			
				if(count($_SESSION['products']) == 0){
					unset($_SESSION['products']);
					unset($_SESSION['qty']);
					header('location:cart.php');
				}else{
					header('location:cart.php');
			}
		}
?>

