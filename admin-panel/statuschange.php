<?php
include('dbconnect.php');
$oid = $_GET['oid'];
$status = $_GET['statusselector'];

$cmd = "update orders set orderstatus = '".$status."' where oid = '".$oid."'";
mysqli_query($conn, $cmd);
header('location:vieworders.php');


?>