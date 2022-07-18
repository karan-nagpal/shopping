<?php
include('header.php');

if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
include('leftnav.php');       
?>
<div class="col-md-10" style="min-height:700px">
    <?php
        $oid = $_GET['oid'];?>
        <div class="m-3">
            <a href="vieworders.php" class="btn"><i class="fa fa-arrow-left " style="font-size: 20px"></i></a>
            <h3>Details for Order no <?php echo $oid; ?></h3>
        </div>
        <div class="m-3">
        <?php
            $cmd2 = "select * from orders where oid  = '".$oid."'";
            $data2 = mysqli_query($conn, $cmd2);
            $row2 = mysqli_fetch_array($data2);
                $userid = $row2['userid'];
            $cmd3 = "select email from Customers where cid  = '".$userid."'";
            $data3 = mysqli_query($conn, $cmd3);
            $row3 = mysqli_fetch_array($data3);
            
            ?>
             <hr>
             <p>Order was placed on <?php echo $row2['orderdate']; ?> at <?php echo $row2['ordertime']; ?></p>
            <p> Shipping Address:
            <h4><?php echo $row2['address']; ?></h4> </p>
            <p>Email: <?php echo $row3['email']; ?></p>
            <p>Payment Status: <?php echo $row2['paystatus']; ?></p>
            <p>Status: <?php echo $row2['orderstatus']; ?></p>
            <p>Order Amount: <i class="fa fa-inr"></i> <?php echo $row2['amount']; ?></p>
            <p>Discount Amount: <?php echo $row2['discount']; ?></p>
            <?php
            
            
            $cmd = "SELECT * FROM orderdetails where orderid = '".$oid."'";
            
            $data = mysqli_query($conn, $cmd);
            $numrow = mysqli_num_rows($data);
            ?>
              <p> Total products in order: <?php echo $numrow;?></p>
              <hr>
              <?php
        while($row = mysqli_fetch_array($data)){
           
        ?>
         <h3>Product Details</h3>
        
        <p>Product Name: <?php echo $row['proname']; ?></p>
        <p>Qty: <?php echo $row['qty']; ?></p>
        <p>Price: <i class="fa fa-inr"></i> <?php echo $row['price']; ?></p>
        
       <hr>
        <?php
        }

        ?>
    
    <!-- <script>
      $(document).ready(
      function(){
            $("#catdiv").load("orderviewer.php");

      });
                $('#catselectr').on('change', function() {
                    var value = this.value ;
                 
                $("#catdiv").load("orderviewer.php?status="+value);
                });
                
    
    </script> -->
            </div>
</div>
<dic class="col-md-12 m-0 p-0" id="catdiv"></dic>
</div>    
<?php
include('../footer.php');
?>