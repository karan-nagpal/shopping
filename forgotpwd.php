<?php 
include('dbconnect.php');
include('header.php');
if(isset($_SESSION['uname'])){
    $st ="disabled";
}else{
    $st='';
}?>

 
     <div class="col-md-4 col-md-offset-4 text-center" style="min-height:700px; padding-top:100px">
         <h4 class="shadow bg-theme rounded p-2"> Reset Password</h4>
         <form action="pwdresetter.php" method="post">
             <input type="text" class="adinput" name="userid" placeholder="Email Id" <?php echo $st; ?>>
             <input type="submit" class="mt-3 btn bg-theme btn-outline-success mb-5" value="Reset Password">
         </form>
         <?php if($st == "disabled"){
            echo $_SESSION['uname']." is already logged in, if you wanna change account try logging out first. ";
         }
 ?>
<?php include('footer.php');?>