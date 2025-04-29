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

  <link href="assets/css/style.css" rel="stylesheet">

</head>

  <body>
  <?php
include "../admin/db.php";
include "links.php";
session_start();
if($_SESSION['role']==2){

$user_id=$_SESSION['uId'];
$user_name=$_SESSION['username'];
if(isset($user_id)){?>

<i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <header id="header">
    <div class="d-flex flex-column">
    <?php
$select = mysqli_query($conn,"SELECT * FROM registration WHERE user_id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
   $fetch = mysqli_fetch_assoc($select);
}  
?>
      <div class="profile">
        <img src="../admin/uploads-images/<?php echo $fetch['lawyer_photograph']?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><?php echo $fetch['username']?></h1>
        <div class="social-links mt-3 text-center">
          <a href="www.twitter.com" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="www.facebook.com" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="www.instagram.com" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="www.google.com" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="www.linkedin.com" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#App" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Pending Appointments</span></a></li>
          <li><a href="#App2" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Settled Appointments</span></a></li>

          <li><a href="update_profile.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Update Profile</span></a></li>
          <li><a href="logout.php" class="nav-link scrollto"><i class="bx bx-log-out"></i> <span>Logout</span></a></li>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  <section style="background:url('images/background_img.jpg') top center;"  id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><?php echo $fetch['username']?></h1>
      <p>Welcome to <span class="typed" data-typed-items="Lawyers Panel"></span></p>
    </div>
  </section>

  <main id="main">

 
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="../admin/uploads-images/<?php echo $fetch['lawyer_photograph']?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
           
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo $fetch['dob']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $fetch['ph_no']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?php echo $fetch['address']?></span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?php echo $fetch['qualification']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $fetch['email']?></span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Status:</strong> <span>Available</span></li>
                </ul>
            </div>
            </div>
           
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
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
                $query="SELECT id FROM appointments where status='Done' And lawname='$user_name' ORDER BY id";
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
                $query="SELECT id FROM appointments where status='Pending' And lawname='$user_name' ORDER BY id";
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
                $query="SELECT id FROM appointments where  lawname='$user_name' ORDER BY id";
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
<div class="table-responsive">
        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Client Name</th>
      <th scope="col">Client Email</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Service</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
  <?php
        $sql="SELECT * FROM Appointments where lawname='$user_name' AND status='pending'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
        
  echo '        
    <tr>
    <td>'.$row['username'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['date'].'</td>
      <td>'.$row['time'].'</td>
      <td>'.$row['service'].'</td>
      <td>'.$row['status'].'</td>
     <td> <a href="mark.php?id='.$row['id'].'" class="button btn btn-success">Approve</a> </td>
     <td> <a href="delete_app.php?id='.$row['id'].'" class="button btn btn-danger">Decline</a> </td>

    </tr>';
  }?>
  </tbody>
</table>
</div>
        </div>
      </div>
    </section><!-- End Facts Section -->
    <section id="App2" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Settled Appointments</h2>
        </div>
        <div class="table-responsive">
        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Client Name</th>
      <th scope="col">Client Email</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Service</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
  <?php
        $sql="SELECT * FROM Appointments where lawname='$user_name' AND status='Done'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
        
  echo '        
    <tr>
    <td>'.$row['username'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['date'].'</td>
      <td>'.$row['time'].'</td>
      <td>'.$row['service'].'</td>
      <td>'.$row['status'].'</td>

    </tr>';
  }?>
  </tbody>
</table>
</div>
        </div>
      </div>
    </section><!-- End Facts Section -->
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

.text {
  background-color: #04AA6D;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
  
}
</style>




