<?php
session_start();
	include('dbconnect.php');

	$userid = $_POST['userid'];
	$pass = md5($_POST['password']);
	
	
	$stmt = mysqli_prepare($conn, "SELECT cid ,custname ,email FROM Customers WHERE  email=? AND password=? ");
		
		mysqli_stmt_bind_param($stmt, "ss", $userid,$pass);
		

		 mysqli_stmt_execute($stmt);

   
    	mysqli_stmt_bind_result($stmt,$uid,$n,$m);
  		mysqli_stmt_store_result($stmt);
	
			if(mysqli_stmt_num_rows($stmt)>0)
			{
	 
			mysqli_stmt_fetch($stmt);
			
			mysqli_stmt_close($stmt);

			$_SESSION['userid']=$uid;
			$_SESSION['uname']=$n;
			$_SESSION['umail']=$m;	
			
			
				if(isset($_SESSION['unsign'])){
				
				
            					$index=0;
            					$userid = $_SESSION['userid'];
            				foreach ($_SESSION['products'] as  $pid) 
								{
            		            	$qty = (float)$_SESSION['qty'][$index];
									$selcmd = "select * from cart where custid = '".$userid."' and proid = '".$pid."'";
									$seldata = mysqli_query($conn, $selcmd);
									$selnum = mysqli_num_rows($seldata);
									echo $selnum;
									
										if($selnum == 0){
            		            		$cmd = "insert into cart (custid, proid,qty) values('".$userid."','".$pid."','".$qty."')";
            							$status= mysqli_query($conn, $cmd);                                         
                             		   }
								}
                                		unset($_SESSION['products']);
                                		unset($_SESSION['qty']);
										unset($_SESSION['unsign']);
										header("location:cart.php");
							
				}else{

				header('location:logchecker.php');
				}
			}else{
				header('location:userlogin.php?error');		
				
			}
		
?>