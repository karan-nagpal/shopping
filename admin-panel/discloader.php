<?php include('dbconnect.php');
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}

?>
<div>


<table class= "table table-bordered text-center">
    <tr class="bg-theme">
    <th>Sr no</th>
    <th>Discount</th>
    <th>Minimum Cart Amt</th>
    <th>Action</th>
    <th>Status</th>
</tr>
<?php
if(isset($_GET['id'])){
    $a = $_GET['id']*10-10;
    
    $cmd = "select * from discounts limit ".$a.", 10";
}else{
    $cmd = "select * from discounts limit 0, 10";
}
        $data = mysqli_query($conn, $cmd);
        $numrow = mysqli_num_rows($data);
        $sn = 0;
        if($numrow > 0){
            
            while($row = mysqli_fetch_array($data)){
                $sn++;
            ?>
            <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $row['disperc']; ?> %</td>
                <td><i class="fa fa-inr"></i><?php echo $row['minamnt']; ?></td>
                <td><a href="deldisc.php?did=<?php echo $row['DisId']; ?>" class= "btn">Delete</a></td>
                <td><a href="toggledisc.php?did=<?php echo $row['DisId']; ?>" class= "btn">
                 <?php echo $row['status'];?> </a></td>
            </tr>
            <?php
            }
        }else{ ?><tr>
            <td></td>
            <td></td>
            <td><?php echo "No Discounts "; ?></td>
            <td></td>
            <td></td>
        </tr>
        <?php
        }  
    

        

        ?>
</table>
</div>