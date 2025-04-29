<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lawyers Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

  <body>
  <?php
include "../admin/db.php";
session_start();
if($_SESSION['role']==3){

$user_id=$_SESSION['uId'];
$user_name=$_SESSION['username'];
if(isset($user_id)){?>
<?php 
         include 'links.php';
         include '../admin/db.php';
         ?>
    <?php
$select = mysqli_query($conn,"SELECT * FROM registration WHERE user_id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
   $fetch = mysqli_fetch_assoc($select);
}  
?>

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

      <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center mb-5">
            <h1 class="bread">Client Appointments</h1>
          </div>
        </div>
      </div>
    </section>
         
      <!-- ======= Facts Section ======= -->
      <section id="facts" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Dashboard</h2>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <?php
                $query="SELECT id FROM appointments where status='Done' And username='$user_name' ORDER BY id";
                $query_run=mysqli_query($conn,$query);
                $count=mysqli_num_rows($query_run);    
            
              echo'<span data-purecounter-start="0" data-purecounter-end="'.$count.'" data-purecounter-duration="1" class="purecounter"></span>
              ';?>
              <p><strong>Settled Appointments</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <?php
                $query="SELECT id FROM appointments where status='Pending' And username='$user_name' ORDER BY id";
                $query_run=mysqli_query($conn,$query);
                $count=mysqli_num_rows($query_run);    
            
              echo'<span data-purecounter-start="0" data-purecounter-end="'.$count.'" data-purecounter-duration="1" class="purecounter"></span>
              ';?>
                            <p><strong>Pending Appointments</strong> </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <?php
                $query="SELECT id FROM appointments where  username='$user_name' ORDER BY id";
                $query_run=mysqli_query($conn,$query);
                $count=mysqli_num_rows($query_run);    
            
              echo'<span data-purecounter-start="0" data-purecounter-end="'.$count.'" data-purecounter-duration="1" class="purecounter"></span>
              ';?>
                            <p><strong>Total Appointments</strong> </p>
            </div>
          </div>


        </div>

      </div>
      </section><!-- End Facts Section -->
    <section id="App" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Pending Appointments</h2>
        </div>

        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Client Name</th>
      <th scope="col">Client Email</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Lawyer Name</th>
      <th scope="col">Service</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $sql="SELECT * FROM Appointments where username='$user_name' AND status='pending'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
        
  echo '        
    <tr>
    <td>'.$row['username'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['date'].'</td>
      <td>'.$row['time'].'</td>
      <td>'.$row['lawname'].'</td>
      <td>'.$row['service'].'</td>
      <td>'.$row['status'].'</td>
    </tr>';
  }?>
  </tbody>
</table>
      
        </div>
      </div>
    </section><!-- End Facts Section -->
    <section id="App2" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Settled Appointments</h2>
        </div>

        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Client Name</th>
      <th scope="col">Client Email</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Lawyer Name</th>
      <th scope="col">Service</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
  <?php
        $sql="SELECT * FROM Appointments where username='$user_name' AND status='Done'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
        
  echo '        
    <tr>
    <td>'.$row['username'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['date'].'</td>
      <td>'.$row['time'].'</td>
      <td>'.$row['lawname'].'</td>
      <td>'.$row['service'].'</td>
      <td>'.$row['status'].'</td>

    </tr>';
  }?>
  </tbody>
</table>
      
        </div>
      </div>
    </section><!-- End Facts Section -->
<?php include 'footer.php' ?>

</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>




<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/typed.js/typed.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>
      
<?php
}}
else{
    header("location:404 Not found.html");
}?>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>






<style>
.container2 {
  position: relative;
  width: 11.5%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-55%, -45%);
  text-align: center;
  width:80%;
  height:80%;
}

.container2:hover .image {
  opacity: 0.3;
}

.container2:hover .middle {
  opacity: 0.7;
}


</style>




