<?php
include "../admin/db.php";
$id = $_GET['user_id'];
$sql = "SELECT * from registration where user_id = '$id'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);
}
$user_name=$row['username'];

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lawyers Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>


  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../admin/uploads-images/<?php echo $row['lawyer_photograph']?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><?php echo $row['username']?></h1>
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
          <li><a href="index.php" class="nav-link scrollto "><i class="bx bx-home"></i> <span>Go Back</span></a></li>
          <li><a href="#about" class="nav-link scrollto active"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#app" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Book Appointment</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->


  <section style="background:url('images2/image_3.jpg') top center" id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><?php echo $row['username']?></h1>
      <p>I'm a <span class="typed" data-typed-items="Lawyer"></span></p>
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
            <img src="../admin/uploads-images/<?php echo $row['lawyer_photograph']?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
           
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo $row['dob']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $row['ph_no']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?php echo $row['address']?></span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?php echo $row['qualification']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $row['email']?></span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Status:</strong> <span>Available</span></li>
                </ul>
            </div>
            </div>
           
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <section id="facts" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Facts</h2>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <?php
                $query="SELECT id FROM appointments where status='Done' And lawname='$user_name' ORDER BY id";
                $query_run=mysqli_query($conn,$query);
                $count=mysqli_num_rows($query_run);    
            
              echo'<span data-purecounter-start="0" data-purecounter-end="'.$count.'" data-purecounter-duration="1" class="purecounter"></span> ';?>
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
            
              echo'<span data-purecounter-start="0" data-purecounter-end="'.$count.'" data-purecounter-duration="1" class="purecounter"></span> ';?>
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
            
              echo'<span data-purecounter-start="0" data-purecounter-end="'.$count.'" data-purecounter-duration="1" class="purecounter"></span>';?>
                            <p><strong>Total Appointments</strong> </p>
            </div>
          </div>


        </div>

      </div>
      </section><!-- End Facts Section -->
 <!-- ======= Contact Section ======= -->
 <section id="app" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 id="bookApp"> Book Appointment </h2>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?php echo $row['address'];?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo $row['email'];?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?php echo $row['ph_no'];?></p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form method="post" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" name="name"  required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email"   required>
                </div>
              <div class="form-group">
                <label for="name">Date</label>
                <input type="date" class="form-control border-0 p-4 datetimepicker-input" placeholder="Select Date" data-target="#date" data-toggle="datetimepicker" name="date">
              </div>
              <div class="form-group">
                <label for="name">Time</label>
                <input type="time" class="form-control border-0 p-4 datetimepicker-input" placeholder="Select Time" data-target="#time" data-toggle="datetimepicker" name="time">
              </div>
              <div class="form-group">
                <label for="name">Lawyer Name</label>
                <input type="text" class="form-control" name="lawname" id="subject" readonly value="<?php echo $row['username'];?> " required>
              </div>
              <div class="form-group">
              <label for="name">Service</label>
              <input type="text" class="form-control" name="dep" id="subject" readonly value="<?php echo $row['category'];?>" required>
            </div>
          </div>
          <input type="submit" name="Submit" value="Book Appointment" class="button" >

          </form>
      </div>
      </section><!-- End Contact Section -->
      <?php
        if(isset($_POST["Submit"])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $date=$_POST['date'];
            $time=$_POST['time'];
            $law=$_POST['lawname'];
            $dep=$_POST['dep'];


            $sql="insert into appointments(username,email,date,time,lawname,service,status)
            values('$name','$email','$date','$time','$law','$dep','Pending')";
            $result=mysqli_query($conn,$sql);
            if(!$sql){
              echo'<script>window.alert("Something Went Wrong!");
              </script>';           }
            else{
                echo'<script>window.alert("Your Request Has Been Sent!");
                </script>';
        }} 
              ?>
</main><!-- End #main -->

</body>

</html>

        



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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

    <style>
        .button {
    margin-left:35%;
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
    background-color: #FF4B2B;

}

.button:active {
	transform: scale(0.95);
}

.button:focus {
	outline: none;
}

.button:hover{
    background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);

}

        </style>
  