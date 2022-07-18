<?php
session_start();
	include('dbconnect.php');

	$userid = $_POST['sellerid'];
	$pass = md5($_POST['password']);
	
	
	$stmt = mysqli_prepare($conn, "SELECT aid ,name FROM admsdata WHERE  adminid=? AND paswd=? ");
		
		mysqli_stmt_bind_param($stmt, "ss", $userid,$pass);
		

		 mysqli_stmt_execute($stmt);

   
    	mysqli_stmt_bind_result($stmt,$uid,$n);
  		mysqli_stmt_store_result($stmt);
	
			if(mysqli_stmt_num_rows($stmt)>0)
			{
	 
			mysqli_stmt_fetch($stmt);
			
			mysqli_stmt_close($stmt);

			$_SESSION['aid']=$uid;
			$_SESSION['sname']=$n;
			header('location:dashboard.php');
			}else{
				header('location:sellerlogin.php?error');		
				
			}
		
?>