<?php
include('header.php');
include('dbconnect.php');
?>
<h3 class="text-center">Your orders</h3>
<?php
$usr = $_SESSION['userid'];
$cmd = "select * from orders where userid = '".$usr."' order by orderdate desc";
$data = mysqli_query($conn, $cmd);
$numrow = mysqli_num_rows($data);
?>
<table class="table p-5">
    <tr>
        <th>Sr No</th>
        <th>Order date</th>
        <th>Address</th>
        <th>Order Amount</th>
        <th>Payment Status</th>
        <th>Order Status</th>
        <th>Actions</th>
    </tr>

<?php
if($numrow > 0){
    $sn = 0;
    while($row = mysqli_fetch_array($data)){
        $sn++;
?>
        <div class="col-md-9 col-md-offset-3" >
            <?php
                $cmd2 = "select * from orderdetails where orderid = '".$row['oid']."'";
                $data3 = mysqli_query($conn, $cmd2);


            ?>
        
            <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $row['orderdate']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['paystatus']; ?></td>
                <td><?php echo $row['orderstatus']; ?></td>
               <td><a href="orderdetail.php?oid=<?php echo $row['oid']; ?>" class="m-1">Details</a>
               <a href="" class="m-1">Cancel</a></td>
            </tr>
        </div>

<?php
    }
}
?>
</table>
<?php

include('footer.php');
?>
<script>

</script>