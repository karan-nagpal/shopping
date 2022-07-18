<?php 
include('dbconnect.php');
include('header.php');
?>

 
     <div class="col-md-4 col-md-offset-4 text-center" style="height:550px; margin-top:145px">
         <h4 class="shadow bg-theme rounded p-2"> New Registration</h4>
         <form action="custregister.php" method="post" onsubmit= "return status()">
             <input type="text" class="adinput" name="name" placeholder="Name" >
             <input type="text" class="adinput" name="mobile" placeholder="Mobile" >
             <input type="text" class="adinput" name="email" placeholder="Email" >
             <input type="password" id="p1" class="adinput" placeholder="Password">
             <input type="password" id="p2" class="adinput" name="password" placeholder="Retype Password" >
             <input type="submit" class="mt-3 btn bg-theme btn-outline-success mb-5" value="Register">
         </form>
         <h4 class="text-danger">
             <?php
         
         if(isset($_GET['alreadyregistered'])){
             echo "Email or mobile number already Registered.";
            }
            
            ?>
        </h4>
        </div>
        <script>
            function status()
            {
                var p1 = document.getElementById("p1").value;
                var p2 = document.getElementById("p2").value;
                if(p1==p2){
                    return true;
                }else{
                    alert("Passwords do not match, please recheck passwords.");
                    return false;
                }
            }

        </script>

<?php include('footer.php');?>