<?php
include('header.php');
include('dbconnect.php');
include('leftnav.php');
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
    $cmd = "select catid from categories";
    $data = mysqli_query($conn, $cmd);
    $numrow = mysqli_num_rows($data);
    $numpage = $numrow/10;
      
?>
<div class="col-md-9"style="min-height:700px;">
    <div class="col-md-3 col-md-offset-1 form-group">
    <div class="col-md-12 text-center adminform bg-theme">

        <h5 class="bg-theme">Add New Category</h5>
        <form action="catadder.php" method="post" enctype="multipart/form-data">
            <input type="text" name="catname" class="form-control adinput form-control-sm" placeholder="Category Name" required>

            <input type="file" name="catimage" class="adinput" required>
            <input type="submit"  value="Add Category" class="btn btn-default adinputbtn" >
        </form>
       

        <?php
       if(isset($_GET['added'])){?>
        <p class="mt-1 btn-danger text-warning"> Category added succesfully!</p>
           <?php
        }
        
        

       
       if(isset($_GET['adderr'])){?>
        <p class="mt-1 btn-danger text-warning"> Category added succesfully!</p>
           <?php
        }
        ?>
     
    </div>
    
</div>    
<div class="col-md-4 col-md-offset-3 text-center">
    <div id="result"></div>

    <div id="radbutton"></div>
   

      
    <?php
       if(isset($_GET['del'])){?>
       <p class="mt-1 btn-danger text-warning">
           Category deleted succesfully.</p>
           <?php
        }
        ?>
        </div>
       
</div>
        
<script>
   var numOfpage = <?php echo $numpage; ?>;
   if (numOfpage>1){
   for(i=0; i<numOfpage; i++){
   var pageButton =document.createElement('input');
   pageButton.value = i+1;
   pageButton.type = 'button';
   pageButton.className = "pagebutton";
   pageButton.classList.add("pagebutton");
   var radButton = document.getElementById("radbutton");
   radButton.appendChild(pageButton);
   }}

   </script>
   <script>
  $(document).ready(
      function(){
            $("#result").load("catloader.php");

      });
                $('.pagebutton').click(function () {
                var value = this.value ;
                $("#result").load("catloader.php?id="+value);
    });
  
</script>
<?php



include('../footer.php');
?>