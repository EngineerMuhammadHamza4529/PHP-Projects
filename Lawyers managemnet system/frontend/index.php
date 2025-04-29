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
                     <a href="my_appointment.php" class="dropdown-item">My Appointment</a> 
                     <a href="user_profile.php" class="dropdown-item">My Profile</a>
                     <a href="logout.php" class="dropdown-item">Logout</a>
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
      <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
         <div class="overlay"></div>
         <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
               <div class="col-md-6 ftco-animate">
                  <h2 class="subheading">Welcome To Online Lawyers</h2>
                  <h1>Attorneys Fighting For Your 
                     <span
                        class="txt-rotate"
                        data-period="2000"
                        data-rotate='[ "Freedom.", "Rights.", "Case.", "Custody." ]'></span>
                  </h1>
                  <!-- <h1 class="mb-4">Attorneys Fighting For Your Freedom</h1> -->
                  <p class="mb-4">We have help thousands of people to get relief from national wide fights wrongfull denials. Now they trusted legalcare attorneys</p>
                  <p><a href="#demo" class="btn btn-primary mr-md-4 py-2 px-4">Our Best Lawyers <span class="ion-ios-arrow-forward"></span></a></p>
               </div>
            </div>
         </div>
      </div>
     
      <div class="container">
         <div class="row">
            <div class="col-sm-6 col-xl-4">
               <div class="shadow-lg bg-light rounded d-flex mt-5 align-items-center justify-content-between p-4 shadow-sm">
                  <i class="fa fa-calendar-check fa-3x text-primary"></i>
                  <div class="ms-3 ">
                     <?php  $appointments_query = "SELECT COUNT(*) AS appointment_count FROM appointments";
                        $appointments_result = mysqli_query($conn, $appointments_query);
                        $appointment_count = mysqli_fetch_assoc($appointments_result)['appointment_count'];
                        ?>
                     <p class="mb-2 text-muted">APPOINTMENTS</p>
                     <h6 class="mb-0"><?php echo $appointment_count; ?></h6>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-4">
               <div class="shadow-lg bg-light rounded d-flex mt-5 align-items-center justify-content-between p-4 shadow-sm">
                  <i class="fa fa-gavel fa-3x text-primary"></i>
                  <div class="ms-3 ">
                     <?php  $appointments_query = "SELECT COUNT(*) AS lawyer_count FROM registration where role_id=2";
                        $appointments_result = mysqli_query($conn, $appointments_query);
                        $lawyer_count = mysqli_fetch_assoc($appointments_result)['lawyer_count'];
                        ?>
                     <p class="mb-2 text-muted">LAWYERS</p>
                     <h6 class="mb-0"><?php echo $lawyer_count; ?></h6>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-4" >
               <div class="shadow-lg bg-light rounded d-flex mt-5 align-items-center justify-content-between p-4 shadow-sm">
                  <i class="fa fa-users fa-3x text-primary"></i>
                  <div class="ms-3 ">
                     <?php  $appointments_query = "SELECT COUNT(*) AS user_count FROM registration where role_id=3";
                        $appointments_result = mysqli_query($conn, $appointments_query);
                        $user_count = mysqli_fetch_assoc($appointments_result)['user_count'];
                        ?>
                     <p class="mb-2 text-muted">USERS</p>
                     <h6 class="mb-0"><?php echo $user_count; ?></h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <form class="container mt-5 pt-5" method="post">
         <div class="row">
            <div class="col-sm-6 col-xl-4">
               <div class="input-group mb-3">
                  <input type="search" class="form-control" placeholder="Search Lawyers" name="search">
                  <button class="btn btn-warning" type="submit" name="btn">Search</button>
               </div>
            </div>
         </div>
      </form>
      <section class="ftco-section" id="demo">
         <div class="container-fluid px-md-5">
            <div class="row">
               <?php
                  if (isset($_POST["btn"])) {
                      $search = $_POST['search'];
                      $search2 = "SELECT * FROM registration WHERE (username LIKE '%$search%' OR address LIKE '%$search%' OR category LIKE '%$search%') AND role_id = 2";
                      $result2 = mysqli_query($conn, $search2);
                      while ($fetch = mysqli_fetch_array($result2)) {
                          echo '
                          <div class="col-lg-3 col-sm-6 mt-5">
                              <div class="boss">
                                  <div class="wrapper">
                                      <div class="card">
                                          <img src="../admin/uploads-images/' . $fetch['lawyer_photograph'] . '" alt="profile image">
                                          <div class="info">
                                              <h4 class="text-light">' . $fetch['username'] . '</h4>
                                              <p>' . $fetch['category'] . '<br> ' . $fetch['address'] . '</p>';
                          
                          if (isset($_SESSION['uId']) && !empty($_SESSION['uId'])) {
                              echo '<a href="profiles.php?user_id=' . $fetch['user_id'] . '"><button>View Profile</button></a>';
                          } else {
                              echo '<a href="login.php"><button>Login to View Profile</button></a>';
                          }
                          echo '
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          ';
                      }
                  } else {
                      $select = mysqli_query($conn, "SELECT * FROM registration WHERE role_id = 2") or die('query failed');
                      while ($fetch = mysqli_fetch_array($select)) {
                          echo '
                          <div class="col-lg-3 col-sm-6 mt-5">
                              <div class="boss">
                                  <div class="wrapper">
                                      <div class="card">
                                          <img src="../admin/uploads-images/' . $fetch['lawyer_photograph'] . '" alt="profile image">
                                          <div class="info">
                                              <h4 class="text-light">' . $fetch['username'] . '</h4>
                                              <p>' . $fetch['category'] . '<br> ' . $fetch['address'] . '</p>';
                          if (isset($_SESSION['uId']) && !empty($_SESSION['uId'])) {
                              echo '<a href="profiles.php?user_id=' . $fetch['user_id'] . '"><button>View Profile</button></a>';
                          } else {
                              echo '<a href="login.php"><button>Login to View Profile</button></a>';
                          }
                          echo '
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          ';
                      }
                  }
                  ?>
            </div>
         </div>
      </section>
      <br><br><br><br>
      <!-- servicess -->
      <section class="ftco-section ftco-no-pt">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 py-5">
                  <div class="heading-section ftco-animate">
                     <span class="subheading">Our services</span>
                     <h2 class="mb-4">Our Our Services</h2>
                     <p>We Provide all the services you need,We have the best attorneys with 100% winning ratio,which are available 24hrs for you!!</p>
                     <p><a href="services.php" class="btn btn-primary py-3 px-4">More Services</a></p>
                  </div>
               </div>
               <div class="col-lg-9 services-wrap px-4 pt-5">
                  <div class="row pt-md-3">
                     <div class="col-md-4 d-flex align-items-stretch">
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                           <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                              <a href="familylaw.php"><i class="fa fa-2x fa-users"></i></a>
                           </div>
                           <h5 class="mb-4 px-4">Family Law</h5>
                           <p class="m-0">A family lawyer manages legal issues related to family matters.</p>
                           <a href="familylaw.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward fa-2x"></span></a>
                        </div>
                     </div>
                     <div class="col-md-4 d-flex align-items-stretch">
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                           <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                              <a href="bus.php"><i class="fa fa-2x fa-hand-holding-usd"></i></a>
                           </div>
                           <h5 class="mb-4 px-4">Business Law</h5>
                           <p class="m-0">Business law covers legal matters in business operations and transactions.</p>
                           <a href="familylaw.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward fa-2x"></span></a>
                        </div>
                     </div>
                     <div class="col-md-4 d-flex align-items-stretch">
                        <div class="d-flex flex-column align-items-center text-center bg-white rounded pt-4">
                           <div class="icon-box bg-secondary text-primary mt-2 mb-4">
                              <a href="crim.php">  <i class="fa fa-2x fa-gavel"></i></a>
                           </div>
                           <h5 class="mb-4 px-4">Criminal Law</h5>
                           <p class="m-0">A criminal lawyer defends clients accused of crimes and offenses.</p>
                           <a href="familylaw.php" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward fa-2x"></span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <?php include 'footer.php' ?>
      <style>
         .boss {
         width: 100%;
         height: 100%;
         display: flex;
         align-items: center;
         justify-content: center;
         }
         .wrapper {
         display: flex;
         width: 90%;
         justify-content: space-around;
         }
         .card {
         width: 280px;
         height: 360px;
         border-radius: 15px;
         padding: 1.5rem;
         background: white;
         position: relative;
         display: flex;
         align-items: flex-end;
         transition: 0.4s ease-out;
         box-shadow: 0px 7px 10px rgba(0, 0, 0, 0.5);
         }
         .card:hover {
         transform: translateY(20px);
         }
         .card:hover:before {
         opacity: 1;
         }
         .card:hover .info {
         opacity: 1;
         transform: translateY(0px);
         }
         .card:before {
         content: "";
         position: absolute;
         top: 0;
         left: 0;
         display: block;
         width: 100%;
         height: 100%;
         border-radius: 15px;
         background: rgba(0, 0, 0, 0.6);
         z-index: 2;
         transition: 0.5s;
         opacity: 0;
         }
         .card img {
         width: 100%;
         height: 100%;
         -o-object-fit: cover;
         object-fit: cover;
         position: absolute;
         top: 0;
         left: 0;
         border-radius: 15px;
         }
         .card .info {
         position: relative;
         z-index: 3;
         color: white;
         opacity: 0;
         transform: translateY(30px);
         transition: 0.5s;
         }
         .card .info h4 {
         margin: 0px;
         }
         .card .info p {
         letter-spacing: 1px;
         font-size: 15px;
         margin-top: 8px;
         }
         .card .info button {
         padding: 0.6rem;
         outline: none;
         border: none;
         border-radius: 3px;
         background: white;
         color: black;
         font-weight: bold;
         cursor: pointer;
         transition: 0.4s ease;
         }
         .card .info button:hover {
         background: dodgerblue;
         color: white;
         }
      </style>