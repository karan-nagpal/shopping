<?php
include('header.php');

include('dbconnect.php');
include('leftnav.php');
?>
<div class="col-md-10 text-center"style="min-height:700px; padding-top:50px">
<h3>Your Business at a glance</h3>
<div class="col-md-1 col-md-offset-1  border text-center adpanel shadow">
<?php    
$cmd = "select * from orders";
$data = mysqli_query($conn, $cmd);
$numrow = mysqli_num_rows($data);
?><p><?php echo $numrow; ?></p>
<p>Total Orders</p>


</div>
<div class="col-md-1 col-md-offset-1 border text-center adpanel shadow">
<?php    
$cmd2 = "select * from Customers";
$data2 = mysqli_query($conn, $cmd2);
$numrow2 = mysqli_num_rows($data2);
?><p><?php echo $numrow2; ?></p>
<p>Total Customers</p>

</div>
<div class="col-md-1 col-md-offset-1 border text-center shadow adpanel">
<?php    
$cmd3 = "select * from discounts";
$data3 = mysqli_query($conn, $cmd3);
$numrow3 = mysqli_num_rows($data3);
?><p><?php echo $numrow3; ?></p>
<p>Total Discounts</p>

</div>
<div class="col-md-1 col-md-offset-1 border text-center shadow adpanel">
<?php    
$cmd4 = "select * from messages where status  = '1'";
$data4 = mysqli_query($conn, $cmd4);
$numrow4 = mysqli_num_rows($data4);
?><p><?php echo $numrow4; ?></p>
<p>Unread Messages</p>

</div>
</div>

<?php
include('footer.php');
?>