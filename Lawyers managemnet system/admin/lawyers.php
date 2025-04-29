<?php
include "db.php";
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit;
}?>
 
  <?php
$select = mysqli_query($conn,"SELECT * FROM registration WHERE user_id") or die('query failed');
if(mysqli_num_rows($select) > 0){
   $fetch = mysqli_fetch_assoc($select);
}  
?>
   <?php include 'header.php' ?>   
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
          <h2>Lawyer Details</h2>
        </div>

        <table class="table table-light">
  <thead>
    <tr>
      <th scope="col">Lawyer Name</th>
      <th scope="col">Lawyer Email</th>
      <th scope="col">Qualification</th>
      <th scope="col">Address</th>
      <th scope="col">Department</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Phone NO.</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
  <?php
        $sql="SELECT * FROM registration where role_id=2";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
        
  echo '        
    <tr>
    <td>'.$row['username'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['qualification'].'</td>
    <td>'.$row['address'].'</td>
    <td>'.$row['category'].'</td>
    <td>'.$row['dob'].'</td>
    <td>'.$row['ph_no'].'</td>
 <td> <a class="btn btn-danger" href="delete_lawyer.php?user_id='.$row['user_id'].'" >DeleteAccount</a> 
 <br> 
 <a class="btn btn-success mt-2" href="../frontend/profiles.php?user_id='.$row['user_id'].'" >ViewProfile</a></td>
 


    </tr>';
  }?>
  </tbody>
</table>
      </div>
    </section><!-- End Facts Section -->

</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php include 'footer.php' ?>

