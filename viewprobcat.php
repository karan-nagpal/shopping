<?php 
include('dbconnect.php');
include('header.php'); 

$id = $_GET['cid'];

?>

      <div class="container text-center"style="min-height:680px">
        <div class="container">
        <?php 
      $cmd = "select * from products where catid = $id";
      $data = mysqli_query($conn, $cmd);
      $numrow = mysqli_num_rows($data);
      if($numrow <=0){
        echo "No data available";
      }else{
        while($row = mysqli_fetch_array($data)){
          ?>
          <div class="col-md-2 ">
            <div class="col-md-10 cardsview">
              <a href= "viewproduct.php?pid=<?php echo $row['proid']; ?>">
              <img src="productimages/<?php echo $row['image'] ?>" class="img-responsive" alt="product image" >
              <p><?php echo $row['proname'] ?></p></a>
            </div>
          </div> 
          <?php
        }
      }?>  
          
      <div class="col-md-12 discounts">

      </div>
    </div>
    </div>
     <?php include('footer.php');?>