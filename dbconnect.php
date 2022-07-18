<?php  
$host = "localhost";
$user = "root";
$pass = "";
$database = "Shoppingo";

$conn = mysqli_connect($host, $user, $pass, $database);

if(!$conn){
    die("ERROR! Database not connected");
}