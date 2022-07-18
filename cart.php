<?php 
include('dbconnect.php');
include('header.php'); 
            
if(isset($_GET['discountid'])){
$_SESSION['discountid'] = $_GET['discountid'];
$_SESSION['discountrad'] = $_GET['discountrad'];
}else{
    if(!isset($_SESSION['discountid'])){
    $_SESSION['discountid'] = '';
    $_SESSION['discountrad'] = 0;
}}
$cheks = "disabled";
 ?>


<!-- products div -->
 <div class="col-md-9"> 
    <div class="col-md-7 col-md-offset-1 bg-theme shadow ">
        <div class="col-md-7 text-left font-weight-bold">
            <h5><i class="fa fa-shopping-cart"></i> Your Cart</h5>
        </div> 
        <div class="col-md-3 p-1 text-right ">
            <a href="emptycart.php" class="nav-link">Empty Cart</a>
        </div>
    </div>

          <?php
          $_SESSION['cart'] = 'yes';
           $total = 0;
            $loadpage ='';
            $rads='';
            
            if(isset($_SESSION['userid'])){
               
                $userid = $_SESSION['userid'];
                $cmd = "select * from cart where custid = '".$userid."'";
                $data = mysqli_query($conn, $cmd);
                $rows = mysqli_num_rows($data);
                if($rows > 0){
                        while($row1 = mysqli_fetch_array($data)){
                        $cmd ="select * from products where proid = '".$row1['proid']."'";
                        $result = mysqli_query($conn, $cmd);
			            $row = mysqli_fetch_array($result);
                        $qty = $row1['qty'];
                        if($row['status'] == "Deactivated"){
                            $cheks = "disabled";
                        }else{
                            if($row['stcavl'] == 0){
                                $_SESSION['stk'] = 0;
                                $cheks = "disabled";
                            }else{
                                $cheks = "";
                            }
                        }
                        
                        
                        $pid = $row1['proid'];
                        $amt = $qty*$row['price'];
                        $total = $total+$amt;
                        ?>
                        <div class="col-md-7 col-md-offset-1 shadow p-0 mb-5 my-5 bg-white rounded">
                <div class="col-md-2 my-3">
                     <img src="productimages/<?php echo $row['image']; ?>" class="img-responsive thumbnail"alt="">
                </div>
                <div class="col-md-9 text-left"> 
                    <div class="col-md-9">
                         <p style="font-size: 20px"><?php echo $row['proname']; ?></p>
                    </div>
                    <div class="col-md-3 ">
                        <a href="removefromcart.php?pid=<?php echo $row['proid']; ?>" class="nav-link"><p class="text-danger  text-center">Remove</p></a>
                    </div>
                    
                    <div class="col-md-4">
                         <p style="font-size:22px"><i class="fa fa-inr"></i> <?php echo $row['price']; ?></p> 
                    </div>
                    <div class="col-md-8 ">
                        <?php
                        if($cheks == "disabled"){
                            echo "item Out of stock";
                        }
                        ?>
                    </div>
                   
                    <div class="col-md-3 text-center d-flex " style="margin-bottom:10px">
                        <a href="qtycart.php?pid=<?php echo $pid; ?>&qty=<?php if($qty>1){echo ($qty-1);}else{ echo "1"; } ?>">
                        <span id="minus" class="btn bg-theme" onclick="minus()">-</span></a>
                        <?php
                        if($qty != 0){ ?>
                        <p id="qty" class=" m-2 p-2"><?php echo $row1['qty']; ?></p> <?php }
                        else{?> <p class=" m-2 p-2"><?php  echo  0; } ?></p>
                        <a href="qtycart.php?pid=<?php echo $pid; ?>&qty=<?php echo ($qty+1); ?>"><span id="plus" class="btn bg-theme border-0" onclick="plus()"> +</span></a>
                       
                    </div>
                </div>
        </div>
        <?php            $loadpage = "checkout.php";      
         }
                    }else{ ?>
                        <div class="col-md-7 col-md-offset-1  text-center p-0 mb-5 my-5 bg-white rounded">
                        <?php echo "Your Cart is empty.";
                         $cheks = "disabled";
                        $checkout = 1; ?>
                        </div>
                        <?php
                    
                }
            }else{
                            // print_r(count($_SESSION['qty']));
		            $index = 0;
                   
                    if(isset($_SESSION['products'])){
		            foreach ($_SESSION['products'] as  $pid) 
		            {
		            	$qty = (float)$_SESSION['qty'][$index];
		            	$cmd ="select * from products where proid='".$pid."'";
		            	$result = mysqli_query($conn, $cmd);
		            	$row = mysqli_fetch_array($result);
                        if($row['status'] == 'Deactivated'){
                            $_SESSION['stk'] = 0;
                            $cheks = "disabled";
                        }else{
                            $cheks = "";
                        }
                        if($row['stcavl'] == 0){
                            $_SESSION['stk'] = 0;
                             $cheks = "disabled";
                        }else{
                            $cheks = "";
                        }
                        $amt = $qty*$row['price'];
                        $stock = $row['stcavl'];
                        $total = $total+$amt;
                    
                   
                    ?>

        <div class="col-md-7 col-md-offset-1 shadow p-0 mb-5 my-5 bg-white rounded">
                <div class="col-md-2 my-2">
                 <img src="productimages/<?php echo $row['image']; ?>" class="img-responsive thumbnail"alt="">
                 </div>
                <div class="col-md-9 text-left">
                      
                <div class="col-md-9">
                         <p style="font-size: 20px"><?php echo $row['proname']; ?></p>
                    </div>
                    <div class="col-md-3 ">
                        <a href="removefromcart.php?pid=<?php echo $row['proid']; ?>" class="nav-link"><p class="text-danger  text-center">Remove</p></a>
                    </div>
                    <div class="col-md-12">
                            <p><s><i class="fa fa-inr"></i><?php echo $row['MRP']; ?></s></p>
                    </div>  
                    
                         <div class="col-md-8 ">
                        <?php
                        if($cheks == "disabled"){
                            echo "item Out of stock";
                        }
                        ?>
                    </div>
                   
                                     
                        <div class="col-md-3 text-center d-flex " style="margin-bottom:10px">
                        <a href="qtycart.php?pid=<?php echo $pid; ?>&qty=<?php if($qty>1){echo ($qty-1);}else{ echo "1"; } ?>">
                        <span id="minus" class="btn bg-theme">-</span></a>
                        <p id="qty" class=" m-2 p-2"><?php echo $qty; ?></p>
                        <a href="qtycart.php?pid=<?php echo $pid; ?>&qty=<?php if($qty == $stock){echo ($stock);}else{ echo $qty+1; }; ?>"><span id="plus" class="btn bg-theme border-0" > +</span></a>
                        </div>
                       
                       
                </div>
        </div>

                        <?php
		        	$index++;
                    $loadpage = "checkout.php";
		        }}
        else{?>
              <div class="col-md-7 col-md-offset-1  text-center p-0 mb-5 my-5 bg-white rounded">
              <?php echo "Your Cart is empty.";
              $cheks = "disabled";
              $loadpage = ""; ?>
              </div>
             <?php
        }}
	?>
                
               
            
        </div>
       <?php $_SESSION['total'] = $total ?>
