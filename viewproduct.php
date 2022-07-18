<?php 
include('dbconnect.php');
include('header.php'); 

$id = $_GET['pid'];
if(isset($_GET['carted'])){
  $carted = 1;
}else{
  $carted = 0;
}
if(isset($_GET['aiw'])){
    ECHO "<script> alert('Product already in Wishlist.')</script>"; 
}
if(isset($_GET['success'])){
  ECHO "<script> alert('Product Added in Wishlist.')</script>"; 
}
if(isset($_GET['error'])){
  ECHO "<script> alert('ERROR! please try again later.')</script>"; 
}
?>

      <div class="container-fluid text-center">
      <div id="selectors"></div>    
      <div class="col-md-12 ">
        <?php 
      $cmd = "select * from products where proid  = '".$id."'";
      $data = mysqli_query($conn, $cmd);
      $numrow = mysqli_num_rows($data);
      if($numrow <=0){
        echo "No data available";
      }else{
        while($row = mysqli_fetch_array($data)){?>
        <div class="col-md-1 img-responsive" style ="width:8% !important">
        <?php
            if(!$row['image']==''){?>
                <div class="thumbnail ml-0"><img src="<?php echo "productimages/".$row['image']; ?>"  onmouseover="mOver(this)" alt="pro image"></div>
            <?php
            }
            ?>
            <?php
            if(!$row['img1']==''){?>
                <div class="thumbnail ml-0"><img src="<?php echo "productimages/".$row['img1']; ?>"  onmouseover="mOver(this)" alt="pro image"></div>
            <?php
            }
            ?>
             <?php
            if(!$row['img2']==''){?>
                <div class="thumbnail"><img src="<?php echo "productimages/".$row['img2']; ?>"  onmouseover="mOver(this)" alt="pro image"></div>
            <?php
            }
            ?>
             <?php
            if(!$row['img3']==''){?>
                <div class="thumbnail"><img src="<?php echo "productimages/".$row['img3']; ?>" alt="pro image"  onmouseover="mOver(this)"></div>
            <?php
            }
            ?>
             <?php
            if(!$row['img4']==''){?>
                <div class="thumbnail"><img src="<?php echo "productimages/".$row['img4']; ?>" alt="pro image"  onmouseover="mOver(this)"></div>
            <?php
            }
            ?>
        </div>
        <div class="col-md-4 rounded">
            <img id="bigpic" src="<?php echo "productimages/".$row['image']; ?>"class="img-responsive thumbnail rounded" alt="image">
        </div>
        <div class="col-md-6 text-left px-5 prodetails" >
            <div class="col-md-8">

                <h1 style="color:#ffb6c1;"><?php echo $row['proname'];?></h1>
                <h5> MRP <i class="fa fa-inr " aria-hidden="true"><s></i> <?php echo $row['price'];?></s></h5>
                <h2><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row['MRP'];?></h2>
            </div>
            <div class="col-md-4">
              <?php



              $stock = $row['stcavl'];
             
              if($row['status'] == "Active"){
                if($stock != 0){
                  $active =  true;
                   }else{
                      $active = false;
                  }
              }else{
                  $active = false;
              }   

              if($active == true){
              ?>
                        <a href="addtocart.php?proid=<?php echo $id; ?>"  style="color:blue" ><p><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</p></a>
                        <a href="addtowish.php?pid=<?php echo $id; ?>" style="color:blue"><p ><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</p></a>
                        <a href="" style="color:blue"><p style="color:blue"><i class="fa fa-share" aria-hidden="true"></i> Share</p></a>
                <?php
                 }else{
                   ?>
                        <a href="" style="color:blue"><p ><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</p></a>
                        <a href="" style="color:blue"><p style="color:blue"><i class="fa fa-share" aria-hidden="true"></i> Share</p></a>
                <div class="text-danger">
                    <h3>Out Of Stock</h3>
                    </div>
                    
                  <?php
                 }
                 ?>
              </div>
            <div class="col-md-12 text-justify">
              <p><?php echo $row['descrip'];?>
              
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores at, necessitatibus debitis ullam excepturi recusandae dolorem quae quibusdam, fugiat repellendus facere quo aperiam quaerat harum velit delectus? Exercitationem, mollitia voluptatum.
              Repudiandae aut eligendi ab quaerat sit pariatur quidem, commodi officia repellat voluptates totam dolores aspernatur fuga maiores voluptatibus ipsum ut et? Officiis nisi esse hic beatae quibusdam atque magnam eius.
              Deleniti, est unde ipsum impedit nulla suscipit delectus enim nobis ullam omnis autem earum nesciunt fuga dignissimos sapiente odio rem eligendi voluptas exercitationem mollitia dolore! Consectetur enim nemo illo veritatis?
              Quae, tenetur amet voluptas cum autem eos iusto facere praesentium doloremque rem distinctio tempora voluptatem aliquam, repellat, qui sapiente. Voluptatum odit ut at quis quibusdam debitis illo, veniam eum. Qui?
              ecto rerum voluptatem? Similique neque eos hic ut, tenetur modi mollitia commodi autem facilis, molestias minus vero quo ipsum?
              Exercitationem rem culpa voluptatum dolorem quae sunt nisi odio optio consequuntur consequatur, eaque doloremque possimus voluptates quos quis cum veniam facilis porro vero magnam placeat. Enim natus ad voluptas modi.
              Qui expedita quos iste reprehenderit commodi beatae dignissimos corrupti illo dolorem, quam officiis veritatis facilis harum saepe, praesentium fugiat! Explicabo ut numquam, aperiam architecto et neque veniam impedit at aut.
              Quo cum natus expedita, harum deleniti itaque maxime temporibus doloribus dolores veniam! Delectus reiciendis sit distinctio dolore dignissimos corporis fuga, eligendi tempore itaque esse quis explicabo blanditiis assumenda natus. Nam?
            </p>
          </div> 
        </div>
        <div class="col-md-6 text-left">
        <p class="mt-5"></p>
           
        </div>
         
      
          
          <?php
        }
      }?>  
          
      <div class="col-md-12 discounts">

      </div>
    </div>
    </div>
    <script>
      
        function mOver(a){
           var src = a.getAttribute("src");
           document.getElementById("bigpic").src= src;
        }




          
        var carted = <?php echo $carted; ?>;
        console.log("carted" +carted);
        if(carted==1){
                 
          // clearInterval(id);
          id = setInterval(frame, 300);
          var count,counter;
          counter =0;
          var link = document.getElementById("cartlink");
          function frame() {
            counter++;
            if(count == 0){
              count = 1;
            }else{
              count = 0;
          } 
          if(count == 0){
              link.style.color= 'red';
              link.style.fontSize = '34px';
             
             
            }
            if(count == 1){
              link.style.color= 'white';
              
             }
             console.log(counter);
             if(counter ==10){
               clearInterval(id);
               link.style.color= 'white';
             }
        }           
        }

        
        </script>
     <?php include('footer.php');?>