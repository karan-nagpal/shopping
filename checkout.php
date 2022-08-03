<?php 
session_start();
if(!isset($_SESSION['userid'])){
    $_SESSION['checkout'] = 'yes';
    header('location:userlogin.php');
}else{
    $userid  = $_SESSION['userid'];
}
include('header.php');
include('dbconnect.php');

$userid = $_SESSION['userid'];
$cmd = "select * from cart where custid = '".$userid."'";
$data = mysqli_query($conn, $cmd);
$rows = mysqli_num_rows($data);
if($rows > 0){
        while($row1 = mysqli_fetch_array($data)){
        $cmd ="select * from products where proid = '".$row1['proid']."'";
        $result = mysqli_query($conn, $cmd);
        $row = mysqli_fetch_array($result);
        $qty = $row['stcavl'];
        $status= $row['status'];
        if($status == "Active"){
            if($qty == 0){
                header('location:cart.php');
            }
        }else{
            header('location:cart.php');
        }
    }
}
?>
<div class="col-md-12"  style="height:590px; margin-top:20px">
 <div class="col-md-3 ">
    
     <div class="col-md-12 text-center">
         <h4 class="shadow bg-theme rounded p-2"> Add new address</h4>
         <form action="addaddress.php" method="post">
             <input type="text" class="adinput" name="recpname" placeholder="Name">
             <input type="text" class="adinput" name="mobile" placeholder="Contact no">
             <input type="text" class="adinput" name="address" placeholder="Address">
             <input type="text" class="adinput" name="city" placeholder="City">
             <input type="text" class="adinput" name="state" placeholder="State">
             <input type="text" class="adinput" name="pincode" placeholder="Pincode">
             
             <input type="submit" class="mt-3 btn bg-theme btn-outline-success mb-5" value="Save Address">
            </form>
        </div>
    </div>
    
    <div class="col-md-3 col-md-offset-1 ">
        <?php
        if(isset($_SESSION['userid'])){
        $cmd = "select * from address where cid = '".$userid."'";
        $data = mysqli_query($conn, $cmd);
        $numrow = mysqli_num_rows($data);
        if($numrow == 0){
            echo "No address added";
        }else{
            $count = 0 ;
            ?>
            
                <form action="checkout.php" id="pincodeinput" >
                    <?php
                    while($row = mysqli_fetch_array($data)){
                $count++;
                if($count == 1)
                {
                    $aid = $row['aid'];
                    $a = 'checked';
                    
                }else{

                    $a ='';
                }
                if(isset($_GET['address'])){
                        if($_GET['address'] == $row['aid']){
                            $a = "checked";
                        }else{
                            $a = "";
                        }
                }
                ?>
                    <div class="mt-3 shadow p-3  text-left">

                        <input type="radio" name ="address" class = "adr" value="<?php echo $row['aid']; ?>" <?php echo $a ?>>
                        <?php
                            echo $row['recpname'].' - '.$row['mobile'].'  '.$row['address'].'  '.$row['state'].'  '.$row['pincode']; 
                            ?>
                        <a href="deladdress.php?aid=<?php echo $row['aid']; ?>">Delete</a>
                    </div>
                    <?php 
                }
            }
            ?>
                </form>
            </div>
            <?php
        }else{
            echo "please login to view addresses.";
        }
        ?>
        <div class="col-md-3 col-md-offset-2">
        <div class="col-md-10">
        <?php
                if(isset($_GET['address'])){
                    $aid = $_GET['address'];
                    $addcmd = "select pincode from address where aid = '".$aid."'";
                    $addata = mysqli_query($conn, $addcmd);
                    $addrow = mysqli_fetch_array($addata);
                    $_SESSION['pincode'] = $addrow['pincode'];
                    $deliverycmd = "select * from delcharge where pincode = '".$addrow['pincode']."'";
                    $deliverydata = mysqli_query($conn, $deliverycmd);
                    $deliveryrow = mysqli_fetch_array($deliverydata);
                    $_SESSION['delcharge'] = @$deliveryrow[1];
                  
                }
        ?>
            
            <?php
                $total = $_SESSION['total'];
                if(is_numeric($_SESSION['delcharge'])){
                $delchar = $_SESSION['delcharge'];
            }else{
                $delchar = 0;
            }

                $perc = $_SESSION['discountrad'];
                $finalpay = ($total*$perc/100)+$total+$delchar;           
            ?>
            <div class="col-md-10 text-center">
            <div class="col-md-6">Total Amount</div>    
            <div class="col-md-6"><p><?php echo $finalpay; ?></p></div>
            
            </div>
          
        <form action="finalprocess.php" method="post">
            <input type="hidden" id="aid" name="address" value="<?php echo $aid ?>">
            <input type="submit" value="Proceed to pay">
        </form>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $('.adr').click(function(){
                // $('#aid').val($(this).val());
                $('#pincodeinput').submit();   
            });
        });
        </script>
<?php include('footer.php');?>