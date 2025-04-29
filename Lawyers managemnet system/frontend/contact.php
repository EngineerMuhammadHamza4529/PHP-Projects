<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Online Lawyers Application</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
      <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
      <link rel="stylesheet" href="css/animate.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/magnific-popup.css">
      <link rel="stylesheet" href="css/aos.css">
      <link rel="stylesheet" href="css/ionicons.min.css">
      <link rel="stylesheet" href="css/flaticon.css">
      <link rel="stylesheet" href="css/icomoon.css">
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <?php
         include "../admin/db.php";
         session_start();
         if(isset($_SESSION['uId'])){
           $user_id=$_SESSION['uId'];
         
           
         
         ?>  
      <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
         <div class="container">
            <a class="navbar-brand" href="index.php">Online <span>Lawyers Application</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Lawyers
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                           $query = "SELECT user_id, username FROM registration WHERE role_id = 2"; 
                           $result = mysqli_query($conn, $query);
                           
                           if (mysqli_num_rows($result) > 0) {
                               while ($row = mysqli_fetch_assoc($result)) {
                                 
                                   $user_id = htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8');
                                   $username = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');
                           
                           
                                   if (isset($_SESSION['uId']) && !empty($_SESSION['uId'])) {
                                       echo '<li><a class="dropdown-item" href="profiles.php?user_id=' . $user_id . '">' . $username . '</a></li>';
                                   } else {
                                      
                                       echo '<li><a class="dropdown-item" href="login.php">Login to View ' . $username . '\'s Profile</a></li>';
                                   }
                               }
                           } else {
                               echo '<li><a class="dropdown-item" href="#">No lawyers available</a></li>';
                           }
                           ?>
                     </ul>
                  </li>
                  <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                  <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <span class="d-none d-lg-inline-flex"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                     <a href="my_appointment.php" class="dropdown-item">My Appointment</a>
                     <a href="user_profile.php" class="dropdown-item">My Profile</a>
                        <a href="logout.php" class="dropdown-item">LogOut</a>
                     </div>
                  </div>
               </ul>
            </div>
         </div>
      </nav>
      <!-- END nav -->
      <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
         <div class="overlay"></div>
         <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
               <div class="col-md-9 ftco-animate pb-5 text-center">
                  <h1 class="mb-3 bread">Contact Us</h1>
                  <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
               </div>
            </div>
         </div>
      </section>
      <?php
         $select = mysqli_query($conn,"SELECT * FROM Registration WHERE role_id = 3") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }  
         ?>
      <section class="ftco-section contact-section">
         <div class="container">
            <div class="row d-flex mb-5 contact-info">
               <div class="col-md-12 mb-4">
                  <h2 class="h3">Contact Information</h2>
               </div>
               <div class="w-100"></div>
               <div class="col-md-3">
                  <p><span><b>Address:</b></span>SD-1, Block A North Nazimabad Town, Karachi, Pakistan</p>
               </div>
               <div class="col-md-3">
                  <p><span><b>Phone:</b></span> <a href="tel://1234567920">+92325-7662005</a></p>
               </div>
               <div class="col-md-3">
                  <p><span><b>Email:</b></span> <a href="mailto:info@yoursite.com">info@lawyers.com</a></p>
               </div>
               <div class="col-md-3">
                  <p><span><b>Website</b></span> <a href="#">lawyers.com</a></p>
               </div>
            </div>
            <div class="row block-9 no-gutters">
               <div class="col-lg-6 order-md-last d-flex">
                  <form method="post" class="bg-light p-5 contact-form">
                     <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $fetch['username']?>" name="name">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $fetch['email']?>" name="email" >
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject" name="sub">
                     </div>
                     <div class="form-group">
                        <textarea name="msg" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                     </div>
                     <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" name="submit">
                     </div>
                  </form>
               </div>
               <div class="col-lg-6 d-flex">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28944.55193930902!2d66.98370158672334!3d24.929719486074436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f90157042d3%3A0x93d609e8bec9a880!2sAptech%20Computer%20Education%20North%20Nazimabad%20Center!5e0!3m2!1sen!2s!4v1704643545219!5m2!1sen!2s" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
               </div>
            </div>
         </div>
      </section>
      <?php
         }
         else{
             ?>
      <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
         <div class="container">
            <a class="navbar-brand" href="index.php">Online <span>Lawyers Application</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Lawyers
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                           $query = "SELECT user_id, username FROM registration WHERE role_id = 2"; 
                           $result = mysqli_query($conn, $query);
                           
                           if (mysqli_num_rows($result) > 0) {
                               while ($row = mysqli_fetch_assoc($result)) {
                                
                                   $user_id = htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8');
                                   $username = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');
                           
                                  
                                   if (isset($_SESSION['uId']) && !empty($_SESSION['uId'])) {
                                       echo '<li><a class="dropdown-item" href="profiles.php?user_id=' . $user_id . '">' . $username . '</a></li>';
                                   } else {
                                     
                                       echo '<li><a class="dropdown-item" href="login.php">Login to View ' . $username . '\'s Profile</a></li>';
                                   }
                               }
                           } else {
                               echo '<li><a class="dropdown-item" href="#">No lawyers available</a></li>';
                           }
                           ?>
                     </ul>
                  </li>
                  <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                  <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
                  <li class="nav-item "><a href="login.php" class="nav-link text-danger"><b>Login </b></a></li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- END nav -->
      <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
         <div class="overlay"></div>
         <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
               <div class="col-md-9 ftco-animate pb-5 text-center">
                  <h1 class="mb-3 bread">Contact Us</h1>
                  <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
               </div>
            </div>
         </div>
      </section>
      <section class="ftco-section contact-section">
         <div class="container">
            <div class="row d-flex mb-5 contact-info">
               <div class="col-md-12 mb-4">
                  <h2 class="h3">Contact Information</h2>
               </div>
               <div class="w-100"></div>
               <div class="col-md-3">
                  <p><span><b>Address:</b></span>SD-1, Block A North Nazimabad Town, Karachi, Pakistan</p>
               </div>
               <div class="col-md-3">
                  <p><span><b>Phone:</b></span> <a href="tel://1234567920">+92325-7662005</a></p>
               </div>
               <div class="col-md-3">
                  <p><span><b>Email:</b></span> <a href="mailto:info@yoursite.com">info@lawyers.com</a></p>
               </div>
               <div class="col-md-3">
                  <p><span><b>Website</b></span> <a href="#">lawyers.com</a></p>
               </div>
            </div>
            <div class="row block-9 no-gutters">
               <div class="col-lg-6 order-md-last d-flex">
                  <form method="post" class="bg-light p-5 contact-form">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email" name="email" required>
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject" name="sub" required>
                     </div>
                     <div class="form-group">
                        <textarea name="msg" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
                     </div>
                     <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" name="submit">
                     </div>
                  </form>
               </div>
               <div class="col-lg-6 d-flex">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28944.55193930902!2d66.98370158672334!3d24.929719486074436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f90157042d3%3A0x93d609e8bec9a880!2sAptech%20Computer%20Education%20North%20Nazimabad%20Center!5e0!3m2!1sen!2s!4v1704643545219!5m2!1sen!2s" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
               </div>
            </div>
         </div>
      </section>
      <?php
}
include 'footer.php';

if (isset($_POST["submit"])) {
    if (!isset($_SESSION['uId'])) {
        echo "<script>alert('Please log in to submit the contact form.'); window.location.href='login.php';</script>";
        exit;
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['sub'];
    $msg = $_POST['msg'];

    $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$sub', '$msg')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Something went wrong";
    } else {
        echo "<script>alert('Thanks For Contacting Us!')</script>";
    }
}
?>