<?php
session_start();
if(isset($_SESSION['userid'])){
    $usr = $_SESSION['userid'];
}else{
    header('location:userlogin.php');
}
include('header.php');
?>
<div style="min-height:680px" class="text-center">
<h3 class="text-center">Your Wishlist</h3>
<?php

$cmd = "select * from wishlist where userid = '".$usr."'";
$data = mysqli_query($conn, $cmd);
$numrow = mysqli_num_rows($data);
if($numrow > 0){
    while($row = mysqli_fetch_array($data)){
?>
       <div class="col-md-offset-3 col-md-6 shadow mb-3">
            <?php
                    $cmd2 = "select * from products where proid = '".$row['proid']."'";
                    $data2 = mysqli_query($conn, $cmd2);
                    $numrow2 = mysqli_num_rows($data2);
                    $row2 = mysqli_fetch_array($data2);

                    ?>    
                    <div class="col-md-2 m-1">
                        <img src="productimages/<?php echo $row2['image']; ?>" class="img-rounded"alt="image" style="width:50px">
                    </div>
                    <div class="col-md-9 m-1 ">
                       <a href="viewproduct.php?pid=<?php echo $row2['proid']; ?>"><h3><?php echo $row2['proname']; ?></h3></a> 
                    </div>
                    <a href="removefromwish.php?wid=<?php echo $row['wid']; ?>"><i class="fa fa-times  text-right text-danger"></i></a>
        </div>
    </div>
<?php
    }
}else{
    echo "Your Wishlist is empty.";
}
include('footer.php');

?>