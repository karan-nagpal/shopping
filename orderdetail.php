<?php
include('header.php');
include('dbconnect.php');
?>

<h3 class="text-center">Order details</h3>

<?php
include('dbconnect.php');
$usr = $_SESSION['userid'];
$oid = $_GET['oid'];

$cmd = "select * from orders where oid = '".$oid."'";
$data = mysqli_query($conn, $cmd);
$row = mysqli_fetch_array($data);
?>
<div class="col-md-8 col-md-offset-2 tex-left p-0" style="min-height:400px">

    <div class="col-md-2 m-0 p-0">

        <p>Order date:  </p>
        <p>Address: </p>
        <p>Order Amount:  </p>
        <p>Order status:  </p>
        <p>Payment Status:  </p>
    </div>
    <div class="col-md-8 m-0 p-0">
    
        <p><?php echo $row['orderdate'];?></p>
        <p><?php echo $row['address'];?></p>
        <p><?php echo $row['amount'];?></p>
        <p><?php echo $row['orderstatus'];?></p>
        <p><?php echo $row['paystatus'];?></p>
        
    </div>
    <table class='table'>
        <tr>
            <td>Sr No</td>
            <td>Product Name</td>
            <td>Qty</td>
            <td>Price</td>
            
        </tr>
        
        <?php
  $sn = 0;
  $cmd2 = "select * from orderdetails where orderid = '".$oid."'";
  $data2 = mysqli_query($conn, $cmd2);
  while($row2 = mysqli_fetch_array($data2)){
      $proid = $row2['proid'];
      $sn++;
        $cmd3 = "select * from products where proid  = '".$proid."'"; 
      $data3 = mysqli_query($conn, $cmd3);
      $row3 = mysqli_fetch_array($data3);
      ?>
            <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $row2['proname']; ?></td>
                <td><?php echo $row2['qty']; ?></td>
                <td><?php echo $row2['price']; ?></td>
                
            </tr>
            <?php
        }
        ?>
</table>
</div>
</div>
<?php

include('footer.php');
?>
<script>

</script>