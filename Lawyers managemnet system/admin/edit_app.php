
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;
}
include "db.php";
include "header.php";

$id = $_GET['id'];
$sql = "SELECT * from appointments where id = '$id'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);
}

 ?>


  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>



  <main id="main">
 <!-- ======= Contact Section ======= -->
 <section id="app" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 id="bookApp"> Reshedule Appointment </h2>
        </div>

        <div class="row" data-aos="fade-in">
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form method="post" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Client Name</label>
                  <input type="text" name="name" class="form-control" id="name" name="name" readonly value="<?php echo $row['username'];?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Client Email</label>
                  <input type="email" class="form-control" name="email" id="email"  readonly value="<?php echo $row['email'];?>">
                </div>
              <div class="form-group">
                <label for="name">Date</label>
                <input type="date" class="form-control datetimepicker-input" placeholder="Select Date" data-target="#date" data-toggle="datetimepicker" name="date" value="<?php echo $row['date'];?>">
              </div>
              <div class="form-group">
                <label for="name">Time</label>
                <input type="time" class="form-control  datetimepicker-input" placeholder="Select Time" data-target="#time" data-toggle="datetimepicker" name="time" value="<?php echo $row['time'];?>">
              </div>
              <div class="form-group">
                <label for="name">Lawyer Name</label>
                <input type="text" class="form-control" name="lawname" id="subject" readonly value="<?php echo $row['lawname'];?> " required>
              </div>
              <div class="form-group">
              <label for="name">Service</label>
              <input type="text" class="form-control" name="dep" id="subject" readonly value="<?php echo $row['service'];?>" required>
            </div>
          </div>
          <input type="submit" name="Submit" value="Confirm" class="btn btn-success mt-2" >

          </form>
      </div>
      </section><!-- End Contact Section -->
      <?php
        if(isset($_POST["Submit"])){
            $date=$_POST['date'];
            $time=$_POST['time'];


            $sql="UPDATE appointments  set date='$date',time='$time'where id='$id'";
            $result=mysqli_query($conn,$sql);
            if(!$sql){
              echo'<script>window.alert("Something Went Wrong!");
              </script>';            }
            else{
                echo'<script>window.alert("Appointment Resheduled!");
                window.location.href = "appointment.php";
                </script>';
        }} 
              ?>
</main><!-- End #main -->

</body>

</html>

        



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include 'footer.php' ?>
  