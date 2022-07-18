<?php 
include('dbconnect.php');
include('header.php');
 ?>
 
     <div class="col-md-4 col-md-offset-4 text-center" style="min-height:700px">
         <h4 class="shadow bg-theme rounded p-2"> Register Yourself</h4>
         <form action="useregister.php" method="post">
             <input type="text" class="adinput" name="name" placeholder="Name">
             <input type="text" class="adinput" name="mobile" placeholder="Mobile no">
             <input type="text" class="adinput" name="cemail" placeholder="email">
             <?php
             if(isset($_GET['emailexist'])){
                 ?>
                <p class="text-danger ">Email already registered</p>
                <?php
             }
             ?>
             <input type="password" class="adinput" name="password" placeholder="Password">
             <input type="password" class="adinput" name="password" placeholder="Retype password">
             <input type="submit" class="mt-3 btn bg-theme btn-outline-success mb-5" value="Register">
         </form>
     </div>
<?php include('footer.php');?>