<?php
include('header.php');

if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
include('leftnav.php');       
?>
<div class="col-md-10" style="min-height:700px;">
<div class="cinput mb-2">
    <span>Sort By</span>
    <select class="bg-theme" name="catselector" id="catselectr" style=" border-radius:5px">
        <option value="All">All</option>
        <option value="CONFIRMED">CONFIRMED</option>
        <option value="SHIPPED">SHIPPED</option>
        <option value="DELIVERED">DELIVERED</option>
        <option value="CANCELLED">CANCELLED</option>
        <option value="NOT CONFIRMED">NOT CONFIRMED</option> 
    </select>
    
    <script>
      $(document).ready(
      function(){
            $("#catdiv").load("orderviewer.php");

      });
                $('#catselectr').on('change', function() {
                    var value = this.value ;
                 
                $("#catdiv").load("orderviewer.php?status="+value);
                });
                
    
    </script>
</div>
<dic class="col-md-12 m-0 p-0" id="catdiv"></dic>
</div>    
<?php
include('../footer.php');
?>