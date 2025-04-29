<?php session_start(); ?>
<?php include "config/config.php" ?>


<?php 


echo $_SESSION['userotp'];


if(isset($_POST['submit']))
{
    $signup_query = "INSERT INTO `user_login`(`user_name`, `user_email`, `user_password`) VALUES  (:user_name,:user_email,:user_password)";
    
    $username = $_SESSION['username'];
    $email = $_SESSION['useremail'];
    $password = $_SESSION['userpassword'];
    $otp = $_SESSION['userotp'];
    $userotp = $_POST['user_otp'];

    echo $userotp;

 if($otp ==  $userotp)
 {

$otpquery =$connection->prepare($signup_query);
$otpquery->bindParam(':user_name',$username);
$otpquery->bindParam(':user_email',$email);
$otpquery->bindParam(':user_password',$password);
$otpquery->execute();


echo $userotp;
}
else
{
    echo "<script>alert('kindly fill correct otp')</script>";
}


}




//   $signup_query = "INSERT INTO `user_login`(`user_name`, `user_email`, `user_password`) VALUES  (:user_name,:user_email,:user_password)";

//   $hash_password = password_hash($password, PASSWORD_BCRYPT);
//   $signup_query_prepare =  $connection->prepare($signup_query);
// $signup_query_prepare->bindParam(":user_name", $username);
// $signup_query_prepare->bindParam(":user_email", $email);
// $signup_query_prepare->bindParam(":user_password", $hash_password);

// $signup_query_prepare->execute();
 ?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Transportation HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/loder.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
    <!-- Header End -->
    </header>
<main>
<?php echo $_SESSION['user_email']; ?>

<!--? contact-form start -->
<section class="contact-form-area section-bg  pt-115 pb-120 fix" data-background="assets/img/gallery/section_bg02.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Contact wrapper -->
            <div class="col-xl-8 col-lg-9">
                <div class="contact-form-wrapper">
                    <!-- From tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-50">
                                <h2>Verify Yourself!</h2>
                            </div>
                        </div>
                    </div>
                    <!-- form -->
                    <form action="otp.php" method="post" class="contact-form">
                        <div class="row ">
                             
                            <div class="col-lg-12">
                                <div class="input-form">
                               
                                <input class="bg-color-primary" type="Password" name="user_otp" placeholder="Enter your OPT">
                                </div>
                           
                            </div>
                       




                            <!-- Button -->
                            <div class="col-lg-12">
                                <button name="submit" type="submit" class="submit-btn">Verify</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-form end -->

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
</body>
</html>