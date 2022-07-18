
<?php 
include('dbconnect.php');
include('header.php');
 ?>

      <?php include('slider.php'); ?>
</div>

      <div class="container-fluid">
        <div class="container text-center mt-3">

          <h3>Top Sellers of the month</h3>
        </div>
            <?php
              $cmd2 = "select * from products limit 1 , 10";
              $data2 = mysqli_query($conn, $cmd2);
              while($row2 =mysqli_fetch_array($data2)){
              
            ?>
            
      <div class="col-md-2 text-center m-3 " style="overflow=hidden">
        <a href="viewproduct.php?pid=<?php echo $row2['proid']; ?>"  alt="image"  style="height:100px">
        <img src="productimages/<?php echo $row2['image']; ?>" class=" m-1 img-responsive shadow"alt="image">
        <p><?php echo $row2['proname']; ?></p></a>
      </div>
      
      <?php
              }
              ?>
     

      <div class="col-md-12 text-center">  
        <h3>Choose from Categories</h3>
        <?php 
      $cmd = "select * from categories";
      $data = mysqli_query($conn, $cmd);
      $numrow = mysqli_num_rows($data);
      if($numrow <=0){
        echo "No data available";
      }else{
        while($row = mysqli_fetch_array($data)){?>

         
      
          <div class="col-md-3 text-center catview">
            <!-- <div class="col-md-10 cardsview"> -->
              <a href= "viewprobcat.php?cid=<?php echo $row['catid']; ?>"><img src="categoryimages/<?php echo $row['image'] ?>" class="catimage img-circle shadow" alt="catimage">
                            <p class="pt-2">
                              <?php echo $row['name'] ?>
                            </p>
                          </a>
            </div>
          
          <?php
        }
      }?>  
      </div>
    </div>
      <div class="container">
        
      </div>
     <?php include('footer.php');?>