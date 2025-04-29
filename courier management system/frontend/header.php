<?php

session_start();

include '../backend/db.php';


if (isset($_SESSION['role_id']) == 6) {
  $userId = $_SESSION['userId'];

$sql5 = "SELECT `name`, `profile_picture` , role_type FROM `user` LEFT JOIN role ON user.role_id = role.role_id  WHERE user_id = '{$userId}'";

$result5 = mysqli_query($conn, $sql5);

$row5 = mysqli_fetch_assoc($result5);
}


?>


<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>COURIER</title>


  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">


  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="assets/css/theme.css" rel="stylesheet" />

</head>


<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block"
      data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo1.png"
            height="65" alt="logo" /></a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
            <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
            <li class="nav-item px-2"><a class="nav-link" href="services.php">Our Services</a></li>
            <li class="nav-item px-2"><a class="nav-link" href="about.php">About Us</a></li>
            <?php
             if (!isset($_SESSION['role_id']) == 6) {
            ?>
              <li class="nav-item px-2"><a class="nav-link" href="login.php">Login</a></li>
              <?php
             }
              ?>
          </ul>
          <a class="btn btn-primary order-1 order-lg-0 mx-lg-3" href="contact.php">Contact Us</a>
        </div>
        <?php
        if (isset($_SESSION['role_id']) == 6) {
          
       
        ?>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">
              <img class="rounded-circle" src="../backend/uploads-images/<?php echo $row5['profile_picture']?>" alt="" style="width: 40px; height: 40px;">
              <span style="color: #000;"><?php echo $_SESSION['name']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
              <a href="logout.php" class="dropdown-item">Log Out</a>
            </div>
          </div>
          <?php
           }
          ?>
      </div>
    </nav>