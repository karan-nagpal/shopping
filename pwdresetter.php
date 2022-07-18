<?php 
include('dbconnect.php');

$user = $_POST['userid'];

$rancode = shuffle("abcdefghijklmnABGCJEYFNpqrstuvwxyz123456789");
echo $rancode;

$cmd = "update Customers set vercode = '".$rancode."' where email = '".$user."'";
mysqli_query($conn, $cmd);

$cmd2 = "Select email, vercode from Customers where email  = '".$user."'";
$data = mysqli_query($conn, $cmd2);
$row = mysqli_fetch_array($data);
$email = $row['email'];
$to = $email;
$subject = "Password reset";

$message = "
<html>
<head>
<title>Password reset for Shoppingo</title>
</head>
<body>
<p>Hello ".$email." , please click the below link to reset your password. </p>
<p> <a href='reset.php?token=".$rancode."&email=".$row['email']." >Click Here</a>
</p>
or go to link below to reset your password
<p></p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);

header('location:userlogin.php?linksent');


?>
