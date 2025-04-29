<?php
require "config/config.php"
?>


<?php 
if(isset($_SESSION['userId'])){

	header('location:index.php');
}else{

$fetch_register_query = "SELECT * FROM `register_user`";
$fetch_register_prepare = $connection->prepare($fetch_register_query);
$fetch_register_prepare->execute();

$register_data = $fetch_register_prepare->fetchAll(PDO::FETCH_ASSOC);

// print_r($register_data);


  
  if(isset($_POST['login']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    

	if(empty($email) || empty($password))
    {
     
		echo "<script>alert('kindly fill all the fields')</script>";
       

	}else{
		$isEmailExist = true;
		$isLocationChange = false;

     


		foreach($register_data as $user){
			if($user['user_email'] === $email && password_verify($password,$user['user_password']) ){

			$_SESSION['userId'] = $user['user_id'];
			$_SESSION['userName'] = $user['user_name'];
			$_SESSION['userEmail'] = $user['user_email'];

				header('location:index.php');

				return;
			}else{
				
				$isEmailExist = false;

			}
		} 


	

		if(!$isEmailExist)
		{
			
			echo"<script>alert('Either email or password is incorrect')</script>";

		}

	









	}




  }}
  
  ?>





















<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="login.php" method="post" class="sign__form">
							<!-- <a href="index.html" class="sign__logo">
								<img src="img/logo.svg" alt="">
							</a> -->

							<div class="sign__group">
								<input type="text" name="email" class="sign__input" placeholder="Email">
							</div>

							<div class="sign__group">
								<input type="password" name="password" class="sign__input" placeholder="Password">
							</div>
<!-- 
							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Remember Me</label>
							</div> -->
							
							<button name="login" class="sign__btn" type="submit">Sign in</button>

							<span class="sign__text">Don't have an account? <a href="signup.php">Sign up!</a></span>

							<!-- <span class="sign__text"><a href="#">Forgot password?</a></span> -->
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>