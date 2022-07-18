<?php
include('header.php');

if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
include('leftnav.php');       
?>
<div class="col-md-10"style="min-height:700px;">
<div class="cinput ">
    <select class="bg-theme" name="catselector" id="catselectr" style=" border-radius:5px">
        <option value="all">View by all Categories</option>

        <?php
    $catq = "select catid, name from categories";
    $datacat = mysqli_query($conn, $catq);
    $numrowcat = mysqli_num_rows($data);
    if($numrowcat=0){
        echo "ERROR";
    }else{
        while($row = mysqli_fetch_array($datacat)){ ?>
            <option value="<?php echo  $row['catid']; ?>"><?php echo $row['name']; ?></option>
            <?php
        }
    }
    ?>
    </select>
    <script>
      $(document).ready(
      function(){
            $("#catdiv").load("viewproducts.php");

      });
                $('#catselectr').on('change', function() {
                    var value = this.value ;
                $("#catdiv").load("viewproducts.php?cid="+value);
                });
                
    
    </script>
</div>
<dic class="col-md-12" id="catdiv"></dic>
</div>    
<?php
include('../footer.php');
?>