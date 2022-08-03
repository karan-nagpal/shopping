<?php  
// $host = "fdb33.awardspace.net";
// $user = "4115342_shopping";
// $pass = "dcUEZJe6mBJXPFu";
// $database = "4115342_shopping";



$host = "localhost";
$user = "root";
$pass = "";
$database = "Shoppingo";
$conn = mysqli_connect($host, $user, $pass, $database);
if(!$conn){
    die("ERROR! Database not connected");
}