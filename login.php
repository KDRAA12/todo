<?php
include("database.php");
extract($_POST);
session_start();
if(isset($submit))
{
  $rs=mysqli_query($conn,"select * from user where email='$email'");
  if(mysqli_num_rows($rs)<1)
	{
		$alert='User not found';
	}
	else
	{
    $row =[];
    foreach($rs as $row) {
      break;
  }
    $candidate_hash=$row['password'];
    if (password_verify ($_POST['password'],$candidate_hash)){
      
       $_SESSION["email"]=$email;
       $_SESSION["id"]=$row['ID'];
       $_SESSION["name"]=$row['fullname'];   
    }
    else
    {
       echo ''.$password;
       echo '<br/>';
       echo''.$row['password'];
      $alert = 'Wrong Password';
    }
	}
}
if (isset($_SESSION["name"]))
{
  header('location:index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List app</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="login-page">


  <div class="form">
  <?php
		  if(isset($alert))
		  {
		  	echo '<div class="alert alert-danger">'.$alert.'</div>';
  
      }
		  ?> 
    <form class="login-form" method='POST'>
      <input type="text" name='email' placeholder="email"/>
      <input type="password" name='password' placeholder="password"/>
      <button type="submit"  name="submit">login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


