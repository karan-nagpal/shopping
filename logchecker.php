<?php
session_start();
        
        if(isset($_GET['error'])){
            header("location:userlogin.php?error");
        }else{
            if(isset($_SESSION['checkout'])){
                header('location:checkout.php');
            }else{   
            header("location:index.php");
        }
    }
        
?>