<!-- calculations div -->
               
<div class="col-md-2 text-left">
    <div class="col-md-12  shadow p-0 mb-5 bg-white rounded">
    <div class="col-md-12 text-center font-weight-bold">
       
        <p class="shadow bg-theme">Payment details</p>
    </div>    
        <div class="col-md-12 my-2" >
            <div class="col-md-6">Price</div>
            <div class="col-md-6"><p id="price"><?php echo $total; ?></p></div>
            </div>
            <div class="col-md-12 my-2">
            <div class="col-md-6 ">Discount</div>
            <div class="col-md-6 "><p id="discount">
            <?php
            if(isset($_SESSION['discountrad'])){
                echo $_SESSION['discountrad'];
                
            }else{
                echo '0';
            }

            ?></p></div>
        </div><div class="my-2 col-md-12 ">
        <div class="col-md-6 ">savings</div>
        <div class="col-md-6 "><p id="savings"><?php
        if(isset($_SESSION['discountrad'])){ echo $_SESSION['discountrad'];}else{echo "0";} ?></p></div>
        </div>
        <div class="col-md-12 my-2 ">  
        <div class="col-md-6 ">Delivery charges</div>
        <div class="col-md-6 p-2 " id="delcharg"><p class="ml-3" id="delcharge"> 
            <?php 
            $d = 50;   
            if(!isset($_SESSION['pincode'])){
            $_SESSION['delcharge'] = 50;
            $d = 50;
            }else{
                $pincode = $_SESSION['pincode'];
                $delcmd ="select * from delcharge where pincode = $pincode";
                    $delchardata = mysqli_query($conn, $delcmd);
                    $delcharnum = mysqli_num_rows($delchardata);
                    
                    if($delcharnum != 0){
                        $delcharrow = mysqli_fetch_array($delchardata);
                        
                        if($total >= $delcharrow['minamnt']){
                            $_SESSION['delcharge'] = '0';
                            $d = 0;
                            
                        }else{
                            $_SESSION['delcharge'] = $delcharrow['delchar'];
                            $d = $delcharrow['delchar']; 
                            
                        }
                    }else{
                        $_SESSION['delcharge'] = 50;
                        $d = 50;
                    }  
            }
            if(isset($_POST['pincode'])){
                $pincode = $_POST['pincode'];
                $_SESSION['pincode'] = $pincode;
                // }else{
                    $delcmd ="select * from delcharge where pincode = $pincode";
                    $delchardata = mysqli_query($conn, $delcmd);
                    $delcharnum = mysqli_num_rows($delchardata);
                    
                    if($delcharnum != 0){
                        $delcharrow = mysqli_fetch_array($delchardata);
                        
                        if($total >= $delcharrow['minamnt']){
                            $_SESSION['delcharge'] = 0;
                            $d = 0;
                            
                        }else{
                            $_SESSION['delcharge'] = $delcharrow['delchar'];
                            $d = $delcharrow['delchar']; 
                            
                        }
                    }else{
                        $_SESSION['delcharge'] = 50;
                        $d= 50;
                    }
            }
                        echo $_SESSION['delcharge'];
                        
                         ?></div>
        <div class="col-md-6 font-weight-bold m-1" >Total</div>
        <div class="col-md-5 font-weight-bold"><p id="finalpay"><?php echo $total + $d; ?></p></div>
        <div class="col-md-6 " >
            <form action="checkout.php" method="post">
            <input type="hidden" id="disinp">
            <input type="submit" value="Checkout" class=" p-1 mx-1 my-2 btn btn-primary" <?php echo $cheks;  ?>></a>
            </form>
        </div>
    </div>  
    </div>
    <div class="col-md-12  shadow p-0  bg-white text-left rounded">
                    <?php $discmd ="select * from discounts where status = 'Active'";
                        $discdata = mysqli_query($conn, $discmd);
                        $disnum = mysqli_num_rows($discdata);
                        $serial = 0;
                        if($disnum > 0){
                            while($discrow = mysqli_fetch_array($discdata)){
                                $serial++;
                                if($total >= $discrow['minamnt'] ){
                                    $discnt =  $total*$discrow[1] /100;
                                    $saving = $discrow[1];
                                    $rads = "";
                                    // $_SESSION['discount'] = $discrow[1];
                                }else{
                                    $rads = "disabled";
                                    $discnt = 1;
                                    $saving = 0;
                                } 
                                ?>
                            <div class="col-md-12  shadow p-0  bg-white text-left rounded mt-2">
                                <form action="cart.php" id="<?php echo "discform".$discrow[0];?>">
                                <input type="hidden"class="my-1 mx-2 discrad" value="<?php echo $discrow[0];?>" name="discountid">
                                <input type="radio"class="my-1 mx-2 discrad" id="<?php echo $discrow[0];?>" value="<?php echo $discrow[1];?>" name="discountrad" <?php echo $rads;?> >
                                    <span>Discount <?php echo $discrow[1];?> % flat for orders above <?php echo $discrow['minamnt'];?></span> </div><?php
                               ?> </form> <?php     
                        }
                    }
                        if(isset($_SESSION['discount'])){
                                $disc = $_SESSION['discount'];
                                $discnt =  $total*$disc /100;
                                $saving = $disc;
                                $rads = "";
                        }                       
                    ?>                  
        <div class="col-md-12  shadow p-0 my-3 bg-white text-right rounded">
                <form action="cart.php" method="post">
                <input type="text"class="my-2 mx-2" name="pincode" style="width:95%; border-radius:5px" placeholder="Pincode">
                <button class="my-1 btn btn-outline-success">Check</button>
                </form>
        </div>
    <div>
    
      <div class="col-md-12 discounts">

      </div>
    </div>
    </div>
    

        <script>
            
        $(document).ready(function(){
                var sav = <?php echo $_SESSION['discountrad'];?>;
                var total = <?php echo $total; ?>;
                var disc = total*sav /100;
                $("#discount").text(disc);
                var delcharges = parseFloat($(delcharg).text());
                if($.isNumeric(delcharges)){
                   }else{
                    delcharges = 0;
                }

                var finalpay = total-disc+delcharges;
                
                $('#finalpay').text(finalpay);
             $('.discrad').click(function(){
                $('#disinp').val($(this).attr("id"));
                $('#savings').text($(this).val());
                var sav = $(this).val();
                var total = <?php echo $total; ?>;
                var disc =total*sav /100;
                $("#discount").text(disc);
                var delcharges = parseFloat($(delcharg).text());
                var finalpay = total-disc+delcharges;
                $('#finalpay').text(finalpay);
                var formId1 = $(this).attr("id");
                var i = 'discform'.concat(formId1.toString());
                $('#'+i).submit()
            });
        });
        var discid = '<?php echo $_SESSION['discountid']; ?>';
        if(discid !== ''){
            document.getElementById(discid).checked = true;
        }
            
        </script>
       
    <?php include('footer.php');?>