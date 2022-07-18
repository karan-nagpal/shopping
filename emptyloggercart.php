<?php
if(isset($_GET['cart'])){
	unset($_SESSION['products']);
  	unset($_SESSION['qty']);
	header('location:cart.php');
}


?>