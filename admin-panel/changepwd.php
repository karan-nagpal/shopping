<?php
include('header.php');

if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
include('leftnav.php');       
?>
<div class="col-md-3 col-md-offset-3 text-center " style="min-height:700px; padding-top:100px">
<form action="pwdchanger.php" method="post" onsubmit="return check()">
            <h3>Hello <?php echo $_SESSION['sname']; ?></h3>
            <p class="text-center bg-theme bourder rounded">Change Password</p>
            <input type="password" class="adinput" id="p1" placeholder="Password">
            <input type="password" class="adinput" id="p2" name="password" placeholder="Retype Password" >
            <input type="submit" class="mt-3 btn bg-theme btn-outline-success mb-5" value="Change Password">
         </form>
</div>
<script>
    function check(){
        var p1 = document.getElementById("p1").value;
        var p2 = document.getElementById("p2").value;
        if(p1==p2){
            return true;
        }else{
            alert("Passwords do not match.");
            return false;
        }
    }
    </script>
   
<?php
include('../footer.php');
?>