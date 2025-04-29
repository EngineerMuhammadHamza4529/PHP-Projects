<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Online Lawyers Application</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <?php 
         include 'links.php';
         include '../admin/db.php';
         ?>
   </head>
   <body>
      <?php
         session_start();
         if(isset($_SESSION['uId'])){?>
      <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
         <div class="container">
            <a class="navbar-brand" href="index.php">Online<span>Lawyers Application</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
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
                                   echo '<li><a class="dropdown-item" href="profiles.php?user_id=' . htmlspecialchars($row['user_id']) . '">' . htmlspecialchars($row['username']) . '</a></li>';
                               }
                           } else {
                               echo '<li><a class="dropdown-item" href="#">No lawyers available</a></li>';
                           }
                           ?>
                     </ul>
                  </li>
                  <li class="nav-item"><a href="services.php" class="nav-link">Our Services</a></li>
                  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <span class="d-none d-lg-inline-flex"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="user_profile.php" class="dropdown-item">My Profile</a>
                        <a href="logout.php" class="dropdown-item">LogOut</a>
                     </div>
                  </div>
               </ul>
            </div>
         </div>
      </nav>
      <?php } else{?>
      <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
         <div class="container">
            <a class="navbar-brand" href="index.php">Online<span>Lawyers Application</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Lawyers
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                           $query = "SELECT user_id, username FROM registration WHERE role_id = 2"; // Fetch user_id and username of lawyers
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
                  <li class="nav-item"><a href="services.php" class="nav-link">Our Services</a></li>
                  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                  <li class="nav-item "><a href="login.php" class="nav-link text-danger"><b>Login </b></a></li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- END nav -->
      <?php }?>