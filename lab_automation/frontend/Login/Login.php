<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>LABIFY LOGIN</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="">
  
      <link rel="stylesheet" href="css/style.css">

  
</head>
<?php
session_start();
include('Connect.php')
?>
<body>

<div class="form" id="form">
<form action="" method="POST" > 
  <div class="field email">
    <div class="icon"></div>
    <input class="input" id="email" type="text" name="User_NE" placeholder="Username or Email" autocomplete="off"/>
  </div>
  <div class="field password">
    <div class="icon"></div>
    <input class="input" id="password" name="User_pass" type="password" placeholder="Password"/>
  </div>
  <button class="button" id="submit" name="login_btn">LOGIN
    <div class="side-top-bottom"></div>
    <div class="side-left-right"></div>
  </button>
 <a href="../Index.php"><button  class="button" id="submit">BACK
    <div class="side-top-bottom"></div>
    <div class="side-left-right"></div>
  </button></a>
  </form>
</div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
<?php


if (isset($_POST['login_btn'])) {

$user_name=$_POST['User_NE'];
$user_pass=$_POST['User_pass'];

$q="SELECT * FROM `users` WHERE 	UserName='$user_name' and 	UserPassword='$user_pass' ";
$login=mysqli_query($con,$q);
$data=mysqli_fetch_assoc($login); 

if (mysqli_num_rows($login)!=0) {
  $rol=$data['RoleID'];
  $_SESSION['ROL']=$data['RoleID'];
  $_SESSION['rolename']=$data['RoleName'];
  $_SESSION['ID']=$data['UserID'];
	$_SESSION['ADMIN']=$data['UserName'];
  
	
	echo"<script>alert('Login successful');window.location.href='../../lbfynew/Index.php'</script>";

}
else{
	echo"<script>alert('Login Failed')</script>";
}
}

?>

