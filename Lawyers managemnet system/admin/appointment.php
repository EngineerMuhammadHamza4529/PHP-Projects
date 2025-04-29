<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;
}
include "db.php";
include "header.php";
?>

<section style="background:url('images2/image_3.jpg') fixed top center" id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><?php echo $_SESSION['name']?></h1>
      <p>Welcome to <span class="typed" data-typed-items="Admin Dashboard > Lawyer Details"></span></p>
    </div>
  </section>
  <main id="main">

    <section id="facts" class="facts">
      <div class="container">

        <div class="section-title">
          <h2>Appointments</h2>
        </div>

        <table class="table table-light">
  <thead>
    <tr>
      <th scope="col">Client Name</th>
      <th scope="col">Client Email</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Lawyer Name</th>
      <th scope="col">Service</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php
        $sql="SELECT * FROM appointments";
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
     <td> <a class="btn btn-danger" href="deleteapp.php?id='.$row['id'].'" class="button">Decline</a> <a class="btn btn-success" href="edit_app.php?id='.$row['id'].'" class="button">Edit</a> </td>

    </tr>';
  }?>
  </tbody>
</table>
      
        </div>
    </section><!-- End Facts Section -->
        </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include 'footer.php' ?>