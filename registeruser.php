<!DOCTYPE HTML>
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

extract($_POST);
include("database.php");
$rs=mysqli_query($conn,"select * from user where email='$email'");
if (mysqli_num_rows($rs)>0)
{
	header('Location:register.php');
	exit;
}
$hashed_pass = password_hash ($_POST['password'],PASSWORD_BCRYPT );

$r=mysqli_query($conn,"INSERT INTO `user` (`fullname`, `ID`, `email`, `password`) VALUES ('$name', NULL,'$email', '$hashed_pass')"); 
if($r)
{
 header('Location:login.php');
 exit;
   
}
 
?>
</body>
</html>