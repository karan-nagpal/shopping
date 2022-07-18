<?php 

if(isset($_SESSION['sname'])){
    $st ="disabled";
}else{
    $st='';
}
    include('header.php');
    include('dbconnect.php');
?>

 
     <div class="col-md-4 col-md-offset-4 text-center" style="height:700px; padding-top:100px">
         <h4 class="shadow bg-theme rounded p-2"> Login</h4>
         <form action="sellerlogger.php" method="post">
             <input type="text" class="adinput" name="sellerid" placeholder="User ID" <?php echo $st; ?>>
             <input type="password" class="adinput" name="password" placeholder="Password" <?php echo $st; ?>>
             <input type="submit" class="mt-3 btn bg-theme btn-outline-success mb-5" value="Login">
         </form>
         <?php if($st == "disabled"){
            echo $_SESSION['sname']." is already logged in, if you wanna change account try logging out first. ";
 }?>
  <?php if(!isset($_GET['error'])){
            
            }else{
              echo "Invalid Login";
            }?>
     </div>
<?php include('footer.php');?>