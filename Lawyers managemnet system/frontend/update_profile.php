<?php

include '../admin/db.php';
session_start();
if($_SESSION['role']==2){

$user_id = $_SESSION['uId'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_qualification = mysqli_real_escape_string($conn, $_POST['update_qualification']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
   $update_deb = mysqli_real_escape_string($conn, $_POST['update_deb']);
   $update_dob = mysqli_real_escape_string($conn, $_POST['update_dob']);
   $update_ph = mysqli_real_escape_string($conn, $_POST['update_ph']);



   mysqli_query($conn, "UPDATE registration SET username = '$update_name', email = '$update_email'
   ,qualification='$update_qualification'
   ,address='$update_address',category='$update_deb',dob='$update_dob',ph_no='$update_ph' WHERE user_id = '$user_id'") or die('query failed');
    if ($conn) {
    echo "<script>alert('Profile updated successfully!');</script>";
    } else {
   echo "<script>alert('Profile update failed!');</script>";
   }


   $old_pass = $_POST['old_pass'];
   $update_pass = $_POST['update_pass'];
   $new_pass =$_POST['new_pass'];
   $confirm_pass = $_POST['confirm_pass'];

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE registration SET password = '$confirm_pass' WHERE user_id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = '../admin/uploads-images/'.$update_image;

   if(!empty($update_image)){
         $image_update_query = mysqli_query($conn, "UPDATE registration SET lawyer_photograph = '$update_image' WHERE user_id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'links.php' ?>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM registration WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
<div class="container-fluid bg-info">
   <form  method="post" enctype="multipart/form-data" class="form">
      <?php
         if($fetch['lawyer_photograph'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="../admin/uploads-images/'.$fetch['lawyer_photograph'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      
      <div class="row">
     
         <div class="col-md-6 mb-3">
            <label for="update_name" class="form-label">Username :</label>
            <input type="text" id="update_name" name="update_name" value="<?php echo $fetch['username']; ?>" class="form-control">
         </div>
         <div class="col-md-6 mb-3">
            <label for="update_email" class="form-label">Email :</label>
            <input type="email" id="update_email" name="update_email" value="<?php echo $fetch['email']; ?>" class="form-control">
         </div>
         <div class="col-md-6 mb-3">
            <label for="update_image" class="form-label">Update Your Photo :</label>
            <input type="file" id="update_image" name="update_image" accept="image/jpeg, image/jpg, image/png, image/webp, image/jfif, image/gif, image/tiff" class="form-control">
         </div>

   
         <div class="col-md-6 mb-3">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <label for="update_pass" class="form-label">Old Password :</label>
            <input type="password" id="update_pass" name="update_pass" placeholder="Enter previous password" class="form-control">
         </div>
         <div class="col-md-6 mb-3">
            <label for="new_pass" class="form-label">New Password :</label>
            <input type="password" id="new_pass" name="new_pass" placeholder="Enter new password" class="form-control">
         </div>
         <div class="col-md-6 mb-3">
            <label for="confirm_pass" class="form-label">Confirm Password :</label>
            <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm new password" class="form-control">
         </div>

         <div class="col-md-6 mb-3">
            <label for="update_qualification" class="form-label">Qualification :</label>
            <input type="text" id="update_qualification" name="update_qualification" value="<?php echo $fetch['qualification']; ?>" class="form-control">
         </div>
         <div class="col-md-6 mb-3">
            <label for="update_address" class="form-label">Address :</label>
            <input type="text" id="update_address" name="update_address" value="<?php echo $fetch['address']; ?>" class="form-control">
         </div>
         <div class="col-md-6 mb-3">
            <label for="update_deb" class="form-label">Department :</label>
            <select id="update_deb" name="update_deb" class="form-select form-control">
               <option selected value=""><?php echo $fetch['category']; ?></option>
               <?php 
                  $sql="SELECT * FROM categories";
                  $result=mysqli_query($conn, $sql);
                  while($row=mysqli_fetch_array($result)){
               ?>
               <option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
               <?php } ?>
            </select>
         </div>

         
         <div class="col-md-6 mb-3">
            <label for="update_dob" class="form-label">Date of Birth :</label>
            <input type="date" id="update_dob" name="update_dob" value="<?php echo $fetch['dob']; ?>" class="form-control">
         </div>
         <div class="col-md-6 mb-3">
            <label for="update_ph" class="form-label">Phone Number :</label>
            <input type="text" id="update_ph" name="update_ph" value="<?php echo $fetch['ph_no']; ?>" class="form-control">
         </div>
      </div>
      <div class="d-grid gap-2 d-md-block">
         <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
         <a href="lawyer_dashboard.php" class="btn btn-danger">Go Back</a>
      </div>
   </form>
</div>

</body>
</html>

<?php }
else{
   header("location:404 Not found.html");
}?>