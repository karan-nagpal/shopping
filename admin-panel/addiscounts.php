<?php
include('header.php');
include('dbconnect.php');
include('leftnav.php');

    $cmd = "select catid from categories";
    $data = mysqli_query($conn, $cmd);
    $numrow = mysqli_num_rows($data);
    $numpage = $numrow/10;
      
?>
<div class="col-md-9"style="min-height:700px;">
    <div class="col-md-3 col-md-offset-1 form-group">
    <div class="col-md-12 text-center adminform bg-theme">

        <h5 class="bg-theme">Add Discounts</h5>
        <form action="discadder.php" method="post">
            <input type="text" name="disname" class="form-control adinput form-control-sm" placeholder="Discount in Percentage" required>

            <input type="text" name="minamt" class="form-control adinput form-control-sm" placeholder="Minimun Amount " required>
            <input type="submit"  value="Add Discount" class="btn btn-default adinputbtn" >
        </form>
       

        <?php
       if(isset($_GET['added'])){?>
        <p class="mt-1 btn-danger text-warning"> Discount added succesfully!</p>
           <?php
        }
        
        

       
       if(isset($_GET['adderr'])){?>
        <p class="mt-1 btn-danger text-warning"> ERROR! Discount not added!</p>
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
            $("#result").load("discloader.php");

      });
                $('.pagebutton').click(function () {
                var value = this.value ;
                $("#result").load("discloader.php?id="+value);
    });
  
</script>
<?php



include('../footer.php');
?>