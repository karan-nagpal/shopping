<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/admin-styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='js/tinymce/tinymce.min.js'></script>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-theme">
  <a class="navbar-brand" href="#"><img src="../images/logo.png"alt="" id="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> </span>
  </button>
<div class="col-md-9 text-center">

  <h2>Welcome to admin panel</h2>
</div>
<?php
if(!isset($_SESSION['sname'])){
 ?> <a href="index.php" class="m-3">LOGIN</a>   
 <a href="dashboard.php">Home</a>
<?php
}else{
  ?><P>Welcome  <?php
  echo $_SESSION['sname'];
  ?></p>
  <p>    <a href="logout.php" class="m-3">LOGOUT</a></p>
  <?php
}

?>
  </div>
</nav>