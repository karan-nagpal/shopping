<?php 
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
?>
<div>


<table class= "table table-bordered">
    <tr class="bg-theme">
    <th>Sr no</th>
    <th>Category</th>
    <th>Action</th>
</tr>
<?php
if(isset($_GET['id'])){
    $a = $_GET['id']*10-10;
    
    $cmd = "select * from categories limit ".$a.", 10";
}else{
    $cmd = "select * from categories limit 0, 10";
}
        $data = mysqli_query($conn, $cmd);
        $numrow = mysqli_num_rows($data);
        $sn = 0;
        if($numrow == 0){
            echo "No Data Found";
        }else{
            while($row = mysqli_fetch_array($data)){
                $sn++;
            ?>
            <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><a href="delcat.php?did=<?php echo $row['catid']; ?>" class= "btn">Delete</a></td>
            </tr>
            <?php
            }
        }
    

        

        ?>
</table>
</div>