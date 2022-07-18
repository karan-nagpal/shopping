<?php
session_start();
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title> Shoppingo</title>
</head>
<body >

<nav class="navbar navbar-expand-lg  mb-0 nav-a">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php"><img src="images/logo.png" id="logo" alt="image"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    <i class="fa fa-bars"></i>
  </button>
  <div class="col-md-5 pl-5">
    <input type="text" id="search" class="adinput search" placeholder="Search here...">
    <div id="showresult"></div>
  </div>
  
     <div class="collapse navbar-collapse">
       <ul class=" nav navbar-nav  navbar-right">
         <li class="nav-item hornavmenu">
         <a href="cart.php" class="nav-link">
           <i class="fa fa-heart-o "></i></li>
          </a>  
         <li class="nav-item hornavmenu "><a href="cart.php" class="nav-link ha">
            <span style="position:absolute; top:2px; right: 8px">
              <?php
                  
                  if(isset($_SESSION['userid'])){
                    $usid = $_SESSION['userid'];
                    $cmd = "select * from cart where custid  ='".$usid."'";
                    $data = mysqli_query($conn, $cmd);
                    $numrow = mysqli_num_rows($data);
                    if($numrow >0){
                    echo $numrow;
                    }
                  }else{
                    if(isset($_SESSION['products'])){
                      echo count($_SESSION['products']);
                    }
                  }
              ?>
            </span>
          <i class="fa fa-shopping-cart"></i></li></a>
          <?php
                 if(isset($_SESSION['uname'])){
                   ?>
                  <li class="dropdown hornavmenu"><a class="nav-link " href=""><i class="fa fa-user"></i> <?php echo $_SESSION['uname']; ?><i class="fa fa-caret-down"></i>
                  <ul class="dropdown-menu bg-theme">
                        <li><a href="myorders.php">My orders </a></li>
                        <li><a href="wishlist.php">My wishlist </a></li>
                        <li><a href="cart.php">My cart </a></li>
                        <li><a href="changepass.php">Change Password </a></li>
                        <li><a href="logout.php">Logout </a></li>
                      </ul>
                  </li>
                  
               <?php
                }else{
                       ?>
                  <li class="nav-item hornavmenu"><a class ="nav-link ha"  href="usereg.php">Register</a></li>
                  <li class="nav-item hornavmenu"><a class="nav-link ha"  href="userlogin.php">Login</i></li></a></li>
             </ul>
              <?php
                 }

                 ?>
     </div>
</div>
</nav>

        <div class=" col-md-12  text-info mt-0 mb-3" style="background-color:#fdc8d0;" id="navbarSupportedContent">
          <ul class="navbar-nav topnav-right " style="display: inline-block">
            <li class="nav-link hornavmenu la" ><a href="viewprobcat.php?cid=24" class="nav-item ">MEN</a></li>
            <li class="nav-link hornavmenu la" ><a href="viewprobcat.php?cid=25" class="nav-item ">WOMEN</a></li>
            <li class="nav-link hornavmenu la" ><a href="viewprobcat.php?cid=26" class="nav-item ">KIDS</a></li>
            <li class="nav-link hornavmenu la" ><a href="viewprobcat.php?cid=33" class="nav-item ">ENTERTAINMENT</a></li>
            <li class="nav-link hornavmenu la" ><a href="viewprobcat.php?cid=28" class="nav-item ">FURNITURE</a></li>
            <li class="nav-link hornavmenu la" ><a href="viewprobcat.php?cid=34" class="nav-item ">FOOTWEAR</a></li>
            <li class="nav-link hornavmenu la" ><a href="viewprobcat.php?cid=32" class="nav-item ">WATCHES</a></li>
            <!-- <li class="nav-link hornavmenu" style="padding-left:38px; padding-right:38px"><a href="" class="nav-item "></a></li>
            <li class="nav-link hornavmenu" style="padding-left:38px; padding-right:38px"><a href="" class="nav-item ">Communications</a></li>
            <li class="nav-link hornavmenu" style="padding-left:38px; padding-right:38px"><a href="" class="nav-item ">Beauty</a></li> -->
          </ul>
        </div>
                </div>
<script>
  $(document).ready(function(){

        $("#search").keyup(function(){
            //var q = this.value;
            var q = $(this).val();
        
        
        
            if(q!='')
            {
            $("#showresult").css({"border": "1px solid #ccc", "padding": "5px"});	
            
            $("#showresult").load('getresult.php?q='+q);
            }
            else
            {
              $("#showresult").css({"border": "0", "padding": "0"});	
              $("#showresult").text('');
            }
        });      
        });

  </script>