<?php 

include('dbconnect.php');
if(isset($_GET['cid'])){
$id = $_GET['cid'];
if($id == 'all'){
  $cmd = "select * from products";
}else{
$cmd = "select * from products where catid = '".$id."'";
}}else{
    $cmd = "select * from products";
}
if(isset($_GET['aiw'])){
  alert("Product Already in wishlist.");
}
?>

      <div class="mt-3">
        <table class="table table-light ">
          <tr>
          <th>Sn no</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Discounted Price</th>
            <th>price</th>
            <th>Available Stock</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
    <?php 
    $sn = 0;
      $data = mysqli_query($conn, $cmd);
      $numrow = mysqli_num_rows($data);
      if($numrow <=0){?>
        <tr>
             <td></td>
             <td></td>
             <td>No Products Available</td>
             <td></td>
             <td></td>
       <?php
      }else{     
    
        while($row = mysqli_fetch_array($data)){
          $sn++;
          ?>
            <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['proname'] ?></td>
            <td>
            <?php
              $catcmd = "select * from categories";
              $catdata = mysqli_query($conn, $catcmd);
              while($rowcatdata = mysqli_fetch_array($catdata)){
              
              if($row['catid']==$rowcatdata['catid']){
                echo $rowcatdata['name'];
              }}
            ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['MRP'] ?></td>
            <td><?php echo $row['stcavl'] ?></td>
            <td><a href="deactpro.php?proid=<?php echo $row['proid']; ?>" class="btn m-0 p-0" ><?php echo $row['status'] ?></a></td>
            <td><form action="modifyqty.php">
            
                <input type="hidden" value="<?php echo $row['proid']; ?>" name="proid">
                <input type="text" name="newqty" class="m-1 rounded" placeholder="qty" style="width:80px" required>
                <button type="submit" class="bg-theme"><i class="fa fa-pencil"></i></button>
                <!-- <input type="submit" class="btn btn-sm bg-theme" value="Update Qty"> -->
            </form>
            
         
            <a href="modifypro.php?proid=<?php echo $row['proid']; ?>" class="btn m-0 p-0" >Modify</td>
          </tr>
         
      
          
          <?php
        }
      }?>  
          </table>
      <div class="col-md-12 discounts">

      </div>
    </div>
    </div>
