<?php
session_start();
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
$id = $_GET['did'];

$cmd = "select * from discounts where DisId=$id";

        $data = mysqli_query($conn, $cmd);
        $numrow = mysqli_num_rows($data);
        $row = mysqli_fetch_array($data);
            if($numrow > 0){
                    if($row['status'] == 'Deactivated'){
                        $cmd2 ="update discounts set status = 'Active' where DisId=$id" ;
                    }else{
                        $cmd2 ="update discounts set status = 'Deactivated' where DisId=$id";
                    }
                    $statusup = mysqli_query($conn, $cmd2);
                    header('location:addiscounts.php');
                }else{
                    header('location:addiscounts.php?toggleerror');
                }
            ?>
