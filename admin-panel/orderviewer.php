<?php 

include('dbconnect.php');
if(isset($_GET['status'])){
    $status = $_GET['status'];
if($status == 'All'){
    $cmd = "select * from orders order by oid desc";
}else{
    $cmd = "select * from orders  where orderstatus = '".$status."' order by oid desc" ;
  }
}else{
      $cmd = "select * from orders order by oid desc";
} 

?>
<table class="table">
<tr>
    <th>Sr no</th>
    <th>Order date</th>
    <th>User Name</th>
    <th>Email</th>
    <th>Contact No</th>
    <th>Order Amount</th>
    <th> Status</th>
    <th> Actions</th>
</tr>
<?php
$data = mysqli_query($conn, $cmd);
$numrow = @mysqli_num_rows($data);
echo mysqli_error($conn);
if($numrow > 0){
  $sn = 0;
while($row  = mysqli_fetch_array($data)){
  $sn++;
          ?>
          <tr>
          <td><?php echo $sn; ?></td>
          <td><?php echo $row['orderdate']; ?></td>
          <td><?php
          $cmdpro = "select * from Customers where cid = '".$row['userid']."'";
          $custdata = mysqli_query($conn, $cmdpro);
          $custrow = mysqli_fetch_array($custdata);
          echo $custrow['custname'];
          ?></td>
          <td><?php echo $custrow['email']; ?></td>
          <td> <?php echo $custrow['mobile']; ?></td>
          <td> <?php echo $row['amount'];?></td>
          <td> 
          <?php 
          //echo $row['orderstatus'];
          ?>
            <form action="statuschange.php" id="form<?php echo $row['oid']; ?>">
              <input type="hidden" name="oid" value="<?php echo $row['oid']; ?>">
            <select class="bg-theme toggler " name="statusselector" id = "toggle<?php echo $row['oid']; ?>"  style=" border-radius:5px";>
                <option value="CONFIRMED" <?php if($row['orderstatus'] == 'CONFIRMED'){echo "selected";}?>>CONFIRMED</option>
                <option value="SHIPPED" <?php if($row['orderstatus'] == 'SHIPPED'){echo "selected";}?>>SHIPPED</option>
                <option value="DELIVERED" <?php if($row['orderstatus'] == 'DELIVERED'){echo "selected";}?>>DELIVERED</option>
                <option value="CANCELLED" <?php if($row['orderstatus'] == 'CANCELLED'){echo "selected";}?>>CANCELLED</option>
                <option value="NOT CONFIRMED" <?php if($row['orderstatus'] == 'NOT CONFIRMED'){echo "selected";}?>>NOT CONFIRMED</option> 
           </select>
           </form>
           </td>
          <td ><a href="orderdetails.php?oid=<?php echo $row['oid'];?>" class="btn text-success">Details</a></td>
          
        </tr>

<?php

}
}else{ ?>
  <tr>
  <td colspan = "8" ><p class="text-center"><?php
  echo "No orders yet";
  ?>
  </p>
  </td>
  </tr>
  <?php
}

?>
<script>
 $(document).ready(function(){
        $('.toggler').on('change', function() {
        var a = confirm("Do you want to change status of order?");
        if(a){
        var value = this.value ;
        var id = this.id.substr(6); 
        $("#form"+id).submit();
         }
          });
      });
                
</script>
 

